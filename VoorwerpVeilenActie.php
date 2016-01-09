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

    $username = $_SESSION['username'];
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
    $afbeelding2 = $_POST['filetoupload2'];
    $afbeelding3 = $_POST['filetoupload3'];
    $afbeelding4 = $_POST['filetoupload4'];
    echo $afbeelding1;


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
    else if(strlen($beschrijving) > 100 OR !preg_match("/^[a-zA-Z_ -]*$/", $beschrijving) OR $beschrijving == null) {
      echo 'error in beschrijving';
    }
    else if(strlen($verzendinstructie) > 27 OR !preg_match("/^[a-zA-Z_ -]*$/", $verzendinstructie) ) {
      echo 'error in verzendinstructie';
    }
    else if(strlen($voorwerplokatie) > 60 OR !preg_match("/^[a-zA-Z_ -]*$/", $voorwerplokatie) OR $voorwerplokatie == null) {
      echo 'error in voorwerplokatie';
    }
    else if($afbeelding1 == null AND $afbeelding2 == null AND $afbeelding3 == null AND $afbeelding4 == null) {
      echo 'error in afbeelding';
    }
    else {
    $vsql = "INSERT INTO VOORWERP(GEBRUIKERSNAAM, TITEL, BESCHRIJVING, STARTPRIJS, BETALINGSWIJZE, BETALINGSINSTRUCTIE, PLAATSNAAM, LAND, LOOPTIJD, LOOPTIJDBEGINDAG, LOOPTIJDBEGINTIJDSTIP, VERZENDINSTRUCTIES)
             VALUES ('$username', '$titel', '$beschrijving', '$startprijs', '$betalingswijze', '$betalingsinstructie', '$voorwerplokatie', '$land', '$looptijd', '$looptijdbegindag', '$looptijdbegintijdstip', '$verzendinstructie')";


   $afbsql ="INSERT INTO BESTAND (FILENAAM, VOORWERPNUMMER)
              VALUES ('$afbeelding1', (SELECT MAX(VOORWERPNUMMER)FROM VOORWERP)),
                     ('$afbeelding2', (SELECT MAX(VOORWERPNUMMER)FROM VOORWERP)),
                     ('$afbeelding3', (SELECT MAX(VOORWERPNUMMER)FROM VOORWERP)),
                     ('$afbeelding4', (SELECT MAX(VOORWERPNUMMER)FROM VOORWERP))";

    $rubsql = "INSERT INTO VOORWERPINRUBRIEK (RUBRIEKNUMMER, VOORWERPNUMMER)
             VALUES ((SELECT RUBRIEKNUMMER FROM RUBRIEK WHERE RUBRIEKNAAM = '$rubriek'), (SELECT MAX(VOORWERPNUMMER)FROM VOORWERP))";

    if (database_query($vsql, null) AND database_query($afbsql, null) AND database_query($rubsql, null))  {
           echo 'gelukt';
        }
    else {
           echo 'error';
         }
}


}
database_disconnect();
?>
