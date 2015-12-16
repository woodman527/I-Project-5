<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('dbactions.php');
?>
<head>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  database_connect();


  if($_SERVER['REQUEST_METHOD'] == "POST") {


    $titel = $_POST['titel'];
    $rubriek = $_POST['rubriek'];
    $startprijs = $_POST['startprijs'];
    $betalingswijze = $_POST['betalingswijze'];
    $looptijd = $_POST['looptijd'];
    $beschrijving = $_POST['beschrijving'];
    $betalingsinstructie = $_POST['betalingsinstructie'];
    $verzendinstructie = $_POST['verzendinstructie'];
    $voorwerplokatie = $_POST['voorwerplokatie'];
    $land = $_POST['land'];
    $looptijdbegindag = date("d-M-Y");
    $looptijdbegintijdstip = date("h-i-s");
    $afbeelding1 = $_POST['filetoupload1'];


    if(strlen($titel) > 18 OR !preg_match("/^[a-zA-Z_ -]*$/", $titel) OR $titel == null) {
      echo 'error in titel';
    }
    else if($rubriek == null) {
      echo 'error in rubriek';
    }
    else if(strlen($startprijs) > 10 OR !preg_match("/^[0-9\.\/]*$/", $startprijs) OR $startprijs == null ) {
      echo 'error in startprijs';
    }
    else if(strlen($betalingswijze) > 20 OR !preg_match("/^[a-zA-Z_ -]*$/", $betalingswijze) OR $betalingswijze == null ) {
      echo 'error in betalingswijze';
    }
    else if(strlen($betalingsinstructie) > 40 OR !preg_match("/^[a-zA-Z_ -]*$/", $betalingsinstructie)) {
      echo 'error in betalingsinstructie';
    }
    else if(!preg_match("/^[0-9]*$/", $looptijd) OR $looptijd == null ) {
      echo 'error in looptijd';
    }
    if(strlen($beschrijving) > 100 OR !preg_match("/^[a-zA-Z_ -]*$/", $beschrijving) OR $beschrijving == null) {
      echo 'error in beschrijving';
    }
    if(strlen($verzendinstructie) > 27 OR !preg_match("/^[a-zA-Z_ -]*$/", $verzendinstructie) ) {
      echo 'error in verzendinstructie';
    }
    if(strlen($voorwerplokatie) > 60 OR !preg_match("/^[a-zA-Z_ -]*$/", $voorwerplokatie) OR $voorwerplokatie == null) {
      echo 'error in voorwerplokatie';
    }
    else if($land == null) {
      echo 'error in land';
    }
    else {
    $vsql = "INSERT INTO VOORWERP(GEBRUIKERSNAAM, TITEL, BESCHRIJVING, STARTPRIJS, BETALINGSWIJZE, BETALINGSINSTRUCTIE, PLAATSNAAM, LAND, LOOPTIJD, LOOPTIJDBEGINDAG, LOOPTIJDBEGINTIJDSTIP, VERZENDINSTRUCTIES)
             VALUES ('Testlars', '$titel', '$beschrijving', '$startprijs', '$betalingswijze', '$betalingsinstructie', '$voorwerplokatie', '$land', '$looptijd', '$looptijdbegindag', '$looptijdbegintijdstip', '$verzendinstructie')";
//bij deze twee moet een select statement komen dat het voorwerpnummer bepaalt (tip: Gebruik max van de laatste inserted)
    $afbsql = "INSERT INTO BESTAND (FILENAAM, VOORWERPNUMMER)
             VALUES ('$afbeelding1', 1)";
//rubrieknummer is afhankelijk van de variabele rubriek, ook hier moet een select statement voor komen
    $rubsql = "INSERT INTO VOORWERPINRUBRIEK (RUBRIEKNUMMER, VOORWERPNUMMER)
             VALUES (1, 1)";

    if (database_query($vsql, null) AND database_query($afbsql, null) AND database_query($rubsql, null)) {
           echo 'gelukt';
        }
    else {
           echo 'error';
         }
}


}
database_disconnect();
?>
