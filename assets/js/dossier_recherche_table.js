



  function click_show(e,row) {
             
    e.preventDefault();
    var id =row

    var url =APP_URL+'/url_dossier/' + row ;


window.location = url



}

 
function showMe(e) {

    $('.input_champs').each(function (i, obj) {

      if(e.value != $(this).val() ){
        $(this).val('') ;
      }
          

  });


  }

$(document).ready(function() {



  var table = [];

  $('select').on('change', function() {


    var btn_add=  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">';

    btn_add +=  ' <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>';                 
    btn_add +=  '</svg>';    

      $.ajax({
        url:APP_URL+"/api_search_table",
        method:"POST",
        data:$(this).serialize(),
        success:function(data){

          $('#count_resultas').html(data.count_dossier);

      
        table.destroy();

        table
        .clear()
        .draw();
        table = $('#organigramme_table').DataTable( {
        
          columnDefs: [
            { targets: 0, width: '120px' },    
            { targets: 1, width: '130px' },
            { targets: 2, width: '270px' },
            { targets: 3, width: '160px' },
            { targets: 4, width: '100px' },
            { targets: 5, width: '100px' },{
              "targets": [3],
              "visible": false
            } ],
            
          fixedColumns: true,
          "aaData": data.all_dossiers ,
          "bInfo": false,
          order: [[0, 'desc']],
          "lengthChange": false,


          "paginate": {
              "first": "PremiÃ¨re",
              "last": "DerniÃ¨re",
              "next": "Suivante",
              "previous": "PrÃ©cÃ©dente"
          },
          
              "oLanguage": {
                  "sUrl": APP_URL+"/assets/fr-FR.json"
              },
            "columns": [
              
              { "data": "id"  },
              { "data": "date"  },
              { "data": "titre"  },
              { "data": "titre_fichier"  },

              { "data": "id"  , render: function(data, type, row) {
                return '<button class="btn btn-secondary"  type="button"  data-toggle="modal" data-target="#panel_entite"  >'+btn_add+'</button>' } 
            }  , 
           
              { "data": "id"  , render: function(data, type, row) {
                            return '<a class="btn btn-warning" style="padding: 3px 5px;"   onclick="click_show(event,' + data + ' )"  >'+button_show+'</a>' } 
                        },

               
            

            
          ]
        } );

        $('#organigramme_table tbody').on('click', 'button', function() {
          var data = table.row($(this).parents('tr')).data(); // getting target row data

          console.log(data)
          $('.insertHere').html(
            // Adding and structuring the full data
            '<table class="table dtr-details" width="100%"><tbody><tr><td> Titre <td><td>' + data.titre + '</td></tr><tr><td>Les pieces<td><td>' + data.titre_fichier + '</td></tr><tr><td>Date de creation <td><td>' + data.date + '</td></tr></tbody></table>'
          );
          $('#myModal').modal('show'); // calling the bootstrap modal
        });
        


        }
      })
   });

  

     
  var button_show   = '  <svg width="26px" height="26px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title>folder--details</title><rect x="16" y="20" width="14" height="2"/><rect x="16" y="24" width="14" height="2"/><rect x="16" y="28" width="7" height="2"/><path d="M14,26H4V6h7.17l3.42,3.41.58.59H28v8h2V10a2,2,0,0,0-2-2H16L12.59,4.59A2,2,0,0,0,11.17,4H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H14Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>';



       

        table = $('#organigramme_table').DataTable( {
          paging: true,
          order: [[0, 'desc']],
               "bInfo": false,
              "lengthChange": false,
              
      
      
              "paginate": {
                  "first": "PremiÃ¨re",
                  "last": "DerniÃ¨re",
                  "next": "Suivante",
                  "previous": "PrÃ©cÃ©dente"
              },
              "oLanguage": {
                  "sUrl": APP_URL+"/assets/fr-FR.json"
              },
        
              columnDefs: [
                { targets: 0, width: '120px' },    
                { targets: 1, width: '130px' },
                { targets: 2, width: '270px' },
                { targets: 3, width: '160px' },
                { targets: 4, width: '100px' },
                { targets: 5, width: '100px' },{
                  "targets": [3],
                  "visible": false
                } ],
          fixedColumns: true,
          "aaData": data,
          
          "columns": [
            
                    { "data": "id"  },
                    { "data": "date"  },
                    { "data": "titre"  },
                    { "data": "user"  },
                    { "data": "id"  , render: function(data, type, row) {
                                 return '<button class="btn btn-warning" style="padding: 3px 5px;" type="button"  onclick="click_show(event,' + data + ' )"  >'+button_show+'</button>' } 
                              }

              
            ]
        } );


       

        

        $('.btn_empty').click(function(e) {

          e.preventDefault();

          table.destroy();

          table
          .clear()
          .draw();

          table = $('#organigramme_table').DataTable( {
            paging: true,
            order: [[0, 'desc']],
            "bInfo": false,
           "lengthChange": false,

           "paginate": {
            "first": "PremiÃ¨re",
            "last": "DerniÃ¨re",
            "next": "Suivante",
            "previous": "PrÃ©cÃ©dente"
        },
        "language": langue_table,
           
            
        columnDefs: [
          { targets: 0, width: '120px' },    
          { targets: 1, width: '130px' },
          { targets: 2, width: '270px' },
          { targets: 3, width: '160px' },
          { targets: 4, width: '100px' },
          { targets: 5, width: '100px' },{
            "targets": [3],
            "visible": false
          } ],
            fixedColumns: true,
            "aaData": data,
            
            "columns": [
              
                      { "data": "id"  },
                      { "data": "date"  },
                      { "data": "titre"  },
                      { "data": "user"  },
                      { "data": "id"  , render: function(data, type, row) {
                                   return '<button class="btn btn-warning" style="padding: 3px 5px;" type="button"  onclick="click_show(event,' + data + ' )"  >'+button_show+'</button>' } 
                                }
  
                
              ]
          } );


           $('.input_champs').each(function (i, obj) {
         
            event.preventDefault();
      



            
              
            

            $.ajax({
              url:APP_URL+"/api_search_table",
              method:"POST",
              data:$(this).serialize(),
              success:function(data){
  
               console.log(data.all_dossiers)
  
  
            
               table.destroy();
         
               table
               .clear()
               .draw();
               table = $('#organigramme_table').DataTable( {
              
                columnDefs: [
                  { targets: 0, width: '120px' },    
                  { targets: 1, width: '130px' },
                  { targets: 2, width: '270px' },
                  { targets: 3, width: '160px' },
                  { targets: 4, width: '100px' },
                  { targets: 5, width: '100px' },{
                    "targets": [3],
                    "visible": false
                  } ],
                fixedColumns: true,
                 "aaData": data.all_dossiers ,
                 "bInfo": false,
                 order: [[0, 'desc']],
                 "lengthChange": false,
         
         
                 "paginate": {
                     "first": "PremiÃ¨re",
                     "last": "DerniÃ¨re",
                     "next": "Suivante",
                     "previous": "PrÃ©cÃ©dente"
                 },
                 "oLanguage": {
                     "sUrl": APP_URL+"/assets/fr-FR.json"
                 },
                   "columns": [
                     
                     { "data": "id"  },
                     { "data": "date"  },
                     { "data": "titre"  },
                     { "data": "user"  },
                     { "data": "id"  , render: function(data, type, row) {
                                  return '<button class="btn btn-warning" style="padding: 3px 5px;" type="button"  onclick="click_show(event,' + data + ' )"  >'+button_show+'</button>' } 
                               }
                   
       
                   
                 ]
               } );
               
  
  
              }
             })

            });

          $(".btn_empty").addClass("d_none");
       


        } );

        $('#search_form').on('submit', function(event){

          event.preventDefault();
      


          var btn_add=  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">';

          btn_add +=  ' <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>';                 
          btn_add +=  '</svg>';    
      
            
              
            

          $.ajax({
            url:APP_URL+"/api_search_table",
            method:"POST",
            data:$(this).serialize(),
            success:function(data){

             console.log(data.all_dossiers)


          
             table.destroy();
       
             table
             .clear()
             .draw();
             table = $('#organigramme_table').DataTable( {
            
              columnDefs: [
                { targets: 0, width: '120px' },    
                { targets: 1, width: '130px' },
                { targets: 2, width: '270px' },
                { targets: 3, width: '160px' },
                { targets: 4, width: '100px' },
                { targets: 5, width: '100px' },{
                  "targets": [3],
                  "visible": false
                } ],
              fixedColumns: true,
               "aaData": data.all_dossiers ,
               "bInfo": false,
               order: [[0, 'desc']],
               "lengthChange": false,
       
       
               "paginate": {
                   "first": "PremiÃ¨re",
                   "last": "DerniÃ¨re",
                   "next": "Suivante",
                   "previous": "PrÃ©cÃ©dente"
               },
               "oLanguage": {
                   "sUrl": "/assets/fr-FR.json"
               },
                 "columns": [
                   
                   { "data": "id"  },
                   { "data": "date"  },
                   { "data": "titre"  },
                   { "data": "user"  },
                   { "data": "id"  , render: function(data, type, row) {
                    return '<button class="btn btn-secondary"  type="button"  data-toggle="modal" data-target="#panel_entite"  >'+btn_add+'</button>' } 
                   }  , 
                   { "data": "id"  , render: function(data, type, row) {
                                return '<button class="btn btn-warning" style="padding: 3px 5px;" type="button"  onclick="click_show(event,' + data + ' )"  >'+button_show+'</button>' } 
                             }
                 
     
                 
               ]
             } );
             


            }
           })

                 $(".btn_empty").removeClass("d_none");
          
          

 
              
        });


        

  

 } );