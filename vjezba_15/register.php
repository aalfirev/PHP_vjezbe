<?php
require_once 'dbconn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $country = $_POST['country'];

  
    $sql = "INSERT INTO users (first_name, last_name, email, username, password, country) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $first_name, $last_name, $email, $username, $password, $country);

    if ($stmt->execute()) {
        echo "Registracija uspješna!";
    } else {
        echo "Greška: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
