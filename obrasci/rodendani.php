<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    //__________________________________________________________________________
    $poruka = "";
    $korisnikId = $_SESSION["id"];
    
    //Prikaz rođendana za ažuriranje____________________________________________
   
    $veza =  new Baza();
    $veza->spojiDB();

    $rodendani = array();
    $upit = "SELECT rezervacija.rezervacijaId, rodendanId, nazivRodendana, opis, datum, zamjenskiDatum "
            . "FROM rodendan LEFT JOIN rezervacija ON rodendan.rezervacijaId = rezervacija.rezervacijaId "
            . "LEFT JOIN grupa ON grupa.grupaId = rezervacija.grupaId "
            . "LEFT JOIN upravljanjegrupom ON upravljanjegrupom.grupaId = grupa.grupaId "
            . "WHERE upravljanjegrupom.moderatorId = '$korisnikId';";

    $rezultat = $veza->selectDB($upit);

    while($red = mysqli_fetch_array($rezultat)){
        $rodendani[] = $red;
    }
    

    //Prikaz rezervacija za potvrdu/odbijanje_________________________________
    $rezervacije = array();
    $upitReze = "SELECT rezervacijaId, nazivGrupe, datum, zamjenskiDatum, brojDjece, statusRezervacije "
            . "FROM rezervacija LEFT JOIN grupa ON grupa.grupaId = rezervacija.grupaId "
            . "LEFT JOIN upravljanjegrupom ON upravljanjegrupom.grupaId = grupa.grupaId "
            . "WHERE upravljanjegrupom.moderatorId = '$korisnikId';";

    $rezultatReze = $veza->selectDB($upitReze);

    while($red = mysqli_fetch_array($rezultatReze)){
        $statusTer = '';
        if($red['statusRezervacije'] == 1){
            $statusTer = 'Prihvaćeno';
            $red['statusRezervacije'] = $statusTer;
        }
        else if($red['statusRezervacije'] == 2){
            $statusTer = 'Odbijeno';
            $red['statusRezervacije'] = $statusTer;
        }
        else if($red['statusRezervacije'] == 0){
            $statusTer = 'U tijeku';
            $red['statusRezervacije'] = $statusTer;
        }
        $rezervacije[] = $red;
    }
    
    
    
    //Liste razlicite boje
    if(isset($_POST['Signal'])){
        
        $veza =  new Baza();
        $veza->spojiDB();
        
        $istiDatum = array();
        $upit = "SELECT rezervacijaId, datum "
                . "FROM rezervacija LEFT JOIN grupa ON grupa.grupaId = rezervacija.grupaId "
                . "LEFT JOIN upravljanjegrupom ON upravljanjegrupom.grupaId = grupa.grupaId "
                . "WHERE upravljanjegrupom.moderatorId = '$korisnikId';";

        $rezultat = $veza->selectDB($upit);

        while($red = mysqli_fetch_array($rezultat)){
            $istiDatum[] = $red;
        }
        
        $veza->zatvoriDB();
        
        $jsonObjekt = $istiDatum;
        echo json_encode($jsonObjekt);
        exit();
    }
    
    //Kreiranje rođendana_______________________________________________________
    
        //Dohvaćanje rezervacija koje su potvrđene
    $potvrdeneReze = "SELECT rezervacijaId, nazivGrupe, datum "
            . "FROM rezervacija LEFT JOIN grupa ON grupa.grupaId = rezervacija.grupaId "
            . "LEFT JOIN upravljanjegrupom ON upravljanjegrupom.grupaId = grupa.grupaId "
            . "WHERE upravljanjegrupom.moderatorId = '$korisnikId' && statusRezervacije = 1";

    $rezultatPotvrdeneReze = $veza->selectDB($potvrdeneReze);
    $rezePotvrdene = array();
    while($red = mysqli_fetch_array($rezultatPotvrdeneReze)){
        $rezePotvrdene[] = $red;
    }
    
    $veza->zatvoriDB();
        //novi rođendan
    if (isset($_POST['Rezervacija'])){
        
        $rezervacija = $_POST['Rezervacija'];
        $naziv = $_POST['Naziv'];
        $opis = $_POST['Opis'];
        
        if (provjeriPostojiRodendan($rezervacija)== true) {
            $poruka = "Rođendan već postoji!";
        }else{
        
            $veza = new Baza();
            $veza->spojiDB();

            $upitReza = "INSERT INTO rodendan(rezervacijaId, nazivRodendana, opis) VALUES ('$rezervacija','$naziv','$opis');";
            $rezultat = $veza->updateDB($upitReza);

            if ($rezultat != "") {
                $poruka = "Uspješno kreiran rođendan!";
            }else{
                $poruka = "Pokušajte ponovno!";
            }
            
            $korisnikId = $_SESSION["id"];
            $vrijeme = date("Y-m-d H:i:s");

            $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                            . "VALUES (DEFAULT,'$korisnikId',2,'Novi rođendan','INSERT INTO rodendan(rezervacijaId, nazivRodendana, opis) VALUES (rezervacija,naziv,opis)','$vrijeme');";
            $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);

            $veza ->zatvoriDB();

            
        }
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    } 
    
    function provjeriPostojiRodendan($idReze){
        $veza = new Baza();
        $veza->spojiDB();
        
        $postoji = false;
        
        $upitPostoji = "SELECT * from rodendan where rezervacijaId = '$idReze';";
        
        $rezultat = $veza->selectDB($upitPostoji);
        while($red = mysqli_fetch_array($rezultat)){
            $polje[] = $red;
        }
        if ($polje != "") {
            $postoji = true;
        }
        
        $veza ->zatvoriDB();
        
        return $postoji;
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled, kreiranje i ažuriranje rođendana.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Rođendani');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/rodendani.php');
    $smarty -> assign('poruka', $poruka);
    $smarty -> assign('rodendani', $rodendani);
    $smarty -> assign('rezervacije', $rezervacije);
    $smarty -> assign('potvrdeneRezervacije', $rezePotvrdene);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/rodendani.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>

