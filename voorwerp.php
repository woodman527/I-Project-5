<?php
    include_once('header.php');
    include_once('footer.php');
    //include_once('sidebar.php');
 
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
                <form method="POST">
                    <div class="form-group">
                        <label for="inputbod">Uw Bod:</label>
                        <input type="number" class="form-control" id="inputbod" placeholder="Uw bod" name="inputbod">
                        <button type="submit" class="btn btn-default" name="doBod">Bieden</button>
                    </div>
                </form>
            
            </div>
</div>
             	
<?php }

    database_disconnect();
?>

<?php 

    database_connect();
    $startprijs = "SELECT STARTPRIJS FROM VOORWERP WHERE VOORWERPNUMMER = 9";
    $bod = $_POST['inputbod'];
    $bodsopvoorwerp = "SELECT BODBEDRAG FROM BOD WHERE VOORWERP = 9";
    $huidigehoogstebod  = $bod;
    $bodvandatabase = 0;

    $sqlResBod = sqlsrv_query($conn, $bodsopvoorwerp);

    while($sqlBod = sqlsrv_fetch_array($sqlResBod, SQLSRV_FETCH_ASSOC))
        {
	       if($huidigehoogstebod < $sqlBod)
	    {
                
               $huidigehoogstebod = $bodvandatabase;
               echo $huidigehoogstebod;
               echo $bodvandatabase;
	}
} 

/*
if($bod > $startprijs && $bod > $huidigehoogstebod)
{
	$verhoging = bod - huidigehoogstebod;
	if($huidigehoogstebod > 1.00 && $huidigehoogstebod < 49.99 && $verhoging > 0.50)
	{
	insert into database new bod.
	}
	else if($huidigehoogstebod > 50.00 && $huidigehoogstebod < 499.99 && $verhoging > 1.00)
	{
	insert into database new bod.
	}
	else if($huidigehoogstebod > 500.00 && $huidigehoogstebod < 999.99&& $verhoging > 5.00)
	{
	insert into database new bod.
	}
	else if($huidigehoogstebod > 1000.00 && $huidigehoogstebod < 4999.99&& $verhoging > 10.00)
	{
	insert into database new bod.
	}
	else if($huidigehoogstebod > 5000.00 && $huidigehoogstebod < 9999999.99&& $verhoging > 50.00)
	{
	insert into database new bod.
	}
	else 
	{
		ERROR
	}
}
	/*		IF EXISTS(SELECT * FROM inserted i WHERE EXISTS(SELECT * FROM VOORWERP v where i.VOORWERP = v.VOORWERPNUMMER AND i.BODBEDRAG < v.STARTPRIJS))
			BEGIN
				RAISERROR('Bod moet minstens groter zijn dan start prijs',16,1)
			END
			IF EXISTS (SELECT * FROM inserted i WHERE CONVERT(numeric,CONVERT(float,i.BODBEDRAG)) < 
											(SELECT MAX(CONVERT(numeric,CONVERT(float,b.BODBEDRAG))) FROM BOD b WHERE i.VOORWERP = b.VOORWERP))
			BEGIN
				RAISERROR('Bod moet minstens groter zijn dan huidige hoogste bod',16,1)
			END
			IF EXISTS (SELECT * FROM inserted i 
								WHERE (CONVERT(numeric,CONVERT(float,i.BODBEDRAG)) - 
								(SELECT MAX(CONVERT(numeric,CONVERT(float,b.BODBEDRAG))) FROM BOD b)) <
								(SELECT CONVERT(numeric,t.VERHOGING) FROM BODVERHOGING t 
																	 WHERE CONVERT(numeric,CONVERT(float,i.BODBEDRAG)) < 
																	 CONVERT(numeric,CONVERT(float,t.GROOTSTEHUIDIGBOD)) 
										     						 AND CONVERT(numeric,CONVERT(float,i.BODBEDRAG)) > 
																	 CONVERT(numeric,CONVERT(float,t.KLEINSTEHUIDIGEBOD))))
			BEGIN
				RAISERROR('Bod moet minstens groter zijn dan minimale verhoging',16,1)
			END
			IF EXISTS(SELECT * FROM inserted i 
								WHERE EXISTS(SELECT * FROM BOD b 
														WHERE EXISTS (SELECT * FROM BODVERHOGING x 
																				WHERE  i.VOORWERP = b.VOORWERP AND CONVERT(numeric, i.BODBEDRAG) > CONVERT(numeric, (SELECT MAX(a.BODBEDRAG) FROM BOD a WHERE i.VOORWERP = a.VOORWERP)) 
																				AND CONVERT(numeric, i.BODBEDRAG) > CONVERT(numeric, x.KLEINSTEHUIDIGEBOD) 
																				AND CONVERT(numeric, i.BODBEDRAG) < CONVERT(numeric, x.GROOTSTEHUIDIGBOD) 
																				AND (CONVERT(numeric, i.BODBEDRAG) - (CONVERT(numeric, (SELECT MAX(a.BODBEDRAG) FROM BOD a WHERE i.VOORWERP = a.VOORWERP)))) < CONVERT(numeric, x.VERHOGING ))))
			BEGIN
			RAISERROR('Bod moet hoger zijn dan de minimale verhoging',16,1)
			END */
?>