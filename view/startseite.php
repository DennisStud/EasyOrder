<!--Startseite mit einer Übersicht über die Funktionen der Anwendung-->

<?php
require 'templates/headblockview.php';
require 'templates/sidebar_left.php';
?>

<body style="background-image: url(img/holz.jpg)">
    <div class="container">
        <!--Einleitender Begrüßungstext auf der Startseite-->
        <div class="row">
            <div class="col-md-12">
                <h1><font size="7" face="arial" ><b>Willkommen im Gasthaus zur alten Eiche!</b></font></h1>
                <textarea name="begruessung" cols="75" rows="5" readonly style="font-size: 24px">Wir begrüßen Sie herzlich an Tisch <?php echo Login::getTischId() ?>! Sie können über die Navigationsleiste durch die Speisekarte blättern. Nutzen sie das Bestellübersichtfeld, um zur Rechnung zu gelangen. Wir hoffen sie habe einen angenehmen aufenthalt und Spaß mit diesem neuen System. </textarea>
            </div>
        </div>

        <!--Buttons und Images zur Navigation-->
        <div class="row" >
            <div class="col-md-6">
                <form action="index.php?action=meals" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/spaghetti.png" witdh="150" hight="150" class="img-responsive" alt="Responsives Bild" >
                        <button class="btn btn-default" type="submit">Speisen & Getränke bestellen</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="index.php?action=overview" method="post" id="form_start">
                    <div class="form-group">
                        <img src="img/rechnung.jpg" witdh="150" hight="150" class="img-responsive" alt="Responsives Bild">
                        <button class="btn btn-default" type="submit">Bestellübersicht einsehen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
require 'templates/footblockview.php';
