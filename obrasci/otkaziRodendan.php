<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idRezervacija = $_GET["id"];
    $rodendan = array();
    $upit = "SELECT rezervacija.rezervacijaId, rodendanId, datum, zamjenskiDatum "
            . "FROM rodendan LEFT JOIN rezervacija ON rodendan.rezervacijaId = rezervacija.rezervacijaId "
            . "WHERE rezervacija.rezervacijaId = '$idRezervacija';";
    
    
    
    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $rodendan[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $rezervacijaId = $_POST["rezervacijaId"];
        $rodendanId = $_POST["rodendanId"];
        $zamjenski = $_POST["zamjenskiDatum"];
        $opis = $_POST["opis"];
        
        $upit = "UPDATE rezervacija SET zamjenskiDatum = '$zamjenski' WHERE rezervacija.rezervacijaId = '$rezervacijaId';";
        $veza->updateDB($upit);
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Otkazivanje rodendana','UPDATE rezervacija SET zamjenskiDatum = zamjenski WHERE rezervacija.rezervacijaId = rezervacijaId','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        header('Location: ../obrasci/rodendani.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje rođendana.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Otkaži rođendan');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/otkaziRodendan.php');
    $smarty->assign("rodendan", $rodendan);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/otkaziRodendan.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

