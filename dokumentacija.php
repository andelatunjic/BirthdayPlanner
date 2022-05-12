<?php
    $putanja = dirname($_SERVER['REQUEST_URI']);

    require "vanjske_biblioteke/baza.class.php";
    require "vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    $veza = new Baza();
    $veza->spojiDB();

    
    //Smarty
    $opis = "Dokumentacija projektnog rješenja.";

    require "vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'Dokumentacija');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'dokumentacija.php');

    $smarty->display("templates/zaglavlje.tpl");
    $smarty->display("templates/dokumentacija.tpl");
    $smarty->display("templates/podnozje.tpl");   
    
    $veza ->zatvoriDB(); 
?>

