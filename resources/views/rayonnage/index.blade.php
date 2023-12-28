@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>

	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">


<style>
  .panel_pop_up {
      display: block;
    
  }
</style>

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
   .panel-heading {
    width: 80% !important;
    background-color: #2b7239;
   }
   table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
    
        text-transform: uppercase;
    }
  
    .create_organi{
    background-color: #2b7239;
    color: #ffffff;
    }
    .create_organi:hover{
      color: #010101;
      background-color: #2b7239a7
    }
</style>

<script type="text/javascript">
      var id_salle = {!! json_encode($id) !!}
      
      </script>
    
      <div class="panel-heading">  Les rayonnages de la salle  </div>
      <div class="panel_view_details">
         <div class="table_p">

            <div class="block_manager_datable">
                <a href="#" class="create_organi" aria-label="Close" data-toggle="modal" data-target="#exampleModal">creer un nouveau </a>
            </div>

            <table id="organigramme_table" class=" table table-bordered text-center styled-table">
               <thead>
                   <tr style="background-color: #2b7239a7; ">
                      
                       <th scope="col">Numero rayonnage</th>
                       <th scope="col">Nombre traves</th>
                       <th scope="col">Nombre niveau</th>
                       <th scope="col">Nombre conteneur</th>
                       <th scope="col">Nombre boite</th>

                       <th scope="col">Cote topographique</th>
                       <th scope="col">Action  </th>




                   </tr>
               </thead>
               <tbody>

                   <tr>
                       <th scope="row"></th>



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







  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form  method="post" action="{{url('rayonnage_store')}}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Créer un nouvelle salle</h5>
          <button type="button" class="close" data-dismiss="modal" >

          </button>
        </div>
        <div class="modal-body">
        <div class="panel_pop_up">


        <div class="form-group">
          <label for="nom_organigramme"> Numero de rayonnage*  </label>
          <input type="text" class="form-control" name="num_rayonnage"  id="num_rayonnage"  placeholder="Nom du plan de classement" required="">

        </div>

        <div class="form-group">
          <label for="nom_organigramme"> Nombre de travers* </label>
          <input type="text" class="form-control" name="nbr_travers"  id="nbr_travers"  placeholder="Nom du plan de classement" required="">

        </div>

        <div class="form-group">
          <label for="nom_organigramme"> Nombre de niveau* </label>
          <input type="text" class="form-control" name="nbr_niveau"  id="nbr_niveau"  placeholder="Nom du plan de classement" required="">

        </div>


        <div class="form-group">
          <label for="nom_organigramme"> Nombre de conteneur* </label>
          <input type="text" class="form-control" name="nbr_conteneur"  id="nbr_conteneur"  placeholder="Nom du plan de classement" required="">

        </div>
        <div class="form-group">
          <label for="nom_organigramme"> Nombre de boite* </label>
          <input type="text" class="form-control" name="nbr_boite"  id="nbr_boite"  placeholder="Nom du plan de classement" required="">

        </div>

        <input type="text" value="{{$id}}" name='id_salle' hidden>







        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
        </form>
      </div>
    </div>
  </div>


   <!-- Modal COTE TOPOGRAHIQUE -->
  <div class="modal fade" id="cote_topograhique" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form  method="post" action="{{url('salle_store')}}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Les cote topograhiques</h5>
          <button type="button" class="close" data-dismiss="modal" >

          </button>
        </div>
        <div class="modal-body">
            <div class="panel_pop_up">


                    <div class="form-group">
                      <label for="nom_organigramme"> Les cote topograhiques  </label>
                   
                      <select name="" id="select_cote_topographique" class="form-control" >

                      </select>
                    </div>

                

               





            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

        </div>
        </form>
      </div>
    </div>
  </div>


















   <script src="{{asset('assets/js/datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/rayonnage.js')}}"></script>

@endsection
