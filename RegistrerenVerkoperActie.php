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

    $gebruikersnaam = $_SESSION['username'];

  if($_SERVER['REQUEST_METHOD'] == "POST") {

    $Bank = $_POST['Bank'];
    $IBAN = $_POST['IBAN'];
    $CtrOptie = $_POST['CtrOptie'];
    $Creditcard = $_POST['Creditcard'];


    if (strlen($IBAN) > 18 OR !preg_match("/^[a-zA-Z0-9]*$/", $IBAN) ){
      echo "fout in IBAN";
    }
    else if(strlen($Creditcard) > 20 OR !preg_match("/^[0-9]*$/", $Creditcard )) {
      echo "fout in Creditcard";
    }
    else {
      $rvasql = "INSERT INTO VERKOPER (GEBRUIKERSNAAM, BANK, BANKREKENING, CONTROLEOPTIE, CREDITCARD)
      VALUES ('$gebruikersnaam', '$Bank', '$IBAN', '$CtrOptie', '$Creditcard')";
      $updvsql = "UPDATE
                 SET VERKOPER='wel';
                 WHERE GEBRUIKERSNAAM='$gebruikersnaam'";
      if (database_query($rvasql, null) AND database_query($updvsql, null)) {
        header("mijnprofiel.php");
      }
      else {
        echo 'error';
      }

    }
  }
  ?>
  </body>
