



  function click_show(e,row) {
             
    e.preventDefault();
    var id =row

    var url =APP_URL+'/url_dossier/' + row ;

    window.open(url,'_blank');




}




$(document).ready(function() {
     
  var button_show   = '  <svg width="26px" height="26px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title>folder--details</title><rect x="16" y="20" width="14" height="2"/><rect x="16" y="24" width="14" height="2"/><rect x="16" y="28" width="7" height="2"/><path d="M14,26H4V6h7.17l3.42,3.41.58.59H28v8h2V10a2,2,0,0,0-2-2H16L12.59,4.59A2,2,0,0,0,11.17,4H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H14Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>';


 


  
  var t = $('#table').DataTable( {
        dom: 'Bfrtip', 
        "pageLength": 50,
        searching: true,
        "oLanguage": {
          "sUrl": APP_URL+"/assets/fr-FR.json"
        },
        buttons: [
        
          {
            extend: 'excel',
            title: "l'inventaire",
           
          },
          
        ]
    });


$('#field_form').on('submit', function(event){

        

          
  event.preventDefault();
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  
    $.ajax({
     url:APP_URL+"/store_inventaire_table",
     method:"POST",
     data:$(this).serialize(),
     success:function(data){


      var data_table = [];


      var add_row = '<tr>';
    
      

      for (i = 0; i < data.champs.length; i++) { 

           add_row += '<td>' + data.champs[i] + '      </td>';
           data_table.push(data.champs[i]);

      }
 
      data_table.push('<a href="" class="prevent-default" onClick="removeRow(event,1)" ><i class="fa-solid fa-circle-xmark text-danger text-19  font-weight-700 btn_close"></i></a>');
      add_row += '<td><a href="" class="prevent-default" onClick="removeRow(event,1)" ><i class="fa-solid fa-circle-xmark text-danger text-19  font-weight-700 btn_close"></i></a></td></tr>';
      $("#table tbody").append(add_row);


 

      t.row.add(data_table).draw(false);

      $("#btn_F").click();
   

      

     }
    })
 });
  

 } );