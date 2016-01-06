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

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $adres2 = $_POST['adres2'];
    $woonplaats = $_POST['woonplaats'];
    $postcode = $_POST['postcode'];
    $land = $_POST['land'];
    $geboortedatum = $_POST['geboortedatum'];
    $telefoonnummer1 = $_POST['telefoonnummer1'];
    $telefoonnummer2 = $_POST['telefoonnummer2'];
    $telefoonnummer3 = $_POST['telefoonnummer3'];
    $geheimevraag = $_POST['geheimevraag'];
    $antgeheimevraag = $_POST['antgeheimevraag'];

      hash('adler32', $password);
      hash('adler32', $password_confirm);
      
      
    if(strlen($username) > 10 OR !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
      echo 'Fout in gebruikersnaam';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'Fout in email';
    }
    else if(strlen($password) > 9 OR $password != $password_confirm) {
      echo 'Fout in wachtwoord';
    }
    else if(strlen($voornaam) > 20 OR !preg_match("/^[a-zA-Z_ -]*$/", $voornaam) OR $voornaam == null) {
      echo 'Fout in voornaam';
    }
    else if(strlen($achternaam) > 30 OR !preg_match("/^[a-zA-Z_ -]*$/", $achternaam) OR $achternaam == null) {
      echo 'Fout in achternaam';
    }
    else if(strlen($adres) > 100 OR !preg_match("/^[a-zA-Z0-9_ -]*$/", $adres) OR $adres ==  null) {
      echo 'Fout in adres';
    }
    else if(strlen($adres2) > 100 OR !preg_match("/^[a-zA-Z0-9_ -]*$/", $adres2)) {
      echo 'Fout in adres2';
    }
    else if(strlen($woonplaats) > 60 OR !preg_match("/^[a-zA-Z_ -]*$/", $woonplaats) OR $woonplaats ==  null) {
      echo 'Fout in woonplaats';
    }
    else if(strlen($postcode) > 6 OR !preg_match("/^[a-zA-Z0-9]*$/", $postcode) OR $postcode ==  null) {
      echo 'Fout in postcode';
    }
    else if($land ==  null) {
      echo 'Fout in land';
    }
    else if(strlen($geboortedatum) > 10 OR $geboortedatum ==  null) {
      echo 'Fout in geboortedatum';
    }
    else if(!preg_match("/^[0-9]*$/", $telefoonnummer1) OR $telefoonnummer1 ==  null OR strlen($telefoonnummer1) > 10) {
      echo 'Fout in telefoonnummer1';
    }
    else if(!preg_match("/^[0-9]*$/", $telefoonnummer2) OR strlen($telefoonnummer1) > 10) {
      echo 'Fout in telefoonnummer2';
    }
    else if(!preg_match("/^[0-9]*$/", $telefoonnummer3) OR strlen($telefoonnummer1) > 10) {
      echo 'Fout in telefoonnummer3';
    }
    else if(!preg_match("/^[a-zA-Z_ -]*$/", $antgeheimevraag) OR $antgeheimevraag ==  null) {
      echo 'Fout in antwoord geheime vraag';
    }
    else {
      $sql = "INSERT INTO GEBRUIKER (GEBRUIKERSNAAM, VRAAG, VOORNAAM, ACHTERNAAM, ADRESREGEL1, ADRESREGEL2, POSTCODE, PLAATSNAAM, LAND, GEBOORTEDAG, MAILBOX, WACHTWOORD, ANTWOORDTEKST, VERKOPER)
      VALUES ('$username', '$geheimevraag', '$voornaam', '$achternaam', '$adres', '$adres2', '$postcode', '$woonplaats', '$land', '$geboortedatum', '$email', '$password', '$antgeheimevraag', 'Niet')";
      if (database_query($sql, null)) {
        echo 'gelukt';
        echo hash('adler32', $password);
      }
      else {
        echo 'error';
      }
    }



    database_disconnect();
    }
    ?>
  </body>
