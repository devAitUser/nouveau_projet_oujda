@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


<script src="{{ asset('assets/js/dossier.js') }}"></script>
<style>
      .panel_view_bottom {
   display: block;
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
   .btn_panel {
    text-align: center;
    margin-bottom: 25px;
   }
   .control_block {
    display: flex;
    }

    textarea.form-control {
    height: 131px;
    }

    .td_1 {

      text-transform: uppercase;
      font-weight: 500;
      font-size: 14px;
      }

      .panel-heading {
         width: 80% !important;
      }

      nav.nav_doc {
         width: 94% !important;
         margin: 0 auto;
         padding-top: 15px;
      }

      .table_info_doc {
         width: 80%;
         margin: 0 auto;
         padding-top: 25px;
      }

      table.table.table-sm {
         border: 1px solid #dee2e6;
         border-collapse: collapse;
      }

      table.table.table-sm thead {
         background-color: antiquewhite;
      }
      .table thead th , .table tbody td {

         padding-left: 25px !important ;
      }

      caption {
         background-color: #f3f0f0;
         width: 44%;
         caption-side: top;
         font-size: 14px;
         font-weight: 500;
         padding-left: 10px;
         border-top: 1px solid #dbd4d4 !important;
         border-left: 1px solid #dbd4d4 !important;
         border-right: 1px solid #dbd4d4 !important;
      }
      .info_doc_table {
         border: 1px solid #dbd4d4 !important;
      }

      table.tbl_profil tr td {
         padding: 9px;
         text-align: left;
      }

      .input_doc_info_table {
         text-transform: uppercase;
         font-weight: 400;
         font-size: 13px;
         text-align: left !important;
      }

      td.cell_table_info {
         text-align: left !important;
         width: 45%;
         font-weight: 500;
      }

      .info_doc_table tbody {
         background-color: #fbfbfb;
      }

      .info_doc_table tr {
         border: 1px solid #dbd4d4 !important;
      }

      .modal-footer {
         justify-content: space-between;
      }

      .list_file .btn_file::before {
         width: 1.25em;
         line-height: 0;
      
         content:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
         transition: transform 0.35s ease;
         transform-origin: 0.5em 50%;
      }
      .list_file .btn_file[aria-expanded="true"]::before {
         transform: rotate(90deg);
      }

      button.btn.btn_file.d-inline-flex.align-items-center.rounded.collapsed {
         width: 50%;
      }
      
</style>





<button type="button" class="btn_back" onclick="history.back();"> <i class="fa-solid fa-chevron-left"></i> Revenir</button>


      <div class="panel-heading">  Dossier : {{$id}} </div>
      <input type="text" id="id_dossier" value={{$id}} hidden>

      <form  method="post" action="{{url('update_dossier',$id)}}"  >
         {{ csrf_field() }}
      <div class="panel_view_details">

         <?php  $var_add_file= Session::get('file_add');  ?>
         
             
         

         <nav class="nav_doc">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link @if ($var_add_file != 'content') active @endif" id="nav_info_doc" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informatios du Dossier</button>
              <button class="nav-link @if ($var_add_file == 'content') active @endif " id="nav-fichiers_info" data-bs-toggle="tab" data-bs-target="#nav-fichiers" type="button" role="tab" aria-controls="nav-fichiers" aria-selected="false">fichiers</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Historique</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show @if ($var_add_file != 'content') active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

               <div class="table_p">

           
      
                  <table id="id_table_print" class="tbl_profil">

                     <tr>
                           <td class="td_1">Imprimer le Dossier :</td>
                           <td> 
                                             
         
                              <div class="control_block">

                              

                                 <div class="col-xsm mr-2">
                                    <span class="printclass" target="_blank">
                                       <span class="btn btn-warning btn_show_pdf" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                             <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                             <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                          </svg>
                                       </span>
                                    </span>
                                 </div>
                              </div>

                     

                                                               
                           </td>


                      </tr>
             
                   @for ($i = 0; $i < count($attributs) ; $i++)

                       @if($attributs[$i]->type_champs != "Fichier")
      
      
                       <tr>
                                    <td class="td_1">{{$attributs[$i]->nom_champs}} :</td>
                                    <td> 
                                    @if($attributs[$i]->type_champs == "select") 
                                          
                                          <input type="text" class="form-control" value="{{$attributs[$i]->valeur}}" disabled>
      
                                         
      
      
                                         
      
                                 
      
                                     @else 

                                             @if($attributs[$i]->nom_champs == "dispose d'une version physique" )
                                                <input type="text"  value="{{$attributs[$i]->id}}" hidden>
                                                <input type="text"  class="form-control" value="{{$attributs[$i]->valeur}}" disabled>

                                             @elseif($attributs[$i]->nom_champs == "Numero boite" )

                                                <input type="text" name="id[]" value="{{$attributs[$i]->id}}" hidden>
                                                <input type="text" id="n_boite" value="{{$attributs[$i]->id}}"  hidden >
                                                <input type="text" name="valeur[]" class="form-control" value="{{$attributs[$i]->valeur}}" >
                                             
                                             @else

                                             
                                                <input type="text" name="id[]" value="{{$attributs[$i]->id}}" hidden>
                                                <input type="text" name="valeur[]" class="form-control" value="{{$attributs[$i]->valeur}}" >
                                             
                                             @endif

                                     @endif 
                                 
                                    </td>
      
      
                              </tr>
      
      
                           
                           @endif
      
      
                    @endfor


                    <tr>
                                    <td class="td_1">Recherche  version physique :</td>
                                    <td> 
                                     

                         
                                             <a class="btn btn-success btn_verfication " href="#demande_verification" data-bs-toggle="modal" data-bs-target="#">Verifier</a>
                                             
                                             
                                                                           
                                    </td>
      
      
                     </tr>
      
                 
          
                  </table>


                  <table id="id_table_print" class="tbl_profil info_doc_table">
                 
                     <caption>LES INFORMATIONS DU DOSSIER : </caption>
                     <tr>
                        <td class="input_doc_info_table">Dossier Créer par  :</td>
                        <td class="cell_table_info" > 
                           <label>{{$user_create_dossier}}</label>                                      
                        </td>


                     </tr>
                     <tr>
                        <td class="input_doc_info_table">Date de creation du dossier  :</td>
                        <td class="cell_table_info"> 
                           <label>{{$date_create_dossier}}</label>                                      
                        </td>


                     </tr>
                 

                   </table>
      
                  @if (Auth::user()->hasPermissionTo('Modifier les dossiers'))
      
                        <div class="btn_panel">
                        
                        
      
                              <button class="btn btn-primary delete_user mr-3" href="" id="">Modifier</button>

                              @if($check_demande_supperssion)
                              <a class="btn btn-danger delete_user" href="#" data-bs-toggle="modal" data-bs-target="#demande_suppression">Supprimer</a>
                              @endif()
      
                        </div>
      
      
                   @endif     
      
             
           
               </div>
               
            </div>
            <div class="tab-pane fade show @if ($var_add_file == 'content') active @endif " id="nav-fichiers" role="tabpanel" aria-labelledby="nav-fichiers-tab">

               <div class="table_p">

           
      
                  <table id="id_table_print" class="tbl_profil">
                 
                  
                    <tr>
                     <td>
                        <ul class="list_file list-unstyled mb-0 py-3 pt-md-1">
           
                           </li>

                           <?php for($j=0;$j<count($attributs_dossier);$j++){ ?>
                           
                           <li>
                              

                              <div class="name_file pt-3">

                             

                              <button class="btn btn_file d-inline-flex align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#row<?php echo $attributs_dossier[$j]['id']  ?>" aria-expanded="false">
                                 <?php echo $attributs_dossier[$j]['nom_champs']  ?> &ensp; &ensp; &ensp;
                                 <span class="" target="_blank">
                                  
                                   
                                 </span>
                              </button>

                              <span class="btn btn-warning add_fichier " onclick="add_file()" id_champs="<?php echo $attributs_dossier[$j]['id']  ?>" data-bs-toggle="modal" data-bs-target="#add_fichier" href="">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg>
                              </span>
                              </div>

                               <div class="collapse" id="row<?php echo $attributs_dossier[$j]['id']  ?>" style="">
                                 <ul class="list-unstyled fw-normal pb-1 small">
                                    <input id="id_dossiers" type="text" value="{{$id}} " name='id_dossier' hidden>
                                    <table>
                                       <tr>
                                          <td>Nom de fichier</td>
                                          <td>Action</td>
                                       </tr>
                                    <?php for($i=0;$i<count($attributs_dossier[$j]['child_files']);$i++){ ?>
                                       
                                       <tr>
                                          <td><a style="text-decoration: none;   color: #333 !important" href="#" class="d-inline-flex  rounded"><?php echo $attributs_dossier[$j]['child_files'][$i]['file']   ?></a></td>
                                          <td>
                                             {{ csrf_field() }}
                                             <input type="text" value="<?php echo $attributs_dossier[$j]['child_files'][$i]['id']   ?>" name='id_champs_file' hidden>

                                             @if (Auth::user()->hasPermissionTo('Modifier les dossiers'))

                                             <button type="button" class="btn btn-danger mr-3 " onclick="remove_file(event,<?php echo $attributs_dossier[$j]['child_files'][$i]['id']   ?> )">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path></svg></button>
                                             
                                                
                                                
                                             @endif
                                             <a href="{{ asset('storage/'.$attributs_dossier[$j]['child_files'][$i]['name_file'] ) }} " target="_blank">
                                             <button type="button" class="btn btn-primary" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                   <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                   <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                </svg></button>
                                             </a>
                                             </td>
                                       </tr>
                                   
                                     <?php } ?>
                                    
                                     
                                      
                                     </table>
                                 </ul>
                               </div>
                              
                           </li>

                           <?php } ?>
                           
                         
                       </ul>
                     </td>
                    </tr>
      
                 
          
                  </table>

                  

                 


                 
      
     
      
             
           
               </div>
               
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              
               <div class="table_info_doc">
                  <table  id="organigramme_table" class=" table table-bordered text-center styled-table">
                     <thead>
                       <tr>
                       <th scope="col">   Numero</th>

                         <th scope="col">Utilisateur</th>
                         <th scope="col">Action </th>
                         <th scope="col">Date</th>

                         
                       </tr>
                     </thead>
                     <tbody>
                        
                    
                    
              
                     
                     
                     </tbody>
                   </table>
               </div>
               
            </div>

          </div>

         

          
          <script src="{{asset('assets/js/datatables.min.js')}}"></script>
          <script type="text/javascript">
           var data1 = {!! json_encode($all_historiques) !!}
      
        </script>
           <script src="{{asset('assets/js/historique.js')}}"></script>


          

     
      </div>

      </form>





 
 <!-- Modal -->
 <div class="modal fade" id="demande_suppression" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
  <form  method="post" action="{{url('demande_suppression')}}"  >
     {{ csrf_field() }}
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Demande de suppression </h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
        
         
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Motif :</label>
              <textarea class="form-control" name="motif" rows="3" required></textarea>
            </div>

            
            <input type="text" value="{{$id}}" name="id_dossier" hidden>
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
         <button type="submit" class="btn btn-primary">Valider</button>
       </div>
     </div>
   </form>
   </div>
 </div>



 <!-- Modal verification -->
 <div class="modal fade" id="demande_verification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
  <form  method="post" action="{{url('demande_suppression')}}"  >
     {{ csrf_field() }}
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel" > Recheche sur la version physique </h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">

           <div id="resulta_check">

           </div>
        
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
        
       </div>
     </div>
   </form>
   </div>
 </div>





 
 
 <div class="modal fade" id="add_fichier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
   <div class="modal-dialog">
      <form  method="post" action="{{url('save_file')}}"  enctype="multipart/form-data">
         {{ csrf_field() }}
       <input type="text" name="id_dossier" value="{{$id}}" hidden>
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel"> NOUVEAU FICHIER:</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="form-group">
           
            
            <table>
               <tr>
                  <td>Selectionner le fichier :  &nbsp;&nbsp;</td>
                  <td>
                     <input id="id_dossier" type="text" name="id_champs_f" value="{{$id}}" hidden>
                     <input id="id_champs_f" type="text" name="id_champs_f" value="" hidden>
                     <input required="" class="form-control controle_file" type="file" name="file[]" placeholder="Choose file" id="file" onchange="load_name_File(event,3);" multiple  required>
                  </td>
               </tr>
               <tr>
                  <td>Date :  &nbsp;&nbsp;</td>
                  <td>

                     
                     <input id="date_input_file" class="form-control controle_file" type="date" name="date" required >
                  </td>
               </tr>
            </table>
            
            <label for="exampleFormControlTextarea1">Objet :</label>
            <textarea id="Objet_file3" class="form-control" name="Objet" rows="3" required></textarea>
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
         <button type="submit" class="btn btn-primary">Validé</button>
       </div>
     </div>
     </form>
   </div>
 </div>


 <script type="text/javascript">


      var id_dossier = {!! json_encode($id) !!}
      
 </script>




 

@endsection