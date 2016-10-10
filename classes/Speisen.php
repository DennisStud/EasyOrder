<?php

/**
 * Description of Speisen
 * beinhaltet Funktionen um alle Speisen oder ein einzelnes Gericht aus der DB zu laden.
 * Ebenso eine Funktion, die eine neue Speise hinzufügt
 * @author Dennis
 */
class Speisen {

    // Laden der Speisekarteneinträge aus der Datenbank
    public static function getSpeisen($kategorieid) {

        $stmt = DB::$dbh->prepare("SELECT gericht_id, Titel, Beschreibung, Einzelpreis FROM `gericht` WHERE kategorie_id =:kategorieid");
        $stmt->bindValue(":kategorieid", $kategorieid);
        $stmt->execute();
        $arraybestell = array(); //Rückgabearray vorbereiten
        $i = 0;
        while ($row = $stmt->fetch()) {
            $arraybestell[$i] = $row;
            $i++;
        }
        return $arraybestell;
    }

    //Laden eines einzelnen Gerichts
    public static function getGericht($Gericht_ID) {

        $stmt = DB::$dbh->prepare("SELECT Titel, Einzelpreis FROM gericht WHERE gericht_id =:gerichtid");
        $stmt->bindValue(":gerichtid", $Gericht_ID);
        $stmt->execute();

        $arraygericht = $stmt->fetch();

        return $arraygericht;
    }

    //Hinzufügen eines weiteren Gerichts
    public static function setGericht($kategorieid, $titel, $einzelpreis, $beschreibung) {
        $stmt = DB::$dbh->prepare("INSERT INTO gericht(gericht_id, kategorie_id, Titel, Einzelpreis, Beschreibung) VALUES (NULL,:kategorieid,:titel,:einzelpreis,:beschreibung)");
        $stmt->bindValue(":kategorieid", $kategorieid[0]);
        $stmt->bindValue(":titel", $titel);
        $stmt->bindValue(":einzelpreis", $einzelpreis);
        $stmt->bindValue(":beschreibung", $beschreibung);
        $stmt->execute();
    }
    
    /*löschen eines Gerichtes
     *  public static function delGericht ($kategorieid, $titel) {
     *      $stmt = DB::dbh->prepare("DELETE FROM gericht WHERE gericht_id = :gerichtid");
     *      $stmt->blindvalue(":gerichtid", $Gericht_ID);
     *      $stmt->execute();
     */

}
