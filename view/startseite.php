<!--Startseite mit einer Übersicht über die Funktionen der Anwendung-->

<?php
require 'templates/headblockview.php';
require 'templates/sidebar_left.php';
?>

<body style="background-image: url(img/holz.jpg)">
    <div class="container">
        <!--Einleitender Begrüßungstext auf der Startseite-->
        <div class="row">
            <div class="col-md-10"><p class="text-center" ><h1>Willkommen im Gasthaus zur alten Eiche</h1> <br> 
                    Wir begrüßen Sie herzlich an Tisch <?php echo Login::getTischId() ?> !</p></div>
        </div>

        <!--Buttons und Images zur Navigation-->
        <div class="row" >
            <div class="col-md-6">
                <form action="index.php?action=meals" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/spaghetti.png" class="img-responsive" alt="Responsives Bild" >
                        <button class="btn btn-default" type="submit">Speisen & Getränke bestellen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="index.php?action=overview" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/rechnung.jpg" class="img-responsive" alt="Responsives Bild">
                        <button class="btn btn-default" type="submit">Bestellübersicht einsehen</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
</body>

<?php
require 'templates/footblockview.php';
