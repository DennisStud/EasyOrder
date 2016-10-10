<!--Seite mit Darstellung der Speisekarte-->
<?php
require 'templates/headblockview.php';
if (Benachrichtigung::hasBenachrichtigungen()) {
    echo Benachrichtigung::getBenachrichtigung();
}

require 'templates/sidebar_left.php';
?>

<?php
    if(c){
    echo '<script typ="text/javascript">
        function achtungBox(){
            var c = confirm("Wollen sie bestellen?")
            if(!c){
                Utility::redirect("index.php?action=meals");
            }
        }
    </script>';
    }
?>

<body style="background-image: url(img/holz.jpg)">
    <div class="container"> 
        <?php $kat = Kategorie::getKategorie($aktuellkategorieid); ?>
        <p><h1><?php echo $kat[0]; ?></h1></p>

    <!--Dies ist die Speisekarte-->
    <table class="table">
        <thead>
            <tr> 
                <th>Gericht</th>
                <th>Beschreibung</th>
                <th>Preis</th>
                <th>Anzahl</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $speisen = Speisen::getSpeisen($aktuellkategorieid);

            foreach ($speisen as $Speise) {
                ?>
                <tr class="table-row">
                    <?php for ($y = 1; $y <= 3; $y++) { ?>
                        <td>
                            <?php echo $Speise [$y] ?>
                        </td>
                    <?php } ?>

                    <td>
                        <!--Formular zum Aufgeben der Bestellung-->
                        <form class="form-inline" action="index.php?action=order&aktuellkategorieid=<?php echo $aktuellkategorieid ?>" method="post">
                            <input type="number" class="form-control" id="input_anzahl<?php echo $Speise[0] ?>" name="input_anzahl<?php echo $Speise[0] ?>" placeholder="Anzahl" min="0">
                            <button onclick="achtungBox()" type="submit" value="bestellen">bestellen</button>
                        </form>
                        
                    </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
    </div>
</body>
<?php
require 'templates/footblockview.php';
