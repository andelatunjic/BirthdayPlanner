<?php
    $putanja = dirname($_SERVER['REQUEST_URI']);

    require "vanjske_biblioteke/baza.class.php";
    require "vanjske_biblioteke/sesija.class.php";
    
    Sesija::kreirajSesiju();
    
    $veza = new Baza();
    $veza->spojiDB();
    
    //Smarty
    $opis = "Informacije o autoru ove stranice.";

    require "vanjske_biblioteke/smarty-3.1.39/libs/Smarty.class.php";
    $smarty = new Smarty();
   
    $smarty -> assign('putanja', $putanja);
    $smarty -> assign('naslov', 'O Autoru');
    $smarty -> assign('opis', $opis);
    $smarty -> assign('putanjaDoStranice', 'autor.php');

    $smarty->display("templates/zaglavlje.tpl");
    $smarty->display("templates/autor.tpl");
    $smarty->display("templates/podnozje.tpl");   
    
    $veza ->zatvoriDB(); 
?>

