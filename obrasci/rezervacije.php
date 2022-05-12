<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    require "../ostalo/dnevnik.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    $korisnikId = $_SESSION["id"];
    
    $veza =  new Baza();
    $veza->spojiDb();
    
    //Pregled rezervacija i ažuriranje__________________________________________
    
    $rezervacije = array();
    $upitReze = "SELECT rezervacijaId, nazivGrupe, datum, zamjenskiDatum, brojDjece, statusRezervacije "
            . "FROM rezervacija LEFT JOIN grupa ON rezervacija.grupaId = grupa.grupaId "
            . "WHERE rezervacija.korisnikId = '$korisnikId';";

    $rezultat = $veza->selectDB($upitReze);

    while($red = mysqli_fetch_array($rezultat)){
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
    
    //Dohvaćanje grupa
    $upit = "SELECT grupa.grupaId, grupa.nazivGrupe FROM grupa";

    $rezultatGrupe = $veza->selectDB($upit);

    while($red = mysqli_fetch_array($rezultatGrupe)){
        $grupe[] = $red;
    }
    
    //Dohvaćanje rezervacija za brisanje
    $rezeZaBrisati = array();
    $upitBrisanjeReza = "SELECT rezervacijaId, datum FROM rezervacija where (statusRezervacije = 0 || statusRezervacije = 2) && korisnikId = '$korisnikId'";

    $rezultatBrisanje = $veza->selectDB($upitBrisanjeReza);
    
    while($red = mysqli_fetch_array($rezultatBrisanje)){
        $rezeZaBrisati[] = $red;
    }
    
    //Dohvaćanje potvrđenih rezervacija za dodavanje materijala
    $upitPotvrdenaReza = "SELECT rezervacijaId, datum FROM rezervacija where statusRezervacije = 1  && korisnikId = '$korisnikId'";

    $rezultatPotvrdene = $veza->selectDB($upitPotvrdenaReza);

    $rezePotvrdene = array();
    while($red = mysqli_fetch_array($rezultatPotvrdene)){
        $rezePotvrdene[] = $red;
    }
    
    //Dohvaćanje vrsta materijala
    $upitVrsta = "SELECT *  FROM vrstamaterijala";

    $rezultatVrsta = $veza->selectDB($upitVrsta);

    while($red = mysqli_fetch_array($rezultatVrsta)){
        $vrstaMaterijala[] = $red;
    }
    
    $veza->zatvoriDB();
    
    //Kreiranje nove rezervacije________________________________________________
    if (isset($_POST['Grupa'])){
        
        $grupa = $_POST['Grupa'];
        $datum = $_POST['Datum'];
        $brojDjece = $_POST['BrojDjece'];
        
        $veza = new Baza();
        $veza->spojiDB();

        $upitReza = "INSERT INTO rezervacija(rezervacijaId, korisnikId, grupaId, datum, brojDjece, statusRezervacije) VALUES ('DEFAULT','$korisnikId','$grupa','$datum','$brojDjece','0');";
        
        $rezultat = $veza->updateDB($upitReza);
        if ($rezultat != "") {
            $poruka = "Vaša rezervacija je u tijeku!";
        }else{
            $poruka = "Pokušajte ponovno!";
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");
        
        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                . "VALUES (DEFAULT,'$korisnikId',2,'Nova rezervacija','INSERT INTO rezervacija(rezervacijaId, korisnikId, grupaId, datum, brojDjece, statusRezervacije) VALUES (DEFAULT,korisnikId,grupa,datum,brojDjece,0)','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $veza ->zatvoriDB();
        
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    } 
    
    if (isset($_POST['IdZaBrisanje'])){
        
        $veza = new Baza();
        $veza->spojiDB();
        
        $idReze = $_POST['IdZaBrisanje'];

        $upitReza = "DELETE FROM rezervacija WHERE rezervacijaId = '$idReze';";
        $rezultat = $veza->ostaliUpitDB($upitReza);
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");
        
        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                . "VALUES (DEFAULT,'$korisnikId',2,'Brisanje rezervacije','DELETE FROM rezervacija WHERE rezervacijaId = idReze','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $poruka = "Uspješno obrisano!";
        $veza ->zatvoriDB();
        
        $jsonObjekt = $poruka;
        echo json_encode($jsonObjekt);
        exit();
    } 
    
    if (isset($_POST['VrstaMaterijala'])){
        
        $idVrste = $_POST['VrstaMaterijala'];
        $idReze = $_POST['Rezervacija'];
        $provjera = $_POST['Suglasnost'];
        $suglasnost = 0;
        if ($provjera == false) {
            $suglasnost = 1;
        }
        
        
        $polje[] = $idVrste;
        $polje[] = $idReze;
        $polje[] = $suglasnost;
        
        $jsonObjekt = $polje;
        echo json_encode($jsonObjekt);
        exit();
        /*
        $veza = new Baza();
        $veza->spojiDB();
        
        
        $userfile = $_FILES['materijal']['tmp_name'];
        $userfile_name = $_FILES['materijal']['name'];
        $upfile = '../materijali/' . $userfile_name;
       
        $userfile_size = $_FILES['materijal']['size'];
        $userfile_type = $_FILES['materijal']['type'];
        $userfile_error = $_FILES['materijal']['error'];
        if ($userfile_error > 0) {
            echo 'Problem: ';
            switch ($userfile_error) {
                case 1: echo 'Veličina veća od ' . ini_get('upload_max_filesize');
                    break;
                case 2: echo 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B';
                    break;
                case 3: echo 'Datoteka djelomično prenesena';
                    break;
                case 4: echo 'Datoteka nije prenesena';
                    break;
            }
            exit;
        }

        if (is_uploaded_file($userfile)) {
            if (!move_uploaded_file($userfile, $upfile)) {
                echo 'Problem: nije moguće prenijeti datoteku na odredište';
                exit;
            }
        } else {
            echo 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
            exit;
        }

        $upit = "INSERT INTO materijali (materijalId, vrstaMaterijalaId, rezervacijaId,  putanja, suglasnost) '
                . 'VALUES (DEFAULT, '$idVrste', '$idReze', '$upfile', '$suglasnost');";

        $rezultat = $veza->updateDB($upit);

        $veza ->zatvoriDB();
        */
           
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled, kreiranje i ažuriranje rezervacija za rođendane.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Rezervacije');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/rezervacije.php');
    $smarty -> assign('poruka', $poruka);
    $smarty -> assign('grupe', $grupe);
    $smarty -> assign('rezervacije', $rezervacije);
    $smarty -> assign('rezeZaBrisati', $rezeZaBrisati);
    $smarty -> assign('rezePotvrdene', $rezePotvrdene);
    $smarty -> assign('vrstaMaterijala', $vrstaMaterijala);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/rezervacije.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>
