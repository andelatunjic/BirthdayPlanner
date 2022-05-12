<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idModerator = $_GET["idM"];
    $idGrupa = $_GET["idG"];
    $upravljanje = array();
    $upit = "SELECT * FROM upravljanjegrupom WHERE upravljanjegrupom.moderatorId = '$idModerator' AND upravljanjegrupom.grupaId = '$idGrupa'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $moderatorId = $_POST["moderatorId"];
        $grupaId = $_POST["grupaId"];
        
        $upit = "UPDATE upravljanjegrupom SET moderatorId = '$moderatorId', grupaId = '$grupaId' "
                . "WHERE moderatorId = '$idModerator' AND grupaId = $idGrupa";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje upravljanja.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj upravljanje');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediUpravljanjeGrupom.php');
    $smarty->assign("upravljanje", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediUpravljanjeGrupom.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>
