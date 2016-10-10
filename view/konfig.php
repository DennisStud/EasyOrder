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

        <!--Formular zum Löschen einer Kategorie-->
        <h4>Löschen Sie eine bestehende Kategorie</h4>
        <form action="index.php?action=kategorie_löschen" method="post" id="form_delkategorie">
            <select name="dropdown_delkategorie" id="dropdown_delkategorie">
                <?php
                //Auslesen aller vorhandenen Kategorien
                $delkategorie = Kategorie::getAllKategorien();
                foreach ($delkategorie as $kat) {
                    ?>
                    <option><?php echo $kat[1] ?></option>
                <?php } ?>
            </select>
            <button type="submit" value="Kategorie löschen">Kategorie löschen</button>
        </form>




        <!--Formular zum Hinzufügen eines neuen Gerichts-->
        <h4>Fügen Sie eine neues Gericht hinzu!</h4>
        <form action="index.php?action=gericht_erstellen" method="post" id="form_setgericht">
            <select name="dropdown_kategorie" id="dropdown_kategorie">
                <?php
                //Auslesen aller vorhandenen Kategorien
                $setkategorie = Kategorie::getAllKategorien();
                foreach ($setkategorie as $kat) {
                    ?>

                    <option><?php echo $kat[1] ?></option>
                <?php } ?>
            </select>
            <input class="text" name="input_settitel" id="input_settitel" placeholder="Titel">
            <input class="text" name="input_seteinzelpreis" id="input_seteinzelpreis" placeholder="Einzelpreis">
            <input class="text" name="input_setbeschreibung" id="input_setbeschreibung" placeholder="Beschreibung">
            <button type="submit" value="Gericht erstellent">Gericht erstellen</button>
        </form>


        <!--Formular zum Hinzufügen eines neuen Gerichts-->
        <h4>Löschen Sie ein Gericht aus Ihrer Speisekarte</h4>
        <form action="index.php?action=gericht_löschen" method="post" id="form_setgericht">
            <select name="dropdown_delgericht" id="dropdown_gericht">
                <?php
                //Auslesen aller vorhandenen Speisen
                foreach ($setkategorie as $kat) {
                    $Gericht = Speisen::getSpeisen($kat[0]);
                    foreach ($Gericht as $gericht) {
                        ?>
                        <option><?php echo $gericht[1] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button type="submit" value="Gericht Löschen">Gericht löschen</button>
        </form>
    </div>
</body>