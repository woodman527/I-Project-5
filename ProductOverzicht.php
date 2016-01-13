<?php
    include_once('header.php');
    include_once('footer.php');
    include_once ('sidebartest.php');
    include_once ('dbactions.php');
    database_connect();

    $rubrieknummer = intval($_GET['productoverzicht']);
    $url = "http://localhost/I-Project-5/I-Project-5/ProductOverzicht.php";
    $name = "productoverzicht";
    $value = $rubrieknummer;
    $orgUrl = $url . "?$name=$value"
    ?>
    <head>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

      <div class="row1">
            <div class="col-md-8">
            <div class="col-md-4">
            <form class="form-horizontal" method="POST" name="select" action=<?php $orgUrl ?> >
            <fieldset>
            <div class="control-group">
            <!-- Select opties -->
            <label class="control-label">Selecteer keuze:</label>
            <select class="form-control" name="selecteeropties">
            <option value="TITEL ASC">Titel oplopend</option>
            <option value="TITEL DESC">Titel aflopend</option>
            <option value="HIGH DESC">Duurste producten</option>
            <option value="HIGH ASC">Goekoopste producten</option>
            <option value="LOOPTIJDBEGINDAG DESC">Recente producten</option>
            <option value="LOOPTIJDEINDEDAG ASC">Bijna voorbij producten</option>
            <option value="AANTAL DESC">Populaire producten</option>
            </select>

          </div>

        </div>
        <input type="submit" placeholder="refresh">
      </div>
    </div>

    <?php
      if($_SERVER['REQUEST_METHOD'] == "POST") {

        $orde = $_POST['selecteeropties'];
      }
      else {
        $orde = "TITEL ASC";
      }


    if($conn) {
      $tsql = "SELECT VOORWERPNUMMER, TITEL, BESCHRIJVING, STARTPRIJS, LOOPTIJDBEGINDAG, LOOPTIJDEINDEDAG, MAX(BODBEDRAG) AS HIGH, COUNT(BODBEDRAG) AS AANTAL
               FROM VOORWERP v
               LEFT JOIN BOD
               ON   BOD.VOORWERP = v.VOORWERPNUMMER
			         LEFT JOIN VOORWERPINRUBRIEK
			         ON VOORWERPINRUBRIEK.VOORWERP = v.VOORWERPNUMMER
			         WHERE VOORWERPINRUBRIEK.RUBRIEKNUMMER = $rubrieknummer
               GROUP BY v.VOORWERPNUMMER, v.VERKOPER, v.KOPER, v.TITEL, v.BESCHRIJVING, v.STARTPRIJS, v.STARTPRIJS, v.BETALINGSWIJZE, v.BETALINGSINSTRUCTIE, v.PLAATSNAAM, v.LAND, v.LOOPTIJD, v.LOOPTIJDBEGINDAG, v.LOOPTIJDBEGINTIJDSTIP, v.VERZENDKOSTEN, v.VERZENDINSTRUCTIES, v.LOOPTIJDEINDEDAG, v.LOOPTIJDEINDETIJDSTIP, v.VEILINGGESLOTEN, v.VERKOOPPRIJS
               ORDER BY $orde";



               $result = sqlsrv_query( $conn, $tsql);




               if ( $result === false)
               {
               die( print_r( sqlsrv_errors() ) );
               }
               while( $voorwerp = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
               {

                if($_SESSION['logged'] == true) {
                 $url = "voorwerp.php";
                 $name = "Voorwerp";
                 $value = $voorwerp['VOORWERPNUMMER'];
                 $newUrl = $url . "?$name=$value";
}
                 else {
                   $url = "ProductOverzicht.php";
                   $name = "productoverzicht";
                   $value = $rubrieknummer;
                   $newUrl = $url . "?$name=$value";
                 }

                 $voorwerpafb = $voorwerp['VOORWERPNUMMER'];
                 $bsql = "SELECT FILENAAM, BESTAND.VOORWERPNUMMER
                          FROM BESTAND
                          INNER JOIN VOORWERP
                          ON BESTAND.VOORWERPNUMMER = VOORWERP.VOORWERPNUMMER
                          WHERE VOORWERP.VOORWERPNUMMER = $voorwerpafb";

                          $bresult = sqlsrv_query( $conn, $bsql);



    echo '<div class="row">';
      echo  '<div class="veilingitem">';
          echo '<h3>';  echo $voorwerp['TITEL']; echo '</h3>';

          if ( $bresult === false)
          {

          die( print_r( sqlsrv_errors() ) );
          }
          echo '<div class = "rowbestand">';
          while( $filevoorwerp = sqlsrv_fetch_array( $bresult, SQLSRV_FETCH_ASSOC))
          {

          echo ' <img src=" '; echo $filevoorwerp['FILENAAM']; echo ' "> ';
        }
        echo '</div>';
            //<a class="button" href="voorbeeldvoorwerp.php">Bied Mee</a>
            echo '<h4>'; echo $voorwerp['STARTPRIJS']; echo '</h4>';
            echo '<h5>'; echo $voorwerp['HIGH']; echo '</h5>';
            echo '<h6>'; echo $voorwerp['LOOPTIJDBEGINDAG']; echo '</h6>';
            echo '<p>';  echo $voorwerp['BESCHRIJVING']; echo '</p>';

            echo '<a class="button"'; echo 'href="'; echo $newUrl;  echo '"><img src= "Images/calltoaction.png">'; echo '</a>';


        echo "</div>";

}
echo "</div>";
    echo "</div>";




}
?>
</body>
