<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kategorie
 *
 * @author T420
 */
class Kategorie {
    
        public static function getAllKategorien(){
        
        $stmt = DB::$dbh->prepare("SELECT bezeichnung FROM kategorie") ;
        $stmt->execute();
        $arraykategorie = array(); //Rückgabearray vorbereiten
        $i = 0;
        while ($row = $stmt->fetch()){ 
            $arraykategorie[$i] = $row['bezeichnung'];
            $i = $i + 1;
        }
        return $arraykategorie;
    }
}
