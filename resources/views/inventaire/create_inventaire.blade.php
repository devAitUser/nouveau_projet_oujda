@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>

	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">




    <link href="{{ asset('assets/css/bootstrap2.min.css') }}" rel="stylesheet" >

<link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">



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
    padding-right: 25px;
    padding-left: 25px;
   }
   .card-header {
    font-size: 18px;
    height: 100%;  
    }
    .experiences, .formation {
    background: #f9f9f9f5;
    }
   .card-header {
    padding: 1rem 1rem !important;
    border-radius: 0.3rem!important;
    }
    .pr-0, .px-0 {
    padding-right: 0 !important;
    }
    .pl-0, .px-0 {
    padding-left: 0 !important;
    }
    
   #organigramme_table_wrapper {
    margin-bottom: 15px;
   }
   table.info_p tr td {
    padding-top: 10px;
   }

  
    .panel-heading {
    width: 80% !important;
     }
     .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #ddd;
            vertical-align: unset !important;
        }

        .block_select {
         display: flex;
      }

      div#table_wrapper {
         overflow: auto;
      }
</style>

<script src="{{asset('assets/js/datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/dossier_table_iventaire.js')}}"></script>
      <script src="{{asset('assets/js/iventaire.js')}}"></script>



      <div class="panel-heading">   
        inventaire
     </div>
      <div class="panel_view_details">
         <div class="table_p">

          <div class="card border mb-3">
            <div class="row">
               <div class="col-md-10 pr-0">
                  <div class="card-header">Nom de l'inventaire : {{$name}}</div>
               </div>
               <div class="col-md-2 pl-0">
                  <div class="card-header"><a id="btn_F" data-toggle="collapse" href="#collapse_Formation" role="button" aria-expanded="true" aria-controls="collapse_Formation" class="btn btn-success btn-ajouter">ajouter</a></div>
               </div>
            </div>
            <!----> 
            <div class="card-body">
               <table class="table table-striped" id="table">
                  <thead>
                     <tr>
                       @foreach ($field_inventaires as $field_inventaire)
                          
                      
                        <th scope="col">{{$field_inventaire->nom_champs}} </th>

                        <script type="text/javascript">
                         
                         array_champs.push({!! json_encode( $field_inventaire->nom_champs ) !!});

                        
                        
                        </script>
                       
                        @endforeach

                        @if (Auth::user()->hasPermissionTo('Supprimer de inventaire')) 

                        <th scope="col"> Action </th>

                        @endif

                        <th scope="col"> Modifier </th>
                        <th scope="col"> Version physique </th>

                     </tr>
                  </thead>
                  <tbody>
                     <?php for($i=0;$i<count($array_table_inventaires);$i++){ ?>
                     <tr id='row_<?php echo $array_table_inventaires[$i]['id_field_inventaire'] ?>'>
                        <?php for($n=0;$n<count($array_table_inventaires[$i]['field_inventaires']);$n++){ ?>
                        <td> <?php echo $array_table_inventaires[$i]['field_inventaires'][$n] ?> </td>
                        <?php } ?>
                        
                        @if (Auth::user()->hasPermissionTo('Supprimer de inventaire')) 

                           <td>
                              <div class="block_action_organigramme">
                                 <a href="" onclick="removeRow_table_champs_add(event,<?php echo $array_table_inventaires[$i]['id_field_inventaire'] ?>)"><i class="fa-solid fa-circle-xmark "></i></a>
                              </div>
                           </td>
                        @endif
                        <?php if($array_table_inventaires[$i]['n_dossier'] == ''){ ?>
                        <td><button type="button" class="btn btn-primary btnGetRowData "  >creer version phsique</button></td>
                        <?php } else { ?>

                           <td> <button type="button" class="btn btn-success" onclick="acceder_dossier(<?php echo $array_table_inventaires[$i]['n_dossier']; ?>)" >acceder au dossier</button>  </td>

                        <?php } ?>
                        <td>
                             <button type="button" class="btn btn-primary btn_edit "  data-toggle="modal" data-target="#modifier"  >
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path> </svg>
                             </button>
                        </td>

                     </tr>
                     <?php } ?>
                    
                  </tbody>
               </table>
               <div class="collapse " id="collapse_Formation" style="">
                  <div class="card card-body formation">
                     <h5 class="card-title">NOUVELLE  </h5>
                     <form id="field_form"> 
                      @csrf
                      <input type="text" value="{{$id_inventaires}}" name="id_inventaires" hidden>
                     <table class="info_p ">
                        <tbody>
                          @foreach ($field_inventaires as $field_inventaire)
                          <tr>
                           <td> {{$field_inventaire->nom_champs}} :</td>
                           <td> 
                            @if ($field_inventaire->type_champs == 'Text')
                               <input type="text" class="form-control" name="champs[]" required>  
                               <input type="text" class="form-control" name="nom_champs[]" value='{{$field_inventaire->nom_champs}}' hidden>  
                            @endif
                            @if ($field_inventaire->type_champs == 'Date')
                               <input type="date" class="form-control" name="champs[]" required> 
                               <input type="text" class="form-control" name="nom_champs[]" value='{{$field_inventaire->nom_champs}}' hidden>  
                            @endif
                            @if ($field_inventaire->type_champs == 'cote')
                            <div class="block_select">


                              <select id="id_salle" class="form-select" onchange="select_rayonnage()">
                                 <option value="">selectionner</option>
                                 @foreach($salles as $salle)
                                 <option value="{{$salle->id}}">{{$salle->site}} / {{$salle->numero_salle}} </option>
                                 
                                 @endforeach
                              </select>
                              <select  id="select_rayonnage_1" class="form-select" onchange="select_type_rayonnage()" >
                                 <option value="">selectionner</option>
                        
                              </select>
                              <select name="champs[]" id="select_code_topo" class="form-select" onchange="" >
                        
                              </select>

                              <input type="text" class="form-control" name="nom_champs[]" value='{{$field_inventaire->nom_champs}}' hidden>  


                            </div>
                            
                            @endif
                            
                          </td>
                         
                          </tr>
                        @endforeach
                  
                     </tbody></table>
                     <div class="card-body panel_btn">

                        <button type="submit" class="btn btn-info  ">Validé</button>
                        <input type="reset"   class="btn btn-danger">
                     </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>

            

         </div>



         <!-- Modal modifier  -->
         <div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modifier la ligne </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <form  method="post" action="{{url('edit_line')}}">
                   @csrf
               <div class="modal-body">

             

                  <div class="">

                  

                        <div class="form-row parent_column">
                     
                        </div>


                     </div>
                  
         
                    <input type="text" id="id_line" name="id_line" hidden>
                  
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                  <button type="sublit" class="btn btn-primary">enregistrer </button>
                  </div>
                  </form>
            </div>
         </div>
         </div>




         


      </div>




      
   

      

      

@endsection
