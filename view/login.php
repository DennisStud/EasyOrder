<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <h1>Anmelden an EasyOrder</h1>
    <form action="index.php?action=do_login" method="post" id="form_login">

        <!--Input Feld für den Benutzernamen.-->
        <label for="input_benutzername">Benutzername:</label>     
        <input type="text" class="form-control" id="input_benutzername" name="input_benutzername" placeholder="Benutzername" aria-describedby="input_benutzername">

        <!--Input Feld für das Passwort.-->
        <label for="input_passwort">Passwort:</label>     
        <input type="password" class="form-control" id="input_passwort" name="input_passwort" placeholder="Passwort" aria-describedby="input_passwort">

        <!--Button zum anmelden. Gibt den eingegebenen Benutzernamen und das eingegebene Passwort an den Controller weiter.-->
        <button type="submit" class="btn btn-default">Anmelden</button>
    </form>
</div>
