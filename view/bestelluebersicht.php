<!--View mit einer Tabelle zur Übersicht über die bisher bestellten Gerichte, sowie dem aktuellen Rechnungsbetrag-->
<?php
require 'templates/headblockview.php';
require 'templates/sidebar_left.php';
?>

<body>
    <div class="row">
        <div class="container">
            <p><h1>Bestellübersicht</h1></p>

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
                        $bestellung = Bestellung::getBestellung(Login::getTischId());
                        $Gesamtsumme = 0;

                        foreach ($bestellung as $Bestellung) {

                            $Gericht = Speisen::getGericht($Bestellung[0]);
                            ?>
                            <td><?php echo $Gericht['Titel'] ?></td>
                            <td><?php echo $Gericht['Einzelpreis'] ?></td>
                            <td><?php echo $Bestellung['anzahl'] ?></td>
                            <?php
                            $Gesamtpreis = $Gericht['Einzelpreis'] * $Bestellung['anzahl'];
                            $Gesamtsumme += $Gesamtpreis;
                            ?>
                            <td><?php echo $Gesamtpreis ?></td>
                        </tr>
                    <?php } ?>
                    <tr></tr>
                    <tr>
                        <td colspan="3" >Gesamtsumme:</td>
                        <td> <?php echo $Gesamtsumme ?></td>
                        <td><a href="index.php?action=home">Bezahlen</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<?php
require 'templates/footblockview.php';
