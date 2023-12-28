        function demande_rejeter(e,dossier_id,id_request ) {
   
          e.preventDefault();

          if(confirm('Êtes-vous sûr?')) {
            var decision = "rejeter"


            $.ajax({
              url:APP_URL+"/request_decision_user",
              method:"POST",
              data:{
                dossier_id : dossier_id,
                id_request : id_request,
                decision   : decision  ,
              },
              success:function(data){


                if(data.etat){
                      $('#organigramme_table').DataTable().destroy();
                      fill_table()
                }
            

              }
            })
           }
             




        }


        function click_show(e,row) {
             
          e.preventDefault();
          var id =row
      
          var url =APP_URL+'/url_dossier/' + row ;
      
          window.open(url,'_blank');
      
      
      
      
      } 


  function accepeter_demande(e,dossier_id,id_request ) {
             
    e.preventDefault();
    if(confirm('Êtes-vous sûr?')) {

             var decision = "accepter"


            $.ajax({
              url:APP_URL+"/request_decision_user",
              method:"POST",
              data:{
                dossier_id : dossier_id,
                id_request : id_request,
                decision   : decision  ,
              },
              success:function(data){


                if(data.etat){

                  

                      $('#organigramme_table').DataTable().destroy();
                      fill_table()
                      

                
                                          
                  
                      alert('supprimer avec succes');
                    

                }
            

              }
            })


          }




}

  function fill_table(){


    var button_delete = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>';

        button_delete += '</svg>';



    var button_show   = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line>';

    

      button_show  += '</svg>';


      var button_show1   = '  <svg width="26px" height="26px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title>folder--details</title><rect x="16" y="20" width="14" height="2"/><rect x="16" y="24" width="14" height="2"/><rect x="16" y="28" width="7" height="2"/><path d="M14,26H4V6h7.17l3.42,3.41.58.59H28v8h2V10a2,2,0,0,0-2-2H16L12.59,4.59A2,2,0,0,0,11.17,4H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H14Z"/><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/></svg>';






    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax({
        'url': APP_URL+"/api_request_delete_dossier",
        'method': "GET",
        'contentType': 'application/json'
    }).done( function(data) {
        $('#organigramme_table').dataTable( {
            "aaData": data,
            "bInfo" : false,
            "lengthChange": false,
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button>Click!</button>',
                },
            ],
            
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
             
                { "data": "name_user"  },
                { "data": "motif"  },
                { "data": "date"  },
                { "data": "dossier_id"  , render: function(data, type, row) {
                  return '<button class="btn btn-warning" style="padding: 3px 5px;" type="button"  onclick="click_show(event,' + data + ' )"  >'+button_show1+'</button>' } 
                },
                { "data": "dossier_id"  , render: function(data, type, full, meta) {
                    return '<button type="button" class="btn btn-danger mr-3 " onclick="demande_rejeter(event , ' + full['dossier_id'] + ' , ' + full['id'] + ' )"  >'+button_show+'</button><button type="button" class="btn btn-primary"   onclick="accepeter_demande(event,' + full['dossier_id'] + ' , ' + full['id'] + ' )" >'+button_delete+'</button>' } 
                }

                 
                ]

		


        })
   
    })

}


$(document).ready(function() {
     
    fill_table();

 } );