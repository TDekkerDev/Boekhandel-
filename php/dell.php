<?php
    $id = $_POST['id'];
    echo $id;
    echo "<br>";
    $boeken = json_decode($_COOKIE['shopingcard'], true);
    print_r($boeken);
    $key = array_search($id, $boeken);
    echo "<br>";
    unset($boeken[$key]);
    print_r($boeken);
    echo "<br>";
    setcookie('shopingcard', json_encode($boeken));
    header('Location: /php/Shopingcard.php');
?>