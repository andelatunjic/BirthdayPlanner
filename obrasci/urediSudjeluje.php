<?php

$putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();

    $poruka = "";
    
    $veza =  new Baza();
    $veza->spojiDB();

    $idRadnja = $_GET["idS"];
    $idRezervacija = $_GET["idR"];
    
    $upravljanje = array();
    $upit = "SELECT * FROM sudjeluje WHERE sudjeluje.sudionikId = '$idRadnja' AND sudjeluje.rezervacijaId = '$idRezervacija'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $sudionikId = $_POST["sudionikId"];
        $rezervacijaId = $_POST["rezervacijaId"];
        
        $upit = "UPDATE sudjeluje SET sudionikId = '$sudionikId', rezervacijaId = '$rezervacijaId' "
                . "WHERE sudionikId = '$idRadnja' AND rezervacijaId = $idRezervacija";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje sudjelovanja.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj sudjelovanje');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediSudjeluje.php');
    $smarty->assign("sudionik", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediSudjeluje.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>
