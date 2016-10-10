<?php

/**
 * Loginklasse:
 * Klase, die statische Methoden rund um den Login bereitgestellt
 * 
 * benutzte Schlüssel im SESSION Array:
 * login_auth: Wahrheitswert ob der User eingeloggt ist
 * login_tischid: Tischid wenn eingeloggt
 * login_rolle
 * 
 * @author Dennis
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

    //liefert den eingeloggten Tisch, wenn nicht eingeloggt, dann werfe LoginException
    public static function getTischId() {
        if (self::isLoggedIn() == FALSE) {
            throw new LoginException("nicht eingeloggt");
        }
        return $_SESSION['login_tischid'];
    }

    //führt Logout durch
    public static function logout() {
        $_SESSION['login_auth'] = false;
        $_SESSION['login_tischid'] = 0;
    }

    //versucht den Login mit unverschlüsseltem übergebenem Benutzernamen und Passwort. Liefert Wahrheitswert zurück, ob erfolgreich. Wenn erfolgreich, dann setzt die Methode alle benötigten Variablen
    public static function versucheLogin($username, $passwort, $rolle) {
        //Leere eingaben abfangen
        if ($username == "" OR $passwort == "") {
            return FALSE;
        }
        //Passwort verschlüsseln
        $passHash = md5($passwort);

        //Versuche die DozentId mit username und Passwort zu laden, wenn erfolgreich -> login möglichstmt
        $stmt = DB::$dbh->prepare("SELECT username FROM user WHERE username=:username AND passwort=:passhash AND rolle=:rolle");
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":passhash", $passHash);
        $stmt->bindValue(":rolle", $rolle);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0) {
            //Kein Ergebnis -> Login fehlgeschlagen
            return FALSE;
        }
        //Login erfolgreich
        $row = $stmt->fetch();
        $tisch_id = $row['username'];
        //Sessionwerte setzen
        $_SESSION['login_auth'] = TRUE;
        $_SESSION['login_tischid'] = $tisch_id;
        $_SESSION['login_rolle'] = $rolle;

        return true;
    }

}
