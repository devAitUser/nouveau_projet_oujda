@extends('layouts.app')
@section('content')
<style>
    .table thead th{
    color: black;
    font-size: 15px;
    }
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
     background-color: #343a40;
 
     }
     .panel-heading {
     width: 80% !important;
      }
      .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
             border: 1px solid #ddd;
             vertical-align: unset !important;
         }
 
         table.table.table-striped {
          width: 75%;
          margin: 0 auto;
          margin-bottom: 15px;
       }
       .table_p {
     display: grid;
     }

     .btn_panel {
            text-align: center;
        }
     
 </style>




<div class="panel-heading">   
   <a class="link_organigramme" href="{{route('home')}}">
   <span class="material-icons">  home </span>  Home
   </a>
   <a class="title_profil" href="{{route('roles.index')}}">     \
   <span class=""> Roles </span> </a>
   <span class="title_profil">     \
   <span class=""> Ajouter nouveau role </span> </span>
</div>
<div class="panel_view_details">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="{{url('/roles_store')}}">
                    @csrf                    <div class="row mb-3 pt-5">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nom </label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control " name="name" value="" required="" autocomplete="name" autofocus="">
                                            </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-12">

                            <div class="row mb-3 pt-3">
                            <label for="permission" class="col-md-4 col-form-label text-md-end">Les Permissions</label>
                                <div class="col-md-6">

                                    

                                    @foreach($permissions as $permission)
                                    
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}
                                    <br>
                                    @endforeach 

                                   
                                    <br>
                                                                    </div>
                            </div>

                    </div>
                </div>
                <div class="container" style="">
             
                <div class="col-md-12 pb-5  ">







    

                    <div class="btn_panel">
                     
                        
                           <button type="submit" class="btn btn-primary  mr-3 ">Valider</button>
                         
                           <button type="reset" class="btn btn-danger">Annuler</button>
                    </div>
                 
                  </div>
                </div>
                </form>
            </div>
        </div>
        </div>
</div>
@endsection