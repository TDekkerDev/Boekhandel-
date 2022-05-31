<?php session_start(); ?>
<?php include "../include/Connectdb.php"; ?>
<?php $chatboxid = $_SESSION["chatboxid"];
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
