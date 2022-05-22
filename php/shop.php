<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
    <div class= "shopmain">
    <?php
    $sql = "SELECT * FROM `boeken` ORDER BY `boeken`.`rank` DESC"; 
    $sth = $db->prepare($sql); 
    $sth->execute(); 
    while($row = $sth->fetch()) { 
    ?>
        <div class = "shop">
            <img src="/media/img/boeken/<?php echo $row["img"]?>.png">
            <?php
            echo "<br>";
            echo $row["Title"];
            echo "<br>";
            echo "&euro;" , $row["Price"];
            echo "<br>";
            ?>
            <form method="post" action="/php/boek.php">
                <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                <input type="submit" class="btn btn-primary" value="Bekijks">
            </form>
        </div>
    <?php } ?>
    </div>
<?php include "include/Footer.php"; ?>