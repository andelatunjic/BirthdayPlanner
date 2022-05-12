<?php

    function zapisDnevnika($tipRadnjeId, $upit = NULL){
        $veza = new Baza();
        $veza->spojiDB();
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");
        
        $radnja;

        if ($tipRadnjeId == 1){
            $radnja = "Prijava/Odjava";
        }
        else if ($tipRadnjeId == 2){
            $radnja = "Rad s bazom";
        }
        else if ($tipRadnjeId == 3){
            $radnja = "Ostale radnje";
        }
        
        $upitBaza = "INSERT INTO dnevnik (dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme)
                    VALUES (DEFAULT, '$korisnikId', '$tipRadnjeId', '$radnja', '$upit', '$vrijeme')";
        
        $veza->updateDB($upitBaza);
        $veza->zatvoriDB();
    }
?>