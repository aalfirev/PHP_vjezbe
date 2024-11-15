<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $broj1 = $_POST['broj1'];
    $broj2 = $_POST['broj2'];
    $operacija = $_POST['operacija'];

    $rezultat = 0;
    
  
    switch ($operacija) {
        case 'plus':
            $rezultat = $broj1 + $broj2;
            break;
        case 'minus':
            $rezultat = $broj1 - $broj2;
            break;
        case 'mnozenje':
            $rezultat = $broj1 * $broj2;
            break;
        case 'dijeljenje':
            $rezultat = $broj1 / $broj2;
          
            break;
        default:
            $rezultat = "Nepoznata operacija";
            break;
    }

    echo "<h2>Rezultat: $rezultat</h2>";
}
?>