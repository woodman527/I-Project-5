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

      if(isset($_POST['inputbod'])) {



        $bodbedrag = $_POST['inputbod'];
        $voorwerpnummer = $voorwerp['VOORWERPNUMMER'];
        if (check_bod($bodbedrag, $voorwerp['STARTPRIJS'], $voorwerp['HIGH'])) {

        //$gebruiker = $_SESSION['username'];
          $plaatsbod = "INSERT INTO BOD(BODBEDRAG, VOORWERP, GEBRUIKER, BODDAG, BODTIJDSTIP) VALUES ('$bodbedrag', '$voorwerpnummer', 'Faalski', '2015-04-04', '23:11:22' )";
          if (database_query($plaatsbod, null))  {
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

                    echo $feedbackvoorwerp['COMMENTAAR'];
                    echo $feedbackvoorwerp[ 'FEEDBACKSOORT'];
                    echo $feedbackvoorwerp[ 'TIJDSTIP']; echo $feedbackvoorwerp['DAG'];
                    echo '<br>';
                  }
                  if($voorwerp['KOPER'] == $_SESSION['username'] OR $voorwerp['VERKOPER'] == $_SESSION['username'])
                  { echo 'error';?>

                    <form method="POST" action=<?php $newUrl ?>>
                    <div class="form-group">
                        <label for="inputbod">Feedback</label>
                        <input type="text" class="form-control" id="inputfeedback" placeholder="Uw feedback" name="feedbacktext">
                        <button type="submit" class="btn btn-default" name="doFeedback">Enter</button>
                    </div>
                    </form>
                <?php  }
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
