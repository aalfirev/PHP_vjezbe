<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $ocjena = array($_POST['kolokvij1'], $_POST['kolokvij2']);
    
   
      
    if ($ocjena[0] == 1 || $ocjena[1] == 1) {
        print 'Negativna ocjena';
    }  else {
        $prosjek = ($ocjena[0] + $ocjena[1]) / 2;
      }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultat izračuna ocjene</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Rezultat izračuna</h1>

        <p>Ocjena I. kolokvija: <?php echo $ocjena[0]; ?></p>
        <p>Ocjena II. kolokvija: <?php echo $ocjena[1]; ?></p>

        <h2>Konačna ocjena: <?php echo round($prosjek); ?></h2>

        <a href="index.html">Pokušaj ponovno</a>
    </div>

</body>
</html>