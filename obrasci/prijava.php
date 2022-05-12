<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);
    
    require "../ostalo/dnevnik.php";

    require "../vanjske_biblioteke/sesija.class.php";
    Sesija::kreirajSesiju();
    
    require "../vanjske_biblioteke/baza.class.php";
    
    $greska = "";
    $uspjeh = "";

    //Prijava putem HTTPS-a
    if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] === "off"){
        $adresa = 'https://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        header("Location: $adresa");
        exit();
    }
    
    //odjava
    if(isset($_GET['odjava'])){
        zapisDnevnika(1);
        Sesija::obrisiSesiju();
        $uspjeh = "Uspješno ste se odjavili!";
    }
    
    //aktivacija
    if (isset($_GET["korime"])){
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $korisnickoime = $_GET["korime"];
        $datum = $_GET["datum"];

        $upit = "UPDATE korisnik SET ulogaId = 3, aktiviran = 1 WHERE korisnickoIme = '$korisnickoime'";
        $veza->updateDB($upit);
        $uspjeh = "Uspješno ste aktivirali svoj korisnički račun!";
        
        $veza ->zatvoriDB();
    }

    $korisnickoIme = (isset($_POST['korisnickoIme'])) ? $_POST['korisnickoIme'] : null;
    $lozinka = (isset($_POST['lozinka'])) ? $_POST['lozinka'] : null;
   
    //funkcija za dodavanje neuspješne prijave i blokiranje korisnika___________
    function dodajNeusjesnuPrijavu($korime){
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $upit = "UPDATE korisnik SET neuspjesnePrijave = neuspjesnePrijave + 1 WHERE korisnickoIme = '$korime'";
        $veza->updateDB($upit);
        
        $upitSve = 'SELECT * FROM korisnik WHERE korisnickoIme = "'.$korime.'";';
        $odgovor = $veza->selectDB($upitSve);
        $rezultat = mysqli_fetch_array($odgovor);
        if($rezultat) {

            if ($rezultat["neuspjesnePrijave"] >= 3){
                $upitBlokiraj = "UPDATE korisnik SET blokiran = 1 WHERE korisnickoIme = '$korime'";
                $veza->updateDB($upitBlokiraj);
            }
        }
        
        $veza ->zatvoriDB();
    }
    
    //funkcija za generiranje nove lozinke
    function generirajNovuLozinku(){
        $lozinka = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);
        return $lozinka;
    }
    
    //zaboravljena lozinka
    $korisnickoimeloz = (isset($_POST['korisnickoimeloz'])) ? $_POST['korisnickoimeloz'] : null;
    if($korisnickoimeloz != ""){
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $novaLozinka = generirajNovuLozinku();
        $lozinkaSHA256 =  hash("sha256", $novaLozinka);
        
        $upitSve = "SELECT * FROM korisnik WHERE korisnickoIme = '$korisnickoimeloz'";
        $rezultat = $veza->selectDB($upitSve);
        $upravljanje = mysqli_fetch_array($rezultat);
        $email = $upravljanje["email"];
        
        $upit = "UPDATE korisnik SET lozinka = '$novaLozinka', lozinkaSHA256 = '$lozinkaSHA256' WHERE korisnickoIme = '$korisnickoimeloz'";
        $rez = $veza->updateDB($upit);
        
        $poruka = "Zatražili ste novu lozinku. Vaša nova lozinka je: " . $novaLozinka;
        
        mail($email, "Nova lozinka", $poruka);
        
        $uspjeh = "Na email Vam je poslana nova lozinka";
        
        $jsonObjekt = $uspjeh;
        echo json_encode($jsonObjekt);
        exit();
        
        $veza ->zatvoriDB();
    }
    
    //prijava
    if($korisnickoIme != "" && $lozinka != ""){

        $veza = new Baza();
        $veza->spojiDB();
        
        $lozinkaSHA256 =  hash("sha256", $lozinka); 
        $upit = 'SELECT * FROM korisnik WHERE korisnickoIme = "'.$korisnickoIme.'";';

        $odgovor = $veza->selectDB($upit);
        $rezultat = mysqli_fetch_array($odgovor);
        
        if($rezultat) {
            if ($rezultat["korisnickoIme"] == $korisnickoIme && $rezultat["lozinkaSHA256"] == $lozinkaSHA256 && $rezultat["aktiviran"] == 1 && $rezultat["blokiran"] == 0){
                Sesija::kreirajKorisnika($korisnickoIme, $rezultat["ulogaId"], $rezultat["korisnikId"]);

                $upitResetNeuspjesnihPrijava = "UPDATE korisnik SET neuspjesnePrijave = 0 WHERE korisnickoIme = '$korisnickoIme'";
                $veza->updateDB($upitResetNeuspjesnihPrijava);
                zapisDnevnika(1);
                header("Location: ../index.php");
            }
            else if ($rezultat["blokiran"] == 1){
                $greska = "Blokirani ste zbog 3 neuspješne prijave. Samo Vas administrator može odblokirati.";
            }
            else if ($rezultat["lozinkaSHA256"] != $lozinkaSHA256){
                dodajNeusjesnuPrijavu($rezultat["korisnickoIme"]);
                $greska = "Neispravna lozinka.";
            }
            else if ($rezultat["aktiviran"] == 0){
                dodajNeusjesnuPrijavu($rezultat["korisnickoIme"]);
                $greska = "Niste aktivirali korisnički račun.";
            }
            
        }
        else {
            $greska = "Neuspješna prijava.";
        }   
        
        $veza ->zatvoriDB();
    }

    //Smarty
    $opis = "Stranica za prijavu korisnika.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Prijava');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/prijava.php');
    $smarty -> assign('greska', $greska);
    $smarty -> assign('uspjeh', $uspjeh);
    
    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/prijava.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
    
?>

