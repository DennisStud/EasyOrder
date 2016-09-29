<?php

class Kategorie{
    
    public static function getAllKategories(){
        
       $stmt = DB::$dbh->prepare("Select bezeichnung from kategorie");   
       $stmt->execute();
        
        
    }
    
    
}
