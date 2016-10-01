<?php
require 'templates/headblockview.php';





/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body style="background-image: url(img/holz.jpg)">
    
        <div class="startpage">

            <!--Einleitender Begrüßungstext auf der Startseite-->
            <div class="row">

                <div class="col-md-12"><p class="text-center">Hier könnte ihr Beispieltext stehen</p></div>
            </div>



            <!--Buttons und Images zur Navigation-->
            <div class="row">

                <div class="col-md-3">
                    <form action="index.php?action=meals" method="post" id="form_start1">
                        <div class="form-group">
                            <img src="img/spaghetti.png" class="img-responsive" alt="Responsives Bild">
                            <button class="btn btn-default" type="submit">Essen bestellen</button>


                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="index.php?action=drinks" method="post">
                        <div class="form-group">
                            <img src="img/wein.png" class="img-responsive" alt="Responsives Bild">
                            <button class="btn btn-default" type="submit">Getränke bestellen</button>


                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="index.php?action=invoice" method="post">
                        <div class="form-group">
                            <img src="img/rechnung.jpg" class="img-responsive" alt="Responsives Bild">
                            <button class="btn btn-default" type="submit">Rechnung einsehen</button>


                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="index.php?action=about" method="post">
                        <div class="form-group">
                            <img src="img/haus.png" class="img-responsive" alt="Responsives Bild">
                            <button class="btn btn-default" type="submit">Über Uns</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

<?php
require 'templates/footblockview.php';
