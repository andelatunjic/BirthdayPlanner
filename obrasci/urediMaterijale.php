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
    $upit = "SELECT * FROM materijali WHERE materijali.materijalId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["id"];
        $vrsta = $_POST["vrstaMaterijalaId"];
        $upravljanje = $_POST["rezervacijaId"];
        $putanja = $_POST["putanja"];
        $suglasnost = $_POST["suglasnost"];
        
        $upit = "UPDATE materijali SET materijalId = '$id', vrstaMaterijalaId = '$vrsta', rezervacijaId = '$upravljanje', "
                . "putanja = '$putanja', suglasnost = '$suglasnost' WHERE materijalId = '$id'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažurianje materijala.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj materijal');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediMaterijale.php');
    $smarty->assign("materijal", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediMaterijale.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>
