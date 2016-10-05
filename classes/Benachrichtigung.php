<?php

/**
 * Description of Benachrichtigung
 * Klasse zum Nutzen von Benachrichtigungen, die einmalig angezeigt werden. 
 * Typischerweise nach dem Absenden eines Formulars.
 * @author Dennis
 */
class Benachrichtigung {

    //fügt Benachrichtigung hinzu, als Typ müssen die Alert Typen von Bootstrap angegeben werden
    public static function addBenachrichtigung($nachricht, $typ = "success") {
        self::initBenachrichtigungen();
        if (strlen($nachricht) == 0) {
            throw new Exception("Es kann keine Nachricht ohne Inhalt erstellt werden");
        }
        $_SESSION['_benachrichtigung'][] = array("nachricht" => $nachricht, "typ" => $typ);
    }

    //liefert alle Benachrichtigungen
    public static function getBenachrichtigung() {
        $message = "";
        foreach ($_SESSION['_benachrichtigung'] as $value) {
            $message .= "<div class=\"alert alert-" . $value['typ'] . " fade in\" style=\"margin-top: 5px;\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>" . $value['nachricht'] . "</div>";
        }
        $_SESSION['_benachrichtigung'] = array();
        return $message;
    }

    //Prüft ob Benachrichtigungen vorhanden sind
    public static function hasBenachrichtigungen() {
        self::initBenachrichtigungen();
        return count($_SESSION['_benachrichtigung']) > 0;
    }

    //bereitet Session-Array vor
    private static function initBenachrichtigungen() {
        if (!array_key_exists("_benachrichtigung", $_SESSION)) {
            $_SESSION['_benachrichtigung'] = array();
        }
        return;
    }

}
