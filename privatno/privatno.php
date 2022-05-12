<?php

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    //__________________________________________________________________________
    $veza =  new Baza();
    $veza->spojiDB();
    
    $korisnici = array();
    $upitKorisnik = "SELECT ime, prezime, korisnickoIme, email, lozinka FROM korisnik";

    $rezultatK = $veza->selectDB($upitKorisnik);

    while($red = mysqli_fetch_array($rezultatK)){
        $korisnici[] = $red;
    }
    
    $veza->zatvoriDB();
    
    //Smarty____________________________________________________________________
    

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
    $smarty -> assign('korisnici', $korisnici);
    
    $smarty->display("../templates/privatno.tpl");
   
?>
