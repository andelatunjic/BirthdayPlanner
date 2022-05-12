 <?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idRadnja = $_GET["id"];
    $rezervacija = array();
    $upit = "SELECT * FROM rezervacija WHERE rezervacija.rezervacijaId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $rezervacija[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["rezervacijaId"];
        $korisnik = $_POST["korisnikId"];
        $grupa = $_POST["grupaId"];
        $datum = $_POST["datum"];
        $brojDjece = $_POST["brojDjece"];
        $status = $_POST["statusRezervacije"];
        $zamjenskiDatum = $_POST["zamjenskiDatum"];
        if ($korisnik == "" || $grupa == "" || $datum == "" || $brojDjece == "" || $status == "" ) {
            $poruka = "Popunite sva obavezna polja";
        }else{
            $upit = "UPDATE rezervacija SET rezervacijaId = '$id', korisnikId = '$korisnik', grupaId = '$grupa', "
                . "datum = '$datum', brojDjece = '$brojDjece', statusRezervacije = '$status', zamjenskiDatum = '$zamjenskiDatum' WHERE rezervacija.rezervacijaId = '$id'";
            $rezultat = $veza->updateDB($upit);
            if ($rezultat != "") {
                $poruka = "Uspješno ažurirano!";
            }else{
                $poruka = "Pokušajte ponovno";
            }
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Azuriranje rezervacije','UPDATE rezervacija SET rezervacijaId = id, korisnikId = korisnik, grupaId = grupa, datum = datum, brojDjece = brojDjece, statusRezervacije = status, zamjenskiDatum = zamjenskiDatum WHERE rezervacija.rezervacijaId = id','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje rezervacije.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj rezervaciju');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediRezervacije.php');
    $smarty->assign("rezervacija", $rezervacija);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediRezervacije.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

