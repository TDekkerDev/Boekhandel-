<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
<?php
    $sql = "SELECT * FROM `boeken` ORDER BY `boeken`.`Rank` ASC"; 
    $sth = $db->prepare($sql); 
    $sth->execute(); 
    while($row = $sth->fetch()) { 
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
    <?php } ?>
<?php include "include/Footer.php"; ?>