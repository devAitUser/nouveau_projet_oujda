

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