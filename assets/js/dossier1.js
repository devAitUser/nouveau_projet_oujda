var count = 2;
var all_index = [];


var att_file = [];


var btn_cote = false;
var btn_vesion_numrique = false;




function load_name_File1(event, id_file) {


    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src+'#toolbar=1') // free memory
      console.log(output.src+'#toolbar=0&navpanes=0&scrollbar=0')
    }

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


function remove_file(event, id_file) {


    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: APP_URL + "/delete_file",
        method: "post",
        dataType: "json",
        data: {
          id_file:    id_file,
          id_dossier: $("#id_dossiers").val(),
        },
        success: function(data) {
         
            if(data.etat){
                window.location.href = $("#id_dossiers").val();
            }

           
           


        }
    })
}

function add_file() {
    document.getElementById("date_input_file").valueAsDate = new Date();

}


function fonction_checkbox(){
    if (document.getElementById('version_physique_btn').checked) 
    {
        
      
        $('#VERSION_PHYSIQUE').val('OUI');

        $("#row_salle").removeClass("d-none");
        $('#row_rayonnage').removeClass('d-none');
        $('#row_conteneur').removeClass('d-none');
        $('#row_boite').removeClass('d-none');
       
    } else 
    {
       $('#VERSION_PHYSIQUE').val('NON');
       
       $('#row_salle').addClass('d-none');
       $('#row_rayonnage').addClass('d-none');
       $('#row_conteneur').addClass('d-none');
       $('#row_boite').addClass('d-none');
    }
  }


function load_name_File(event, id_file) {
    event.preventDefault();

    let file = event.target.files[0].name

    const Array_file = file.split(".");
    let x = Array_file[0];

    $('#Objet_file'+id_file).val(file);
 


    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src + '#toolbar=1') // free memory
        console.log(output.src + '#toolbar=0&navpanes=0&scrollbar=0')
    }
   








}

 function btn_affiche_att_plus(){

 

    if(!btn_vesion_numrique){

        row_select1 = '<div id="row_COTE" class="col-md-12">';
        row_select1 += '<div class="form-group row">';
        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm"> COTE TOPOGRAPHIQUE :</label>';
        row_select1 += '<input type="text" name="nom_champ[]"  value="COTE TOPOGRAPHIQUE" class="d-none"> ';
        row_select1 += '<input type="text" name="id_champs[]"  value="00" class="d-none"> ';
        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none"> <div class="col-sm-6">';

         
        row_select1 += '<select id="id_salle" class="form-select" onchange="select_rayonnage()">';

       
       


        row_select1 += ' <option value="">selectionner</option>';

        row_select1 += ' </select>';

        row_select1 += '<select id="select_rayonnage_1" class="form-select" onchange="select_type_rayonnage()">';
        row_select1 += ' <option value="">selectionner</option>';

        row_select1 += ' </select>';

        row_select1 += '<select  id="select_code_topo" name="valeur[]" class="form-select" required>';

        row_select1 += ' <option value="">selectionner</option>';

        row_select1 += ' </select>';
    
    
        row_select1 += '</div></div>';
        row_select1 += '</div>';



        row_select1 += '<div id="row_boite" class="col-md-12">';
        row_select1 += '<div class="form-group row">';
        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm"> Numero boite   :</label>';
        row_select1 += '<input type="text" name="nom_champ[]"  value="COTE TOPOGRAPHIQUE" class="d-none"> ';
        row_select1 += '<input type="text" name="id_champs[]"  value="00" class="d-none"> ';
        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none"> <div class="col-sm-6">';
        row_select1 += '<input type="text" class="form-control" name="boite">';
    
        row_select1 += '</div></div>';
        row_select1 += '</div>';

        $("#attribut_plus").append(row_select1);



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({ 
                url: APP_URL + "/api_site",
                method: "get",
              
                success: function(data) {
                    $.each(data, function() {
        
                        $("#id_salle").append($("<option     />").val(this.id).text(this.site+'/'+this.ville));

                        
                    });
        
        
                }
         })


         btn_vesion_numrique = true ;
       

    }


    

        
   

    //  $("#att_plus_valid").empty();

}

