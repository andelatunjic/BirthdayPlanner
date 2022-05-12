<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idRadnja = $_GET["id"];
    $upravljanje = array();
    $upit = "SELECT * FROM korisnik WHERE korisnik.korisnikId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["id"];
        $uloga = $_POST["ulogaId"];
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $korime = $_POST["korisnickoIme"];
        $email = $_POST["email"];
        $lozinka = $_POST["lozinka"];
        $lozinkasha = $_POST["lozinkaSHA256"];
        $datumreg = $_POST["datumRegistracije"];
        $uvjeti = $_POST["uvjeti"];
        $aktiviran = $_POST["aktiviran"];
        $blokiran = $_POST["blokiran"];
        $link = $_POST["aktivacijskiLink"];
        $neuspjesnePrijave = $_POST["neuspjesnePrijave"];
        
        $upit = "UPDATE korisnik SET korisnikId = '$id', ulogaId = '$uloga', ime = '$ime', prezime = '$prezime', "
                . "korisnickoIme = '$korime', email = '$email', lozinka = '$lozinka', lozinkaSHA256 = '$lozinkasha', datumRegistracije = '$datumreg',"
                . " uvjeti = '$uvjeti', aktiviran = '$aktiviran', blokiran = '$blokiran', aktivacijskiLink = '$link', neuspjesnePrijave = '$neuspjesnePrijave' "
                . "WHERE korisnikId = '$id'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje korisnika.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj korisnika');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediKorisnika.php');
    $smarty->assign("korisnik", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediKorisnika.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

