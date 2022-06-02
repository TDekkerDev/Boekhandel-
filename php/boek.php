<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
<?php include "include/ChatBoxLogin.php"; ?>
<?php
    $id = $_POST['id'];
    $sql = "SELECT * FROM `boeken` WHERE id = :id"; 
    $sth = $db->prepare($sql); 
    $sth->execute(['id' => $id]); 
    while($row = $sth->fetch()) { 
        ?>

        <br>
        <br>
        <br>
        <div class="boeks-group">
            <div class="boeks">
                <h3> Title: <?php echo $row["Title"] ?></h3>
                <img class="bookImg" src="/media/img/boeken/<?php echo $row["img"]?>.png">
                <img class="SterImg" src="/media/img/steren/ster<?php echo $row["rank"]?>.png">
                <p> Author: <?php echo $row["Author"] ?></p>
                <p> Languages: <?php echo $row["Languages"] ?></p>
                <p> Description: <?php echo $row["Description"] ?></p>
                <p> Price: <?php echo $row["Price"] ?></p>
                <form method="post" action="/php/AddShopingcard.php">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                <input type="submit" class="btn btn-primary" value="+ winkelwaagen">
            </div>
        </div>
    </form>
    <?php } ?>
<?php include "include/Footer.php"; ?>