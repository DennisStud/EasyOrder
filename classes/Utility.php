<?php

class Utility{

//Weiterleitung zur angegeben Seite mit Parametern
    public static function redirect($url) {
        header('Location: '.$url);
        echo "<a href=\"$url\">Weiter</a>";
    }
    
    
}