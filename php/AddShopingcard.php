<?php include "include/Header.php"; ?>
<?php $id = $_POST['id'];
echo $id;
$boeken = json_decode($_COOKIE['shopingcard'], true);
if (in_array($id , $boeken))
    {
        echo "found";
    }else{
        $boeken[]=$id;
        setcookie('shopingcard', json_encode($boeken));
    }
header('Location: /php/Shopingcard.php');
exit();
?>