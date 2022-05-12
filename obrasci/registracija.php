<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $greska = "";
    $uspjeh = "";
    
    $ime = (isset($_POST['ime'])) ? $_POST['ime'] : null;
    $prezime = (isset($_POST['prezime'])) ? $_POST['prezime'] : null;
    $korisnickoIme = (isset($_POST['korisnickoIme'])) ? $_POST['korisnickoIme'] : null;
    $email = (isset($_POST['email'])) ? $_POST['email'] : null;
    $lozinka = (isset($_POST['lozinka'])) ? $_POST['lozinka'] : null;
    $plozinka = (isset($_POST['plozinka'])) ? $_POST['plozinka'] : null;
    $kod = (isset($_POST['kod'])) ? $_POST['kod'] : null;
    
    $lozinkaSHA256 =  hash("sha256", $lozinka);
    $datumRegistracije = date("Y-m-d H:i:s");
    
    if (isset($_POST["submit"])){
        //validacija
        if($ime == '' || $prezime == '' || $korisnickoIme == '' || $email == '' || $lozinka == '' || $plozinka == '' || $kod == ''){
            $greska .= "Molimo vas da popunite sva polja. <br>";
        }
        if(strlen($ime) < 3){
            $greska .= "Ime mora imati minimalno 3 znaka. <br>";
        }
        if(strlen($prezime) < 3){
            $greska .= "Prezime mora imati minimalno 3 znaka. <br>";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greska .= "Neispravan email. <br>";
        }
        if(!preg_match('@[0-9]@', $lozinka)){
            $greska .= "Lozinka mora imati barem jedan broj. <br>";
        }
        if(!preg_match('@[A-Z]@', $lozinka)){
            $greska .= "Lozinka mora imati barem jedno veliko slovo. <br>";
        }
        if($lozinka != $plozinka){
            $greska .= "Lozinka i ponovljena lozinka nisu iste. <br>";
        }
        //dodavanjeNovogKorisnika
        if ($greska == "") {
            
            $veza = new Baza();
            $veza->spojiDB();
            
            $aktivacijskiLink = "http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x098/obrasci/prijava.php?korime=" . $korisnickoIme . "&datum=" . $datumRegistracije;
            $upit = 'INSERT INTO korisnik VALUES (DEFAULT, 4, "'.$ime.'","'.$prezime.'","'.$korisnickoIme.'","'.$email.'","'.$lozinka.'","'.$lozinkaSHA256.'","'.$datumRegistracije.'","'.$datumRegistracije.'", 0, 0, "'.$aktivacijskiLink.'", 0);';
            
            $rezultat = $veza->updateDB($upit);
            if ($rezultat != "") {
                $aktivacija = "Potvrdite svoj račun klikom na aktivacijski link u nastavku: " . $aktivacijskiLink;
                mail($email, "Potvrda Računa", $aktivacija);
                $uspjeh = "Uspješno ste se registrirali. Provjerite e-mail kako biste aktivirali svoj korisnički račun!";
            }else{
                $uspjeh = "Neuspješna registracija.";
            }
            $veza ->zatvoriDB();
        }
    }
    
    //AJAX provjera korisničkog imena u bazi____________________________________
    $korisnickoime = (isset($_POST['korisnickoime'])) ? $_POST['korisnickoime'] : null;
    $greskaKorime = "";
    
    if ($korisnickoime != ""){
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $upit = "SELECT korisnickoIme FROM korisnik WHERE korisnickoIme = '$korisnickoime'";
        $rezultat = $veza->selectDB($upit);
        
        if(mysqli_num_rows($rezultat) > 0){
            
            $greskaKorime = "Korisničko ime je zauzeto.";
         
         } else {
            $greskaKorime = "";
         }
         
         $jsonObjekt["poruka"] = $greskaKorime;
         echo json_encode($jsonObjekt);
         exit();
         
         $veza ->zatvoriDB();
    }

    
    //Smarty____________________________________________________________________
    $opis = "Stranica za registraciju novog korisnika.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Registracija');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/registracija.php');
    $smarty -> assign('greska', $greska);
    $smarty -> assign('uspjeh', $uspjeh);
    $smarty -> assign('greskaKorime', $greskaKorime);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/registracija.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>