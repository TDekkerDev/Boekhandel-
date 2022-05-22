<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
<?php
    $id = $_POST['id'];
    $sql = "SELECT * FROM `boeken` WHERE id = :id"; 
    $sth = $db->prepare($sql); 
    $sth->execute(['id' => $id]); 
    while($row = $sth->fetch()) { 
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo $row["id"];
    echo "<br>";
    echo $row["Title"];
    echo "<br>";
    echo $row["Description"];
    echo "<br>";
    echo $row["rank"];
    echo "<br>";
    echo $row["Price"];
    echo "<br>";
    echo "<br>";
    ?>
    <img src="/media/img/steren/ster<?php echo $row["rank"]?>.png">
    <form method="post" action="/php/AddShopingcard.php">
        <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
        <input type="submit" class="btn btn-primary" value="+ winkelwaagen">
    </form>
    <?php } ?>
<?php include "include/Footer.php"; ?>