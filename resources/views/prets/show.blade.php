<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bordereau de consultation interne </title>

<style type="text/css">
   

</style>
<link rel="stylesheet" href="{{ asset('assets/css/prets.css') }}">
</head>
<body>


  <table width="100%" style='border: 1px solid;'>
    
   <tr class="f1">
      <td class="logobloc" style=""> <img style='position: relative; top: 20px;margin: 0 auto;margin-top: 20px;margin-bottom: 20px;' class="logo_anp" src="{{ asset('assets/img/anp.png') }}" alt=""> </td>
      <td class="class_title" style="border-bottom: 1px solid;">
      <h2  class="class_title_h2">Bordereau de consultation interne</h2 >   
      </td>
      
   </tr>

  


    <tr>
      <th colspan="2">  <div class="SUB_table"> <strong>Partie à remplir par l’entité versante</strong>  </div>  
 
       </th>
      </tr>

      <tr>
         <td colspan="2">  <div class="block_table"> Date de versement : {{$date}}   </div>  
    
          </td>
      </tr>
      <tr>
         <td colspan="2">  <div class="block_table"> Numéro de bordereau :  {{$prets['id']}}  </div>  
    
          </td>
      </tr>
      <tr>
         <td colspan="2">  <div class="block_table"> Division versante : {{$prets['division']}}  </div>  
    
          </td>
      </tr>
      <tr>
         <td colspan="2">  <div class="block_table"> Nom du responsable du versement : {{$prets['user']}} </div>  
    
          </td>
      </tr>
      <tr>
         <td colspan="2">  <div class="block_table" style="width: 50%;"> Poste téléphonique : {{$prets['telephone']}} </div>  
    
          </td>
      </tr>
      <tr>
       
         <td colspan="2">  <div class="block_table" style="width: 50%;">  Email : {{$prets['email']}} </div>  
   
         </td>
     </tr>
      <tr>
         <td colspan="2">   <div class="block_table"> Nombre de boîtes (si autre conditionnement, précisé) :  </div>  
    
          </td>
      </tr>

      <tr>
         <td>  <div class="block_table"> Analyse du versement :  </div>  
    
          </td>
      </tr>
    
         <tr>
            <td    colspan="2">  <div class="block_table" style="color: #909395;padding-bottom: 18px;"> Code du versement (Sigle de l’entité / N° séquentiel) :  </div>  
       
             </td>
         </tr> 


         <tr>
            <td class="footer_b" >  <div class="block_table"  style="width: 50%;">Chef de la division</div>  
       
             </td>
             <td class="footer_b" style="border-left: 1px solid;" >  <div class="block_table"  style="width: 50%;">Responsable des archives</div>  
         
               </td>
            </tr>
    

  </table>

 

 





  

</body>
</html>