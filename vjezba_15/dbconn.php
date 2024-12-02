<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Povezivanje s bazom nije uspjelo: " . $conn->connect_error);
}
?>
