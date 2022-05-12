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
    $upit = "SELECT * FROM dnevnik WHERE dnevnik.dnevnikId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $idD = $_POST["idD"];
        $idK = $_POST["idK"];
        $idT = $_POST["idT"];
        $upravljanje = $_POST["radnja"];
        $upit = $_POST["upit"];
        $vrijeme = $_POST["vrijeme"];
        
        $upit = "UPDATE dnevnik SET dnevnikId = '$idD', korisnikId = '$idK', tipRadnjeId = '$idT', radnja = '$upravljanje', "
                . "upit = '$upit', vrijeme = '$vrijeme'  WHERE dnevnikId = '$idD'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje dnenvika.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj dnevnik');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediDnevnik.php');
    $smarty->assign("dnevnik", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediDnevnik.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>
