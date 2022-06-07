<?php include "../include/Header.php"; ?>
<?php include "../include/Navbar.php"; ?>
<?php include "../include/Connectdb.php"; ?>
<br><br><br>
<?php
$name = $_POST['chatboxUserNaam'];
$email = $_POST['chatboxUserEmail'];
$tell = $_POST['chatboxUserTelefoon'];
$send = $_POST['chatboxUserVerstuur'];
$adminid = 1;


$sql1 = "INSERT INTO user(Namee, Email, tel) VALUES (:namee, :email, :tel)";
$stmt1 = $db->prepare($sql1);
$stmt1->execute([':namee' => $name, ':email' => $email , ':tel' => $tell]);


$sql2 = "SELECT * FROM user WHERE email = :email";
$sth2 = $db->prepare($sql2); 
$sth2->execute([":email" => $email]); 
while($row2 = $sth2->fetch()) {
    $nnaamm = $row2['Namee'];
    $userid = $row2['id'];
    $sql3 = "INSERT INTO chatbox(userid, adminid) VALUES (:userid, :adminid)";
    $stmt3 = $db->prepare($sql3);
    $stmt3->execute([':userid' => $userid, ':adminid' => $adminid]);
    $_SESSION["userid"] = $userid;
}

$sql5 = "SELECT * FROM chatbox WHERE userid = :userid";
$sth5 = $db->prepare($sql5); 
$sth5->execute([":userid" => $userid]); 
while($row5 = $sth5->fetch()) {
    $chatboxid = $row5['id'];
}
$_SESSION["chatboxid"] = $chatboxid;
$_SESSION["name"] = $nnaamm;
header("Location: UserChatBox.php")
?>
<?php include "../include/Footer.php"; ?>