<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Speisen
 *
 * @author T420
 */
class Speisen {
   
    public static function getSpeisen($kategorieid){
              
        $stmt = DB::$dbh->prepare("SELECT * FROM gericht WHERE kategorieid=:kateorieid");
        $stmt->bindValue(":kategorieid", $kategorieid);
        $stmt->execute();
        $arrayspeisen = array(); //Rückgabearray vorbereiten
        $i = 0;
        while ($row = $stmt->fetch()){ 
            $arrayspeisen[$i] = $row['bezeichnung'];
            $i = $i + 1;  
            
           
    }
      return $arrayspeisen;   
}
}