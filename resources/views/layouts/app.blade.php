<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="icon" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/img/favicon-32x32.png') }}">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon-32x32.png') }}"/>

      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
         rel="stylesheet">
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
         

   
        
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        
        
        
        
        <style>
          
            </style>

         <script src="{{ asset('assets/js/home_app.js') }}"></script>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'CRI') }}</title>

      <script type="text/javascript">
      var APP_URL = {!! json_encode(url('/')) !!}
      
      </script>

      <style>
          nav.menu_disble {
                     margin: 0 auto;
                     background-color: #787878;
                     opacity: 0.5;
                     color: white;
                  }
      </style>
    
   </head>
   <body>
      @guest
      @else
      <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
         </div> -->
      @endguest
      <div class="wrapper">
     
         <div class="main-content">
            <div class="panel_view_header">
               <div class="header_panel_view">
               
               

               <nav class="my-2 my-md-0 mr-md-3">
             <li class="icon_menu    " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="">
                    <p class="top_header"> <strong>Division :</strong>  <a class="name_division" href="#">{{$role_name}} </a> </p>
                     </li>
              
                 

                                     
                 
   

                  
                     

                  
                     <li class="icon_menu  link_dropdown   " data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        <a href="{{route('user_profile')}}" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-icons">notifications</span>
                        </a>

                       
                        
                        
                         <?php if($count_prets > 0 && $permisssion_validation_prêts ){ ?>
                           <span class="badge badge-danger badge-counter">{{$count_prets}}+</span>
                           <?php  } else if($count_prets_accepter > 0 && $permisssion_gestion_prets ) { ?>
                              <span class="badge badge-danger badge-counter">{{$count_prets_accepter}}+</span>
                           <?php }?>
                           
                           <?php if($count_prets > 0 && $permisssion_validation_prêts ){ ?>
                           <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                                 <h6 class="dropdown-header">
                                    Centre d'alertes
                                 </h6>
                                 <?php for($i=0;$i<count($pret_en_cours);$i++){ ?>
                                 <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                       <div>
                                          <div class="small text-gray-500"><?php echo $pret_en_cours[$i]['date']; ?></div>
                                          <span class="font-weight-bold noti_item">Demande de pret par utilisateur : <?php echo $pret_en_cours[$i]['user']; ?> </span>
                                       </div>
                                 </a>
                                 <?php  } ?>
                              

                                 <span class="spartaor"></span>
                           
                                 
                              </div>
                                 <?php  }else if($count_prets_accepter > 0  &&  $permisssion_gestion_prets  ) { ?>

                                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                                    <h6 class="dropdown-header">
                                       Centre d'alertes
                                    </h6>
                                    <?php for($i=0;$i<count($all_prets_accepter);$i++){ ?>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                       
                                          <div>
                                             <div class="small text-gray-500"><?php echo $all_prets_accepter[$i]['date']; ?></div>
                                             <span class="font-weight-bold noti_item">Demande de pret par utilisateur : <?php echo $all_prets_accepter[$i]['user']; ?> </span>
                                          </div>
                                    </a>
                                    <?php  } ?>
                                 

                                    <span class="spartaor"></span>
                              
                                    
                                 </div>
                                 <?php   } ?>
                           </li>
               


                      
                     <li class="icon_menu  link_dropdown  {{ request()->is('user_profile')  ? 'active' : '' }} " data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        <a href="{{route('user_profile')}}" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-icons">manage_accounts</span>
                        </a>
                        Mon Profil
                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1" style="">
                           <li><a class="dropdown-item" href="#">Utilisateur : <strong>{{$name_user}}</strong>  </a></li>
                           <li><a class="dropdown-item" href="{{route('user_profile')}}">Mon Profil</a></li>
                          
                        </ul>
                     </li>
                     
                     <li class="icon_menu " data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        
                        <a href="{{route('logout') }}" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                           <span class="material-icons">
                              logout
                           </span> </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                           Quitter
                        </li>
             </nav>


            

               

   <style>


.tooltip-inner {

  background: #155ea4;


}

a.name_division {
    text-decoration: none;
}

.icon_menu a {
    margin: 0 auto;
}

li.icon_menu {
    display: grid;

}


.bs-tooltip-top .arrow::before, .bs-tooltip-auto[x-placement^="top"] .arrow::before {
  border-top-color: #f00 !important;
}

