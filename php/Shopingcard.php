<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
<br>
<br>
<br>
<?php
$boeken = json_decode($_COOKIE['shopingcard'], true);
print_r($boeken) ;
echo "<br>";
$boekenmet = implode(",", $boeken);
echo $boekenmet;
$sql = "SELECT * FROM boeken WHERE id IN (id:)";
$sth = $db->prepare($sql); 
$sth->execute(['id' => $boekenmet]); 
while($row = $sth->fetch()) { 
    echo $row["Title"];
} 
?>
<?php include "include/Footer.php"; ?>