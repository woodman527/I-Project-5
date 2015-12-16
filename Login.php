<?php
include_once('header.php');
include_once('footer.php');
include_once 'dbactions.php';
database_connect();
?>

  <body>
<?php




if ($_SERVER['REQUEST_METHOD'] == "POST") {

$gebruikersnaam = $_POST['inputGebruikersnaam'];
$password = $_POST['inputPassword'];



$sql = "SELECT * FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '$username'
AND WACHTWOORD = '$password'";
$result = sqlsrv_query($conn, $sql);



echo '<div class="content">';
  if (!$result) {
    echo "sorry, u bent niet geregistreerd";
  }
  else {
    echo "Welkom $username";
    $_SESSION['username'] = $username;

  }
  ?>
</div>

}

<?php
database_disconnect();
?>

</body>
  
