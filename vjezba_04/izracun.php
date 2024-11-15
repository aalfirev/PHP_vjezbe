<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Izračun</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
$a = (float) $_POST['vrijednost_a'];
$b = (float) $_POST['vrijednost_b'];


$c = (3 * $a * $b) / 2;


print "Vrijednost po formuli c=(3a-b)/2 je: $c";
?>

</body>
</html>