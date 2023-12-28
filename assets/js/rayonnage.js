function remove_organigramme(e,row) {


                e.preventDefault();

       
  
                if(confirm('Êtes-vous sûr?')) {
  
                  $.ajax({
                    url:APP_URL+"/delete_rayonnage",
                    method:"POST",
                    data:{
                      items_delete : row
                    },
                    success:function(data){

                      

                        console.log(data.data)
  
                      if(data.etat){

                         

                            $('#organigramme_table').DataTable().destroy();
                            fill_organigramme()
                            

                       
                                                
                         
                            alert('supprimer avec succes');
                          
  
                       }
                  
              
                    }
                   })

                  }
  
  
  
  
  }


function click_edit(e,row) {
             
    e.preventDefault();
    var id =row

    location.href=APP_URL+'/organigramme/' + row + '/edit';





}


function cote_topo(e,row) {
             





$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: APP_URL+"/calcul_topo",
  method:"POST",
  data:{
    id_rayonnage : row,
  },


  success: function(data) {

   

    if (data == null){
      cote_topo(e,row)
      alert()
    }

    $("#select_cote_topographique").empty(); 

    $.each(data, function (){
      $("#select_cote_topographique").append($("<option     />").val(this.cote_topographique).text(this.cote_topographique));
    });
   


  }
})





}





function view_organigramme(e,row) {
             
  e.preventDefault();
  var id =row

  location.href=APP_URL+'/organigramme_view/' + row + '/edit';





}

  function fill_organigramme(){

   

   

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });

    $.ajax({
        'url': APP_URL+"/api_rayonnage/"+id_salle,
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
                { "data": "n_r"  },
                { "data": "n_traves"  },
                { "data": "n_niveau"  },
                { "data": "n_conteneur"  },
                { "data": "n_boite"  },
          
                { "data": "id"  , render: function(data, type, row) {
                  btn_print = ''
                  btn_print += '<button type="button" class="btn btn-primary" aria-label="Close" data-toggle="modal" data-target="#cote_topograhique" onclick="cote_topo(event,' + data + ' )"  >Voir</button>'
                
                return btn_print } 
                },
                { "data": "id"  , render: function(data, type, row) {
                      btn_print = ''
                      btn_print += '<button type="button" class="btn btn-danger mr-3 " onclick="remove_organigramme(event,' + data + ' )"  >Supprimer</button>'
                    
                    return btn_print } 
                }

                 
                ]

		


        })
   
    })

}


$(document).ready(function() {
     
    fill_organigramme();

 } );