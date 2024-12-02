<?php

function ducan($stanje = "otvoren") {
    echo "Dućan je $stanje<br>";
}


function provjeri_radno_vrijeme() {
   
    $pocetak_radnog_vremena = 8;
    $kraj_radnog_vremena = 20;

  
    $dan = date('N'); 
    $sat = date('G');  

    
    $praznici = ["01-01", "06-25", "12-25", "12-26"]; 
    $trenutni_datum = date('m-d');


    if (in_array($trenutni_datum, $praznici)) {
        ducan("zatvoren zbog praznika");
        return;
    }


    if ($dan >= 1 && $dan <= 5) { 
        if ($sat >= $pocetak_radnog_vremena && $sat < $kraj_radnog_vremena) {
            ducan("otvoren");
        } else {
            ducan("zatvoren");
        }
    } elseif ($dan == 6) { 
        $pocetak_radnog_vremena = 9;
        $kraj_radnog_vremena = 14;
        if ($sat >= $pocetak_radnog_vremena && $sat < $kraj_radnog_vremena) {
            ducan("otvoren");
        } else {
            ducan("zatvoren");
        }
    } elseif ($dan == 7) { 
        ducan("zatvoren zbog nedjelje");
    }
}


provjeri_radno_vrijeme();
?>
