<?php

namespace App\Http\Controllers;
use App\Models\Dossier_champ;
use App\Models\Attribut_champ;
use App\Models\Organigramme;
use App\Models\Dossier;
use App\Models\User;
use App\Models\Attributs_dossier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Routing\UrlGenerator;
use Smalot\PdfParser\Parser;
use App\Models\File_searche;
use Illuminate\Support\Str;

use App\Models\Request_delete_dossier;

use App\Models\Entite;

use App\Models\Indexe;
use Session;

use Illuminate\Http\Request;

use App\Models\Historique_dossier;
use App\Models\File_champ;

use App\Models\Dossier_has_inventaire;

use App\Models\Field_table_inventaire;


use App\Models\Inventaire_table;


use App\Models\Value_field;





class DossierController extends Controller
{
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->middleware("auth");
        $this->url = $url;
    }


    public function choose_project(Request $request)
    {
        $user_current = Auth::user();
        $user = User::find($user_current->id);
        $user->projet_select_id = $request->projet_user;
         $user->save();

         switch ($request->id_view) {
            case 1:
                return redirect()->route('create_dossier');
            break;
            case 2:
                return redirect()->route('recherche_dossier');
            break;
            default:
            return redirect()->route('home');
            break;
            
            
         }

         

        
    }

    public function select_project($id)
    {
        $user = Auth::user();

        $organigramme =array();

        for($i=0;$i<count($user->projet);$i++){

            $organigramme[]=Organigramme::find($user->projet[$i]['organigrammes_id']);

           
          }

        $data = array(
            'user' => $user,
            'projets' => $organigramme,
            'id_view' => $id
        );

    

        return view("select_project", $data);
    }

    public function create_dossier()
    {
        $this->authorize("permission_creer_dossier");

        $user = Auth::user();
        $nom_projet='';
        $id = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;

            $organigramme = Organigramme::find($projet_select_id);
            $dossiers = $organigramme->dossiers;
            $nom_projet = $organigramme->nom;
            $id = $organigramme->id;
        }

        $data = ["id_organigramme" => $id , "nom_projet" => $nom_projet  ];

        return view("dossier.create", $data);
    }

    public function create_dossier1()
    {
        $this->authorize("permission_creer_dossier");

        $user = Auth::user();
        $nom_projet='';
        $id = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;

            $organigramme = Organigramme::find($projet_select_id);
            $dossiers = $organigramme->dossiers;
            $nom_projet = $organigramme->nom;
            $id = $organigramme->id;
        }

        $data = ["id_organigramme" => $id , "nom_projet" => $nom_projet  ];

        return view("dossier.create1", $data);
    }

    public function create_dossier2()
    {
        $this->authorize("permission_creer_dossier");

        $user = Auth::user();
        $nom_projet='';
        $id = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;

            $organigramme = Organigramme::find($projet_select_id);
            $dossiers = $organigramme->dossiers;
            $nom_projet = $organigramme->nom;
            $id = $organigramme->id;
        }

        $data = ["id_organigramme" => $id , "nom_projet" => $nom_projet  ];

        return view("dossier.create2", $data);
    }

    public function fill_parent_dossier(Request $request)
    {
        $user = Auth::user();
        $id = "";
        $dossier_champs = [];
        $les_dossiers = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;
            $dossiers_voir = $user->projet;

            $organigramme = Organigramme::find($projet_select_id);
            $id = $organigramme->id;

            for ($j = 0; $j < count($dossiers_voir); $j++) {
                if ($dossiers_voir[$j]["organigrammes_id"] == $id) {
                    $les_dossiers = $dossiers_voir[$j]["dossiers"];
                }
            }

            if ($les_dossiers != "") {
                $id_dossier = json_decode($les_dossiers, true);

                $all_dossier_champs = Dossier_champ::all();

                for ($i = 0; $i < count($all_dossier_champs); $i++) {
                    if (
                        $all_dossier_champs[$i]->entite_id ==
                            $request->id_entite &&
                        $all_dossier_champs[$i]->parent_id == 0
                    ) {
                        if (
                            in_array($all_dossier_champs[$i]->id, $id_dossier)
                        ) {
                            $dossier_champs[] = $all_dossier_champs[$i];
                        }
                    }
                }
            } else {
                $dossier_champs = Dossier_champ::where([
                    "organigramme_id" => $id,
                    "parent_id" => 0,
                    "entite_id" => $request->id_entite,
                ])->get();
            }
        }

        return Response()->json($dossier_champs);
    }

    public function fill_parent_dossier_consulter(Request $request)
    {
        $user = Auth::user();
        $id = "";
        $dossier_champs = [];
        $les_dossiers = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;
            $dossiers_voir = $user->projet_modifier;

            $organigramme = Organigramme::find($projet_select_id);
            $id = $organigramme->id;

            for ($j = 0; $j < count($dossiers_voir); $j++) {
                if ($dossiers_voir[$j]["organigrammes_id"] == $id) {
                    $les_dossiers = $dossiers_voir[$j]["dossiers"];
                }
            }

            if ($les_dossiers != "") {
                $id_dossier = json_decode($les_dossiers, true);

                $all_dossier_champs = Dossier_champ::all();

                for ($i = 0; $i < count($all_dossier_champs); $i++) {
                    if (
                        $all_dossier_champs[$i]->entite_id ==
                            $request->id_entite &&
                        $all_dossier_champs[$i]->parent_id == 0
                    ) {
                        if (
                            in_array($all_dossier_champs[$i]->id, $id_dossier)
                        ) {
                            $dossier_champs[] = $all_dossier_champs[$i];
                        }
                    }
                }
            } else {
                $dossier_champs = Dossier_champ::where([
                    "organigramme_id" => $id,
                    "parent_id" => 0,
                    "entite_id" => $request->id_entite,
                ])->get();
            }
        }

        return Response()->json($dossier_champs);
    }

    public function fill_entite()
    {
        $user = Auth::user();
        $id = "";
        $entites = [];

        $entite_user = [];

        $entites = "";
        $attr_d = [];

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;
            $dossiers_voir = $user->projet;

            $organigramme = Organigramme::find($projet_select_id);
            $id = $organigramme->id;

            $entites = Entite::where("organigramme_id", $id)->get();



            for ($j = 0; $j < count($dossiers_voir); $j++) {
                if ($dossiers_voir[$j]["organigrammes_id"] == $id) {
                    $les_dossiers = $dossiers_voir[$j]["dossiers"];
                }
            }

            if ($les_dossiers != "") {
                $id_dossier = json_decode($les_dossiers, true);

            }

            for ($i = 0; $i < count($entites); $i++) {

                $id_entite = $entites[$i]->id ;  
                $attributs_dossiers = Dossier_champ::query() ->where([ "parent_id" => 0 ,"entite_id" => $id_entite])->get();

                

                  


                     for ($j = 0; $j  < count($attributs_dossiers); $j++) {

                       
                        if (in_array($attributs_dossiers[$j]->id, $id_dossier)) {
                            if(!in_array($id_entite, $attr_d)){

                            
     
                             $entite_user[] = $entites[$i];
                             $attr_d[] = $id_entite;
                            }
                          }
    
                      }

                 

                

            }

            
           
               
                
            
            


        }

        return Response()->json($entite_user);
    }

    public function fill_sous_dossier(Request $request)
    {
        $dossier_champs = Dossier_champ::where([
            "parent_id" => $request->id_dossier,
        ])->get();

        $dossier_champs_label = Dossier_champ::find($request->id_dossier);

        return Response()->json([
            "dossier_champs" => $dossier_champs,
            "dossier_champs_label" => $dossier_champs_label->nom_champs,
        ]);
    }

    public function fill_sous_dossier1(Request $request)
    {
        $dossier_champs = Dossier_champ::where([
            "parent_id" => $request->id_dossier,
        ])->get();

        $attribut_champ = Attribut_champ::where([
            "dossier_champs_id" => $request->id_dossier,
        ])->get();

        $dossier_champs_label = Dossier_champ::find($request->id_dossier);

        $all_index = Indexe::where([
            "dossier_id" => $request->id_dossier,
        ])->get();

        return Response()->json([
            "all_index" => $all_index,
            "dossier_champs" => $dossier_champs,
            "attribut_champ" => $attribut_champ,
            "dossier_champs_label" => $dossier_champs_label->nom_champs,
        ]);
    }

    public function store_dossier(Request $request)
    {
        $user = Auth::user();

        

        $dossier = new Dossier();
        $dossier->organigramme_id = $request->id_organigramme;
        $dossier->user_id = $user->id;
        $dossier->save();


        $attributs_dossier = new Attributs_dossier();
        $entite = Entite::find($request->entite);
        $attributs_dossier->nom_champs = $request->nom_entite;
        $attributs_dossier->valeur = $entite->nom;
        $attributs_dossier->type_champs = "select";
        $attributs_dossier->dossier_id = $dossier->id;
        $attributs_dossier->champs_id = $request->entite;
        $attributs_dossier->save();



        for ($i = 0; $i < count($request->input("value_select")); $i++) {
            $attributs_dossier = new Attributs_dossier();
            $dossier_ = Dossier_champ::find($request->value_select[$i]);
            $attributs_dossier->nom_champs = $request->nom_champs_select[$i];
            $attributs_dossier->valeur = $dossier_->nom_champs;
            $attributs_dossier->type_champs = "select";
            $attributs_dossier->dossier_id = $dossier->id;
            $attributs_dossier->champs_id = $request->value_select[$i];
            $attributs_dossier->save();
        }

        if ($request->input("nom_champ") != null) {
            for ($i = 0; $i < count($request->input("nom_champ")); $i++) {
                if ($request->valeur[$i] != null) {
                    $attributs_dossier = new Attributs_dossier();
                    $attributs_dossier->nom_champs = $request->input("nom_champ")[$i];
                    $attributs_dossier->valeur = $request->valeur[$i];
                    $attributs_dossier->type_champs = $request->type_champ[$i];
                    $attributs_dossier->dossier_id = $dossier->id;
                    $attributs_dossier->champs_id = $request->id_champs[$i];
                    $attributs_dossier->save();
                }
            }
        }

        if ($request->input("nom_champ_file") != null) {
            for ($i = 0; $i < count($request->nom_champ_file); $i++) {
                if ($request->nom_champ_file[$i] != null) {
                    $attributs_dossier1 = new Attributs_dossier();
                    $attributs_dossier1->nom_champs =
                        $request->nom_champ_file[$i];
                    $attributs_dossier1->valeur = 'Fichier';
                    $attributs_dossier1->type_champs = "Fichier" ;
                    $attributs_dossier1->dossier_id = $dossier->id;
                    $attributs_dossier1->save();

                    if ($request->text_objet[$i] != "" ) {
                        
                        $file_champ = new File_champ();
                        $file_champ->champs_id =$attributs_dossier1->id;
                        $file_champ->name_file =  $request->file("file")[$i]->store("files");
                        $file_champ->file = $request->text_objet[$i];
                        $file_champ->date = $request->date_file[$i];
                        $file_champ->save();
                    }
                }
            }
        }
            
            if( isset( $request->id_line ) && !empty($request->id_line) ) {

                $new_t = new Dossier_has_inventaire();
                $new_t->line_id  =  $request->id_line;
                $new_t->dossier_id   =   $dossier->id;
                $new_t->save();


            }
    
        Session::flash('show_dossier','content');

        return redirect("/show_dossier/" . $dossier->id);
    }

    public function show_dossier($id)
    {
        $check_demande_supperssion = true;

        if (
            Request_delete_dossier::where("dossier_id", "=", $id)->count() > 0
        ) {
            $check_demande_supperssion = false;
        }

        $dossier = Dossier::find($id);
        $titre = "";

        $user = Auth::user();
        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = "Consultation du dossier";
        $add_historique->dossier_id = $id;
        $add_historique->save();

        $attributs = $dossier->attibuts_dossier;
        $user_create_dossier = $dossier->user->identifiant;
        $date_create_dossier = $dossier->created_at;
        $createdAt = Carbon::parse($date_create_dossier);

        $date_create_dossier = $createdAt->format("d/m/Y H:i:s");

        $historique = Historique_dossier::where(["dossier_id" => $id])->get();

        $all_historiques = [];

        $attributs_dossier = [];

        for ($i = 0; $i < count($attributs ); $i++) {

            if($attributs[$i]->type_champs == "Fichier"){
                $file_champ = File_champ::where(["champs_id" => $attributs[$i]->id])->get();
                $attributs_dossier[]= array("id" => $attributs[$i]->id ,"nom_champs" => $attributs[$i]->nom_champs,"child_files" =>  $file_champ);
            }

            
        }    

        for ($i = 0; $i < count($historique); $i++) {
            $createdAt = Carbon::parse($historique[$i]->created_at);

            $date = $createdAt->format("d/m/Y H:i:s");

            $all_historiques[] = [
                "id" => $historique[$i]->id,
                "user" => $historique[$i]->user,
                "action" => $historique[$i]->action,
                "date" => $date,
            ];
        }

        $data = [
            "attributs" => $attributs,
            "id" => $id,
            "all_historiques" => $all_historiques,
            "attributs_dossier" => $attributs_dossier,
            "date_create_dossier" => $date_create_dossier,
            "user_create_dossier" => $user_create_dossier,
            "check_demande_supperssion" => $check_demande_supperssion,
        ];

        $check_session_dossier = Session::get('show_dossier'); 

       
        if(empty(Session::get('var_session'))){
            session(['var_session' => [] ]);
        }

      


     
        

        

        if(in_array($id,  Session::get('var_session') )){

            return view("dossier.show", $data);

        } elseif($check_session_dossier != ''){
            
            Session::push('var_session', $id);
          
            return view("dossier.show", $data);
        } else {
            return $check_session_dossier."<h3>vous n'avez pas l'autorisation d'accéder a ce dossier</h3>";
        }

        
    }

    public function historique_dossier(Request $request)
    {
        $user = Auth::user();
        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = $request->text;
        $add_historique->dossier_id = $request->id_dossier;
        $add_historique->save();
    }

    public function all_dossier()
    {
        Session::flash('session_dossier','acceder aux dossiers');
        return view("dossier.all_dossier");
    }

    public function recherche_dossier()
    {
        $user = Auth::user();
        $id = "";

        $all_dossiers = [];
        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;

            $organigramme = Organigramme::find($projet_select_id);
            $id = $organigramme->id;
        }

        $user = Auth::user();

        $projet_select_id = $user->projet_select_id;

        $organigramme = Organigramme::find($projet_select_id);

        $name_project = $organigramme->nom;

        $dossiers = $organigramme->dossiers;

        $titre = "";

        $all_dossier = [];

   

        $data = ["id_organigramme" => $id, "all_dossiers" => $all_dossiers, "name_project" => $name_project];

        Session::flash('session_dossier','acceder aux dossiers');

        return view("dossier.recherche", $data);
    }

    public function api_search_ocr(Request $request)
    {
        $posts = File_searche::where(
            "projet_id",
            "=",
            $request->id_organigramme
        )
            ->where("content", "like", "%" . $request->input_text . "%")
            ->get();

        function arr_filter($arr, $word_key)
        {
            $arr_explode = [];
            $data = [];
            $text = "";

            if ($arr) {
                foreach ($arr as $value) {
                    $content = preg_split("/\.|\?|!/", $value->content);
                    $arr_explode = array_filter($content, function (
                        $element
                    ) use ($word_key) {
                        return Str::contains($element, $word_key, true);
                    });

                    foreach ($content as $key) {
                        $word_uc = ucfirst($word_key);
                        $word_lc = lcfirst($word_key);

                        if (
                            strpos($key, $word_lc) !== false ||
                            strpos($key, $word_uc) !== false ||
                            strpos($key, $word_key) !== false
                        ) {
                            $array_b[] = $key;
                        }
                    }
                    $content_array = $content;
                    foreach ($array_b as $content) {
                        $w1 = $word_key;
                        $w2 = "<strong>" . $word_key . "</strong>";
                        $str = str_replace($w1, $w2, $content);

                        $text .= $str . "<br>";
                    }

                    $print_content =
                        '<div class="text-left">' . $text . "</div>";

                    $createdAt = Carbon::parse($value->created_at);

                    $date = $createdAt->format("d/m/Y H:i:s");

                    $data[] = [
                        "date" => $date,
                        "filename" => $value->filename,
                        "content" => $print_content,
                        "id_dossier" => $value->dossier_id,
                    ];
                }
            }
            return $data;
        }

        $data_search = arr_filter($posts, $request->input_text);

        return Response()->json($data_search);
    }

    public function recherche_ocr()
    {
        $user = Auth::user();
        $id = "";

        if ($user->projet_select_id != null) {
            $projet_select_id = $user->projet_select_id;

            $organigramme = Organigramme::find($projet_select_id);
            $id = $organigramme->id;
        }

        $data = ["id_organigramme" => $id];

        return view("dossier.recherche_ocr", $data);
    }

    public function api_all_dossier()
    {
        $user = Auth::user();

        $projet_select_id = $user->projet_select_id;

        $organigramme = Organigramme::find($projet_select_id);

        $dossiers = $organigramme->dossiers;

        $titre = "";

        $all_dossier = [];

        for ($i = 0; $i < count($dossiers); $i++) {

            if($dossiers[$i]->user_id == $user->id ){

                $count_check_item_next = 0;
                $check = 1;
                $all_dossier = Attributs_dossier::where([
                    "dossier_id" => $dossiers[$i]->id,
                ])->orderBy('created_at', 'ASC')->get();
    
                $createdAt = Carbon::parse($dossiers[$i]->created_at);
    
                $date = $createdAt->format("d/m/Y H:i:s");

                
    
                $user = User::find($dossiers[$i]->user_id);
                
                for ($j = 0 ; $j < count($all_dossier) ; $j++) {
                   
                    if ($all_dossier[$j]->nom_champs == "Objet"  || $all_dossier[$j]->type_champs == "select" ) {
                        if ($check == $count_check_item_next) {
                            $titre .= " / ";
                            $check++;
                        }
                        $titre .= $all_dossier[$j]->valeur;
                        $count_check_item_next++;
                    }
                }
                $all_dossiers[] = [
                    "id" => $dossiers[$i]->id,
                    "date" => $date,
                    "titre" => $titre,
                    "user" => $user->identifiant,
                ];
                $titre = "";

            }
           

        
        }

        return Response()->json($all_dossiers);
    }

    public function update_dossier($id, Request $request)
    {
        $this->authorize("permission_Modifier_dossiers");

        $user = Auth::user();
        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = "Modifier le dossier";
        $add_historique->dossier_id = $id;
        $add_historique->save();

        for ($i = 0; $i < count($request->id); $i++) {
            $upd = Attributs_dossier::find($request->id[$i]);
            $upd->valeur = $request->valeur[$i];
            $upd->save();
        }

        return redirect(route("show_dossier", $id));
    }

    public function delete_dossier($id)
    {
        $this->authorize("permission_Modifier_dossiers");

        $delete = Dossier::find($id);
        $delete->delete();

        return redirect("/all_dossier");
    }

    public function search_dossier(Request $request)
    {
        $user = Auth::user();

        $projet_select_id = $user->projet_select_id;

        $count_dossier = 0;

        $nom_champ = "";
        $word = "";

        $check_input = false;

        $all_dossiers = [];

        if (isset($request->nom_champ)) {
            for ($o = 0; $o < count($request->nom_champ); $o++) {
                if ($request->valeur[$o] != null) {
                    $word = $request->valeur[$o];
                    $nom_champ = $request->nom_champ[$o];
                }
            }
        }

        if ($request->titre == "") {
            $check_input = true;
        }

        if ($word == "") {
            $word = $request->titre;
        }

        $array_search = [];

        function like($str, $searchTerm)
        {
            $searchTerm = strtolower($searchTerm);
            if ($searchTerm != "") {
                $str = strtolower($str);
                $pos = strpos($str, $searchTerm);
                if ($pos === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        $dossiers = Dossier::query()
            ->where(["organigramme_id" => $projet_select_id])
            ->get();
        $titre = "";

        for ($i = 0; $i < count($dossiers); $i++) {
            if ($nom_champ != "") {
                $attributs_dossiers = Attributs_dossier::query()
                    ->where([
                        "dossier_id" => $dossiers[$i]->id,
                        "nom_champs" => $nom_champ,
                    ])
                    ->get();
            } else {
                $attributs_dossiers = Attributs_dossier::query()
                    ->where(["dossier_id" => $dossiers[$i]->id])
                    ->get();
            }

            for ($j = 0; $j < count($attributs_dossiers); $j++) {
                $found = like($attributs_dossiers[$j]->valeur, $word);
                if ($found) {
                    $array_search[] = $attributs_dossiers[$j];

                    $dossiers_s = dossier::find(
                        $attributs_dossiers[$j]->dossier_id
                    );

                    $count_check_item_next = 0;
                    $check = 1;

                    $all_dossier = Attributs_dossier::where([
                        "dossier_id" => $dossiers_s->id,
                    ])->get();

                    $createdAt = Carbon::parse($dossiers_s->created_at);

                    $date = $createdAt->format("d/m/Y H:i:s");

                    $user = User::find($dossiers_s->user_id);
                    for ($e = 0; $e < count($all_dossier); $e++) {
                        if ($all_dossier[$e]->type_champs == "text") {
                            if ($check == $count_check_item_next) {
                                $titre .= " / ";
                                $check++;
                            }
                            $titre .= $all_dossier[$e]->valeur;
                            $count_check_item_next++;
                        }
                    }
                    $count_dossier++;

                    $all_dossiers[] = [
                        "id" => $dossiers[$i]->id,
                        "date" => $date,
                        "titre" => $titre,
                        "user" => $user->identifiant,
                    ];
                    $titre = "";
                } else {
                }
            }
        }

        $data = [
            "all_dossiers" => $all_dossiers,
            "count" => $count_dossier,
            "check_input" => $check_input,
        ];

        return view("dossier.search_dossier", $data);
    }

    public function api_search_table(Request $request)
    {
        $user = Auth::user();

        $projet_select_id = $user->projet_select_id;

        $count_dossier = 0;

        $id_champs = "";
        $word = "";
        $select_value='';

        $check_input = false;

        $all_dossiers = [];

        

        if (isset($request->nom_champ)) {
            for ($o = 0; $o < count($request->nom_champ); $o++) {
                if ($word == "") {
                    $word = $request->valeur[$o];
                    $id_champs = $request->id_champs[$o];
                }
            }
        }

        if (isset($request->value_select)) {
            for ($o = 0; $o < count($request->value_select); $o++) {

                if($request->value_select[$o] != null){

                    $select_value  = $request->value_select[$o];

                }
             
                    
                
            }
        }

        $array_search = [];

        function like($str, $searchTerm)
        {
            $searchTerm = strtolower($searchTerm);
            if ($searchTerm != "") {
                $str = strtolower($str);
                $pos = strpos($str, $searchTerm);
                if ($pos === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        $dossiers = Dossier::query()
            ->where(["organigramme_id" => $projet_select_id])
            ->get();
        $titre = "";

        for ($i = 0; $i < count($dossiers); $i++) {


            if ($word != "" ) {
                $attributs_dossiers = Attributs_dossier::query()
                ->where([
                    "dossier_id" => $dossiers[$i]->id,
                
                    "champs_id" => $id_champs,

                ])
                ->get();
            } else {

                $attributs_dossiers = Attributs_dossier::query()
                ->where([
                    "dossier_id" => $dossiers[$i]->id,
                    "champs_id" => $select_value,
                ])
                ->get();
                
            }
         

                for ($j = 0; $j < count($attributs_dossiers); $j++) {

                    if ($word != "" ) {
                            $found = like($attributs_dossiers[$j]->valeur, $word);
                            if ($found) {


                                $array_search[] = $attributs_dossiers[$j];

                                $dossiers_s = dossier::find(
                                    $attributs_dossiers[$j]->dossier_id
                                );

                                $count_check_item_next = 0;
                                $check = 1;

                                $all_dossier = Attributs_dossier::where([
                                    "dossier_id" => $dossiers_s->id,
                                ])->get();

                                $createdAt = Carbon::parse($dossiers_s->created_at);

                                $date = $createdAt->format("d/m/Y H:i:s");

                                

                                $user = User::find($dossiers_s->user_id);
                                for ($e = 0; $e < count($all_dossier); $e++) {
                                    if ($all_dossier[$e]->type_champs == "text") {
                                        if ($check == $count_check_item_next) {
                                            $titre .= " / ";
                                            $check++;
                                        }
                                        $titre .= $all_dossier[$e]->valeur;
                                        $count_check_item_next++;
                                    }
                                }
                                $count_dossier++;

                                $all_dossiers[] = [
                                    "id" => $dossiers[$i]->id,
                                    "date" => $date,
                                    "titre" => $titre,
                                    "user" => $user->identifiant,
                                ];
                                $titre = "";

                            } 

                    } else {

                        $array_search[] = $attributs_dossiers[$j];

                        $dossiers_s = dossier::find(
                            $attributs_dossiers[$j]->dossier_id
                        );

                        $count_check_item_next = 0;
                        $check = 1;

                        $count_check_fichier_item_next = 0;
                        $check_fichier = 1;

                        $count_check_f_item_next = 0;
                        $check_f = 1;

                        $titre_fichier = "";

                        $all_dossier = Attributs_dossier::where([
                            "dossier_id" => $dossiers_s->id,
                        ])->orderBy('id', 'DESC')->get();

                        $createdAt = Carbon::parse($dossiers_s->created_at);

                        $date = $createdAt->format("d/m/Y H:i:s");

                        $user = User::find($dossiers_s->user_id);
                        for ($e = 0; $e < count($all_dossier); $e++) {
                            if ($all_dossier[$e]->nom_champs == "Objet"  || $all_dossier[$e]->type_champs == "select" ) {
                                if ($check == $count_check_item_next) {
                                    $titre .= " /  ";
                                    $check++;
                                }
                                $titre .= $all_dossier[$e]->valeur;
                                $count_check_item_next++;
                            }
                            if ($all_dossier[$e]->type_champs == "Fichier" ) {

                                


                                if ($check_fichier == $count_check_fichier_item_next) {
                                 
                                    $check_fichier++;
                                }
                             
                                $File_champ = File_champ::where([
                                    "champs_id" => $all_dossier[$e]->id,
                                ])->get();

                                if(!$File_champ->isEmpty()){

                                    for ($j = 0; $j < count($File_champ); $j++) {


                                        if ($check_f == $count_check_f_item_next) {
                                            $titre_fichier .= " <br> ";
                                            $check_f++;
                                        }


                                        $titre_fichier .= '<span class="badge badge-secondary">'.$File_champ[$j]->file.' / '.$File_champ[$j]->date.'</span>';
                                        $count_check_f_item_next++;

                                    }

                                }

                                $count_check_fichier_item_next++;
                            }
                        }
                        $count_dossier++;

                        $all_dossiers[] = [
                            "id" => $dossiers[$i]->id,
                            "date" => $date,
                            "titre" => $titre,
                            "titre_fichier" => $titre_fichier,
                            "user" => $user->identifiant,
                            
                        ];
                        $titre = "";

                    }
                        
                    
                    
                        
                    
                }

               
        }

        $data = [
            "all_dossiers" => $all_dossiers,
            "count" => $count_dossier,
            "check_input" => $check_input,
            "count_dossier" => $count_dossier,
        ];

        return Response()->json($data);
    }

    public function creer_entite(Request $request)
    {
        $new = new Entite();

        $new->nom = $request->nom;
        $new->organigramme_id = $request->id_organigramme;

        $new->save();

        $data = ["status" => true, "entite" => $new];

        return Response()->json($data);
    }

    public function uploud_pdf_temp(Request $request)
    {
        $data = $request->file("data")->store("file_pdf_temp");

        return Response()->json($data);
    }

    public function remove_temp_file(Request $request)
    {
        $file = $request->link_file;

        unlink(storage_path("app/public/file_pdf_temp/" . $file));
    }

    public function request_delete_dossier(Request $request)
    {
        return view("dossier.request_delete");
    }

    public function api_request_delete_dossier(Request $request)
    {
        $Request_delete_dossier = Request_delete_dossier::all();

        $all = [];

        for ($i = 0; $i < count($Request_delete_dossier); $i++) {
            $createdAt = Carbon::parse($Request_delete_dossier[$i]->created_at);

            $date = $createdAt->format("d/m/Y H:i:s");

            $all[] = [
                "id" => $Request_delete_dossier[$i]->id,
                "name_user" => $Request_delete_dossier[$i]->name_user,
                "dossier_id" => $Request_delete_dossier[$i]->dossier_id,
                "motif" => $Request_delete_dossier[$i]->motif,
                "date" => $date,
            ];
        }

        return $all;
    }


    public function api_historique_dossier(Request $request)
    {
        $historique_dossier = Historique_dossier::all();

        $all = [];

        for ($i = 0; $i < count($historique_dossier); $i++) {
            $createdAt = Carbon::parse($historique_dossier[$i]->created_at);

            $date = $createdAt->format("d/m/Y H:i:s");

            $all[] = [
                "id" => $historique_dossier[$i]->id,
                "user" => $historique_dossier[$i]->user,
                "action" => $historique_dossier[$i]->action,
                "dossier_id" => $historique_dossier[$i]->dossier_id,
                "date" => $date ,
             
            ];
        }

        return $all;
    }

    public function request_decision_user(Request $request)
    {
        if ($request->decision == "accepter") {
            $dossier = Dossier::find($request->dossier_id);
            $dossier->delete();
            $Request_delete_dossier = Request_delete_dossier::find(
                $request->id_request
            );
            $Request_delete_dossier->delete();
        }

        if ($request->decision == "rejeter") {
            $Request_delete_dossier = Request_delete_dossier::find(
                $request->id_request
            );
            $Request_delete_dossier->delete();
        }

        return Response()->json(["etat" => true]);
    }

    public function demande_suppression(Request $request)
    {
        $user = Auth::user();

        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = "Demande de suppression du dossier";
        $add_historique->dossier_id = $request->id_dossier;
        $add_historique->save();

        $Request_delete_dossier = new Request_delete_dossier();

        $Request_delete_dossier->name_user = $user->identifiant;
        $Request_delete_dossier->motif = $request->motif;
        $Request_delete_dossier->dossier_id = $request->id_dossier;

        $Request_delete_dossier->save();


        


        return redirect("/show_dossier/" . $request->id_dossier);
    }

    public function save_file(Request $request)
    {
        $user = Auth::user();


       

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = $file->getClientOriginalName();
             

                $file_champ = new File_champ();
                $file_champ->champs_id = $request->id_champs_f;
                $file_champ->name_file = $file->store("files");
                $file_champ->file = $name;
                $file_champ->date = $request->date;
                $file_champ->save();
            }
        }


        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = "ajouter une pièce";
        $add_historique->dossier_id = $request->id_dossier  ;
        $add_historique->save();

        Session::flash('file_add','content');

        return redirect("/show_dossier/" . $request->id_dossier);
    }
    public function delete_file(Request $request)
    {
    
        $user = Auth::user();

        $file_champ =  File_champ::find($request->id_file);

        unlink(storage_path('app/public/'.$file_champ->name_file));


        $file_champ->delete();

        $add_historique = new Historique_dossier();
        $add_historique->user = $user->identifiant;
        $add_historique->action = "suppression de la pièce";
        $add_historique->dossier_id = $request->id_dossier    ;
        $add_historique->save();
        
       // return redirect("/show_dossier/" . $request->id_dossier);
       return Response()->json(["etat" => true]);
    }
    public function api_check_dossier_physique(Request $request ){

            $id_dossier = $request->id_dossier;

            $user = Auth::user();
            $lignes_trouvés  =[];


            $etat_ligne_touvre = false ; 

            $resulta= false ; 
            $nom_inventaire = '';
            $dossier = Dossier_has_inventaire::where("dossier_id", $id_dossier )->get();


            if (count($dossier) === 0) {
          
            } else {
                $resulta = true;

                $line = Field_table_inventaire::find($dossier[0]->line_id);

                $inventaire = Inventaire_table::find($line->inventaire_id);
                $nom_inventaire = $inventaire->nom ;
            }
            if( $resulta == false){

                if( $request->numero_dossier != '' ){

                   

                }
            

            }



            if (isset($request->numero_dossier)) 
            {
                 
                $user = Auth::user();

               
                $projet = Organigramme::find($user->projet_select_id);
        
                $les_inventaires =     Inventaire_table::where("id_organigrammes", $projet->id)->get();
        
                for($i=0;$i<count($les_inventaires);$i++){
            
                    
                    $les_lignes = Field_table_inventaire::where("inventaire_id", $les_inventaires[$i]->id)->get();
            
                    for($e=0;$e<count($les_lignes);$e++){
            
            
                        $attributs_lignes = Value_field::where([
                            "n_boite" => 1,
                            "value" => $request->numero_dossier  ,
                            "id_field_inventaire" => $les_lignes[$e]->id,
                        ])->first();
            
                        $titre_champs='';
                        if ( !is_null($attributs_lignes) ) { 
                            $les_champs = Value_field::where("id_field_inventaire", $les_lignes[$e]->id   )->get(); 
                            for($r=0;$r<count($les_champs);$r++){
                                $titre_champs .= $les_champs[$r]->value ; 
                                if( $r != count($les_champs)-1 ){
                                    $titre_champs .=  ' - '; 
                                }
                            }
                            $etat_ligne_touvre = true;
                            
                            $lignes_trouvés[] =  array( 'nom_inventaire' => $les_inventaires[$i]->nom  , 'id_line' => $attributs_lignes->id , 'les_champs' =>  $titre_champs );
                        }
            
                    }
            
        
            
                }
            }
            

            
                       

       

           return Response()->json([ "etat" => $resulta , "nom_inventaire" => $nom_inventaire , "lignes_trouvés" => $lignes_trouvés ,  "etat_ligne_touvre" => $etat_ligne_touvre  , $request->numero_dossier    ]);

    }
    public function pro(){
    



        dd($lignes_trouvés)  ;
    }

}
