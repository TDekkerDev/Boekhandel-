<?php
    include "../include/connectdb.php";
    $sql = "SELECT * FROM admin WHERE name=:name AND pass=:pass";
    $st = $db->prepare($sql);
    $st->execute([
            ":name" => $_POST["uname"],
            ":pass" => $_POST["password"],
    ]);

    if ($row = $st->fetch()) {
        $_SESSION['login'] = true;
        header("Location: /php/ChatBox/AdminChatbox.php");
    } else {
        echo "werkt niet";
        $_SESSION["msg"] = "<em>Onbekende inlog!</em><br><br>";
    }
?>




