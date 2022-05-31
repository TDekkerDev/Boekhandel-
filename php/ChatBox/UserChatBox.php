<?php include "../include/Header.php"; ?>
<?php include "../include/Navbar.php"; ?>
<?php include "../include/Connectdb.php"; ?>
<?php $chatboxid = $_SESSION["chatboxid"];
    $name = $_SESSION["name"];?>
<br><br><br>
<br><br>
<div class="chat">
    <h3> <?php echo $name ?> </h3>
    <div id="text">
        <?php
            $sql = "SELECT * FROM `berichten` WHERE chatbox_id = :chatbox_id";
            $sth = $db->prepare($sql); 
            $sth->execute([":chatbox_id" => $chatboxid]); 
            while($row = $sth->fetch()) {
                if ($row['aadmin'] == 0) {
                    echo "<div class='admin'>";
                    echo $row['textt'];
                    echo "<br>";
                    echo "</div>";
                } else {
                    echo $row['textt'];
                    echo "<br>";
                }
            }
        ?>
    </div>
    <div class="inpute">
    <form method="post" action="UserCreatbox.php">
    <input type="hidden" name="admin" value="0">
        <input type="text" name="chatboxUserMessage" id="chatboxUserMessage" placeholder="Typ hier je bericht..." autofill="fals">
        <input type="submit" name="chatboxUserVerstuur" id="chatboxUserVerstuur" value="Verstuur">
    </div>

</div>
<?php include "../include/Footer.php"; ?>