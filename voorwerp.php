<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('sidebar.php');
 
?>

<?php
  database_connect(); 
        
				$sqlArtikel = "SELECT TOP 1 v.*, b.*, bo.BODBEDRAG 
                                FROM VOORWERP v 
                                INNER JOIN BESTAND b 
                                ON v.VOORWERPNUMMER = b.VOORWERPNUMMER 
                                LEFT JOIN BOD bo
                                ON bo.VOORWERP = v.VOORWERPNUMMER
                                WHERE v.VOORWERPNUMMER = 9
                                ";

				$resultaatArt = sqlsrv_query($conn, $sqlArtikel);
                
    while( $voorwerp = sqlsrv_fetch_array($resultaatArt, SQLSRV_FETCH_ASSOC)) {
	
        ?>
        <div class="row">
            <div class="col-md-7">
        <div><img src=<?php echo $voorwerp['FILENAAM']?> width=200px; height=200px; alt=<?php echo $voorwerp['TITEL']?>  title=<?php echo 
                $voorwerp['TITEL']?>></div>
        
                    <div><h3> <?php echo $voorwerp['TITEL']?> </h3></div>
            		<div><b>Locatie: </b><?php echo $voorwerp['PLAATSNAAM'] . " - " . $voorwerp['LAND']; ?></div>
                    <div><b>Begin veiling: </b><?php echo $voorwerp['LOOPTIJDBEGINDAG'] . " om " . $voorwerp['LOOPTIJDBEGINTIJDSTIP']; ?></div>
                    <div><b>Einde veiling: </b><?php echo $voorwerp['LOOPTIJDEINDETIJDSTIP'] . " om " . $voorwerp['LOOPTIJDEINDETIJDSTIP']; ?></div>
                    <div><b>Betaling: </b><?php echo $voorwerp['BETALINGSWIJZE']; ?></div>
                    <div><b>Betalingswijze: </b><?php echo $voorwerp['BETALINGSINSTRUCTIE']; ?></div>
                    <div><b>Levering: </b><?php echo $voorwerp['VERZENDINSTRUCTIES']; ?></div>
                    <div><b>Leveringskosten: </b><?php echo $voorwerp['VERZENDKOSTEN']; ?></div>
                    <div><b>Beschrijving: </b><?php echo $voorwerp['BESCHRIJVING']; ?></div>
            </div>
            
            <div class="col-md-2">
            
                <h3>Huidig Bod:</h3>
                <h3><?php echo "€".$voorwerp['STARTPRIJS']?></h3>
                <form>
                    <div class="form-group">
                        <label for="inputbod">Uw Bod:</label>
                        <input type="number" class="form-control" id="inputbod" placeholder="Uw bod" name="inputbod">
                        <button type="submit" class="btn btn-default">Bieden</button>
                    </div>
                </form>
            
            </div>
</div>
             	
<?php } ?>
<?php 
    $startprijs = "SELECT STARTPRIJS FROM VOORWERP WHERE VOORWERPNUMMER = 9";
    $bod = $_POST['bod'];
    $bodsopvoorwerp = "SELECT BODBEDRAG FROM BOD WHERE VOORWERP = 9";
    $huidigehoogstebod  = "0";

    while($bodsopvoorwerp loop er door heen)
        {
	       if($huidigehoogstebod < bodvandatabase)
	    {
		$huidigehoogstebod = bodbodvandatabase;
	}
} 
?>