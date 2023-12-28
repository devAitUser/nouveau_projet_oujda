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

   .styled-table thead tr {
    background-color: #1d1d1d;

    }
    .panel-heading {
    width: 80% !important;
     }

     .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #ddd;
            vertical-align: unset !important;
        }

        .badge-warning {
                color: #212529;
                background-color: #ffc107;
        }
</style>



      <div class="panel-heading">   
        Les prets
     </div>
      <div class="panel_view_details">
        
         <div class="table_p">

            <div class="block_manager_datable">
                @if($permisssion_gestion_prets) 
                <a href="{{route('prets_create')}}" class="create_organi">Créer un nouveau </a>
                @endif
            </div>

            <table id="organigramme_table" class=" table table-bordered text-center styled-table">
               <thead>
                   <tr>
                       <th scope="col">Date</th>
                       <th scope="col">Nom d'utilisateur</th>
                       <th scope="col">Division</th>
                       <th scope="col">objet</th>
                       <th scope="col">status</th>
                       <th scope="col">Action  </th>




                   </tr>
               </thead>
               <tbody>

                   <tr>



                       <th scope="row"></th>




                       <td>
                           <a href="#" class="text-success mr-2">
                               <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                           </a>
                           <a href="#" class="text-danger mr-2">
                               <i class="nav-icon i-Close-Window font-weight-bold"></i>
                           </a>
                       </td>
                   </tr>


               </tbody>
           </table>

         </div>

         


      </div>

      <script type="text/javascript">
      var permisssion_validation_prêts = {!! json_encode($permisssion_validation_prêts) !!}
      var permisssion_gestion_prets = {!! json_encode($permisssion_gestion_prets) !!}
      </script>


      <script src="{{asset('assets/js/datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/prets.js')}}"></script>

@endsection
