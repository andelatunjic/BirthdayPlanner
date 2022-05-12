<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>{$naslov}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov" content="{$naslov}">
        <meta name="autor" content="Anđela Tunjić">
        <meta name="opis" content="{$naslov}">
        <meta name="ključneriječi" content="rođendani,slavlje,zabava">
        
        <link href="{$putanja}/css/atunjic.css" rel="stylesheet" type="text/css"/>
        <link id="crnoBijeloCss" href="{$putanja}/css/atunjic.css" rel="stylesheet" type="text/css"/>
        <link id="prilagodbeCss" href="{$putanja}/css/atunjic.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
        <script src="{$putanja}/javascript/atunjic.js"></script>
        <script src="{$putanja}/javascript/podaciSustava.js"></script>
        
        
    </head>
    
    <body onload='kreirajDogadaje()'>
        
        <header>
            <div id="navigacija">
                <ul>
                    <li><a href="{$putanja}/index.php">Početna</a></li>
                    {if !isset($smarty.session.uloga)}
                        <li><a href="{$putanja}/obrasci/prijava.php">Prijava</a></li>
                        <li><a href="{$putanja}/obrasci/registracija.php">Registracija</a></li>
                    {/if} 
                    {if isset($smarty.session.uloga) && $smarty.session.uloga <= 3}
                    <li><a href="{$putanja}/ostalo/galerija.php">Galerija</a></li>
                    <li><a href="{$putanja}/obrasci/rezervacije.php">Rezervacije</a></li>
                    {/if}
                    {if isset($smarty.session.uloga) && $smarty.session.uloga <= 2}
                        <li><a href="{$putanja}/obrasci/rodendani.php">Rođendani</a></li>
                    {/if}
                    {if isset($smarty.session.uloga) && $smarty.session.uloga == 1}
                        <li><a href="{$putanja}/obrasci/grupe.php">Grupe</a></li>
                        <li><a href="{$putanja}/ostalo/korisnickiRacuni.php">Korisnički računi</a></li>
                        <li><a href="{$putanja}/ostalo/dnevnikAdmin.php">Dnevnik rada</a></li>
                        <li><a href="{$putanja}/ostalo/podaciSustava.php">Podaci sustava</a></li>
                    {/if}
                    <li><a href="{$putanja}/autor.php">Autor</a></li>
                    <li><a href="{$putanja}/dokumentacija.php">Dokumentacija</a></li>
                    {if isset($smarty.session.uloga)}
                        <li><a href="{$putanja}/obrasci/prijava.php?odjava=1">Odjava</a></li>
                    {/if}
                </ul>
            </div>
            
            <div id="ikoneHeader">
                <img id="meni" src="{$putanja}/multimedija/meni.png" alt="meni" width="30" height="30"/>
                <div id=ikoneDizajn>
                    <button id="crnoBijelo"><img src="{$putanja}/multimedija/crnoBijelo.png" alt="crnoBijelo" width="20" height="20"/></button>
                    <button id="prilagodbe"><img src="{$putanja}/multimedija/prilagodbe.png" alt="prilagodbe" width="20" height="20"/></button>
                </div>
            </div>  
            
            <div id="naslov">
                <h1>{$naslov}</h1>
            </div>

        </header>
         
        
        
