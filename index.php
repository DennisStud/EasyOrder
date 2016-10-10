<?php

//Beginn der Session
session_start();

//Klassenloader
require_once 'classes/DB.php';
require_once 'classes/Login.php';
require_once 'classes/Utility.php';
require_once 'classes/Benachrichtigung.php';
require_once 'classes/Kategorie.php';
require_once 'classes/Speisen.php';
require_once 'classes/Bestellung.php';

//Datenbankzugriff initialisieren
DB::init();

//Wenn kein Wert für den Parameter action angegeben ist, wird auf die Login-Seite geleitet
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$_SESSION['count'] = 0;

//Übergebene Seite aus dem Parameter action wird geladen
switch ($action) {

    //Wird beim Login-Versuch aufgerufen
    case "do_login":

        //Eingaben aus dem Formular laden
        $username = $_POST['input_benutzername'];
        $passwort = $_POST['input_passwort'];
        $rolle = $_POST['dropdown_user'];

        //Wenn Login erfolgreich, weiterleiten zur Startseite
        if (Login::versucheLogin($username, $passwort, $rolle)) {
            Utility::redirect("index.php?action=start");
        }

        //Bei fehlerhafter Anmeldung, Aufruf der Login-Seite mit Hinweis auf gescheiterten Versuch
        else {
            Benachrichtigung::addBenachrichtigung("Die Anmeldung war nicht erfolgreich, Benutzername oder Passwort sind fehlerhaft.", "danger");
            Utility::redirect("index.php?action=home");
        }

    // Startseite mit Begrüßung des Gastes und Übersicht über die Funktionen
    case "start": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            include 'view/startseite.php';
            break;
        }

    // Seite mit Übersicht über die Kategorien der Speisekarte
    case "meals": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            //Aufruf der ausgewählten Kategorie

            if (isset($_GET['aktuellkategorieid'])) {
                $aktuellkategorieid = $_GET['aktuellkategorieid'];
            } else {
                $tmp = Kategorie::getAllKategorien();
                $aktuellkategorieid = $tmp[0][0];
            }
            include 'view/speisekarte.php';
            break;
        }


    //Entgegennehmen der Bestellung und Weiterleiten zur Bestellübersicht
    case "order": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }

            $aktuellkategorieid = $_GET['aktuellkategorieid'];

            //Lade Bestellung
            foreach ($_POST as $inputName => $value) { //dazu alle übergebenen Werte nacheinander prüfen
                if (strpos($inputName, "input_anzahl") !== FALSE) {
                    If (isset($value) and $value > 0) {
                        $gerichtid = substr($inputName, 12); //id aus dem inputNamen ziehen
                        $anzahl = $value;
                        Bestellung::setBestellung(Login::getTischId(), $gerichtid, $anzahl);
                        Benachrichtigung::addBenachrichtigung("Es wurden " . $anzahl . "x " . Speisen::getGericht($gerichtid)[0] . " bestellt!", "success");
                        Utility::redirect("index.php?action=meals&aktuellkategorieid=" . $aktuellkategorieid);
                    } else {
                        Benachrichtigung::addBenachrichtigung("Bitte geben Sie eine Anzahl ein!", "Danger");
                        Utility::redirect("index.php?action=meals&aktuellkategorieid=" . $aktuellkategorieid);
                    }
                }

                break;
            }
        }

    //Seite mit einer Übersicht über alle getätigten Bestellungen
    case "overview": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            $bestellung = Bestellung::getBestellung(Login::getTischId());
            $Gesamtsumme = 0;
            foreach ($bestellung as $Bestellung) {
                $Gesamtpreis = $Bestellung['einzelpreis'] * $Bestellung['anzahl'];
                $Gesamtsumme+= $Gesamtpreis;
            }

            include 'view/bestelluebersicht.php';
            break;
        }

    //Seite Beschreibung der Gaststätte
    case "about": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            include 'view/ueberuns.php';
            break;
        }

    //Konfigurationsseite zum Verwalten der Speisekarteneinträge
    case "konfig": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }

            include 'view/konfig.php';
            break;
        }

    //Erstellen einer neuen Kategorie
    case "kategorie_erstellen": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            if (isset($_POST['input_setkategorie'])) {
                $setkategorie = $_POST['input_setkategorie'];
                Kategorie::setKategorie($setkategorie);
            } else {
                Benachrichtigung::addBenachrichtigung("Geben Sie eine Kategorie ein!", "Danger");
            }
            include 'view/konfig.php';
            break;
        }

    case "kategorie_löschen": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            //Lösche die über das Dropdown-Feld ausgewählte Kategorie und alle zu dieser Kategorie gehörenden Gerichte
            if (isset($_POST['dropdown_delkategorie'])) {
                $delkategorieid = Kategorie::getKategorieID($_POST['dropdown_delkategorie']);
                Kategorie::delKategorie($delkategorieid[0]);
                Speisen::delGerichtbyKat($delkategorieid[0]);
            } else {
                Benachrichtigung::addBenachrichtigung("Alle Kategorien wurden gelöscht!", "Danger");
            }
            include 'view/konfig.php';
            break;
        }
    //Erstellen eines neuen Gerichts
    case "gericht_erstellen": {

            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            //Wenn die Inputfelder nicht leer sind, erstelle ein neues Gericht
            if (isset($_POST['input_settitel']) and isset($_POST['input_seteinzelpreis']) and $_POST['input_settitel'] !== "" and $_POST['input_seteinzelpreis'] !== "") {
                $setkategorieid = Kategorie::getKategorieID($_POST['dropdown_kategorie']);
                $settitel = $_POST['input_settitel'];
                $seteinzelpreis = $_POST['input_seteinzelpreis'];
                $setbeschreibung = $_POST['input_setbeschreibung'];
                Speisen::setGericht($setkategorieid, $settitel, $seteinzelpreis, $setbeschreibung);
            } else {
                Benachrichtigung::addBenachrichtigung("Geben Sie einen Titel und einen Preis für das zu erstellende Gericht an!", "danger");
            }
            include 'view/konfig.php';
            break;
        }
    //Löschen eines Gerichts  
    case "gericht_löschen": {

            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            //Lösche das im Dropdown-Feld ausgewählte Gericht
            if (isset($_POST['dropdown_delgericht'])) {
                $delgericht = Speisen::getGerichtID($_POST['dropdown_delgericht']);
                Speisen::delGericht($delgericht[0]);
            } else {
                Benachrichtigung::addBenachrichtigung("Alle Gerichte wurden gelöscht!", "danger");
            }
            include 'view/konfig.php';
            break;
        }

    //Weiterleitung wenn Bezahlvorgang eingeleitet wird
    case "warten": {

            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            //löschen der Bestellung
            $delbestellung = Login::getTischId();
            Bestellung::delBestellung($delbestellung);
            include 'view/warten.php';
            break;
        }
        
    //Login-View als Startseite
    default:
    case "home": {

            //Weiterleitung auf Startseite, wenn man bereits eingeloggt ist
            if (Login::isLoggedIn()) {
                Utility::redirect("index.php?action=start");
                break;
            }
            include "view/login.php";
            break;
        }
}


//Ende der Session
session_write_close();
