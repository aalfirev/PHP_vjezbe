<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Pogodi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>
<body>

<?php

$zamisljen_broj = rand(1, 9);


$broj = (int) $_POST['broj'];

if ($broj === $zamisljen_broj) {
    
    echo '<form action="index.html" method="get">';
    echo '<button type="submit" >Pogodak! Probaj ponovno!</button>';
    echo "<p>Zamišljenni broj $zamisljen_broj.</p>";
    echo "</form>";
} else {
    
    echo '<form action="index.html" method="get">';
    echo '<button type="submit">Krivo! Probaj ponovno!</button>';
    echo "<p>Zamišljenni broj $zamisljen_broj.</p>";
    echo "</form>";
}
?>

</body>
</html>