function fermer_vesion_numrique(){
    btn_vesion_numrique= false;
    $("#attribut_file").empty();
}
function fermer_vesion_physique(){

    btn_vesion_numrique = false ;
    $("#attribut_plus").empty();
}

function btn_affiche_att_file(){

    if(!btn_vesion_numrique){

        $("#attribut_file").append(att_file);
        $("#attribut_file").addClass("attribut_file");
       // $("#att_file_valid").empty();
        //*********************************** */
        btn_vesion_numrique= true;
    }

 
    
}



function add_row_select(row) {

    var next = row + 1;

    var coordonnees = ['salle', 'rayonnage', 'conteneur', 'boite'];

    var id_select = $('#sous_select_' + row + ' option:selected').val();


    if (id_select == '') {

        var count_p = count;
        for (let i = next; i < count_p + 1; i++) {
            $("#row_" + i).remove();
            count = count - 1;
        }
        count++;

        $("#attribut_champ").empty();
        $("#attribut_file").empty();

    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        'async': false,
        url: APP_URL + "/fill_sous_dossier1",
        method: "get",
        data: {
            id_dossier: id_select
        },
        dataType: "json",
        success: function(data) {

           

            if ($.trim(data.dossier_champs)) {
            

                if (!$("#row_" + next).length) {




                    row_select = '<div id="row_' + count + '" class="col-md-12">';
                    row_select += '<div class="form-group row">';
                    row_select += ' <label for="colFormLabelSm" id="" class="col-sm-6 col-form-label col-form-label-sm sous_label_' + count + ' text-uppercase" >________ :</label>';
                    row_select += ' <input class="nom_champs_select_' + count + '" type="text" name="nom_champs_select[]" value="text" hidden> <div class="col-sm-6">';
                    row_select += ' <select class="form-select" id="sous_select_' + count + '" name="value_select[]" onchange="add_row_select(' + count + ')" > required';
                    row_select += '<option value="">Selectionne le dossier</option>';
                    $.each(data.dossier_champs, function() {
                        row_select += '<option value="' + this.id + '">' + this.nom_champs + '</option>';
                    });
                    row_select += '</select>';
                    row_select += '</div></div>';
                    row_select += '</div>';


                    $("#row_" + row).after(row_select);

                    $(".sous_label_" + next).html(data.dossier_champs_label + " :");

                    $(".nom_champs_select_" + next).val(data.dossier_champs_label);


                    $(".sous_label_" + next).html(data.dossier_champs_label + " :");

                    count++;

                } else {



                    $("#sous_select_" + next).find('option').not(':first').remove();

                    $.each(data.dossier_champs, function() {
                        $("#sous_select_" + next).append($("<option   />").val(this.id).text(this.nom_champs));
                    });
                    var tt = next + 1;
                    $("#sous_select_" + tt).find('option').not(':first').remove();
                    $(".sous_label_" + next).html(data.dossier_champs_label + " :");

                }
            } else {
                var count_pre = count;
                for (let i = next; i < count_pre + 1; i++) {
                    $("#row_" + i).remove();
                    count = count - 1;
                }
                count++;



            }


            if ($.trim(data.attribut_champ)) {

                $("#attribut_champ").empty();
                $("#attribut_file").empty();
                $("#att_file_valid").empty();


                all_index = data.all_index;
                var  row_select2 = '<div class="modal-dialog"><div class="modal-content"> <div class="modal-header">';
                row_select2 += "<h5 class='modal-title'>Disposez vous  d'une version numérique</h5>";
                row_select2 += ' <button type="button" class="btn-close btn_close" onclick="fermer_vesion_numrique()"></button> </div>';
                
                row_select2 += '<div class="modal-footer">';
                row_select2 += '<button type="button" class="btn btn-secondary btn_close" onclick="fermer_vesion_numrique()">non</button>';
                row_select2 += '<button type="button" class="btn btn-primary "  onclick="btn_affiche_att_file()"  >oui</button> </div></div></div>';
                row_select2 += '';
                $("#att_file_valid").append(row_select2);


                var  row_select3 = '<div class="modal-dialog"><div class="modal-content"> <div class="modal-header">';
                row_select3 += "<h5 class='modal-title'>Disposez vous  d'une version physique</h5>";
                row_select3 += ' <button type="button" class="btn-close btn_close" onclick="fermer_vesion_physique()"></button> </div>';
                
                row_select3 += '<div class="modal-footer">';
                row_select3 += '<button type="button" class="btn btn-secondary btn_close" onclick="fermer_vesion_physique()">non</button>';
                row_select3 += '<button type="button" class="btn btn-primary "  onclick="btn_affiche_att_plus()"  >oui</button> </div></div></div>';
                row_select3 += '';

                $("#att_plus_valid").append(row_select3);



                

                $.each(data.attribut_champ, function() {
                    if (this.type_champs == "Text") {
                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm">' + this.nom_champs + ' :</label>';
                        row_select1 += '<input type="text" name="nom_champ[]"  value="' + this.nom_champs + ' " class="d-none"> ';
                        row_select1 += '<input type="text" name="id_champs[]"  value="' + this.id + ' " class="d-none"> ';
                        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none"> <div class="col-sm-6">';
                        row_select1 += ' <input class="form-control" type="text" id="field_' + this.id + '" name="valeur[]" required>';


                        row_select1 += '</div></div>';
                        row_select1 += '</div>';



                        $("#attribut_champ").append(row_select1);
                    }
                    if (this.type_champs == "date") {
                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm">' + this.nom_champs + ' :</label>';
                        row_select1 += '<input type="text" name="id_champs[]"  value="' + this.id + ' " class="d-none"> ';
                        row_select1 += '<input type="text" name="nom_champ[]" value="' + this.nom_champs + ' " class="d-none"> ';
                        row_select1 += '<input type="text" name="type_champ[]" value="date" class="d-none"> <div class="col-sm-6">';
                        row_select1 += ' <input class="form-control" type="date" name="valeur[]" required>';

                        row_select1 += '';
                        row_select1 += '</div>';
                        row_select1 += '</div>';

                        $("#attribut_champ").append(row_select1);
                    }
                    if (this.type_champs == "Fichier") {
                        
                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm">' + this.nom_champs + ' :</label>';
                        row_select1 += '<input type="text" name="nom_champ_file[]" value="' + this.nom_champs + ' " class="d-none"> ';
                        row_select1 += '<div class="col-sm-6">';
                        row_select1 += ' <input  class="form-control controle_file" type="file" name="file[]" placeholder="Choose file" id="file" onchange="load_name_File(event,' + this.id + ');"> ';

                        row_select1 += '<input type="d-none" class="d-none" id="file_'+this.id+'" name="file_text[]" value="" >';
                        row_select1 += '<input id="Objet_file'+this.id+'" type="text" class="form-control"  name="text_objet[]" value="" >';
                        row_select1 += '<input id="date_file'+this.id+'"  type="date" class="form-control"  name="date_file[]" value="" >';
                        row_select1 += '</div></div>';
                        row_select1 += '</div>';

               
                        //$("#attribut_file").append(row_select1);




                        att_file.push(row_select1);
                        
                  
                        document.getElementById("date_file"+this.id).valueAsDate = new Date();

                    }

                    if (this.type_champs == "cote") {

                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += " <label for='colFormLabelSm' class=' text-uppercase col-sm-6 col-form-label col-form-label-sm'>Salle :</label>";
                        row_select1 += "<input type='text' name='nom_champ[]'  value='Salle' class='d-none'> ";
                        row_select1 += '<input type="text" name="valeur[]"   id="salle_id"  value="" class="d-none"> ';
                        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none" required> <div class="col-sm-6">';
        
                        row_select1 += '<select  id="id_salle" class="form-select" onchange="select_rayonnage()" >';
                        row_select1 += '<option value="">selectionner</option>';
                        $.each(data.salle, function() {
                            row_select1 += '<option value="' + this.id + '">' + this.site + " / " + this.numero_salle + '</option>';
                        });
             
                        row_select1 += ' </select>';
                    
        
                        row_select1 += '</div></div>';
                        row_select1 += '</div>';
        
           
        
                        $("#attribut_champ").append(row_select1);
        
        
                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += " <label for='colFormLabelSm' class=' text-uppercase col-sm-6 col-form-label col-form-label-sm'>Rayonnage :</label>";
                        row_select1 += "<input type='text' name='nom_champ[]'  value='Rayonnage' class='d-none'> ";
                        row_select1 += '<input type="text" name="valeur[]"   id="Rayonnage_id"  value="" class="d-none"> ';
                        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none" required> <div class="col-sm-6">';
        
                        row_select1 += '<select  id="select_rayonnage_1" class="form-select" onchange="select_type_rayonnage()" >';
        
                        row_select1 += '<option value="">selectionner</option>';
                        row_select1 += ' </select>';
                    
        
                        row_select1 += '</div></div>';
                        row_select1 += '</div>';
        
           
        
                        $("#attribut_champ").append(row_select1);
        
        
                        row_select1 = '<div id="" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += " <label for='colFormLabelSm' class=' text-uppercase col-sm-6 col-form-label col-form-label-sm'>Code topograhique :</label>";
                        row_select1 += "<input type='text' name='nom_champ[]'  value='Code topograhique' class='d-none'> ";
                       
                        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none" required> <div class="col-sm-6">';
        
                        row_select1 += '<select name="valeur[]" id="select_code_topo" class="form-select" onchange="" >';
        
                        
             
                        row_select1 += ' </select>';
                    
        
                        row_select1 += '</div></div>';
                        row_select1 += '</div>';
        
           
        
                        $("#attribut_champ").append(row_select1);
                        
                   

                    }

                    




                });


           

        

               


                    for (let index = 0; index < coordonnees.length; index++) {
                        var nom_champs = coordonnees[index];
            
                        row_select1 = '<div id="row_'+nom_champs+'" class="col-md-12">';
                        row_select1 += '<div class="form-group row">';
                        row_select1 += ' <label for="colFormLabelSm" class=" text-uppercase col-sm-6 col-form-label col-form-label-sm">'+nom_champs+' :</label>';
                        row_select1 += '<input type="text" name="nom_champ[]"  value="'+nom_champs+' " class="d-none"> ';
                        row_select1 += '<input type="text" name="id_champs[]"  value="" class="d-none"> ';
                        row_select1 += '<input type="text" name="type_champ[]" value="text" class="d-none"> <div class="col-sm-6">';
                        row_select1 += ' <input class="form-control" type="text" name="valeur[]" >';
                    
                    
                        row_select1 += '</div></div>';
                        row_select1 += '</div>';
            
                        $("#attribut_champ").append(row_select1);
                        
                    }


                        $('#row_salle').addClass('d-none');
                        $('#row_rayonnage').addClass('d-none');
                        $('#row_conteneur').addClass('d-none');
                        $('#row_boite').addClass('d-none');

                 




            } else {
                $("#attribut_champ").empty();
                $("#attribut_file").empty();
                $("#objet").empty();
                $("#attribut_file").removeClass("attribut_file");
            }




        }
    })


}


