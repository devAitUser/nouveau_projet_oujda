<?php

namespace App\Http\Controllers;
use App\Models\Salle;
use App\Models\Rayonnage;
use App\Models\Table_topographique;

use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index(){
      
        return view('salle.index');

    }
    public function all_Site(){

        $salle = Salle::all();  

    
        return  Response()
        ->json($salle);
        
    }
    public function store(Request $request){

                $new = new Salle();
                $new->numero_salle = $request->num_salle;
                $new->site = $request->site;
                $new->ville = $request->ville;
                $new->save();

                return redirect(route("salle"));
    }
    public function delete(Request $request){

        $delete= Salle::find($request->items_delete);  
        $delete->delete();

        $data = Salle::all();  
   

        return  Response()
        ->json(['etat' => true , 'data' =>  $data    ]);
    
    }
    public function fill_rayonnage(Request $request){

        $rayonnage = Rayonnage::where("id_salle",  $request->id_salle )->get();
    
        return  Response()
        ->json($rayonnage);

    }

    public function fill_code_topo(Request $request){

        $code_topo = Table_topographique::where("id_rayonnages",  $request->id_rayonnage )->get();

        
    
        return  Response()
        ->json($code_topo);

    }
}
