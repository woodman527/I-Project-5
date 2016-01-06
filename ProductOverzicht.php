<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('sidebar.php');
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
    <?php

    if($conn) {
      $tsql = "SELECT TITEL, BESCHRIJVING, STARTPRIJS, LOOPTIJDBEGINDAG, LOOPTIJDEINDEDAG, VERKOOPPRIJS, BODBEDRAG
               FROM VOORWERP
               LEFT JOIN BOD
               ON   BOD.VOORWERP = VOORWERP.VOORWERPNUMMER
               ORDER BY TITEL";

               $result = sqlsrv_query( $conn, $tsql, null);
               if ( $result === false)
               {
               die( print_r( sqlsrv_errors() ) );
               }
               while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
               {
?>


<div class="content">
    <div class="row">
        <div class="veilingitem">
            <h3> <?php echo $row['TITEL'] ?></h3>
            <img class="media-object" src="Images/VoorbeeldAuto1.jpg" alt="...">
            <a class="button" href="voorbeeldvoorwerp.php">Bied Mee</a>
            <h4><?php echo $row['STARTPRIJS'] ?></h4>
            <p><?php echo $row['BESCHRIJVING'] ?></p>
        </div>
    </div>

    </div>
<?php
}
}
?>
