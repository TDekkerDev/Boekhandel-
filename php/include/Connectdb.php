<?php 
$host = 'localhost'; 
$dbname = 'hcp162243'; 
$username = 'hcp162243'; 
$password = 'r53C19gYGM'; 
$connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8'; 
$db = new PDO($connectStr, $username, $password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  


// $host = 'localhost'; 
// $dbname = 'boekhandel'; 
// $username = 'root'; 
// $password = ''; 
// $connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8'; 
// $db = new PDO($connectStr, $username, $password); 
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 