<?php

$servername = "localhost"; 
$username = "root";        
$password = "";           
$dbname = "webprog";      


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Povezivanje s bazom nije uspjelo: " . $conn->connect_error);
}


$conn->set_charset("utf8");
?>
