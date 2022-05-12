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
    $upit = "SELECT * FROM postavke WHERE postavke.postavkeId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $id = $_POST["id"];
        $admin = $_POST["adminId"];
        $stranicenje = $_POST["stranicenje"];
        $kolacic = $_POST["trajanjeKolacica"];
        $pomak = $_POST["pomakVremena"];
        $link = $_POST["trajanjeAktivacijskogLinka"];
        $brojPrijava = $_POST["brojNeuspjesnihPrijava"];
        
        $upit = "UPDATE postavke SET postavkeId = '$id', adminId = '$admin', stranicenje = '$stranicenje', "
                . "trajanjeKolacica = '$kolacic', pomakVremena = '$pomak', trajanjeAktivacijskogLinka = '$link', brojNeuspjesnihPrijava = '$brojPrijava' "
                . "WHERE postavkeId = '$id'";
        $veza->updateDB($upit);
        
        header('Location: ../ostalo/podaciSustava.php');
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje postavka.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj postavke');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediPostavke.php');
    $smarty->assign("postavke", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediPostavke.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

