

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sidebar</title>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>


<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php echo "fndiaonfcoisanf"; ?>
        

        <?php
        if(!isset($_SESSION)) {
        session_start();
        }

            include_once 'dbactions.php';
            database_connect();

            $sqlRubrieken = "SELECT * FROM RUBRIEK";
            $resultRubrieken = sqlsrv_Query($conn, $sqlRubrieken);

            while($rubrieken = sqlsrv_fetch_array(resultRubrieken, SQLSRV_FETCH_ASSOC)){

            if($rubrieken['HOOFDRUBRIEK'] == NULL)
            {
                echo "<li class="dropdown">";
                echo "<a href="" class="dropdown-toggle" data-toggle="dropdown">"+$rubrieken['RUBRIEKNAAM']+" <span class="caret"></span></a>";
                echo "<ul class="dropdown-menu forAnimate" role="menu">";
                while($rubrieken = sqlsrv_fetch_array(resultRubrieken, SQLSRV_FETCH_ASSOC)){
                    if($rubrieken['HOOFDRUBRIEK'] != NULL AND $rubrieken['HOOFDRUBRIEK'] == $rubrieken['RUBRIEKNUMMER'])
                    {
                        echo "<li><a href="">"+$rubrieken['RUBRIEKNAAM']+"</a></li>";
                    }
                }
                echo "</ul>";
                echo "</li>"
            }

        }

        ?><!--
        echo "<li><a href="ProductOverzicht.php">Auto's</a></li>";
        echo "<li class="dropdown">";
          echo "<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kleding <span class="caret"></span></a>";
          echo "<ul class="dropdown-menu forAnimate" role="menu">";
            echo "<li><a href="#">Onderbroeken</a></li>";
            echo "<li><a href="#">T-shirts</a></li>";
            echo "<li><a href="#">Broeken</a></li>";
            echo "<li><a href="#">Schoenen</a></li>";
            echo "<li><a href="#">Sokken</a></li>";
          echo "</ul>";
        echo "</li>";
        echo "<li ><a href="#">Fietsen</a></li>";
        echo "<li ><a href="#">Elektronica</a></li>";-->
      </ul>
    </div>
  </div>
</nav>

</html>
