<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('sidebartest.php');

?>

<?php
  database_connect();
$voorwerpnummer = intval($_GET['Voorwerp']);


				$sqlArtikel = "SELECT   MAX(bo.BODBEDRAG) AS HIGH, v.*
                                FROM VOORWERP v
                                LEFT JOIN BOD bo
                                ON bo.VOORWERP = v.VOORWERPNUMMER
                                WHERE v.VOORWERPNUMMER = '$voorwerpnummer'
								                GROUP BY v.VOORWERPNUMMER, v.VERKOPER, v.KOPER, v.TITEL, v.BESCHRIJVING, v.STARTPRIJS, v.STARTPRIJS, v.BETALINGSWIJZE, v.BETALINGSINSTRUCTIE, v.PLAATSNAAM, v.LAND, v.LOOPTIJD, v.LOOPTIJDBEGINDAG, v.LOOPTIJDBEGINTIJDSTIP, v.VERZENDKOSTEN, v.VERZENDINSTRUCTIES, v.LOOPTIJDEINDEDAG, v.LOOPTIJDEINDETIJDSTIP, v.VEILINGGESLOTEN, v.VERKOOPPRIJS
                                ";
        $sqlPlaatje = "SELECT FILENAAM, BESTAND.VOORWERPNUMMER
                       FROM BESTAND
                       INNER JOIN VOORWERP
                       ON BESTAND.VOORWERPNUMMER = VOORWERP.VOORWERPNUMMER
                       WHERE VOORWERP.VOORWERPNUMMER = '$voorwerpnummer'";

        $sqlFeedback = "SELECT *
                       FROM FEEDBACK
                       INNER JOIN VOORWERP
                       ON FEEDBACK.VOORWERPNUMMER = VOORWERP.VOORWERPNUMMER
                       WHERE VOORWERP.VOORWERPNUMMER = '$voorwerpnummer'";

				$resultaatArt = sqlsrv_query($conn, $sqlArtikel);
        $resultaatPlaatje = sqlsrv_query($conn, $sqlPlaatje);
        $resultaatFeedback = sqlsrv_query($conn, $sqlFeedback);

    while( $voorwerp = sqlsrv_fetch_array($resultaatArt, SQLSRV_FETCH_ASSOC)) {

      $url = "http://localhost/I-Project-5/I-Project-5/voorwerp.php";
      $name = "Voorwerp";
      $value = $voorwerp['VOORWERPNUMMER'];
      $newUrl = $url . "?$name=$value";

      $voorwerpnummer = $voorwerp['VOORWERPNUMMER'];
      $verkoper = $voorwerp['VERKOPER'];

      if ($_SERVER['REQUEST_METHOD'] == "POST") {

      if(isset($_POST['inputbod'])) {



        $bodbedrag = $_POST['inputbod'];
        $huidighoogstebod = $voorwerp['HIGH'];
        if($huidighoogstebod == NULL) {
          $huidighoogstebod = $voorwerp['STARTPRIJS'];
        }
      echo $voorwerp['HIGH'];
        if (check_bod($bodbedrag, $huidighoogstebod)) {

        //$gebruiker = $_SESSION['username'];
          $plaatsbod = "INSERT INTO BOD(BODBEDRAG, VOORWERP, GEBRUIKER, BODDAG, BODTIJDSTIP) VALUES ('$bodbedrag', '$voorwerpnummer', 'Faalski', '2015-04-04', '23:12:22' )";
          if (database_query($plaatsbod, null))  {
               echo 'gelukt';
            }
        else {
               echo 'error';
             }
           }
      }
      if(isset($_POST['feedbacktext'])) {
        if($_SESSION['username'] == $verkoper) {
          $soortuser = 'verkoper';
        }
        else {
          $soortuser = 'koper';
        }
        $comment = $_POST['feedbacktext'];
        $plaatsfeedback = "INSERT INTO FEEDBACK(COMMENTAAR, TIJDSTIP, DAG, FEEDBACKSOORT, SOORTGEBRUIKER, VOORWERPNUMMER) VALUES('$comment', '12:00:00', '02-02-2015', 'positief', '$soortuser', '$voorwerpnummer')";
        if (database_query($plaatsfeedback, null))  {
             echo 'gelukt';
          }
      else {
             echo 'error';
           }

      }
    }

        ?>
        <div class="row">
            <div class="col-md-7">
              <?php
              if ( $resultaatPlaatje === false)
              {

              die( print_r( sqlsrv_errors() ) );
              }
              echo '<div class = "rowbestand">';
              while( $plaatjevoorwerp = sqlsrv_fetch_array( $resultaatPlaatje, SQLSRV_FETCH_ASSOC))
              {

              echo ' <img src=" '; echo $plaatjevoorwerp['FILENAAM']; echo ' "> ';
            }
            echo '</div>';
            ?>


                    <div><h3> <?php echo $voorwerp['TITEL']?> </h3></div>
            		<div><b>Locatie: </b><?php echo $voorwerp['PLAATSNAAM'] . " - " . $voorwerp['LAND']; ?></div>
                    <div><b>Begin veiling: </b><?php echo $voorwerp['LOOPTIJDBEGINDAG'] . " om " . $voorwerp['LOOPTIJDBEGINTIJDSTIP']; ?></div>
                    <div><b>Einde veiling: </b><?php echo $voorwerp['LOOPTIJDEINDETIJDSTIP'] . " om " . $voorwerp['LOOPTIJDEINDETIJDSTIP']; ?></div>
                    <div><b>Betaling: </b><?php echo $voorwerp['BETALINGSWIJZE']; ?></div>
                    <div><b>Betalingswijze: </b><?php echo $voorwerp['BETALINGSINSTRUCTIE']; ?></div>
                    <div><b>Levering: </b><?php echo $voorwerp['VERZENDINSTRUCTIES']; ?></div>
                    <div><b>Leveringskosten: </b><?php echo $voorwerp['VERZENDKOSTEN']; ?></div>
                    <div><b>Beschrijving: </b><?php echo $voorwerp['BESCHRIJVING']; ?></div>

                    <?php
                    if ( $resultaatFeedback === false)
                    {

                    die( print_r( sqlsrv_errors() ) );
                    }
                    echo '<div class = "rowbestand">';
                    while( $feedbackvoorwerp = sqlsrv_fetch_array( $resultaatFeedback, SQLSRV_FETCH_ASSOC))
                    {

                    echo '<h3>';   echo $feedbackvoorwerp[ 'FEEDBACKSOORT']; echo '</h3>';
                    echo '<div class="box">';
                    echo $feedbackvoorwerp['COMMENTAAR'];
                    echo $feedbackvoorwerp[ 'TIJDSTIP']; echo $feedbackvoorwerp['DAG'];
                    echo '</div>';
                    echo '<br>';
                  }
                  echo $voorwerp['VERKOPER']; echo $_SESSION['username'];

//  if($_SESSION['username'] == $voorwerp['VERKOPER'] OR $_SESSION['username'] == $voorwerp['KOPER']) {
                    echo '<form method="POST"'; echo 'action=';  echo $newUrl; echo '>';
                    echo '<div class="form-group">';
                        echo '<label for="inputbod">Feedback</label>';
                        echo '<input type="text"'; echo 'class="form-control"'; echo 'id="inputfeedback"';  echo 'placeholder="Uw feedback"';  echo 'name="feedbacktext">';
                        echo '<button type="submit"'; echo 'class="btn btn-default"'; echo 'name="doFeedback">Enter</button>';
                    echo '</div>';
                    echo '</form>';
                 //}
                  echo '</div>';
                  ?>

            </div>



            <div class="col-md-2">

                <h3>Huidig Bod:</h3>
                <h3><?php echo "€".$voorwerp['HIGH']?></h3>
                <form method="POST" action=<?php $newUrl ?>>
                    <div class="form-group">
                        <label for="inputbod">Uw Bod:</label>
                        <input type="number" class="form-control" id="inputbod" placeholder="Uw bod" name="inputbod">
                        <button type="submit" class="btn btn-default" name="doBod">Bieden</button>
                    </div>
                </form>
          </div>


</div>

<?php

    //else if(isset ($_POST['inputfeedback']))
}



    database_disconnect();
?>
