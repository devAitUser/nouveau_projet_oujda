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
      }


      input#version_physique_btn {
         transform: scale(1.7);
         margin-left: 0px;
      }


label:last-child input[type=radio] {
  transform: scale(1.5);
}
.col-md-6.panel_create_dossier {
    margin: 0 auto;
}
</style>


<div class="panel-heading">   Créer un nouveau  <strong></strong> </div>

<div class="panel_view_details">
   

 
   <div class="table_p">
   <form  method="post" action="{{url('prets_store')}}" enctype="multipart/form-data" >
            @csrf
      <div class="row">
         
         <div class="col-md-6 panel_create_dossier ">
            <div class="row panel_add">

              <div class="col-md-12">
             
           

                     <div class="form-group row">
                           <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Division :</label>
                           
                           <div class="col-sm-6">
                           <select class="form-select" id="" name="division">
                              <option value=""> Sélectionner la division </option>


                              <?php for($i=0;$i<count($projets);$i++){ ?>
                                           
                                                      
                                 <?php if($projets[$i]['id'] == $user['projet_select_id'] ) {  ?>
                                       <option value="<?php echo $projets[$i]['nom']; ?>" selected><?php echo $projets[$i]['nom']; ?></option>
                                       <?php  } else {  ?>
                                       <option value="<?php echo $projets[$i]['nom']; ?>" ><?php echo $projets[$i]['nom']; ?></option>
                                       <?php  } ?>
                        
                
                                  <?php  } ?>
                     
                              </select>

                              
                           </div>
                        </div>

              
                        <div class="form-group row">
                           <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Objet :</label>
                       
                           <div class="col-sm-6">
                              <input class="form-control" type="text" name="objet" id="">
                           </div>
                        </div>
       
                  

              </div>

              
           

              <div id='attribut_champ'>
              </div>

             
              <div class="" id='attribut_file'>
       

              </div> 
              
   
             
         
        
          
                  
            
         </div>
         </div>
        
         <div class="col-md-12  ">







    

           <div class="btn_panel">
            
               
                  <button type="submit" class="btn btn-primary  mr-3 " >Valider</button>
                
                  <button type="button" class="btn btn-danger" >Supprimer</button>
           </div>
        
         </div>
        

      </div>
   </form>
   </div>
</div>



 

@endsection