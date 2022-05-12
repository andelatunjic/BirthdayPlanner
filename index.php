<?php
    $putanja = dirname($_SERVER['REQUEST_URI']);

    require "vanjske_biblioteke/baza.class.php";
    require "vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    $sudionici = array();
    $statistika = array();
    
    $veza =  new Baza();
    $veza->spojiDB();
    
    $upitSudionici = "SELECT rodendanId, nazivRodendana, ime, prezime "
            . "FROM rodendan LEFT JOIN rezervacija ON rodendan.rezervacijaId = rezervacija.rezervacijaId "
            . "LEFT JOIN sudjeluje ON sudjeluje.rezervacijaId = rezervacija.rezervacijaId "
            . "LEFT JOIN sudionici ON sudionici.sudionikId = sudjeluje.sudionikId "
            . "ORDER BY rodendanId;";
    $rezultat = $veza->selectDB($upitSudionici);

    while($red = mysqli_fetch_array($rezultat)){
        $sudionici[] = $red;
    }
    
    $upitStatistika = "SELECT COUNT(rodendanId) AS zbroj, nazivGrupe FROM rodendan LEFT JOIN rezervacija ON rodendan.rezervacijaId = rezervacija.rezervacijaId LEFT JOIN grupa ON rezervacija.grupaId = grupa.grupaId GROUP BY nazivGrupe;";
    $rezultatStatistika = $veza->selectDB($upitStatistika);

    while($red = mysqli_fetch_array($rezultatStatistika)){
        $statistika[] = $red;
    }
    
    $veza->zatvoriDB();
    
    
    /* DRUGA MOGUĆNOST s odabirom rođendana i prikazom sudionika
    //Tablica Rođendana_________________________________________________________
    if(isset($_POST["PrikaziTablicuRodendan"])){
        
        $veza =  new Baza();
        $veza->spojiDB();

        $rodendani = array();
        $upit = "SELECT rodendanId, nazivRodendana, opis, brojDjece, datum, zamjenskiDatum"
                . " FROM rodendan LEFT JOIN rezervacija ON rodendan.rezervacijaId = rezervacija.rezervacijaId;";

        $rezultat = $veza->selectDB($upit);

        while($red = mysqli_fetch_array($rezultat)){
            $rodendani[] = $red;
        }
        $veza->zatvoriDB();

        $jsonObjekt = $rodendani;
        echo json_encode($jsonObjekt);
        exit();
    }
    
    $sudionici = array();
    //dohvaćanje ID-a rezervacije i dohvaćanje sudionika te rezervacije
    if(isset($_GET["idRezervacija"])){
        
        $idRezervacije = $_GET["idRezervacija"];
        
        $veza =  new Baza();
        $veza->spojiDB();

        
        $upit = "SELECT ime, prezime FROM sudionici LEFT JOIN sudjeluje ON sudionici.sudionikId = sudjeluje.sudionikId LEFT JOIN rezervacija ON rezervacija.rezervacijaId = sudjeluje.rezervacijaId WHERE rezervacija.rezervacijaId = '$idRezervacije';";

        $rezultat = $veza->selectDB($upit);

        while($red = mysqli_fetch_array($rezultat)){
            $sudionici[] = $red;
        }
        $veza->zatvoriDB();
    }
    */
    
    //Smarty
    $opis = "Početna stranica web stranice za rođendane, 20.05.2021.";

    require "vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Početna stranica');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'index.php');
    $smarty -> assign('sudionici', $sudionici);
    $smarty -> assign('statistika', $statistika);

    $smarty->display("templates/zaglavlje.tpl");
    $smarty->display("templates/index.tpl");
    $smarty->display("templates/podnozje.tpl"); 
?>

