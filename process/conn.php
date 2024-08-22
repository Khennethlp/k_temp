<?php


date_default_timezone_set('Asia/Manila');
$server_month = date('Y-m-01');
$servername = 'localhost'; $username = 'root'; $password = '';

try {
    $conn = new PDO ("mysql:host=$servername;dbname=test",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION'.$e->getMessage();
}


?>