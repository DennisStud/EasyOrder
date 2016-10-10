<!--Anmeldeseiten-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gasthaus zur alten Eiche</title>

    <!-- Bootstrap Includes-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/styleSheet.css" rel="stylesheet">

</head>
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
            <input type="text" id="input_benutzername" name="input_benutzername" placeholder="Benutzername">

            <!--Input Feld für das Passwort.-->
            <label for="input_passwort">Passwort:</label>     
            <input type="password" id="input_passwort" name="input_passwort" placeholder="Passwort" >

            <select name="dropdown_user" id="dropdown_user">
                <option>Gast</option>
                <option>Admin</option>
            </select>

            <!--Button zum anmelden. Gibt den eingegebenen Benutzernamen und das eingegebene Passwort an den Controller weiter.-->
            <button type="submit" class="btn btn-default">Anmelden</button>
        </form>
    </div>
</body>