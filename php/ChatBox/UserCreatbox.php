<?php include "../include/Header.php"; ?>
<?php include "../include/Navbar.php"; ?>
<?php include "../include/Connectdb.php"; ?>
<br><br><br>
<?php
$textt = $_POST['chatboxUserMessage'];
$send = $_POST['chatboxUserVerstuur'];
$chatboxid = $_SESSION["chatboxid"];


$sql = "INSERT INTO berichten(chatbox_id, textt) VALUES (:chatbox_id, :textt)";
$stmt = $db->prepare($sql);
$stmt->execute([':chatbox_id' => $chatboxid, ':textt' => $textt]);

header("Location: UserChatBox.php")
?>
<?php include "../include/Footer.php"; ?>