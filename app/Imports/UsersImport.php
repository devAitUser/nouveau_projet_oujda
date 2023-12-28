<?php

namespace App\Imports;

use App\Models\Value_field;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Field_table_inventaire;  
use Illuminate\Http\Request;




class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    protected $inventaireId;
    protected $champs;


    
    public function __construct($inventaireId, $champs)
    {
         $this->inventaireId = $inventaireId;
        $this->champs = $champs;
    }


    public function collection(Collection $rows)
    {
        
     
        $all_data = array();


        $table_inventaires = Field_table_inventaire::where(["inventaire_id" => $this->inventaireId ])->get();

        foreach ($table_inventaires as $value) {

            $atts = Value_field::where(["id_field_inventaire" =>  $value->id ])->get();

            foreach ($atts as $att) {
               $att1[] = $att->value;
            }

            $all_data[] = $att1;
            unset($att1);

        }


       
       


       $erreur = array();
       

        for ($i=0; $i < count($rows) ; $i++) { 
            $collection = array_values($rows[$i]->toArray());
            if (in_array($collection, $all_data))
            {
                $erreur[] = $i+2;
            }
            else
            {

                $newLine = new Field_table_inventaire();
                $newLine->inventaire_id = $this->inventaireId;
                $newLine->save();

                foreach ($rows[$i] as $key => $value) {
                            if($key == 'date' ||  $key == 'date2'||  $key == 'date3'||  $key == 'date4' ){
                                $date = $value;
            
                                if (preg_match("/^\d{5}$/", $date)) {
                                    $value_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('d-m-Y') ;
                                    $newName = new Value_field();
                                    $newName->value = $value_date;
                                    $newName->id_field_inventaire = $newLine->id;
                                    $newName->save();
                
                                }else {
                                    $newName = new Value_field();
                                    $newName->value = $value;
                                    $newName->id_field_inventaire = $newLine->id;
                                    $newName->save();
            
                                }
            
                            } else {
            
                                $newName = new Value_field();
                                $newName->value = $value;
                                $newName->id_field_inventaire = $newLine->id;
                                $newName->save();
            
                            }
                            
                }
                
               
            }
        }

    
       


        // foreach ($rows as $row) {
        //     $newLine = new Field_table_inventaire();
        //     $newLine->inventaire_id = $this->inventaireId;
        //     $newLine->save();



        //     foreach ($row as $key => $value) {
        //         if($key == 'date' ||  $key == 'date2'||  $key == 'date3'||  $key == 'date4' ){
        //             $date = $value;

        //             if (preg_match("/^\d{5}$/", $date)) {
        //                 $value_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('d-m-Y') ;
        //                 $newName = new Value_field();
        //                 $newName->value = $value_date;
        //                 $newName->id_field_inventaire = $newLine->id;
        //                 $newName->save();
    
        //             }else {
        //                 $newName = new Value_field();
        //                 $newName->value = $value;
        //                 $newName->id_field_inventaire = $newLine->id;
        //                 $newName->save();

        //             }

        //         } else {

        //             $newName = new Value_field();
        //             $newName->value = $value;
        //             $newName->id_field_inventaire = $newLine->id;
        //             $newName->save();

        //         }
                
        //     }
        // }


     
  


        //  $data = Field_table_inventaire::where(["inventaire_id" => $this->inventaireId ])->get();


        //  $line1 = $data[0]->id;

        //  $att = Value_field::where(["id_field_inventaire" =>  $line1 ])->get();





        // echo $att;



        // Tableau 1


       

        if ($erreur) {
            echo 'les lignes suivant répéter :';
            echo '<br>';
            for ($i=0; $i < count($erreur) ; $i++) { 
                echo  "La ligne : ". $erreur[$i];
                echo '<br>';
            }
           
        }
     
    
        echo 'Importation réussie.';
    }         

    


    }






