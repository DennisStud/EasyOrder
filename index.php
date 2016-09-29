<?php

//Beginn der Session
session_start();

//Klassenloader
require_once 'classes/DB.php';
require_once 'classes/Login.php';
require_once 'classes/Utility.php';
require_once 'classes/Benachrichtigung.php';

//Exceptionhandler, gibt Meldungen aus
function exception_handler($exception) {
    echo "Nicht aufgefangene Exception: ", $exception->getMessage(), "\n";
}

set_exception_handler('exception_handler');

//Datenbankzugriff initialisieren
DB::init();

//Wenn kein Wert für den Parameter action angegeben ist , wird auf die Login-Seite geleitet
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

        echo $username, $passwort;

        //Wenn erfolgreich, weiterleiten zur Spieleübersicht
        if (Login::versucheLogin($username, $passwort)) {
            Utility::redirect("index.php?action=start");
        }

        //Bei fehlerhafter Anmeldung Aufruf der Login-Seite mit Hinweis auf gescheiterten Versuch
        else {
            Benachrichtigung::addBenachrichtigung("Die Anmeldung war nicht erfolgreich, Benutzername oder Passwort sind fehlerhaft.", "danger");
            Utility::redirect("index.php?action=start");
            //Da der Login nicht funktioniert, wird auch bei falschem Passwort weitergeleitet
        }


    case "start":
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=gast_willkommen");
            break;
        }
        include "view/gast_ willkommen.php";
        break;

    case "meal":
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=gast_speisekarte");
            break;
        }
        include "view/gast_speisekarte.php";
        break;
        
    case "drinks":
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=gast_Getränkekarte");
            break;
        }
        include "view/gast_Getraenkekarte.php";
        break;

    case "invoice":
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=gast_rechnung");
            break;
        }
        include "view/gast_rechnung.php";
        break;
        
    case "about":
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=über_uns");
            break;
        }
        include "view/gast_ueberuns.php";
        break;



    //Login-View als Startseite
    default:
    case "home":

        //Weiterleitung auf Spieleübersicht, wenn man bereits eingeloggt ist
        if (Login::isLoggedIn()) {
            Utility::redirect("index.php?action=gast_willkommen");
            break;
        }
        include "view/konfig_login.php";
        break;
}

//Ende der Session
session_write_close();
