<?php

namespace App\Http\Controllers;
use App\Models\Pret;
use Illuminate\Support\Facades\Auth;
use App\Models\Organigramme;
use PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PretsController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        $organigramme =array();

        if($user->projet != null){

            for($i=0;$i<count($user->projet);$i++){

                $organigramme[]=Organigramme::find($user->projet[$i]['organigrammes_id']);
    
               
            }

        }


        $data = array(
            'user' => $user,
            'projets' => $organigramme,

        );


        
        return view('prets.create',$data );
    }


    public function show($id)
    {
        $prets= Pret::find($id);

      

        $createdAt = Carbon::parse($prets['created_at']);

        $date = $createdAt->format("d/m/Y ");

        $data = array(
            'prets' => $prets,
            'date' => $date,
        );

        $pdf = PDF::loadView('prets.show',$data);
        return $pdf->stream();
        return view('prets.show',$data );
        
    }

    public function index()
    {
        $permisssion_gestion_prets = true;

        $permisssion_validation_prêts = false;
     

        if(Auth::user()->hasPermissionTo('Gestion des prets') || Auth::user()->hasPermissionTo('demande des prêts')  || Auth::user()->hasPermissionTo('Validation des prêts') ){
            
            if(Auth::user()->hasPermissionTo('Gestion des prets') || Auth::user()->hasPermissionTo('Validation des prêts') ){
                $permisssion_gestion_prets = false;
            }

            if(Auth::user()->hasPermissionTo('Validation des prêts')){
                $permisssion_validation_prêts = true;
            }

          
            
            $data = array(
                'permisssion_gestion_prets' => $permisssion_gestion_prets,
                'permisssion_validation_prêts' => $permisssion_validation_prêts,
               
            );
            return view('prets.index',$data);

        }else {
            return "Vous n'avez pas la permission d'entrer dans cette page";
        }

        
        
    }

    public function api_pret()
    {

        $user = Auth::user();
        if ($user->hasPermissionTo('Validation des prêts')) {

            $prets = Pret::where("status", 0  )->get();
              
        } else if($user->hasPermissionTo('demande des prêts')){
            $prets = Pret::where("id_user", $user->id )->get();
        } else if($user->hasPermissionTo('Gestion des prets')){
            $prets = Pret::whereIn("status", [1, 2,3] )->get();
           
        }else {
            $prets = array();
        }



        

        return Response()->json($prets);
    }

    public function store(Request $request)
    {
         $user = Auth::user();

         $user_name = $user->identifiant;

         $new_Pret = new Pret();

         $new_Pret->division = $request->division ;
         $new_Pret->user = $user_name ;
         $new_Pret->telephone = $user->telephone ;
         $new_Pret->email = $user->email ;
         $new_Pret->objet = $request->objet ;
         $new_Pret->status = 0 ;
         $new_Pret->id_user = $user->id;

         $new_Pret->save();

         return  redirect()->route('prets');
    }

    public function delete($id)
    {
        $prets= Pret::find($id);
        $prets->delete();

        return  Response()
        ->json(['etat' => true    ]);
        
    }
    public function validation_prets(){

        return view('prets.validation_prets');
    }


    public function update_status(Request $request){

        $status =   $request->status;
        $id_prets = $request->id_prets;

        $prets = Pret::find($id_prets);
        $prets->status = $status;
        $prets->save();
        return Response()->json(["etat" => true]);

    }

    
}