.bs-tooltip-right .arrow::before, .bs-tooltip-auto[x-placement^="right"] .arrow::before {
  border-right-color: #f00 !important;
}


.bs-tooltip-bottom .arrow::before, .bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
  border-bottom-color: #f00 !important;
}


.bs-tooltip-left .arrow::before, .bs-tooltip-auto[x-placement^="left"] .arrow::before {
  border-left-color: #f00 !important;
}

.header_panel_view {

    direction: rtl;
    margin-right: 100px;
}

p.top_header {
    font-size: 16px;
    margin-bottom: 0px !important;
    margin-top: 10px;
}  

@media (min-width: 768px) {
.mr-md-auto, .mx-md-auto {
    margin-right: auto!important;
}}


.menu_disble .icon_menu a {
    color: rgb(255 255 255) !important; 
}

.menu_disble .icon_menu  {

    color: #fff !important;
    
}


.menu_disble  .icon_menu {
   
    cursor: default;
}


   </style>
              
                  <ul class="hdMnu">
                    
                  

                     <style>
                        .link-dropdown:hover .dropdown {
                           opacity: 1;
                           visibility: visible;
                           -webkit-transform: translateY(-10px);
                           -ms-transform: translateY(-10px);
                           transform: translateY(-10px);
                           }
                           nav.menu {
                              margin: 0 auto;
                           }
                     </style>


                  
           
                    

                    

                  
                  </ul>

               </div>
            </div>
         
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
             <h5 class="my-0 mr-md-auto font-weight-normal"><img src="{{ asset('assets/img/logo_client.png') }}" class="logo_css"></h5>
             <nav class="my-2 my-md-0 mr-md-3">
             <a class="pic_archive" href="#"> <img src="{{ asset('assets/img/archive.png') }}" class=""></a>
             </nav>
         
             
            </div>
           
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
             
            
             <nav class="menu @if( $menu_centre != 2  )  menu_disble @endif">
             <li class="icon_menu  {{ request()->is('home')  ? 'active' : '' }}  " >
                        <a  href="    {{route('home')}} "  >
                        <span class="material-icons">
                        home
                        </span>
                        </a>
                        Accueil
                     </li>
                     @if (Auth::user()->hasPermissionTo('Gestion physique')) 

                        <li class="icon_menu   {{ request()->is('gestion_physique')  ? 'active' : '' }} ">
                           <a @if( $menu_centre == 2  )  href="  {{route('gestion_physique')}} " @endif> 
                           <span class="material-icons">
                              inventory
                           </span>
                           </a>
                           Gestion physique
                        </li>

                        @endif

               
                
   
               

                
                     
                   
                
                 
   

                     @if (Auth::user()->hasRole('admin')) 
                     <li class="icon_menu   {{ request()->is('user_list')  ? 'active' : '' }} " data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        <a @if( $menu_centre == 2  ) href="  {{route('user_list') }} " @endif>
                        <span class="material-icons">group_add</span>
                        </a>
                        Gestion des utilisateurs
                       
                     </li>
                     @endif
                
                   
                     @if (Auth::user()->hasPermissionTo('Modifier le plan de classement') || Auth::user()->hasPermissionTo('Visualiser le plan de classement')  ) 
                     <li class="icon_menu  {{ request()->is('organigramme')  ? 'active' : '' }}" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        <a @if( $menu_centre == 2  ) href="  {{route('home_organigramme')}} " @endif>
                           <span class="material-icons  ">
                           account_tree
                           </span>

                         </a>
                         Plan de classement
                     </li>
                     @endif


                  

               


                     @if (Auth::user()->hasRole('admin')) 
                     <li class="icon_menu  {{ request()->is('roles')  ? 'active' : '' }}  "  data-bs-toggle="tooltip" data-bs-placement="top" title="">
                     <a @if( $menu_centre == 2  ) href=" {{route('roles.index') }}  " @endif>
                        <span class="material-icons">
                        rule
                        </span> </a>
                        Gestion des rôles
                     </li>
                     @endif

                
             </nav>
             
            </div>
             


            <div class="panel_view_bottom">

                 @yield('content')

            </div>
            <footer class="mt-auto block_footer">
               <p>Copyright 2022 - <strong>MASTER ARCHIVES</strong> – Tous droits réservés </p>
             </footer>
         </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script>
         var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
         var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
         })
      </script>
   </body>
</html>