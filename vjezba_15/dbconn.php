<?php
$servername = "localhost"; // Zamijenite s adresom vašeg servera ako nije lokalni
$username = "root";        // Korisničko ime za bazu
$password = "";            // Lozinka za bazu
$dbname = "vjezbe";        // Naziv baze podataka

// Povezivanje s bazom podataka
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera veze
if ($conn->connect_error) {
    die("Povezivanje s bazom nije uspjelo: " . $conn->connect_error);
}
?>
