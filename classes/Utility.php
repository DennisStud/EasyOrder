<?php

/**
 * Description of Utility
 *
 * @author Dennis
 */
class Utility {

//Weiterleitung zur angegeben Seite mit Parametern
    public static function redirect($url) {
        header('Location: ' . $url);
        echo "<a href=\"$url\">Weiter</a>";
    }

    //liefert die Rolle des Users (Entweder Gast oder Admin) 
    public static function getRolle() {
        if (Login::isLoggedIn() == FALSE) {
            throw new LoginException("nicht eingeloggt");
        }
        return $_SESSION['login_rolle'];
    }

}
