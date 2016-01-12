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

    <form class="form-horizontal" action='RegistreerActie.php' method="POST">
        <fieldset>
           <div class="control-group">
      <!-- Select opties -->
        <label class="control-label">Selecteer keuze:</label>
        <select class="form-control" name="selecteeropties">
            <option value="1">Oplopend op prijs.</option>
            <option value="2">Aflopend op prijs.</option>
        </select>       
            </div>
        </fieldset>
    </form>

    