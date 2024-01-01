<html lang="en">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="icon" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/img/favicon-32x32.png') }}">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon-32x32.png') }}"/>
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&amp;display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <style>
      </style>
      <script src="{{ asset('assets/js/home_app.js') }}"></script>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>tableau de bord</title>
      <script type="text/javascript">
         var APP_URL = {!! json_encode(url('/')) !!}
         
         </script>
   </head>
   <body cz-shortcut-listen="true">
      <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="http://localhost/projet_oujda/logout"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             Logout
         </a>
         
         <form id="logout-form" action="http://localhost/projet_oujda/logout" method="POST" class="d-none">
             <input type="hidden" name="_token" value="IXB74SSakpushjV5a0WVom9NZLariWXa3ChhK56D">         </form>
         </div> -->
      <div class="wrapper">
         <div class="main-content">
          
            <div class="panel_view_header">
               <div class="logo_ams_left">  <p class="top_header">  <img src= "{{ asset('assets/img/AMSlogo.png') }}"  style="width: 85px;"> </p> </div>
               <div class="header_panel_view">
                  <nav class="my-2 my-md-0 mr-md-3">



               
               
           
                     <li class="icon_menu " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="">
                        <a href="http://localhost/projet_oujda/logout" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <span class="material-icons">
                        logout
                        </span> </a>
                        <form id="logout-form" action="http://localhost/projet_oujda/logout" method="POST" class="d-none">
                           <input type="hidden" name="_token" value="IXB74SSakpushjV5a0WVom9NZLariWXa3ChhK56D">                           
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
                     .logo_ams_left {
                    position: absolute;
                    margin-left: 35px;
                    margin-top: 10px;
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
       
       
            <div class="panel_view_bottom">
               <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> 
               <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
               <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
               <script src="http://localhost/projet_oujda/assets/js/parametre_app.js"></script>
               <style>
                  .panel_view_bottom {
                  display: block;
                  }
                  span.title_profil {
                  padding-left: unset !important; 
                  }
                  .panel_view_bottom {
                  height: auto !important;
                  margin-bottom: 37px;
                  }
                  .panel_view_details {
                  margin-bottom: 15px;
                  }
                  #organigramme_table_wrapper {
                  margin-bottom: 15px;
                  }
                  i.fa-solid.fa-circle-xmark {
                  font-size: 18px;
                  color: #e91e63;
                  margin-top: 10px;
                  }
                  .form-group.row {
                  align-items: center;
                  }
                  .form-control {
                  height: 36px;
                  padding: 1px 15px;
                  }
                  .form-control:focus, input:focus {
                  border-color: #d7d1cb !important;
                  }
                  .attribut_file {
                  border: 2px solid #cbc3c3;
                  border-radius: 22px;
                  padding-top: 15px;
                  padding-bottom: 15px;
                  margin-top: 15px;
                  }
                  #attribut_champ {
                  width: 100%;   
                  PADDING-TOP: 15PX;
                  padding-right: 0px;
                  padding-left: 0px;
                  }
                  .btn_panel {
                  text-align: -webkit-center;
                  padding-top: 25px;
                  padding-bottom: 20px;
                  }
                  .btn_panel button {
                  padding: 5px 10px;
                  }
                  .panel_organigramme {
                  PADDING-RIGHT: 0px!important;
                  PADDING-LEFT: 0px !important;
                  }
                  .panel_view_details , .header_view {
                  width: 94% !important;
                  }
                  .panel_organigramme {
                  PADDING-RIGHT: 25px!important;
                  height: 550px !important;
                  }
                  .form-group label {
                  font-size: 14px;
                  }
                  .panel-heading {
                    width: 94% !important;
                    margin-top: 60px;
                  }
                  input#version_physique_btn {
                  transform: scale(1.7);
                  margin-left: 0px;
                  }
                  label:last-child input[type=radio] {
                  transform: scale(1.5);
                  }
                  .col-md-8.panel_create_dossier {
                  margin: 0 auto;
                  }
                  .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
                  color: var(--bs-btn-active-color);
                  background-color: #155ea4;
                  border-color: var(--bs-btn-active-border-color);
                  }
                  .btn:first-child:hover, :not(.btn-check)+.btn:hover {
                  color: var(--bs-btn-hover-color);
                  background-color: #155ea4;
                  }
                  .table_p {
                  margin-bottom: 20px;
                  }
                  .link_menu__left {
                  padding: 30px 40px 30px 30px !important;
                  }
                  span.label_menu._left {
                     font-size: 21px;
                     font-weight: 700;
                     margin-top: 0px;
                  }
                  span.icon_menu_left, span.icon_menu_right {
                  width: 44px;
                  height: 44px;
                  }

                 
               </style>
             
               <div style="    margin-top: 60px;" ></div>
               <div class="panel_view_details">
                  <div class="table_p">
                     <form >
                        
                        <div class="row">
                           <div class="col-md-8 panel_create_dossier ">
                              <div class="row panel_add">
                                 <div class="col-md-12">
                                    <div class="form-group row">
                                       <div class="col-sm-6">
                                       <?php if($user->gerer_archives){     ?>
                                          <ul>
                                             <li class="link_menu__left" onclick="window.open('<?php echo url('/').'/lien_parametre/1'   ?>', '_self');">
                                                <span class="icon_menu_left">
                                                <img src="{{ asset('img_app/gere_archives.png') }}" style="width: 33px;">
                                                </span>
                                                <span class="label_menu _left"> Gerer mes archives   </span>
                                             </li>
                                          </ul>
                                          <?php  }     ?>
                                       </div>
                                      
                                       <div class="col-sm-6">
                                       <?php if($user->config_solution){     ?>
                                          <ul>
                                             <li class="link_menu__left" onclick="window.open('<?php echo url('/').'/lien_parametre/2'   ?>', '_self');">
                                                <span class="icon_menu_left">
                                                <img src= "{{ asset('img_app/setting.png') }}"  style="width: 33px;">
                                                </span>
                                                <span class="label_menu _left">  configurer ma solution </span>
                                             </li>
                                          </ul>
                                          <?php  }     ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <footer class="mt-auto block_footer">
               <p>Copyright 2022 - <strong>MASTER ARCHIVES</strong> – Tous droits réservés </p>
            </footer>
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