


$(document).ready(function() {


     
  $('#form_edit').on('submit', function(event){

   

    var pass=   $('#pass').val();
    var pass_confirm =   $('#pass_confirm').val();

    if(pass != '' ){

      if(pass_confirm != '' ){

        if(pass == pass_confirm){

        }else{
          event.preventDefault();
          alert('les mots de passe saisis ne sont pas identiques');
        }


      } else {

        event.preventDefault();

        alert('il faut remplire le champ Confirmer le mot de passe');
      }

    }



  } );

 } );