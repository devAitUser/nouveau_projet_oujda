


$(document).ready(function() {

  var count_page =  $('#count_projet').val();
  var count =0;


  if(count_page >0){
    count=count_page;
  }



  $('#select_inventaire').select2();

  $('#select_project').select2();

  var cpt =0;
 


  $('#select_project').on("removed", function(e) {
    

    $("#row"+e.val).remove();
    count--;
    
  });
  

  



  

  $('#select_project').on('select2-selecting', function (e) {

    var id_select = e.object.id;
    var text_select = e.object.text;

    console.log(text_select)

      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: APP_URL+"/fill_drop_down_dossier",
        method:"post",
        data:{
          organigramme_id : id_select
        },
        dataType: "json",
        success: function(data) {
          
          var new_count =0;
       
          new_count =parseInt(count)+1;


          var btn = '<div class="button-container">';

          btn += '<button class="btn_select" type="button"  id="btn_'+id_select+'"   onclick="selectAll'+id_select+'()">Tout sélectionner</button>';
          btn += ' <button class="btn_select" type="button" id="btn1_'+id_select+'" onclick="deselectAll'+id_select+'()"> Tout déselectionner</button>';
          btn += ' </div>';

          var row = '<div id="row'+id_select +'" class="row mb-3">'
           row += '<input type="text" value="'+id_select+'" name="organigramme_id[]" hidden><label for="select_tree'+id_select+'" class="col-md-4 col-form-label text-md-end">Les Dossiers a Consulter dans  <strong> '+text_select+' </strong>  </label>'
           row += '<div class="col-md-6">'+btn
           row += '<select id="select_tree'+id_select+'"  multiple="multiple" class="form-control"  name="dossiers'+id_select+'[]">'
           row += '</select> </div>'
          
         


           row += ' </div>'
         
        
      

           $(".row_project_panel").append(row);
           
           $('#select_tree'+id_select).select2({
           
            width: "100%"
           });
           
           $('#select_tree'+id_select).html(data);
           $('#select_tree_up_'+id_select).select2({
           
            width: "100%"
           });
           
           $('#select_tree_up_'+id_select).html(data);
           count++;


         

            $("#btn_"+id_select).click(function(){
              $("#select_tree"+id_select+" > option").prop("selected", true);
              $("#select_tree"+id_select).trigger("change");
            }); 

            $("#btn1_"+id_select).click(function(){
              $("#select_tree"+id_select+" > option").prop("selected", false);
              $("#select_tree"+id_select).trigger("change");
            }); 

           
          
  
        }
      })
   });



  


      



});





