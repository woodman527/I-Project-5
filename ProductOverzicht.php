<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('sidebar.php');
    include_once 'dbactions.php';
    database_connect();

    if($conn) {
      $tsql = "SELECT TITEL, BESCHRIJVING, STARTPRIJS, LOOPTIJDBEGINDAG, LOOPTIJDEINDEDAG, VERKOOPPRIJS, BODBEDRAG
               FROM VOORWERP
               INNER JOIN BOD
               ON VOORWEP.VOORWERPNUMMER = BOD.VOORWERPNUMMER
               ORDER BY TITEL";
    }

?>
<head>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<div class="content">
    <div class="row">
        <div class="veilingitem">
            <h3>Audi type 2</h3>
            <img class="media-object" src="Images/VoorbeeldAuto1.jpg" alt="...">
            <a class="button" href="voorbeeldvoorwerp.php">Bied Mee</a>
            <h4>Huidig bod: 20.000 Euro</h4>
            <p>Hier komt een testitem te staan inclusief afbeelding en link naar een uitgebreide beschrijving, deze beschrijving
            moet hoe lang hij ook is, steeds onder de afbeelding blijven staan en niet van het shcerm af lopen. anders gaat alles kapot
            en moet bart huilen.</p>
        </div>
    </div>
    <div class="row">
        <div class="veilingitem">
            <h3>Mercedes een hele mooie (Zo goed als nieuw)</h3>
            <img class="media-object" src="Images/VoorbeeldAuto2.jpg" alt="...">
            <h4>Huidig bod: 250.000 Euro</h4>
            <p>Hier komt een testitem te staan inclusief afbeelding en link naar een uitgebreide beschrijving, deze beschrijving
                moet hoe lang hij ook is, steeds onder de afbeelding blijven staan en niet van het shcerm af lopen. anders gaat alles kapot
                en moet bart huilen.</p>
        </div>
    </div>
    <div class="row">
        <div class="veilingitem">
            <h3>Honda supermooi</h3>
            <img class="media-object" src="Images/VoorbeeldAuto3.jpg" alt="...">
            <h4>Huidig bod: 22 Euro</h4>
            <p>Hier komt een testitem te staan inclusief afbeelding en link naar een uitgebreide beschrijving, deze beschrijving
                moet hoe lang hij ook is, steeds onder de afbeelding blijven staan en niet van het shcerm af lopen. anders gaat alles kapot
                en moet bart huilen.</p>
        </div>
    </div>
    <div class="row">
        <div class="veilingitem">
            <h3>Eendje</h3>
            <img class="media-object" src="Images/VoorbeeldAuto4.jpg" alt="...">
            <h4>Huidig bod: 22 Euro</h4>
            <p>Hier komt een testitem te staan inclusief afbeelding en link naar een uitgebreide beschrijving, deze beschrijving
                moet hoe lang hij ook is, steeds onder de afbeelding blijven staan en niet van het shcerm af lopen. anders gaat alles kapot
                en moet bart huilen.</p>
        </div>
    </div>
</div>
