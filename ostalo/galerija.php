<?php

    $putanja = dirname($_SERVER['REQUEST_URI'],2);

    require "../vanjske_biblioteke/baza.class.php";
    require "../vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    //__________________________________________________________________________
    $poruka = "";
    
    
    
    //Smarty____________________________________________________________________
    $opis = "Stranica za pregled galerije materijala.";

    require "../vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Galerija');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'ostalo/galerija.php');
    $smarty -> assign('poruka', $poruka);

    $smarty->display("../templates/zaglavlje.tpl");
    $smarty->display("../templates/galerija.tpl");
    $smarty->display("../templates/podnozje.tpl"); 
?>

