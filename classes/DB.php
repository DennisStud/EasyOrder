<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author T420
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
