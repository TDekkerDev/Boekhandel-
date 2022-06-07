<?php include "../include/Header.php"; ?>
<?php include "../include/Navbar.php"; ?>
<?php include "../include/Connectdb.php"; ?>
<br><br><br>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);


$chatboxid = $_POST["chatboxid"];

$sql1 = "SELECT * FROM chatbox WHERE id = :id";
$sth1 = $db->prepare($sql1); 
$sth1->execute([":id" => $chatboxid]); 
while($row1 = $sth1->fetch()) {
    $userid = $row1['userid'];
}

$sql2 = "SELECT * FROM user WHERE id = :id";
$sth2 = $db->prepare($sql2); 
$sth2->execute([":id" => $userid]); 
while($row2 = $sth2->fetch()) {
    $to = $row2['Email'];
    $subject = "help";
}
$message = "";
$sql3 = "SELECT * FROM berichten WHERE chatbox_id = :chatbox_id";
$sth3 = $db->prepare($sql3); 
$sth3->execute([":chatbox_id" => $chatboxid]); 
while($row3 = $sth3->fetch()) {
    $message .= $row3['textt'] . "<br>";
}

mail($to,$subject,$message);

$sql = "DELETE FROM berichten WHERE chatbox_id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $chatboxid]);

$sql1 = "DELETE FROM chatbox WHERE id = :id";
$stmt1 = $db->prepare($sql1);
$stmt1->execute([':id' => $chatboxid]);

$sql2 = "DELETE FROM user WHERE id = :id";
$stmt2 = $db->prepare($sql1);
$stmt2->execute([':id' => $userid]);

header("Location: AdminChatbox.php")
?>
<?php include "../include/Footer.php"; ?>