<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    

    
    //__________________________________________________________________________
    //Dnevnik
    
    $veza =  new Baza();
    $veza->spojiDB();

    $dnevnik = array();
    $upitDnevnik = "SELECT * FROM dnevnik";

    $rezultatD = $veza->selectDB($upitDnevnik);

    while($red = mysqli_fetch_array($rezultatD)){
        $dnevnik[] = $red;
    }
    
    //__________________________________________________________________________
    //Grupe
    
    $grupe = array();
    $upitGrupa = "SELECT * FROM grupa";

    $rezultatG = $veza->selectDB($upitGrupa);

    while($red = mysqli_fetch_array($rezultatG)){
        $grupe[] = $red;
    }

    //__________________________________________________________________________
    //Korisnici
    
    $korisnici = array();
    $upitKorisnik = "SELECT * FROM korisnik";

    $rezultatK = $veza->selectDB($upitKorisnik);

    while($red = mysqli_fetch_array($rezultatK)){
        $korisnici[] = $red;
    }
    
    //__________________________________________________________________________
    //Materijali
    
    $materijali = array();
    $upitMaterijal = "SELECT * FROM materijali";

    $rezultatM = $veza->selectDB($upitMaterijal);

    while($red = mysqli_fetch_array($rezultatM)){
        $materijali[] = $red;
    }
    
    //__________________________________________________________________________
    //Postavke
    
    $postavke = array();
    $upitPostavke = "SELECT * FROM postavke";

    $rezultatP = $veza->selectDB($upitPostavke);

    while($red = mysqli_fetch_array($rezultatP)){
        $postavke[] = $red;
    }
    
    
    //__________________________________________________________________________
    //Rezervacije
    
    $rezervacije = array();
    $upitRezervacije = "SELECT * FROM rezervacija";

    $rezultatR = $veza->selectDB($upitRezervacije);

    while($red = mysqli_fetch_array($rezultatR)){
        $rezervacije[] = $red;
    }
    
    //__________________________________________________________________________
    //Rođendani
    
    $rodendani = array();
    $upitRodendani = "SELECT * FROM rodendan";

    $rezultatRo = $veza->selectDB($upitRodendani);

    while($red = mysqli_fetch_array($rezultatRo)){
        $rodendani[] = $red;
    }
    
    //__________________________________________________________________________
    //Sudionici
    
    $sudionici = array();
    $upitSudionici = "SELECT * FROM sudionici";

    $rezultatS = $veza->selectDB($upitSudionici);

    while($red = mysqli_fetch_array($rezultatS)){
        $sudionici[] = $red;
    }
    
    //__________________________________________________________________________
    //Sudjelovanja
    
    $sudjelovanja = array();
    $upitSudjelovanje = "SELECT * FROM sudjeluje";

    $rezultatSu = $veza->selectDB($upitSudjelovanje);

    while($red = mysqli_fetch_array($rezultatSu)){
        $sudjelovanja[] = $red;
    }
    
    //__________________________________________________________________________
    //Tipovi radnji
    
    $tipoviRadnji = array();
    $upitTipovi = "SELECT * FROM tipradnje";

    $rezultatT = $veza->selectDB($upitTipovi);

    while($red = mysqli_fetch_array($rezultatT)){
        $tipoviRadnji[] = $red;
    }
      
    
    //__________________________________________________________________________
    //Uloge

    $uloge = array();
    $upitUloge = "SELECT * FROM uloga";

    $rezultatU = $veza->selectDB($upitUloge);

    while($red = mysqli_fetch_array($rezultatU)){
        $uloge[] = $red;
    }
      
    
    //__________________________________________________________________________
    //Upravljanje grupama
  
    $upravljanjaGrupom = array();
    $upitUpravljanje = "SELECT * FROM upravljanjegrupom";

    $rezultatUg = $veza->selectDB($upitUpravljanje);

    while($red = mysqli_fetch_array($rezultatUg)){
        $upravljanjaGrupom[] = $red;
    }
    //__________________________________________________________________________
    //Vrste materijala
        

    $vrsteMaterijala = array();
    $upitVrste = "SELECT * FROM vrstamaterijala";

    $rezultatV = $veza->selectDB($upitVrste);

    while($red = mysqli_fetch_array($rezultatV)){
        $vrsteMaterijala[] = $red;
    }

    $veza->zatvoriDB();

    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled podataka sustava.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Podaci sustava');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'ostalo/podaciSustava.php');
    $smarty -> assign('dnevnik', $dnevnik);
    $smarty -> assign('grupe', $grupe);
    $smarty -> assign('korisnici', $korisnici);
    $smarty -> assign('materijali', $materijali);
    $smarty -> assign('postavke', $postavke);
    $smarty -> assign('rezervacije', $rezervacije);
    $smarty -> assign('rodendani', $rodendani);
    $smarty -> assign('sudionici', $sudionici);
    $smarty -> assign('sudjelovanje', $sudjelovanja);
    $smarty -> assign('tipoviRadnji', $tipoviRadnji);
    $smarty -> assign('uloge', $uloge);
    $smarty -> assign('upravljanjaGrupom', $upravljanjaGrupom);
    $smarty -> assign('vrsteMaterijala', $vrsteMaterijala);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/podaciSustava.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>
