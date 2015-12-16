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
    $voorwerplokatie = $_POST['voorwerplokatie'];
    $looptijd = $_POST['looptijd'];
    $beschrijving = $_POST['beschrijving'];
    $betalingsinstructies = $_POST['betalingsinstructies'];
    $verzendinstructies = $_POST['verzendinstructies']
