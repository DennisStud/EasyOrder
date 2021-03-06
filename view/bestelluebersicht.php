<!--View mit einer Tabelle zur Übersicht über die bisher bestellten Gerichte, sowie dem aktuellen Rechnungsbetrag-->
<?php
require 'templates/headblockview.php';
require 'templates/sidebar_left.php';
?>

<body style="background-image: url(img/holz.jpg)">
    <div class="row">
        <div class="container">
            <p><h1><b>Bestellübersicht</b></h1></p>

            <table class="table">
                <thead>
                    <tr> 
                        <th>Gericht</th>
                        <th>Einzelpreis</th>
                        <th>Anzahl</th>
                        <th>Gesamtpreis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <?php
                        $i = 0;

                        foreach ($bestellung as $Bestellung) {
                            ?>
                            <td><?php echo $Bestellung['titel'] ?></td>
                            <td><?php echo $Bestellung['einzelpreis'] ?> €</td>
                            <td><?php echo $Bestellung['anzahl'] ?></td>
                            <td><?php echo number_format($Bestellung['einzelpreis'] * $Bestellung['anzahl'], 2) ?> €</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4">
                            <a href="index.php?action=meals" class="glyphicon glyphicon-plus" >Weitere Bestellung hinzufügen</a>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" >Gesamtsumme:</td>
                        <td> <?php echo number_format($Gesamtsumme, 2) ?> €</td>
                        <td><a href="index.php?action=warten">Bezahlen</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

<?php
require 'templates/footblockview.php';
