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
include_once('header.php');
include_once('footer.php');
include_once('sidebar.php');
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<div class="content">
    <?php
    if(mysqli_num_rows($search_query)!=0){
    do{ ?>
    <div class="row">
        <div class="'veilingitem">
            <h3><?php echo $search_rs['titel'];?> </h3>
            <img class="media-object" src="<?php echo $search_rs['afbeelding']; ?>" alt="...">
            <a class="button" href="voorbeeldvoorwerp.php">Bied mee</a>
            <h4><?php echo Huidig bod: $search_rs['bod'];?></h4>
            <p><?php echo $search_rs['beschrijving'];?></p>
        </div>
    </div>
    <?php     } while ($search_rs=mysqli_fetch_assoc($search_query));
    }
    else{
    echo "geen resultaten gevonden";
    }
    ?>
</div>

