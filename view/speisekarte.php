<?php
require 'templates/headblockview.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<body style="background-image: url(img/holz.jpg)">
    <div class="row">
        <div class="col-md-3">
            <table class="table">
                <thead>
                    <tr>
                <th>Dies soll die navigationsleiste links werden</th></tr>
                <?php
                $kategorie = Kategorie::getAllKategorien();
                $anzahl = count($kategorie) -1;


                for ($x = 0; $x <= $anzahl; $x++) {
                    ?>
                    <tr class="table-row" data-href="zeile">
                        <td><?php echo $kategorie[$x]; ?></td></tr>  
                <?php } ?>
            </thead>
            </table> 
        </div>

        <div class="col-md-9">
            <table class="table">
                <tr> 
                    <th>lfd.Nr</th>
                    <th>Gericht</th>
                    <th>Beschreibung</th>
                    <th>Preis</th> 
                    <th>      </th>
                   
                </tr>
                <td>        Hier soll eine Schleife eingebunden werden</td>
                        </div>
</body>

<?php
require 'templates/footblockview.php';
