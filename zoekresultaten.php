<?php
    include("dbactions.php");
    database_connect();
    if(!isset($_POST['zoek'])){
        header("Location:index.php");
    }
    $search_sql="SELECT * FROM Voorwerp WHERE titel LIKE '%".$_POST['zoek']."%' OR WHERE beschrijving LIKE '%".$_POST['zoek']."%'";
    $search_query=mysqli_query($search_sql);
    if(mysqli_num_rows($search_query)!=0) {
        $search_rs = mysqli_fetch_assoc($search_query);
    }
}
?>

<?php
    if(mysqli_num_rows($search_query)!=0){
        do{ ?>
        <p><?php echo $search_rs['titel'];?> </p>
   <?php     } while ($search_rs=mysqli_fetch_assoc($search_query));
    }
    else{
    echo "geen resultaten gevonden";
    }
?>
