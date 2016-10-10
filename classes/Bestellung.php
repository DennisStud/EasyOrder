<?php

/**
 * Description of Bestellung
 * beinhaltet Funktionen um eine Bestellung aufzugeben oder abzurufen 
 * @author Dennis
 */
class Bestellung {

    //Bestellung in die Datenbank eintragen
    public static function setBestellung($tischID, $gerichtID, $anzahl) {
        $stmt = DB::$dbh->prepare("INSERT INTO bestellung (bestell_id, gericht_id, anzahl, tisch_id) VALUES (NULL, :gericht_id, :anzahl, :tisch_id);");
        $stmt->bindValue(":tisch_id", $tischID);
        $stmt->bindValue(":gericht_id", $gerichtID);
        $stmt->bindValue(":anzahl", $anzahl);
        $stmt->execute();
    }

    //Bestellung aus der Datenbank auslesen
    public static function getBestellung($tischID) {
        $stmt = DB::$dbh->prepare("SELECT gericht.titel, gericht.einzelpreis, bestellung.anzahl FROM bestellung JOIN gericht WHERE bestellung.tisch_id=:tisch_id AND gericht.gericht_id= bestellung.gericht_id");
        $stmt->bindValue(":tisch_id", $tischID);
        $stmt->execute();

        $arrayspeisen = array(); //Rückgabearray vorbereiten
        while ($row = $stmt->fetch()) {
            array_push($arrayspeisen, $row);
        }
        return $arrayspeisen;
    }
    
    /*Lösche die Bestellungen des Tisches
    public static function delBestellung($bestellung) {
        $stmt = DB::$dbh->prepare("DELETE FROM bestellung WHERE tisch_id =:tischid");
        $stmt->bindvalue(":tischid", $tisch);
        $stmt->execute();
    }
     */

}
