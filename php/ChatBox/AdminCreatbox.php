<?php include "../include/Header.php"; ?>
<?php include "../include/Navbar.php"; ?>
<?php include "../include/Connectdb.php"; ?>
<br><br><br>
<?php
$admin = 1;
$textt = $_POST['chatboxUserMessage'];
$send = $_POST['chatboxUserVerstuur'];
$chatboxid = $_POST["chatboxid"];

$sql = "INSERT INTO berichten(chatbox_id, textt, aadmin) VALUES (:chatbox_id, :textt, :aadmin)";
$stmt = $db->prepare($sql);
$stmt->execute([':chatbox_id' => $chatboxid, ':textt' => $textt, ':aadmin' => $admin]);

header("Location: AdminChatbox.php")
?>
<?php include "../include/Footer.php"; ?>