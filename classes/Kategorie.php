<?php

/*
 * Description of Kategorie
 * beinhaltet Funktionen um alle Kategorien, eine einzelne Kategorie oder eine KategorieID aus der DB zu laden.
 * Ebenso eine Funktion, die eine neue Speise hinzufügt 
 * @author Dennis
 */
class Kategorie {
    
    //Lade alle Kategorien aus der DB
    public static function getAllKategorien() {
        $stmt = DB::$dbh->prepare("SELECT bezeichnung FROM kategorie");
        $stmt->execute();
        
        $arraykategorie = array(); //Rückgabearray vorbereiten
        $i = 0;
        while ($row = $stmt->fetch()) {
            $arraykategorie[$i] = $row['bezeichnung'];
            $i = $i + 1;
        }
        return $arraykategorie;
    }
    //Lade eine einzelne Kategorie
    public static function getKategorie($aktuellkategorieid) {

        $stmt = DB::$dbh->prepare("SELECT bezeichnung FROM kategorie WHERE kategorie_id = :katid");
        $stmt->bindvalue(":katid", $aktuellkategorieid);
        $stmt->execute();
        $arraykategorie = array(); //Rückgabearray vorbereiten
        $i = 0;
        while ($row = $stmt->fetch()) {
            $arraykategorie[$i] = $row['bezeichnung'];
            $i = $i + 1;
        }
        return $arraykategorie;
    }
    //Lade eine KategorieID
    public static function getKategorieID($kategorie) {
        $stmt = DB::$dbh->prepare("SELECT kategorie_id FROM kategorie WHERE bezeichnung = :kategorie");
        $stmt->bindvalue(":kategorie", $kategorie);
        $stmt->execute();

        return $stmt->fetch();
    }
    //Füge eine neue Kategorie hinzu
    public static function setKategorie($kategorie) {
        $stmt = DB::$dbh->prepare("INSERT INTO kategorie(kategorie_id, bezeichnung) VALUES (NULL,:kategorie)");
        $stmt->bindValue(":kategorie", $kategorie);
        $stmt->execute();
    }

}
