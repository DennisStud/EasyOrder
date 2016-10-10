<!--Login-Screen-->

<?php
if (Benachrichtigung::hasBenachrichtigungen()) {
    echo Benachrichtigung::getBenachrichtigung();
}
?>
<body  style="background-image: url(img/holz.jpg)">
    <div style="text-align: center">
        <h1>Anmelden an EasyOrder</h1>
        <form action="index.php?action=do_login" method="post" id="form_login">

            <!--Input Feld für den Benutzernamen.-->
            <label for="input_benutzername">Benutzername:</label>     
            <input type="text" class="form-control" id="input_benutzername" name="input_benutzername" placeholder="Benutzername" aria-describedby="input_benutzername">

            <!--Input Feld für das Passwort.-->
            <label for="input_passwort">Passwort:</label>     
            <input type="password" class="form-control" id="input_passwort" name="input_passwort" placeholder="Passwort" aria-describedby="input_passwort">

            <select name="dropdown_user" id="dropdown_user">
                <option>Gast</option>
                <option>Admin</option>
            </select>

            <!--Button zum anmelden. Gibt den eingegebenen Benutzernamen und das eingegebene Passwort an den Controller weiter.-->
            <button type="submit" class="btn btn-default">Anmelden</button>
        </form>
    </div>
</body>