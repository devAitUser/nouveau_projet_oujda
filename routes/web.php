<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(Auth::check())
    {
        return redirect()->route('home');

    } else {

        return redirect()->route('login');

    }

});

Route::get('/url_dossier/{id}', function ($id) {

     Session::flash('show_dossier','content');
    return redirect("/show_dossier/" . $id);

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');


Route::get('/user_profile', [App\Http\Controllers\UserController::class, 'index'])->name('user_profile');

Route::post('/user_profile_update', [App\Http\Controllers\UserController::class, 'update'])->name('user_profile_update');


Route::get('/all_user', [App\Http\Controllers\UserController::class, 'all_user'])->name('all_user');

//Route::get('/organigramme1', [App\Http\Controllers\OrganigrammeController::class, 'index'])->name('organigramme');

Route::post('/remove_entite', [App\Http\Controllers\OrganigrammeController::class, 'remove_entite']);

Route::post('/array_organigramme', [App\Http\Controllers\OrganigrammeController::class, 'array_organigramme'])->name('test_ajax');
Route::post('/add_dosier_array_organigramme', [App\Http\Controllers\OrganigrammeController::class, 'add_dosier_array_organigramme']);
Route::post('/fill_drop_down', [App\Http\Controllers\OrganigrammeController::class, 'all_data_select'])->name('array_drop_down');
Route::post('/fill_drop_down_dossier', [App\Http\Controllers\OrganigrammeController::class, 'fill_drop_down_dossier']);

Route::post('/fill_drop_down_parent', [App\Http\Controllers\OrganigrammeController::class, 'fill_drop_down_parent']);

Route::post('/store_dossier', [App\Http\Controllers\OrganigrammeController::class, 'store_dossier'])->name('store_dossier');


Route::get('/array_organigramme_simple', [App\Http\Controllers\OrganigrammeController::class, 'array_organigramme_simple']);


Route::post('/delete_dossier', [App\Http\Controllers\OrganigrammeController::class, 'delete_dossier']);



Route::get('/table_organigramme', [App\Http\Controllers\OrganigrammeController::class, 'table_organigramme']);

Route::post('/create_organigramme', [App\Http\Controllers\OrganigrammeController::class, 'create_organigramme']);

Route::post('/delete_organigramme', [App\Http\Controllers\OrganigrammeController::class, 'delete_organigramme_item']);

Route::get('/organigramme/{id}/edit',[App\Http\Controllers\OrganigrammeController::class, 'edit_organigramme']);


Route::post('/check_have_parent',[App\Http\Controllers\OrganigrammeController::class, 'check_have_parent']);

Route::post('/fill_table_edit_attributs',[App\Http\Controllers\OrganigrammeController::class, 'fill_table_edit_attributs']);


Route::post('/update_attributs',[App\Http\Controllers\OrganigrammeController::class, 'update_attributs']);

Route::post('/api_champs_index',[App\Http\Controllers\OrganigrammeController::class, 'api_champs_index']);

Route::post('/remove_row_indexe',[App\Http\Controllers\OrganigrammeController::class, 'remove_row_indexe']);


Route::post('/remove_champs_attributs',[App\Http\Controllers\OrganigrammeController::class, 'remove_champs_attributs']);

//Route::get('/test/{id}',[App\Http\Controllers\OrganigrammeController::class, 'check_piece']);

/****Dossier */

Route::post('/api_check_dossier_physique',[App\Http\Controllers\DossierController::class, 'api_check_dossier_physique']);


Route::get('/select_project/{id}',[App\Http\Controllers\DossierController::class, 'select_project'])->name('select_project');

Route::post('/choose_project',[App\Http\Controllers\DossierController::class, 'choose_project']);

Route::post('/choose_project1',[App\Http\Controllers\DossierController::class, 'choose_project']);

Route::get('/create_dossier',[App\Http\Controllers\DossierController::class, 'create_dossier'])->name('create_dossier');

Route::get('/create_dossier1',[App\Http\Controllers\DossierController::class, 'create_dossier1'])->name('create_dossier1');

Route::get('/create_dossier2',[App\Http\Controllers\DossierController::class, 'create_dossier2'])->name('create_dossier2');

Route::get('/fill_parent_dossier',[App\Http\Controllers\DossierController::class, 'fill_parent_dossier']);
Route::get('/fill_parent_dossier_consulter',[App\Http\Controllers\DossierController::class, 'fill_parent_dossier_consulter']);

Route::get('/fill_entite',[App\Http\Controllers\DossierController::class, 'fill_entite']);
Route::post('/uploud_pdf_temp',[App\Http\Controllers\DossierController::class, 'uploud_pdf_temp']);


Route::get('/request_delete_dossier',[App\Http\Controllers\DossierController::class, 'request_delete_dossier'])->name('request_delete_dossier');

Route::get('/api_request_delete_dossier',[App\Http\Controllers\DossierController::class, 'api_request_delete_dossier']);

Route::get('/api_historique_dossier',[App\Http\Controllers\DossierController::class, 'api_historique_dossier']);

Route::post('/request_decision_user',[App\Http\Controllers\DossierController::class, 'request_decision_user']);

Route::post('/demande_suppression',[App\Http\Controllers\DossierController::class, 'demande_suppression']);

Route::get('/fill_sous_dossier',[App\Http\Controllers\DossierController::class, 'fill_sous_dossier']);

Route::get('/fill_sous_dossier1',[App\Http\Controllers\DossierController::class, 'fill_sous_dossier1']);


Route::post('/store_dossier_create',[App\Http\Controllers\DossierController::class, 'store_dossier']);

Route::post('/remove_temp_file',[App\Http\Controllers\DossierController::class, 'remove_temp_file']);

Route::get('/show_dossier/{id}',[App\Http\Controllers\DossierController::class, 'show_dossier'])->name('show_dossier');

Route::post('/historique_dossier',[App\Http\Controllers\DossierController::class, 'historique_dossier'])->name('historique_dossier');

Route::get('/recherche_dossier',[App\Http\Controllers\DossierController::class, 'recherche_dossier'])->name('recherche_dossier');


Route::get('/recherche_ocr',[App\Http\Controllers\DossierController::class, 'recherche_ocr'])->name('recherche_ocr');

Route::post('/api_search_ocr',[App\Http\Controllers\DossierController::class, 'api_search_ocr'])->name('api_search_ocr');

Route::get('/all_dossier',[App\Http\Controllers\DossierController::class, 'all_dossier'])->name('all_dossier');

Route::get('/api_all_dossier',[App\Http\Controllers\DossierController::class, 'api_all_dossier'])->name('api_all_dossier');


Route::get('/delete_dossier/{id}',[App\Http\Controllers\DossierController::class, 'delete_dossier'])->name('delete_dossier');

Route::post('/delete_file',[App\Http\Controllers\DossierController::class, 'delete_file'])->name('delete_file');

Route::post('/update_dossier/{id}',[App\Http\Controllers\DossierController::class, 'update_dossier'])->name('update_dossier');

Route::post('/save_file',[App\Http\Controllers\DossierController::class, 'save_file'])->name('save_file');

Route::post('/search_dossier',[App\Http\Controllers\DossierController::class, 'search_dossier'])->name('search_dossier');

Route::post('/api_search_table',[App\Http\Controllers\DossierController::class, 'api_search_table'])->name('api_search_table');

Route::post('/creer_entite',[App\Http\Controllers\DossierController::class, 'creer_entite'])->name('creer_entite');

/****boites */

Route::resource('boites',App\Http\Controllers\BoiteController::class);
//Route::get('/create', [App\Http\Controllers\BoiteController::class, 'create'])->name('create');
//Route::get('/register1',[App\Http\Controllers\Auth\RegisterController::class, 'test']);
Route::get('/create_user', [App\Http\Controllers\UserController::class, 'create_user'])->name('user_show');
Route::post('/ajouter', [App\Http\Controllers\UserController::class, 'create'])->name('add');
Route::get('/verify', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');
Route::post('/checkLogin', [App\Http\Controllers\UserController::class, 'checkLogin'])->name('checkLogin');
Route::get('/showUser/{id}', [App\Http\Controllers\UserController::class, 'showUser']);
Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/user_destroy/{user}', [App\Http\Controllers\UserController::class, 'delete_user_item'])->name('delete_user_item');
Route::put('/updateUser/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');

////////////////////////////////////////////////


Route::get('/role_liste', [App\Http\Controllers\RoleController::class, 'voirlist'])->name('role_liste');
Route::get('/listfinal', [App\Http\Controllers\RoleController::class, 'listfinal'])->name('listfinal');

//////////////////////////////////////////////////////
Route::resource('roles',App\Http\Controllers\RoleController::class);
Route::post('/roles_store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles_store');
Route::resource('permissions',App\Http\Controllers\PermissionController::class);
Route::post('/rolepermission/{role}', [App\Http\Controllers\RoleController::class, 'givePermission'])->name('rolepermission');
Route::delete('/revokePermission/{role}/permissions/{permission}', [App\Http\Controllers\RoleController::class, 'revokePermission'])->name('revokePermission');
///////////////////////////////////////////////////////////////

Route::post('/assignRole/{user}', [App\Http\Controllers\UserController::class, 'assignRole'])->name('assignRole');
Route::delete('/removeRole/{user}/{role}', [App\Http\Controllers\UserController::class, 'removeRole'])->name('removeRole');
Route::post('/givePermission/{user}', [App\Http\Controllers\UserController::class, 'givePermission'])->name('givePermission');
Route::delete('/revokePermission/{user}/permissions/{permission}', [App\Http\Controllers\UserController::class, 'revokePermission'])->name('revokePermission');




Route::get('/user_list', [App\Http\Controllers\UserController::class, 'test2'])->name('user_list');

Route::get('/parametre_app', [App\Http\Controllers\UserController::class, 'parametre_app'])->name('parametre_app');


Route::get('/lien_parametre/{id}', [App\Http\Controllers\UserController::class, 'lien_parametre'])->name('lien_parametre');


Route::get('/organigramme', [App\Http\Controllers\OrganigrammeController::class, 'home_organigramme'])->name('home_organigramme');


/*****    organigramme_view   ****/

Route::get('/organigramme_view', [App\Http\Controllers\OrganigrammeController::class, 'home_organigramme_view'])->name('home_organigramme_view');

Route::get('/organigramme_view/{id}/edit',[App\Http\Controllers\OrganigrammeController::class, 'edit_organigramme_view']);

Route::post('/array_organigramme_view', [App\Http\Controllers\OrganigrammeController::class, 'array_organigramme_view']);

Route::post('/fill_name_dossier',[App\Http\Controllers\OrganigrammeController::class, 'fill_name_dossier']);

Route::post('/modif_nom_dossier',[App\Http\Controllers\OrganigrammeController::class, 'modif_nom_dossier']);

Route::get('/pdf/{pdf}', [App\Http\Controllers\OrganigrammeController::class, 'pdf']);


Route::get('/table_organigramme_view', [App\Http\Controllers\OrganigrammeController::class, 'table_organigramme_view'])->name('table_organigramme_view');


/*****    préts   ****/

Route::get('/prets', [App\Http\Controllers\PretsController::class, 'index'])->name('prets');

Route::get('/prets_show/{id}', [App\Http\Controllers\PretsController::class, 'show'])->name('show');

Route::get('/prets_create', [App\Http\Controllers\PretsController::class, 'create'])->name('prets_create');

Route::post('/prets_store', [App\Http\Controllers\PretsController::class, 'store']);






Route::get('/api_prets', [App\Http\Controllers\PretsController::class, 'api_pret']);

Route::post('/update_status', [App\Http\Controllers\PretsController::class, 'update_status']);


Route::post('/prets_delete/{id}', [App\Http\Controllers\PretsController::class, 'delete']);



/****inventaire****/

Route::get('/inventaire', [App\Http\Controllers\InventaireController::class, 'index'])->name('inventaire');
Route::get('/inventaire_details/{id}', [App\Http\Controllers\InventaireController::class, 'inventaire_details'])->name('inventaire_details');
Route::get('/api_inventaire_details/{id}', [App\Http\Controllers\InventaireController::class, 'api_inventaire_details']);
Route::get('/all_inventaire', [App\Http\Controllers\InventaireController::class, 'all_inventaire'])->name('all_inventaire');
Route::post('/create_inventaire', [App\Http\Controllers\InventaireController::class, 'create']);
Route::post('/create_inventaire_table', [App\Http\Controllers\InventaireController::class, 'create_inventaire_table']);
Route::post('/inventaire_destroy/{id}', [App\Http\Controllers\InventaireController::class, 'delete']);
Route::post('/delete_details_inventaire/{id}', [App\Http\Controllers\InventaireController::class, 'delete_details_inventaire']);
Route::get('/inventaire_edit/{id}', [App\Http\Controllers\InventaireController::class, 'edit'])->name('inventaire_edit');
Route::post('/store_inventaire', [App\Http\Controllers\InventaireController::class, 'store']);
Route::post('/delete_inventaire', [App\Http\Controllers\InventaireController::class, 'delete_inventaire']);
Route::get('/create__inventaire', [App\Http\Controllers\InventaireController::class, 'create_inventaire'])->name('create__inventaire');
Route::get('/inventaire_choix', [App\Http\Controllers\InventaireController::class, 'inventaire_choix']);
Route::get('/recherche_physique', [App\Http\Controllers\InventaireController::class, 'recherche_physique']);
Route::post('/store_inventaire_table', [App\Http\Controllers\InventaireController::class, 'store_inventaire']);
Route::post('/delete_value_field', [App\Http\Controllers\InventaireController::class, 'delete_value_field']);
Route::post('/delete_value_field_inventaire', [App\Http\Controllers\InventaireController::class, 'delete_value_field_inventaire']);
Route::post('/choix_inventaires', [App\Http\Controllers\InventaireController::class, 'choix_inventaires'])->name('choix_inventaires');

Route::get('/selectionner_entite_inventaire', [App\Http\Controllers\InventaireController::class, 'selectionner_entite_inventaire'])->name('selectionner_entite_inventaire');

Route::get('/selectionner_entite_inventaire_recheche', [App\Http\Controllers\InventaireController::class, 'selectionner_entite_inventaire_rechercher'])->name('selectionner_entite_inventaire_recheche');


Route::post('/api_choix_entite_inventaire', [App\Http\Controllers\InventaireController::class, 'api_choix_entite_inventaire'])->name('selectionner_entite_inventaire');

Route::post('/edit_line', [App\Http\Controllers\InventaireController::class, 'edit_line'])->name('edit_line');

/** gestion physique */


Route::get('/gestion_physique', [App\Http\Controllers\InventaireController::class, 'gestion_physique'])->name('gestion_physique');

/** gestion physique */


/*****  salle *****/

Route::get('/salle', [App\Http\Controllers\SalleController::class, 'index'])->name('salle');

Route::post('/fill_rayonnage', [App\Http\Controllers\SalleController::class, 'fill_rayonnage']);


Route::get('/api_site', [App\Http\Controllers\SalleController::class, 'all_Site']);
Route::post('/salle_store', [App\Http\Controllers\SalleController::class, 'store']);
Route::post('/delete_salle', [App\Http\Controllers\SalleController::class, 'delete']);


/*****  Rayonnage  *****/

Route::get('/rayonnage/{id}', [App\Http\Controllers\RayonnageController::class, 'index'])->name('rayonnage');;
Route::get('/api_rayonnage/{id}', [App\Http\Controllers\RayonnageController::class, 'all_rayonnage']);
Route::post('/rayonnage_store', [App\Http\Controllers\RayonnageController::class, 'store']);
Route::post('/delete_rayonnage', [App\Http\Controllers\RayonnageController::class, 'delete']);

Route::post('/calcul_topo', [App\Http\Controllers\RayonnageController::class, 'calcul_topo']);

Route::post('/fill_code_topo', [App\Http\Controllers\SalleController::class, 'fill_code_topo']);


Route::get('/gestion_inventaire', [App\Http\Controllers\InventaireController::class, 'gestion_inventaire'])->name('gestion_inventaire');

Route::get('/import', [App\Http\Controllers\InventaireController::class, 'import_file']);

Route::post('/import1',[\App\Http\Controllers\InventaireController::class,'import'])->name("test.import1");


Route::get('/recherche_dossier_choix', [App\Http\Controllers\InventaireController::class, 'recherche_dossier_choix'])->name('recherche_dossier_choix');

