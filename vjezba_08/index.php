<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Izbor Vozila</title>
</head>
<body>

<?php

$cars = array("Audi", "BMW", "Renault", "Citroen");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_car'])) {
    $selectedCar = $_POST['selected_car'];
    echo "<p>Odabrali ste vozilo: <strong>$selectedCar</strong></p>";
} else {
    echo "<p>Molimo odaberite vozilo:</p>";
}
?>


<form action="" method="post">
    
        <?php
       
        foreach ($cars as $car) {
            echo "<br><input type='radio' name='selected_car' value='$car' id='$car'>";
            echo "<label for='$car'>$car</label>";
        }
        ?>
    <br>
    <button type="submit">Prikaži odabrano vozilo</button>
</form>

</body>
</html>

