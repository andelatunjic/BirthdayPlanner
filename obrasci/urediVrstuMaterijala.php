<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idVrsta = $_GET["id"];
    $vrsta = array();
    $upit = "SELECT * FROM vrstamaterijala WHERE vrstamaterijala.vrstaMaterijalaId = '$idVrsta'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $vrsta[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $vrstaMaterijalaId = $_POST["vrstaMaterijalaId"];
        $nazivMaterijala = $_POST["nazivMaterijala"];
        
        $upit = "UPDATE vrstamaterijala SET vrstaMaterijalaId = '$vrstaMaterijalaId', nazivMaterijala = '$nazivMaterijala' WHERE vrstaMaterijalaId = '$vrstaMaterijalaId'";
        $veza->updateDB($upit);
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Azuriranje vrste materijala','UPDATE vrstamaterijala SET vrstaMaterijalaId = vrstaMaterijalaId, nazivMaterijala = nazivMaterijala WHERE vrstaMaterijalaId = vrstaMaterijalaId','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje vrste materijala.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj vrstu materijala');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediVrstuMaterijala.php');
    $smarty->assign("vrsta", $vrsta);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediVrstuMaterijala.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>