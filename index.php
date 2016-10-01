<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

//Beginn der Session
session_start();

//Klassenloader
require_once 'classes/DB.php';
require_once 'classes/Login.php';
require_once 'classes/Utility.php';
require_once 'classes/Benachrichtigung.php';
require_once 'classes/Kategorie.php';

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

        //Wenn erfolgreich, weiterleiten zur Startseite
        if (Login::versucheLogin($username, $passwort)) {
            Utility::redirect("index.php?action=start");
        }

        //Bei fehlerhafter Anmeldung Aufruf der Login-Seite mit Hinweis auf gescheiterten Versuch
        else {
            Benachrichtigung::addBenachrichtigung("Die Anmeldung war nicht erfolgreich, Benutzername oder Passwort sind fehlerhaft.", "danger");
            Utility::redirect("index.php?action=home");
            //Da der Login nicht funktioniert, wird auch bei falschem Passwort weitergeleitet
        }
        
    case "start":{
        if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
        }
        include 'view/startpage.php';
        break;
    }
        
    case "meals":{
        if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
        }
        include 'view/speisekarte.php';
        break;       
    }
       
        case "drinks":{
        if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
        }
        include 'view/getraenkekarte.php';
        break;       
    }
    
    case "invoice":{
        if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
        }
        include 'view/rechnung.php';
        break;       
    }

    case "about":{
        if (!Login::isLoggedIn()) {
                Utility::redirect("index.php?action=home");
                break;
        }
        include 'view/ueberuns.php';
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
