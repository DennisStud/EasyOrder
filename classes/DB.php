<?php

/**
 * Klasse für den Zugriff auf Datenbank
 *
 * @author Dennis
 */
class DB {

    //Zugangsdaten
    private static $dbHost = "localhost";
    private static $dbName = "easyorder";
    private static $dbUser = "root";
    private static $dbPass = "";
    //Datenbankzugriffshandle
    public static $dbh;

    //Herstellung des Datenbankzugriffs
    public static function init() {
        self::$dbh = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPass);
    }

}
