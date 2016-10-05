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
            include 'view/startpage.php';
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
                $aktuellkategorieid = '1';
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
            //Lade Bestellung
            foreach ($_POST as $inputName => $value) { //dazu alle übergebenen Werte nacheinander prüfen
                if (strpos($inputName, "input_anzahl") !== FALSE) {
                    $gerichtid = substr($inputName, 12); //id aus dem inputNamen ziehen
                    $anzahl = $value;
                    Bestellung::setBestellung(Login::getTischId(), $gerichtid, $anzahl);
                }
            }
            include 'view/bestelluebersicht.php';
            break;
        }
    //Seite mit einer Übersicht über alle getätigten Bestellungen
    case "overview": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
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

    //Konfigurationsseite zum Verwalten der Speisekarte
    case "konfig": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }

            include 'view/konfig.php';
            break;
        }

    //Erstellen einer neuen Kateforie
    case "kategorie_erstellen": {
            //Weiterleitung zur Startseite, falls nicht eingeloggt
            if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
            }
            if (!$_GET['input_setkategorie'] == NULL) {
                $setkategorie = $_POST['input_setkategorie'];
                Kategorie::setKategorie($setkategorie);
            }
        }
    //Erstellen eines neuen Gerichts
    case "gericht_erstellen": {


            if (!$_POST['input_settitel'] == NULL && !$_POST['input_seteinzelpreis'] == NULL && !$_POST['input_setbeschreibung'] == NULL) {
                $setkategorieid = Kategorie::getKategorieID($_POST['dropdown_kategorie']);
                $settitel = $_POST['input_settitel'];
                $seteinzelpreis = $_POST['input_seteinzelpreis'];
                $setbeschreibung = $_POST['input_setbeschreibung'];
                Speisen::setGericht($setkategorieid, $settitel, $seteinzelpreis, $setbeschreibung);
            }

            include 'view/konfig.php';
            break;
        }
    //Login-View als Startseite
    default:
    case "home": {

            //Weiterleitung auf Spieleübersicht, wenn man bereits eingeloggt ist
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
