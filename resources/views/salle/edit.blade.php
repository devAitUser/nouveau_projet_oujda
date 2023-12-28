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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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

  
    .panel-heading {
    width: 80% !important;
     }
     .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #ddd;
            vertical-align: unset !important;
        }
        i.fa-solid.fa-circle-xmark {
            font-size: 18px;
            color: #e91e63;
            margin-top: 10px;
        }
        
</style>



      <div class="panel-heading">   
        Les utilisateurs
     </div>
      <div class="panel_view_details">
        <form  method="post" action="{{url('store_inventaire')}}">
          @csrf
          <input type="text" value="{{$id}}" name="id_inventaire" hidden>
         <div class="table_p">


          <div class="row">
            <div class="col-md-12 panel_add">
              <h3 align="center">Ajouter les champs</h3>
              <br>
  
  
                 <div class="form-group">
                  
                    <div class="d_flex" style="display: flex;">
  
                    
  
                      <button type="button" class="btn btn-info btn_add_oranigramme "><span class="material-icons">
                        add
                        </span>Ajouter</button>
        
                           
  
                         
  
                    </div>
  
  
                 </div>
            
                 <table id="add_table_champs_add" class="table_champs_add">
                  <tbody><tr class="table_h">
                     <th style="width:45%">Nom du champs</th>
                     <th>Type du champs</th>
                     <th>Action</th>
                  </tr>
                  </tbody><tbody>

                    <?php for($i=0;$i<count($field_inventaire);$i++){ ?>

                    <tr id="row_table_champs_add_<?php echo $i ?>">
                      <td><input name="old_name_champ[]" class="form-control" type="text" value="<?php echo $field_inventaire[$i]->nom_champs ?>" required="">
                         <input type="text" value="{{$field_inventaire[$i]->id}}" name="old_id_champ[]" hidden>
                      </td>
                      <td>  <select name="old_type_champ[]" class="form-control" id="" required="">   
                        <option>sélectionner le type</option>
                        <option value="Date"  <?php if($field_inventaire[$i]->type_champs == "Date"){ echo 'selected';}?> >Date</option>
                         <option value="Text" <?php if($field_inventaire[$i]->type_champs == "Text"){ echo 'selected';}?>>Text</option>    
                        </select>
                      </td>
                        
                        <td>  
                          <div class="block_action_organigramme"> 
                            <a href="" onclick="removeRow_table_champs_add(event,<?php echo $i ?>,{{$field_inventaire[$i]->id}})">
                              <i class="fa-solid fa-circle-xmark "></i>
                            </a>      
                          </div> 
                        </td>
                      </tr>
                      <?php } ?>


                  </tbody>
                
               </table>
                
              
           </div>
            <div class="col-md-12 panel_add" style="    text-align: center;padding-bottom: 25px;">
              <button type="submit" class="btn btn-info btn_add ">
                
                Enregistrer</button>
            </div>
          </div>

       

         </div>

         

        </form>
      </div>



      
      <script src="{{asset('assets/js/iventaire.js')}}"></script>

@endsection
