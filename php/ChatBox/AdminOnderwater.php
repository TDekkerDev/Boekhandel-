<?php session_start(); ?>
<?php include "../include/Connectdb.php"; ?>
<?php 
    $chatboxid = $_GET["chatid"];
    $name = $_SESSION["name"];
?>
<?php
                $sql1 = "SELECT * FROM `berichten` WHERE chatbox_id = :chatbox_id";
                $sth1 = $db->prepare($sql1); 
                $sth1->execute([":chatbox_id" => $chatboxid]); 
                while($row1 = $sth1->fetch()) {
                    if ($row1['aadmin'] == 1) {
                        echo "<div class='admin'>";
                        echo $row1['textt'];
                        echo "<br>";
                        echo "</div>";
                    } else {
                        echo $row1['textt'];
                        echo "<br>";
                    }
                }
            echo "<br><br>";
            ?>
        </div>
