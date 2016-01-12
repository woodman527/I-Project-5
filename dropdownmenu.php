<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    include_once('header.php');
    include_once('footer.php');
    include_once'sidebartest.php';
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<div class="row">
            <div class="col-md-8">
            <div class="col-md-4">
            <form class="form-horizontal" method="POST" name="select">
            <fieldset>
            <div class="control-group">
            <!-- Select opties -->
            <label class="control-label">Selecteer keuze:</label>
            <select class="form-control" name="selecteeropties">
            <option value="1">Populairste producten</option>
            <option value="2">Goedkoopste producten</option>
            <option value="3">Duurste producten</option>
            </select>       
            </div>
            </fieldset>
            </form>    
            </div>
            </div>
            </div>

<?php
database_connect();
$optie = false;
$keuze = "";
$sql1 = "SELECT STARTPRIJS, VOORWERPNUMMER
FROM VOORWERP
ORDER BY STARTPRIJS ASC";
$sql2 = "SELECT STARTPRIJS, VOORWERPNUMMER
FROM VOORWERP
ORDER BY STARTPRIJS ASC";
$sql3 = "";

if($optie == false) {

    
}

?>

    