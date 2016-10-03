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
            <div class="sidebar-nav-fixed affix">
                <div class="well">
                    <ul class="nav ">
                        <li class="nav-header">Sidebar</li>
                        <?php
                        $kategorie = Kategorie::getAllKategorien();
                        $anzahlkat = count($kategorie) - 1;


                        for ($x = 0; $x <= $anzahlkat; $x++) {
                            ?>

                            <li><a href="index.php?action=meals&aktuellkategorieid=<?php echo $x ?>"><?php echo $kategorie[$x] ?></a></li></tr>  
                        <?php } ?>
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--    <div class="row">-->
        <div class="col-md-9">
            <?php
            ?>

            <table class="table">
                <thead>
                    <tr> 
                        <th>lfd.Nr</th>
                        <th>Gericht</th>
                        <th>Beschreibung</th>
                        <th>Preis</th>
                        <th>Anzahl</th>
                        <th>      </th>

                </thead>
                <tbody>
                    </tr>
                    <?php
                    $speisen = Speisen::getSpeisen($aktuellkategorieid);
                    $anzahlger = count($speisen) - 1;


                    for ($x = 0; $x <= $anzahlger; $x++) {
                        ?>
                        <tr class="table-row">
                            <?php for ($y = 0; $y <= 3; $y++) { ?>
                                <td>
                                    <?php echo $speisen[$x][$y] ?>
                                </td>

                            <?php } ?>
                            <td><input class="number"></td>            
                            <td><a href="index.php?action=bestellen" >bestellen</a></td>    
                        </tr> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>

<?php
require 'templates/footblockview.php';
