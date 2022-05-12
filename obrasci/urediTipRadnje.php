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
    $upit = "SELECT * FROM tipradnje WHERE tipradnje.tipRadnjeId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $tipRadnjeId = $_POST["tipRadnjeId"];
        $nazivRadnje = $_POST["nazivRadnje"];
        
        $upit = "UPDATE tipradnje SET tipRadnjeId = '$tipRadnjeId', nazivRadnje = '$nazivRadnje' WHERE tipRadnjeId = '$tipRadnjeId'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje tipa radnje.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj tip radnje');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediTipRadnje.php');
    $smarty->assign("radnja", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediTipRadnje.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>