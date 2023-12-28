var check_parent = 'false';

 var all_dossiers = [];
 
 var type_btn = 'btn_dossier';


 function acceder_dossier(n_dossier){



  window.open(APP_URL+'/show_dossier/'+n_dossier);



 }

 function removeRow_table_champs_add_inventaire(e,row,id=null) {

  e.preventDefault();

  document.getElementById("row_table_champs_add_" + row).remove();




    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
     });

    $.ajax({
      url: APP_URL+"/delete_value_field",
      method:"POST",
      data:{
        items_delete : id
      },
      success:function(data){
  
        
  
    
    
  
      }
     })

  






}


function select_rayonnage(){
  
  var id_salle = $("#id_salle").val()

  var text_salle =   $("#id_salle option:selected").text();

  $("#salle_id").val(text_salle)

  $("#select_rayonnage_1").find('option').not(':first').remove();
  $("#select_code_topo").find('option').not(':first').remove();

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({ 
      url: APP_URL + "/fill_rayonnage",
      method: "post",
      data: {
          id_salle: id_salle ,
        
      },
      success: function(data) {
          $.each(data, function() {

              $("#select_rayonnage_1").append($("<option     />").val(this.id).text(this.n_r));
          });


      }
  })
}


function select_type_rayonnage(){
  
  var id_rayonnage = $("#select_rayonnage_1").val()

  var text_rayonnage =   $("#select_rayonnage_1 option:selected").text();

  $("#Rayonnage_id").val(text_rayonnage)

  $("#select_code_topo").find('option').not(':first').remove();

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({ 
      url: APP_URL + "/fill_code_topo",
      method: "post",
      data: {
          id_rayonnage: id_rayonnage ,
        
      },
      success: function(data) {
          $.each(data, function() {

              $("#select_code_topo").append($("<option     />").val(this.cote_topographique).text(this.cote_topographique));
          });


      }
  })
}




function removeRow_table_champs_add(e, row, id = null) {
  e.preventDefault();

  const confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?");

  if (confirmation) {
    document.getElementById("row_" + row).remove();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: APP_URL + "/delete_value_field_inventaire",
      method: "POST",
      data: {
        items_delete: row
      },
      success: function (data) {
      }
    });
  }
}





function unset_table() {

        $('#add_table_champs_add tr:not(:nth-child(-n+1))').remove();
        $(".block_attributs").addClass("hidden");

  }


  function type_champs(id,chosen) {

    if(chosen == "cote"){
       $('#input'+id).val(" Cote topographique ")
      
    }else {
      $('#input'+id).val("")
      
    }
   
    
  }







$(document).ready(function() {

  

        var id_get = 1;

        var tableLength = 1;
        var count = 1;


        var count_f = 1;


      
        

        


  

      
      $('.btn_add_oranigramme').on('click', function(event){

             event.preventDefault();
       
            count++;


        
            var add_row = '<tr id=row_table_champs_add_' + count + '  >';

      


            add_row += '<td><input id="input' + count + '" name="new_name_champ[]" class="form-control" type="text"   required></td>';

      
          

            add_row += '<td>  <select onChange="type_champs(' + count + ' ,this.options[this.selectedIndex].value)" name ="new_type_champ[]" class="form-control" id="" required> ';
            add_row += '  <option>sélectionner le type</option><option value="date">Date</option> <option value="Text">Text</option> <option value="cote"> Cote topographique </option>';
            add_row += '   </select></td>';
            add_row += '<td> <div class="form-check"> ';
            add_row += '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> </div> </td>';
            add_row += '<td>  <div class="block_action_organigramme"> ';
            add_row += '<a href="" onClick="removeRow_table_champs_add_inventaire(event,' + count + ')" ><i class="fa-solid fa-circle-xmark "></i></a>';
            add_row += '      </div> </td></tr>';
          
                



            if (tableLength > 0) {

                $("#add_table_champs_add tbody tr:last").after(add_row);
            }
            if (tableLength == 0) {

                $("#add_table_champs_add tbody ").append(add_row);
            }
            tableLength++;



       });

     



});





