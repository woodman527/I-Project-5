<?php
		function Producten() {
			//Connectie met de database
			include('BPDatabase.php');
			//Variabele voor het aantal producten dat van links naar rechts staan
			$numberOfColumns = 4;
														
            echo "<table id=ProductenTabel border='0'><br>";
			for($row = 0; $row < 6; $row++) {
				echo "<tr>";
				for($column = 1; $column <= 4; $column++) {
					//Query om elk product uit database te halen
					//Column telt steeds van 1 tot 4
					//Row steeds 1 erbij die je keer 4 doet want zijn al 4 prodcuten verder, zo ga je elk product langs
					$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4";
					//Controleert of er op de categorie Nike is gedrukt
					if(isset($_POST['Nike'])) {
						//Query voor alle Nike Producten
						$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4 AND CATEGORIE = 'Nike'";
					}
					//Controleert of er op de categorie Adidas is gedrukt
					if(isset($_POST['Adidas'])) {
						//Query voor alle Adidas Producten
						$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4 AND CATEGORIE = 'Adidas'";
					}
					//Controleert of er op de categorie New Balance is gedrukt
					if(isset($_POST['NewBalance'])) {
						//Query voor alle New Balance Producten
						$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4 AND CATEGORIE = 'New Balance'";
					}
					//Controleert of er op de categorie Asics is gedrukt
					if(isset($_POST['Asics'])) {
						//Query voor alle New Balance Producten
					$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4 AND CATEGORIE = 'Asics'";
					}
					//Controleert of er op de categorie Nike is gedrukt
					if(isset($_POST['Zoeken'])) {
						//Kijkt wat er in de zoekbox is ingetikt
						$zoekterm = "%".$_POST['zoek']."%";
						//Query voor alle producten waar zoekterm in de naam zit
						$sqlimages = "SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = $column + $row * 4 AND PRODUCTNAAM LIKE '$zoekterm'";
					}
					
					$resultimages = sqlsrv_query($conn, $sqlimages);
					while($product = sqlsrv_fetch_array($resultimages, SQLSRV_FETCH_ASSOC)) {
						//Hier worden de producten weergegeven
						echo "<td width=25%>"?> <form method="post" action="BPProductpagina.php"><input type="image" src="<?php echo $product['AFBEELDING_GROOT']?>" alt="<?php echo $product['PRODUCTNAAM']?>" class="Product" value="<?php echo $product['PRODUCTNUMMER']?>" name="product"></form><?php 
						echo $product['PRODUCTNAAM']."<br>";
						echo "____________________<br><br>"; ?>
						<form method="post" action="BPWinkelwagen.php"><?php echo "€".$product['PRIJS'];"</td>";
						
						//Als het product geen voorraad meer heeft
                        if($product['VOORRAAD'] == 0) { ?>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Uitverkocht!</strong>
                        <?php } 
						//Als het product gewoon op voorraad is
						else { ?>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="winkelwagen">In winkelwagen</button></form>
                       	<?php }								  
					}
				}
				echo "</tr>";
			}
			echo "</table>";
		}
		?>	