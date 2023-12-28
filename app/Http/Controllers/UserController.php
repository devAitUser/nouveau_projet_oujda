<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Organigramme;
use App\Models\Projet;
use App\Models\Projet_modifier;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Hash;
use Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }




    public function create_user(){
        $this->authorize('permission_user');
        $roles=Role::all();
        return view('user.register',compact('roles'));
    }

    public function create(Request $request)
    {

        $this->authorize('permission_user');

        $request->validate([
            'nom'=>'required',
            'telephone'=>'required',
            'password'=>'required',
            'email' => 'required|unique:users,email',  
            'identifiant' => 'required|unique:users,identifiant',  
       
            'prenom' => 'required'
        ]);

        $addNewUser  = new User();

        $addNewUser->nom=$request->nom;
        $addNewUser->prenom=$request->prenom;
        $addNewUser->password=Hash::make($request->password);

        $addNewUser->email=$request->email;
        $addNewUser->identifiant=$request->identifiant;
        $addNewUser->telephone=$request->telephone;
        $addNewUser->assignRole($request->role);
        $addNewUser->save();
        return redirect()->route('user_list');
      /* $request->validate([
        'nom'=>'required',
        'telephone'=>'required',
        'password'=>'required',
        'email'=>'required',
        'identifiant'=>'required',
        'prenom' => 'required'
    ]);
    Hash::make($request->'password');
    $user=User::create($request->all());*/
   // return redirect()->route('user_list');
     //return $request;
    }

    public function test2(Request $request){

        $this->authorize('permission_user');
        $search=$request->search;
        if($search != ""){
            $users=User::where('nom','=',$search)->get();
        }else{
            $users=User::all();
        }

       return view('user.userlist',compact('users','search'));

    }
    public function edit($id)
    {
        $roles=Role::all();
        $user = User::find($id);
        return view('user.edit',compact('roles'));

    }
    public function index()
    {

        $user = Auth::user();

        $organigramme =array();

        for($i=0;$i<count($user->projet);$i++){
            $organigramme[]=Organigramme::find($user->projet[$i]['organigrammes_id']);

           
          }

        $data = array(
            'user' => $user,
            'projets' => $organigramme
        );
        return view('user.index', $data);

    }

    public function update(Request $request)
    {
        $user_current = Auth::user();
        $user = User::find($user_current->id);

        $user->telephone = $request->telephone;
        if($request->mot_de_pass != '' ){
            $user->password =  $user->password = Hash::make($request->mot_de_pass);
        }
        $user->email = $request->email;
        $user->projet_select_id = $request->projet_user;
         $user->save();

         return redirect()->route('home');

    }

    public function showUser($id){

        $this->authorize('permission_user');

        
         $inventaire =  Organigramme::all();

         $organigrammes=Organigramme::all();
         $roles=Role::all();
         $user = User::find($id);
         $permissions=Permission::all();
        $project = $user->projet;
        $projet_modifier = $user->projet_modifier;
        $count_projet = 0;
        $les_projets = array();
        $ajax_option='';
        $les_projets= array();
        $les_projet_modifier= array();
        for($i=0;$i<count($project);$i++){
            $organigramme=Organigramme::find($project[$i]->organigrammes_id );
            $id_organigramme = $project[$i]->organigrammes_id;
            $nom_organigrammes = $organigramme->nom;
            $dossiers = json_decode($project[$i]->dossiers, true);

            
        
            $les_projets[] = array('id' => $id_organigramme ,'nom_organigrammes' => $nom_organigrammes,'dossiers_select' => $dossiers , 'dossiers' => $organigramme->dossier_champ );
            $count_projet++;
          }


          


          

       return view('user.showuser',compact('user','roles','permissions','organigrammes','les_projets' ,'count_projet','inventaire' ));


    }
    public function updateUser(Request $request)
    {

       
        function is_array_empty($arr){
            if(is_array($arr)){
            foreach($arr as $value){
                if(!empty($value)){
                    return true;
                }
            }
            }
            return  false;
        }


        $user = User::where('id', '=', $request->id)->first();
        $user->nom = $request->nom;
    

        if($user->identifiant !=  $request->identifiant ){
            $this->validate($request,[
                'identifiant' => 'required|unique:users,identifiant',  
            ]);
        }

        if($user->email !=  $request->email ){
            $this->validate($request,[
                'email' => 'required|unique:users,email', 
            ]);
        }

    
        $user->identifiant = $request->identifiant;
   
    
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;

        $user->telephone = $request->telephone;


        $user->gerer_archives = $request->has('gerer_archives') ? 1 : 0;
        $user->config_solution = $request->has('config_solution') ? 1 : 0;

        $user->id_inventaire =  json_encode($request->id_iventaire);
        if($request->email != '' ){
            $user->email = $request->email;
        }
        if($request->password != '' ){
            $user->password = Hash::make($request->password);

        }
       
        $user->save();
        $count = 1;

        $delete_projet= Projet::where('user_id', '=', $user->id);  
        $delete_projet->delete();
        $projet_modifier= Projet_modifier::where('user_id', '=', $user->id);  
        $projet_modifier->delete();

        if (is_array_empty($request->organigramme_id)) {
    
            for($i=0;$i<count($request->input('organigramme_id'));$i++){
                $projet = new Projet();
                $projet->organigrammes_id  = $request->organigramme_id[$i];
                $projet->user_id  = $user->id;
                $dossiers =json_encode($request->input('dossiers'.$request->organigramme_id[$i]));
                $projet->dossiers = $dossiers ;
                $projet->save();
                $count++;
            }   
        }

        if (is_array_empty($request->organigramme_id_edit)) {
    
            for($i=0;$i<count($request->input('organigramme_id_edit'));$i++){
                $projet = new Projet_modifier();
                $projet->organigrammes_id  = $request->organigramme_id_edit[$i];
                $projet->user_id  = $user->id;
                $dossiers =json_encode($request->input('dossiers_edit'.$request->organigramme_id_edit[$i]));
                $projet->dossiers = $dossiers ;
                $projet->save();
                $count++;
            }   
        }

        return redirect()->route('user_list')
         ->with('message','User est modifiée avec success');



    }

    public function verify()
    {
       return view('user.login');
    }




    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('err', 'Role exists.');
        }
        else if ($user->hasRole($request->role) == false){
            $user->syncRoles($request->role);
        return back()->with('message', 'Role updated.');
        } else{
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');}
    }

    public function removeRole(User $user, Role $role)
    {
        $permission=Permission::all();
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('err', 'Role not exists.');
    }
    public function givePermission(Request $request, User $user)
    {
        $role=Role::all();
        if ($user->hasRole($role) == false) {
            return back()->with('err', 'Impossible d\'ajouter une permission à un role non assigné');
        }
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('err', 'Permission exists à ce role.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added à ce role.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission annuler à ce role.');
        }
        return back()->with('err', 'Permission n exists pas.');
    }



    public function all_user(){

        $table_user= User::all();  

    
        return  Response()
        ->json($table_user);
        
    }



    public function delete_user_item($id){

        $delete_user= User::find($id);  
        $delete_user->delete();

        $data = User::all();  
   

        return  Response()
        ->json(['etat' => true , 'data' =>  $data    ]);
    
    }
    public function parametre_app(){

        $user_current = Auth::user();
        $user = User::find($user_current->id);
        $data  =  array('user' => $user );

        return view('user.parametre_app',$data );
    }

    public function lien_parametre($id){
        
        $user_current = Auth::user();
        $user = User::find($user_current->id);
        $user->choix_parametre =  $id;
        $user->save();

        return redirect()->route('home');

    }
}
