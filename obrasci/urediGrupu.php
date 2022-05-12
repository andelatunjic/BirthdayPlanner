<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idRadnja = $_GET["id"];
    $upravljanje = array();
    $upit = "SELECT * FROM grupa WHERE grupa.grupaId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["id"];
        $naziv = $_POST["naziv"];
        $opis = $_POST["opis"];
        
        $upit = "UPDATE grupa SET grupaId = '$id', nazivGrupe = '$naziv', opisGrupe = '$opis' WHERE grupaId = '$id'";
        $veza->updateDB($upit);
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Azuriranje grupe','UPDATE grupa SET grupaId = id, nazivGrupe = naziv, opisGrupe = opis WHERE grupaId = id','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje grupe.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj grupu');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediGrupu.php');
    $smarty->assign("grupa", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediGrupu.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>