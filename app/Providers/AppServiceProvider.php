<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Organigramme;
use App\Models\Pret;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('permission_user', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Gestion des utilisateurs'))
            {
              $value = true;
            }
            return $value;
        });
        Gate::define('permission_plan_classements', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Modifier le plan de classement'))
            {
              $value = true;
            }
            return $value;
        });
        ;
        Gate::define('Voir_plan_classement', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Visualiser le plan de classement'))
            {
              $value = true;
            }
            return $value;
        });
        Gate::define('permission_creer_dossier', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Créer un dossier'))
            {
              $value = true;
            }
            return $value;
        });

        Gate::define('permission_Modifier_dossiers', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Modifier le plan de classement'))
            {
              $value = true;
            }
            return $value;
        });
        Gate::define('permission_Modifier_roles', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Modifier les roles'))
            {
              $value = true;
            }
            return $value;
        });
        Gate::define('Valider_suppression', function ()
        {
            $value = false;
             if (Auth::user()->hasPermissionTo('Valider la suppression'))
            {
              $value = true;
            }
            return $value;
        });

      

        View::composer('layouts.app', function ($view) {
          $user = Auth::user();
          $projet_select_id = $user->projet_select_id;
          $nom_projet = "";

            if($projet_select_id != NULL) {
              $organigramme = Organigramme::find($projet_select_id);
              
              if (!is_null($organigramme) ){
              
              $dossiers = $organigramme->dossiers;
              $nom_projet = $organigramme->nom;
              
              }
            }

            $count_prets = 0;
            $count_prets_accepter = 0;
            $all_prets = array();
            $all_prets_accepter = array();

            $permisssion_gestion_prets = false;

            $permisssion_validation_prêts = false;

            $prets =  Pret::where( [ "status" => 0 ] )->get();
            $prets_accepter =  Pret::where( [ "status" => 1 ] )->get();
            if($prets != null){
                $count_prets = $prets->count();
            }

            if($prets_accepter != null){
              $count_prets_accepter = $prets_accepter->count();
            }


            
            for ($i = 0; $i < count($prets_accepter); $i++) {
              $createdAt = Carbon::parse($prets_accepter[$i]->created_at);
  
              $date = $createdAt->format("d/m/Y H:i:s");
  
              $all_prets_accepter[] = [
                  "user" => $prets_accepter[$i]->user,
                  "date" => $date,
              ];
             }


             




            for ($i = 0; $i < count($prets); $i++) {
              $createdAt = Carbon::parse($prets[$i]->created_at);
  
              $date = $createdAt->format("d/m/Y H:i:s");
  
              $all_prets[] = [
                  "user" => $prets[$i]->user,
                  "date" => $date,
              ];
             }

             if(Auth::user()->hasPermissionTo('Validation des prêts')){
              $permisssion_validation_prêts = true;
              }

              if(Auth::user()->hasPermissionTo('Gestion des prets')  ){
                $permisssion_gestion_prets = true;
              }

            $view->with('menu_centre', $user->choix_parametre );
            $view->with('count_prets', $count_prets );
            $view->with('count_prets_accepter', $count_prets_accepter );
            $view->with('all_prets_accepter', $all_prets_accepter );
            $view->with('permisssion_gestion_prets', $permisssion_gestion_prets );
            $view->with('permisssion_validation_prêts', $permisssion_validation_prêts );
            $view->with('pret_en_cours', $all_prets );
            $view->with('role_name', $nom_projet );
            $view->with('name_user', $user->identifiant );
         });
       
        
    }

    
}
