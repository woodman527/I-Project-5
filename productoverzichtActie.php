<?php 
     
     if(!isset($_SESSION)) { 
        session_start(); 
    } 

include 'dbactions.php';

?>

<?php

function productenLaden() {
    
    database_connect();

    $aantalKolommen = 1;

    echo "<table id=ProductenTabel border='0'><br>";
    
    for($row = 0; $row <10; $row++) {
        echo "<tr>";
        
        for($kolom = 0; $kolom == 2; $kolom++) {
            
            $sqlProducten = "SELECT * FROM VOORWERP WHERE VOORWERPNUMMER = $kolom + $row";
            
            $resultProducten = sqlsrv_query($conn, $sqlProducten);
            
            while($product = sqlsrv_fetch_array(resultProducten, SQLSRV_FETCH_ASSOC)) {
                
                echo "<td>" ?> <form method="post" action="#"><input type="image" src="<?php echo $product[''] ?>" alt="<?php echo $product['TITEL'] ?>" class="Product" value="<?php echo $product['VOORWERPNUMMER'] ?>" name="product"></form><?php 
						echo $product['TITEL']."<br>"; ?> </form> <?php echo "</td>";
                            }

                    } echo "</tr>";
            } echo "</table>";
}
?>

<?php
productenLaden(); 
database_disconnect();
?>