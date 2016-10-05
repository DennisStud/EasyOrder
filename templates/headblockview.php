<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gasthaus zur alten Eiche</title>

    <!-- Bootstrap Includes-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/styleSheet.css" rel="stylesheet">

    <!-- JS Includes-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
</head>

<!--Navigationsleiste oben-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
            <a class="navbar-brand" href="index.php?action=start">Gasthaus zur alten Eiche</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?action=home">Start</a></li>
                <li><a href="index.php?action=meals">Speisen &amp; Getränke</a></li>
                <li><a href="index.php?action=overview">Bestellübersicht</a></li>
                <li><a href="index.php?action=about">Über Uns</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Utility::getRolle() == "Admin") { ?>
                    <li><a href="index.php?action=konfig">Konfigurieren</a></li>  
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>