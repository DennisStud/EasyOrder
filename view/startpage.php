<!--Startseite mit einer Übersicht über die Funktionen der Anwendung-->

<?php
require 'templates/headblockview.php';
require 'templates/sidebar_left.php';
?>

<body>
    <div class="container">
        <!--Einleitender Begrüßungstext auf der Startseite-->
        <div class="row">

            <div class="col-md-12"><p class="text-center" style="font-size: 24px">Hier könnte ihr Beispieltext stehen</p></div>
        </div>

        <!--Buttons und Images zur Navigation-->
        <div class="row" >
            <div class="col-md-3">
                <form action="index.php?action=meals" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/spaghetti.png" class="img-responsive" alt="Responsives Bild">
                        <button class="btn btn-default" type="submit">Essen bestellen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="index.php?action=meals" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/wein.png" class="img-responsive" alt="Responsives Bild">
                        <button class="btn btn-default" type="submit">Getränke bestellen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="index.php?action=overview" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/rechnung.jpg" class="img-responsive" alt="Responsives Bild">
                        <button class="btn btn-default" type="submit">Bestellübersicht einsehen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="index.php?action=about" method="post" id="form_start">
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
