<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idUloga = $_GET["id"];
    $uloga = array();
    $upit = "SELECT * FROM uloga WHERE uloga.ulogaId = '$idUloga'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $uloga[] = $red;
    }
    
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["id"];
        $naziv = $_POST["naziv"];
        
        $upit = "UPDATE uloga SET nazivUloge = '$naziv' WHERE ulogaId = '$id'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje uloge.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj ulogu');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediUlogu.php');
    $smarty->assign("uloga", $uloga);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediUlogu.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

