<?php
    include_once('header.php');
    include_once('footer.php');
    include 'sidebartest.php';
    include_once ('dbactions.php');
    database_connect();
    ?>
    <head>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
          <link href="css/sidebar.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>

  <div class="content">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="http://localhost/I-Project-5/I-Project-5/ProductOverzicht.php">Titel Oplopend</a></li>
          <li><a href="http://localhost/I-Project-5/I-Project-5/ProductOverzicht.php">Titel aflopend</a></li>
        </ul>
      </div>

    <?php


      $rubrieknummer = intval($_GET['productoverzicht']);

    if($conn) {
      $tsql = "SELECT VOORWERPNUMMER, TITEL, BESCHRIJVING, STARTPRIJS, LOOPTIJDBEGINDAG, LOOPTIJDEINDEDAG, BODBEDRAG
               FROM VOORWERP
               LEFT JOIN BOD
               ON   BOD.VOORWERP = VOORWERP.VOORWERPNUMMER
			         LEFT JOIN VOORWERPINRUBRIEK
			         ON VOORWERPINRUBRIEK.VOORWERP = VOORWERP.VOORWERPNUMMER
			         WHERE VOORWERPINRUBRIEK.RUBRIEKNUMMER = $rubrieknummer
               ORDER BY TITEL";



               $result = sqlsrv_query( $conn, $tsql);




               if ( $result === false)
               {
               die( print_r( sqlsrv_errors() ) );
               }
               while( $voorwerp = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
               {
                 $url = "http://localhost/I-Project-5/I-Project-5/voorbeeldvoorwerp.php";
                 $name = "Voorwerp";
                 $value = $voorwerp['VOORWERPNUMMER'];
                 $newUrl = $url . "?$name=$value";

                 $bsql = "SELECT FILENAAM, BESTAND.VOORWERPNUMMER
                          FROM BESTAND
                          INNER JOIN VOORWERP
                          ON BESTAND.VOORWERPNUMMER = VOORWERP.VOORWERPNUMMER
                          WHERE VOORWERP.VOORWERPNUMMER = $value";

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
            echo '<h5>'; echo $voorwerp['BODBEDRAG']; echo '</h5>';
            echo '<h6>'; echo $voorwerp['LOOPTIJDBEGINDAG']; echo '</h6>';
            echo '<p>';  echo $voorwerp['BESCHRIJVING']; echo '</p>';
            echo '<a class="button"'; echo 'href="'; echo $newUrl;  echo '"><img src= "Images/calltoaction.png">'; echo '</a>';


        echo "</div>";
     echo "</div>";
}
    echo "</div>";




}
?>
</body>
