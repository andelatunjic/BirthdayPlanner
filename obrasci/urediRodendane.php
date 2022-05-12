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
    $upit = "SELECT * FROM rodendan WHERE rodendan.rodendanId = '$idRadnja'";

    $rezultat = $veza->updateDB($upit);
    
    while($red = mysqli_fetch_array($rezultat)){
        $upravljanje[] = $red;
    }
    $veza->zatvoriDB();
    
    if(isset($_POST["submit"])){
        $veza =  new Baza();
        $veza->spojiDB();

        $rodendanId = $_POST["rodendanId"];
        $rezervacijaId = $_POST["rezervacijaId"];
        $nazivRodendana = $_POST["nazivRodendana"];
        $opis = $_POST["opis"];
        
        if ($rodendanId == "" || $rezervacijaId == "" || $nazivRodendana == "" || $opis == "" ) {
            $poruka = "Sve popunite!";
        }else{
            $upit = "UPDATE rodendan SET rodendanId = '$rodendanId', rezervacijaId = '$rezervacijaId', nazivRodendana = '$nazivRodendana', "
                . "opis = '$opis' WHERE rodendanId = '$rodendanId'";
            $rezultat = $veza->updateDB($upit);
            if ($rezultat != "") {
                $poruka = "Uspješno ažurirano!";
            }else{
                $poruka = "Pokušajte ponovno!";
            }
        }
        
        $korisnikId = $_SESSION["id"];
        $vrijeme = date("Y-m-d H:i:s");

        $upitDnevnik = "INSERT INTO dnevnik(dnevnikId, korisnikId, tipRadnjeId, radnja, upit, vrijeme) "
                        . "VALUES (DEFAULT,'$korisnikId',2,'Azuriranje rodendana','UPDATE rodendan SET rodendanId = rodendanId, rezervacijaId = rezervacijaId, nazivRodendana = nazivRodendana, opis = opis WHERE rodendanId = rodendanId','$vrijeme');";
        $rezultatDnevnika = $veza->ostaliUpitDB($upitDnevnik);
        
        $veza->zatvoriDB();
    }
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za ažuriranje rođendana.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Ažuriraj rođendan');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'obrasci/urediRodendane.php');
    $smarty->assign("rodendan", $upravljanje);
    $smarty->assign("poruka", $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/urediRodendane.tpl");
    $smarty->display("../templates/podnozje.tpl"); 

?>

