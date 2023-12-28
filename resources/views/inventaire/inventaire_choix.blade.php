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
        table {
         margin-bottom: 15px;
   }
   form {
    WIDTH: 50%;
    margin: 0 auto;
   }
</style>



      <div class="panel-heading">   
        Inventaire de {{$name_inventaire}}
     </div>
      <div class="panel_view_details">
         <div class="table_p">

          <div class="card border mb-3">
            <div class="row">
               <div class="col-md-10 pr-0">
                  <div class="card-header">Selectionner   </div>
               </div>
               <div class="col-md-2 pl-0">
                  <div class="card-header"></div>
               </div>
            </div>
            <!----> 
            <div class="card card-body ">
              
               <form method="post"  action="{{route('choix_inventaires')}}"> 
                @csrf
                


              

               <table>
                  <tr>
                     <td style="font-size: 15px;">
                     l'inventaire :
                     </td>
                     <td >
                        <select  style="font-size: 15px;" name="choix_inventaire" id=""  class="form-select">
                           <option value=""  >Selectionner</option>
                           @foreach ($inventaires as $inventaire)
                           <option value="{{$inventaire->id}}">{{$inventaire->nom}}</option>  
                           @endforeach
                           
                        </select>
                     </td>
                  </tr>

               </table>
           
               
                  
                  <button style=" display: block;margin: 0 auto;" type="submit" class="btn btn-info  ">Valider</button>
             
               </div>
              </form>
            </div>
         
         </div>

            

         </div>

         


      </div>



      
   

      

      <script src="{{asset('assets/js/datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/dossier_table_iventaire.js')}}"></script>
      <script src="{{asset('assets/js/iventaire.js')}}"></script>

@endsection
