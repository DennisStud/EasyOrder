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
    public static function getGericht($Titel) {

        $stmt = DB::$dbh->prepare("SELECT Titel, Einzelpreis FROM gericht WHERE gericht_id =:titel");
        $stmt->bindValue(":titel", $Titel);
        $stmt->execute();
        $gerichtid = $stmt->fetch();


        return $gerichtid;
    }

    public static function getGerichtID($GerichtID) {

        $stmt = DB::$dbh->prepare("SELECT gericht_id FROM gericht WHERE titel =:gerichtid");
        $stmt->bindValue(":gerichtid", $GerichtID);
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

    //Löschen eines Gerichtes
    public static function delGericht($Gericht_ID) {
        $stmt = DB::$dbh->prepare("DELETE FROM gericht WHERE gericht_id = :gerichtid");
        $stmt->bindvalue(":gerichtid", $Gericht_ID);
        $stmt->execute();
    }

    //Löschen eines Gerichtes
    public static function delGerichtbykat($kategorieID) {
        $stmt = DB::$dbh->prepare("DELETE FROM gericht WHERE kategorie_id = :kategorieID");
        $stmt->bindvalue(":kategorieid", $kategorieID);
        $stmt->execute();
    }

}
