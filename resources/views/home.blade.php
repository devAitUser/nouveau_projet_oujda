@extends('layouts.app')

@section('content')

<style>
     li.link_menu__right a {
    text-decoration: none !important;
   }

   .w_menu_right {
      width: 307px;
   }
   ul.block_archive {
      width: 69%;
   }
   .panel_view_info {
      display: flex;
   }
</style>

<div class="block_menu left">
 
        
      
        


      </div>
      <div class="panel_view_info">
      @if ( $menu_left == 1 )
      <ul>
            
            @if (Auth::user()->hasPermissionTo('Créer un dossier'))
            
               <li class="link_menu__left" onclick="window.open('{{url('select_project/1')}}', '_self');">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-add-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Numériser et indexer ( version 1 ) </span>
               </li>
               <li class="link_menu__left" onclick="window.open('{{url('create_dossier1')}}', '_self');">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-add-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Numériser et indexer  ( version 2 )     </span>
               </li>
               <li class="link_menu__left" onclick="window.open('{{url('create_dossier2')}}', '_self');">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-add-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left">  Indexation automatique   </span>
               </li>
               <li class="link_menu__left" onclick="window.open('{{url('select_project/2')}}', '_self');">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-search-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Rechercher un dossier </span>
               </li>
               {{-- <li class="link_menu__right" style="margin-top:5px">
               <a href="{{ route('boites.create') }}">
                  <div class="add_btn_folder">
                     <span class="icon_menu_right" >
                     <img src="{{ asset('img_app/folder-add-icon.png') }}" style="width: 20px;">
                     </span>
                     <span class="label_menu_right"> Créer une nouvelle boîte </span>
                  </div>
                  </a>
               </li> --}}
              
               @endif

                     
               @if (Auth::user()->hasPermissionTo('Gestion des prets') || Auth::user()->hasPermissionTo('demande des prêts')  || Auth::user()->hasPermissionTo('Validation des prêts')  ) 
   
                        <li class="link_menu__left" onclick="window.open('{{route('prets')}}', '_self');">
                              <span class="icon_menu_left" >
                              <img src="{{ asset('img_app/icons8-add-file-64.png') }}" style="width: 20px;">
                              </span>
                              <span class="label_menu _left">   Gestion des prêts   </span>
                             </li>
                     @endif


                @if (Auth::user()->hasPermissionTo('Valider la suppression')) 
                <li class="link_menu__left" onclick="window.open('{{route('request_delete_dossier')}}', '_self');">
                              <span class="icon_menu_left" >
                              <img src="{{ asset('img_app/icons8-delete-file-64.png') }}" style="width: 20px;">
                              </span>
                              <span class="label_menu _left">   Demandes de suppression   </span>
                             </li>


                @endif
             
                 {{--  'inventaire_choix' --}}
               <li class="link_menu__left" onclick="window.open('{{url('selectionner_entite_inventaire')}}', '_self');">
               
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/icons8-nouveau-produit-48.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Inventaire </span>
               </li>
            
          
               {{-- <li class="link_menu__left">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-close-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Gestion de la déstruction  </span>
               </li>
               <li class="link_menu__left">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-error-icon.png') }}" style="width: 20px;">
                  </span>
                  <span class="label_menu _left"> Gestion des versements   </span>
               </li>



               <li class="link_menu__left">
                  <span class="icon_menu_left" >
                  <img src="{{ asset('img_app/folder-error-icon.png') }}" style="width: 20px;">
                  </span>
               <a href="{{ route('boites.index') }}">   <span class="label_menu _left"> Gestion des boites   </span></a>
               </li> --}}

               

         </ul>
         @endif
         <!-- <ul class="block_archive">
            <div class="sub_archive_block">
               <h4 class="titre_block_archive">
                  <img src="{{ asset('img_app/Box-icon.png') }}" style="vertical-align: bottom;position: relative;top: 1px;right: 3px;" alt="">
                  Les Chiffres de l'archivage   @if ($ckeck_select) du Division {{$nom_projet}}   @endif
               </h4>
                @if ($ckeck_select)

                  <li class="li_block_archive">
                     <a href="{{route('all_dossier')}}">
                     <img src="{{ asset('img_app/62917-open-file-folder-icon.png') }}" style="width: 22px;vertical-align: sub;" alt="">
                     Total des Dossiers indexé  <b><span ><b> ({{$Count}})  </b>
                     </span></b></a>
                  </li>
                  @if (Auth::user()->hasPermissionTo('Créer un dossier'))
                  <li class="li_block_archive last_item_bskli">
                     <a href="#">
                     <img src="{{ asset('img_app/62917-open-file-folder-icon.png') }}" style="width: 22px;vertical-align: sub;" alt="">
                     Total des Dossiers indexé aujourd'hui  <b><span ><b>({{$dossier_indexe}})</b></span></b></a>
                  </li>
                  @endif
                    
                @else

                <li class="li_block_archive last_item_bskli">
                  <a href="{{route('user_profile')}}"style="width: 22px;vertical-align: sub;margin-left: 36px;font-size: 16px;">
                 
                     <b>  Sélectionner Votre projet dans la page Mon profil  </b></a>
                </li>
                    
                @endif
        
           
            </div>
         </ul> -->
      </div>

      <div class="block_menu right @if (!Auth::user()->hasPermissionTo('Créer un dossier')) w_menu_right @endif">
         <ul>
       
         </ul>
      </div>




@endsection
