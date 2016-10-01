<?php

/**
 * Loginklasse:
 * statische Methoden rund um den Login bereitgestellt
 * 
 * benutzte Schlüssel im SESSION Array:
 * login_auth: Wahrheitswert ob der User eingeloggt ist
 * login_dozentid: DozentId wenn eingeloggt
 */
class Login {

    //liefert Wahrheitswert ob der Benutzer der Webseite eingeloggt ist
    public static function isLoggedIn() {
        if (isset($_SESSION['login_auth'])) {
            return $_SESSION['login_auth'];
        } else {
            return FALSE;
        }
    }

    //liefert den eingeloggten Dozenten, wenn nicht eingeloggt, dann werfe LoginException
    public static function getTischId() {
        if (self::isLoggedIn() == FALSE) {
            throw new LoginException("nicht eingeloggt");
        }
        return $_SESSION['login_dozentid'];
    }

    //führt Logout durch
    public static function logout() {
        $_SESSION['login_auth'] = false;
        $_SESSION['login_dozentid'] = 0;
    }

    //versucht den Login mit unverschlüsseltem übergebenem Benutzernamen und Passwort. Liefert Wahrheitswert zurück, ob erfolgreich. Wenn erfolgreich, dann setzt die Methode alle benötigten Variablen
    public static function versucheLogin($username, $passwort) {
        //Leere eingaben abfangen
        if ($username == "" OR $passwort == "") {
            return FALSE;
        }
        //Passwort verschlüsseln
        $passHash = md5($passwort);

        //Versuche die DozentId mit username und Passwort zu laden, wenn erfolgreich -> login möglichstmt
        $stmt = DB::$dbh->prepare("SELECT tisch_id FROM tisch WHERE tisch_id=:username AND passwort=:passhash");
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":passhash", $passHash);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0) {
            //Kein Ergebnis -> Login fehlgeschlagen
            return FALSE;
        }
        //Login erfolgreich
        $row = $stmt->fetch();
        $tisch_id = $row[0];
        //Sessionwerte setzen
        $_SESSION['login_auth'] = TRUE;
        $_SESSION['login_tischid'] = $tisch_id;
        return true;
    }

}
