<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rayonnage;
use App\Models\Table_topographique;

class RayonnageController extends Controller
{
    /*  clone contoller salle*/
    public function index($id){

        $data = array('id' => $id);
      
        return view('rayonnage.index',$data);

    }
    public function all_rayonnage($id){

    
        $rayonnage = Rayonnage::where("id_salle", $id)->get();
    
        return  Response()
        ->json($rayonnage);
        
    }
    public function store(Request $request){

                $new = new Rayonnage();
                $new->n_r = $request->num_rayonnage;
                $new->n_traves = $request->nbr_travers;
                $new->n_niveau = $request->nbr_niveau;
                $new->n_conteneur = $request->nbr_conteneur;
                $new->n_boite = $request->nbr_boite;
                $new->id_salle  = $request->id_salle ;
                $new->save();

                return redirect(route("rayonnage",$request->id_salle));
    }
    public function delete(Request $request){

        $delete= Rayonnage::find($request->items_delete);  
        $delete->delete();

        $data = Rayonnage::all();  
   

        return  Response()
        ->json(['etat' => true , 'data' =>  $data    ]);
    
    }
    public function calcul_topo(Request $request){

        $cal_r = Rayonnage::find($request->id_rayonnage);

        $array_cote = array();

      
        $check_existe = Table_topographique::where("id_rayonnages", $request->id_rayonnage)->first();

        if( $check_existe === null ){


            for ($a=1; $a<=$cal_r->n_traves ; $a++) {

                for ($b=1;$b<=$cal_r->n_niveau; $b++) {
    
                    for ($c=1;$c<=$cal_r->n_conteneur; $c++) {
    
                        for ($d=1;$d<=$cal_r->n_boite; $d++) {
                                echo $cal_r->n_r." " . $a . "." . $b . "." . $c . "." . $d . "<br>";
                                $new = new Table_topographique();
    
                                $new->id_rayonnages      =  $request->id_rayonnage;
                                $new->cote_topographique =  $cal_r->n_r." " . $a . "." . $b . "." . $c . "." . $d ;
                                $new->status =  0;
                                $array_cote['cote_topographique'] =  $cal_r->n_r." " . $a . "." . $b . "." . $c . "." . $d ;
                                $new->save() ;
                        }
                    }
    
                }
            }
            

        }

        

        $les_cote_topographiques = Table_topographique::where("id_rayonnages", $request->id_rayonnage)->get();


        return  Response()
        ->json($les_cote_topographiques);

     

    


    }
}
