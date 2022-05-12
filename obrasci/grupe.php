<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    
    //Kreiranje nove grupe______________________________________________________
    $poruka = "";
    
    if (isset($_POST['nazivgrupe'])){
        
        $nazivGrupe = $_POST['nazivgrupe'];
        $opisGrupe = $_POST['opisgrupe'];
        
        $veza = new Baza();
        $veza->spojiDB();

        $upit = 'INSERT INTO grupa VALUES (DEFAULT, "'.$nazivGrupe.'","'.$opisGrupe.'");';

        $rezultat = $veza->updateDB($upit);
        if ($rezultat != "") {
            $poruka = "Uspješno ste kreirali novu grupu za rođendane!";
        }else{
            $poruka = "Neuspješno kreiranje grupe.";
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");
        
        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                . "VALUES (DEFAULT,'$korisnikId',2,'Nova grupa','INSERT INTO grupa VALUES (DEFAULT, nazivGrupe,opisGrupe)','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $veza ->zatvoriDB();
        
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    }
    
    //Dodajeljivanje moderatora grupi___________________________________________
    $veza =  new Baza();
    $veza->spojiDb();
 
    $upit = "SELECT
                grupa.grupaId,
                grupa.nazivGrupe
             FROM
                grupa";

    $rezultatGrupe = $veza->selectDB($upit);
   
    while($red = mysqli_fetch_array($rezultatGrupe)){
        $grupe[] = $red;
    }

    $upit2 = "SELECT
                korisnik.korisnikId,
                korisnik.ime,
                korisnik.prezime
             FROM
                korisnik
             WHERE
                korisnik.ulogaId = 2";

    $rezultatModeratori = $veza->selectDB($upit2);

    while($red = mysqli_fetch_array($rezultatModeratori)){
        $moderatori[] = $red;
    }
    
    //Pregled grupa_____________________________________________________________
    $upitZaPregled = "SELECT * FROM grupa";

    $rezultatGrupePregled = $veza->selectDB($upitZaPregled);
   
    while($red = mysqli_fetch_array($rezultatGrupePregled)){
        $grupeZaPregled[] = $red;
    }
    
    $veza->zatvoriDB();
    
    //dodavanje u bazu moderatora i njegove dodjeljene grupe
    if (isset($_POST['Grupa'])){
        
        $upravljanje = $_POST['Grupa'];
        $moderator = $_POST['Moderator'];
        
        $veza = new Baza();
        $veza->spojiDB();

        $upit = 'INSERT INTO upravljanjegrupom VALUES ("'.$moderator.'","'.$upravljanje.'");';

        $rezultat = $veza->updateDB($upit);
        if ($rezultat != "") {
            $poruka = "Uspješno ste dodjelili moderatora grupi!";
        }else{
            $poruka = "Neuspješno dodjeljivanje moderatora.";
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");
        
        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                . "VALUES (DEFAULT,'$korisnikId',2,'Dodjeljivanje moderatora grupi','INSERT INTO upravljanjegrupom VALUES (moderator,upravljanje)','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $veza ->zatvoriDB();
        
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    } 
    
    
    
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled, kreiranje i ažuriranje grupa za rođendane.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Grupe');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/kreirajGrupu.php');
    $smarty -> assign('poruka', $poruka);
    $smarty -> assign('grupe', $grupe);
    $smarty -> assign('moderatori', $moderatori);
    $smarty -> assign('grupeZaPregled', $grupeZaPregled);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/grupe.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>