function fill_parent_dossier() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({ 
        url: APP_URL + "/fill_parent_dossier",
        method: "get",
        dataType: "json",
        success: function(data) {
            $.each(data, function() {

                $("#parent_select").append($("<option     />").val(this.id).text(this.nom_champs));
            });


        }
    })

}


function fill_entite() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: APP_URL + "/fill_entite",
        method: "get",
        dataType: "json",
        success: function(data) {
            $.each(data, function() {
                $("#entite_select").append($("<option     />").val(this.id).text(this.nom));
            });


        }
    })

}


$(document).ready(function() {


   

      

   


    $(".btn_project").click(function(){
        $(".btn_project").removeClass("active");
        $(this).addClass("active");
      });



      $(".btn_send").click(function(){
        var id_division =  $(".active").attr("id_division");
        var id_view =  $("#id_view").val();

   
       
      
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL+"/choose_project",
            method: "post",
            data: {
                projet_user: id_division ,
                id_view: id_view 
            },
            success: function(data) {

              

                switch(id_view) {
                    case "1":
                        window.location.href = APP_URL+ "/create_dossier";
                      break;
                    case "2":
                        window.location.href = APP_URL+ "/recherche_dossier";
                      break;
                    default:
                        window.location.href = APP_URL;
                        break;
                  }
            

               

         

            }
        })


      });




    $(document).ajaxStart(function() {
        $("#ajax_call").show();
    });

    $(document).ajaxStop(function() {
        $("#ajax_call").hide();
    });



    $("#ajax_call").hide();


    $(".btn1").click(function() {
        $("#ajax_call").hide();
    });

    $(".btn1").click(function() {
        $("#ajax_call").hide();
    });
    $(".add_fichier").click(function() {
      
      var option = $(this).attr('id_champs');
          $('#id_champs_f').val(option);
          
    });



   
    fill_entite()

    $('#entite_select').on('change', function() {
        var id_select = $('#entite_select option:selected').val();

        if (id_select == '') {

            var count_p = count;




            var next = 2;

            for (let i = next; i < count_p + 1; i++) {
                $("#row_" + i).remove();
                count = count - 1;
            }
            count++;

            $("#parent_select").find('option').not(':first').remove();
            $("#sous_select_1").find('option').not(':first').remove();
            $(".sous_label_1").html('________ :');

            $("#attribut_champ").empty();
            $("#attribut_file").empty();

        }


     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: APP_URL + "/fill_parent_dossier",
          method: "get",
          dataType: "json",
          data: {
            id_entite: id_select
          },
          success: function(data) {
            $("#parent_select").find('option').not(':first').remove();
              $.each(data, function() {
  
                  $("#parent_select").append($("<option     />").val(this.id).text(this.nom_champs));
              });
  
  
          }
      })

    });


    $('#parent_select').on('change', function() {
        var id_select = $('#parent_select option:selected').val();

        if (id_select == '') {

            var count_p = count;




            var next = 2;

            for (let i = next; i < count_p + 1; i++) {
                $("#row_" + i).remove();
                count = count - 1;
            }
            count++;

            $("#sous_select_1").find('option').not(':first').remove();

            $(".sous_label_1").html('________ :');

            $("#attribut_champ").empty();
            $("#attribut_file").empty();

        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + "/fill_sous_dossier",
            method: "get",
            data: {
                id_dossier: id_select
            },
            dataType: "json",
            success: function(data) {




                $("#sous_select_1").find('option').not(':first').remove();
                $(".sous_label_1").html(data.dossier_champs_label + " :");
                $(".nom_champs_select_1").val(data.dossier_champs_label);
                $.each(data.dossier_champs, function() {
                    $("#sous_select_1").append($("<option   />").val(this.id).text(this.nom_champs));
                });


                $("#attribut_champ").empty();
                $("#attribut_file").empty();
                $("#objet").empty();
                $("#attribut_file").removeClass("attribut_file");


                var count_pre = count;
                for (let i = 2; i < count_pre + 1; i++) {
                    $("#row_" + i).remove();
                    count = count - 1;
                }
                count++;




            }
        })

    });




    $('#sous_select').on('change', function() {




    });


    $('.btn_add_attributs_click').click(function(e) {

        e.preventDefault();
        $(".block_attributs").removeClass("d-none");



    });


    $('.printclass1').click(function(e) {

        e.preventDefault();
 


        var restorepage = $('body').html();
        var printcontent = $('.table_p').clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);

        var text = 'Impression du Dossier'
        var id_dossier = $('#id_dossier').val();

     




    });



    $('.printclass').click(function(e) {

        e.preventDefault();


        var restorepage = $('body').html();
        var printcontent = $('#id_table_print').clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);

        var text = 'Impression du Dossier'
        var id_dossier = $('#id_dossier').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + "/historique_dossier",
            method: "post",
            data: {
                text: text,
                id_dossier: id_dossier
            },
            success: function(data) {
                $.each(data, function() {

                    $("#parent_select").append($("<option     />").val(this.id).text(this.nom_champs));
                });


            }
        })




    });




    




});