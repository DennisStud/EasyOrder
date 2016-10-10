<!--View zum Verwalten der Speisekarte-->
<?php
require 'templates/headblockview.php';
if (Benachrichtigung::hasBenachrichtigungen()) {
    echo Benachrichtigung::getBenachrichtigung();
}

require 'templates/sidebar_left.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body style="background-image: url(img/holz.jpg)">
    <div class="container">
        <!--Formular zum Erstellen einer neuen Kategorie-->
        <h4>Fügen Sie eine neue Kategorie hinzu!</h4>
        <form action="index.php?action=kategorie_erstellen" method="post" id="form_setkategorie">
            <p><input class="text" name="input_setkategorie" id="input_setkategorie">
                <button type="submit" value="Kategorie erstellent">Kategorie erstellen</button></p>
        </form>

        <!--Formular zum Hinzufügen eines neuen Gerichts-->
        <h4>Fügen Sie eine neues Gericht hinzu!</h4>
        <form action="index.php?action=gericht_erstellen" method="post" id="form_setgericht">
            <select name="dropdown_kategorie" id="dropdown_kategorie">
                <?php
                //Auslesen aller vorhandenen Kategorien
                $kategorie = Kategorie::getAllKategorien();
                foreach ($kategorie as $kat) {
                    ?>

                    <option><?php echo $kat[1] ?></option>
                <?php } ?>
            </select>

            <input class="text" name="input_settitel" id="input_settitel" placeholder="Titel">
            <input class="text" name="input_seteinzelpreis" id="input_seteinzelpreis" placeholder="Einzelpreis">
            <input class="text" name="input_setbeschreibung" id="input_setbeschreibung" placeholder="Beschreibung">
            <button type="submit" value="Gerict erstellent">Gericht erstellen</button>
        </form>
    </div>
</body>


