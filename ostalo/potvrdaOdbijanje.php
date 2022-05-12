<?php
    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    $poruka = "";
    
    if(isset($_GET["idP"])){
        
        $veza =  new Baza();
        $veza->spojiDB();
        
        $ID = $_GET["idP"];

        $upit = "UPDATE rezervacija SET statusRezervacije = '1' WHERE rezervacijaId = '$ID'";
        
        $rezultat = $veza->updateDB($upit);
        if ($rezultat != "") {
            $poruka = "Rezervacija potvrđena!";
        }else{
            $poruka = "Pokušajte ponovno";
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Potvrdivanje rezervacije','UPDATE rezervacija SET statusRezervacije = 1 WHERE rezervacijaId = ID','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
            
        $veza->zatvoriDB();

    }
    
    if(isset($_GET["idO"])){
        
        $veza =  new Baza();
        $veza->spojiDB();
        
        $ID = $_GET["idO"];

        $upit = "UPDATE rezervacija SET statusRezervacije = '2' WHERE rezervacijaId = '$ID'";
        
        $rezultat = $veza->updateDB($upit);
        if ($rezultat != "") {
            $poruka = "Rezervacija odbijena!!";
        }else{
            $poruka = "Pokušajte ponovno";
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Odbijanje rezervacije','UPDATE rezervacija SET statusRezervacije = 0 WHERE rezervacijaId = ID','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
            
        $veza->zatvoriDB();

    }
    
    //Smarty
    $opis = "Potvrda i odbijanje rezervacije";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Potvrda/Odbijanje rezervacije');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'ostalo/potvrdaOdbijanje.php');
    $smarty -> assign('poruka', $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/potvrdaOdbijanje.tpl");
    $smarty->display("../templates/podnozje.tpl");   
    
    
?>