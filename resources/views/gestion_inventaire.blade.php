@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


<script src="{{ asset('assets/js/dossier.js') }}"></script>
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
         background-color: #2b7239;
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
    padding: 15px 25px 15px 10px !important;

}

span.label_menu._left {
    font-size: 14px;
    font-weight: 700;
    margin-top: 5px;
}

span.icon_menu_left, span.icon_menu_right {
    width: 35px;
    height: 35px;
 
}
</style>


<div class="panel-heading"> <strong>  Selectionner </strong> </div>

<div class="panel_view_details">
   

 
   <div class="table_p">
   <form  method="post" action="{{url('choose_project')}}"  >
            @csrf
      <div class="row">
         
         <div class="col-md-8 panel_create_dossier ">
            <div class="row panel_add">

              <div class="col-md-12">
             
            


                        <div class="form-group row">
                          
                         
             
                           <div class="col-sm-6">
                         
                              <ul>
            
                        
                                   <li class="link_menu__left" onclick="window.open('{{url('inventaire_choix')}}', '_self');">
                                       <span class="icon_menu_left">
                                       <img src="{{ asset('img_app/icons8-nouveau-produit-48.png') }}" style="width: 25px;">
                                       </span>
                                       <span class="label_menu _left"> Saisir Inventaire </span>
                                    </li>
                                    
                                 
                               
                              
                                    

                                    

                              </ul>
                   
                              
                           </div>

                           <div class="col-sm-6">
                         
                                 <ul>
               
                           
                                       <li class="link_menu__left" onclick="window.open('{{url('import')}}', '_self');">
                                          <span class="icon_menu_left">
                                          <img src="{{ asset('img_app/room.png') }}" style="width: 25px;">
                                          </span>
                                          <span class="label_menu _left"> Importer Inventaire </span>
                                       </li>
                                       
                                    
                                 
                                 
                                       

                                       

                                 </ul>
                     
                                 
                            </div>


                            
                           <div class="col-sm-6">
                         
                        
             
                         
                    </div>

                        </div>
       
                  

              </div>

              
             

      
              
   
             
         
        
          
                  
            
         </div>
         </div>
        
      
        

      </div>
   </form>
   </div>
</div>



 

@endsection