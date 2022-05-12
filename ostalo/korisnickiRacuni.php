<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    //__________________________________________________________________________
    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDb();
    
    //Dohvaćanje korisnika______________________________________________________
    
    $korisnici = array();
    $upitReze = "SELECT korisnikId, ime, prezime, blokiran FROM korisnik;";

    $rezultat = $veza->selectDB($upitReze);

    while($red = mysqli_fetch_array($rezultat)){
        $statusTer = '';
        if($red['blokiran'] == 1){
            $statusTer = 'Blokiran';
            $red['blokiran'] = $statusTer;
        }
        else if($red['blokiran'] == 0){
            $statusTer = 'Nije blokiran';
            $red['blokiran'] = $statusTer;
        }
        
        $korisnici[] = $red;
    }
    
    $veza->zatvoriDB();
    
    $poruka = "";
    if (isset($_POST['Provjera'])){
        
        $provjera = $_POST['Provjera'];
        $id = $_POST['ID'];
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        

        if ($provjera == "Nije blokiran") {
            $upit = "UPDATE korisnik SET blokiran = 1 WHERE korisnikId = '$id';";
            $veza->updateDB($upit);
            
            $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Blokiranje korisnika','UPDATE korisnik SET blokiran = 1 WHERE korisnikId = id','$vrijeme');";
            $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
            
            $poruka = "Korisnik je sad blokiran!";
            
        }
        else if($provjera == "Blokiran"){
            $upit = "UPDATE korisnik SET blokiran = 0, neuspjesnePrijave = 0 WHERE korisnikId = '$id';";
            $veza->updateDB($upit);
            
            $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Odblokiravanje korisnika','UPDATE korisnik SET blokiran = 0, neuspjesnePrijave = 0 WHERE korisnikId = id','$vrijeme');";
            $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
            
            $poruka = "Korisnik je sad odblokiran!";
        }
        
        $veza ->zatvoriDB();
        
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    } 
    
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled korisničkih računa.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Korisnički računi');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'ostalo/korisnickiRacuni.php');
    $smarty -> assign('poruka', $poruka);
    $smarty -> assign('korisnici', $korisnici);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/korisnickiRacuni.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>

