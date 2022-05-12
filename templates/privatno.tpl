<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Korisnici</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov" content="{$naslov}">
        <meta name="autor" content="Anđela Tunjić">
        <meta name="opis" content="{$naslov}">
        <meta name="ključneriječi" content="rođendani,slavlje,zabava">
        
        <link href="../css/atunjic.css" rel="stylesheet" type="text/css"/>
        
        
    </head>
    
    <body>
        
        <header>
            
            <div id="naslov">
                <h1>Ispis korisnika</h1>
            </div>

        </header>
        
        <section id="sadrzaj">
            <h3>Podaci iz tablice korisnik</h3>
            <table id="tablicaKorisnik">
                <caption>Korisnici</caption><br>
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Korisničko ime</th>
                        <th>Email</th>
                        <th>Lozinka</th>
                        <th></th>
                    </tr>  
                </thead>
                <tbody>
                    {section name=i loop=$korisnici}
                        <tr>
                            <td>{$korisnici[i].ime}</td>
                            <td>{$korisnici[i].prezime}</td>
                            <td>{$korisnici[i].korisnickoIme}</td>
                            <td>{$korisnici[i].email}</td>
                            <td>{$korisnici[i].lozinka}</td>
                        </tr>
                    {/section}
                </tbody>
            </table>   
    

        </section>

    <footer>
            
        <hr style="width:100%;">

        <a href="../autor.php"><p id="footerAutor">Anđela Tunjić</p></a>
        <p><small>&copy; 2021</small></p>

        <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x098/privatno/prvatno.php">
            <img src="../multimedija/HTML5.png" alt="html5" width="40" height="40"/>
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x098/css/atunjic.css">
            <img src="../multimedija/CSS3.png" alt="css" width="44" height="44"/>
        </a>

    </footer>
        
    </body>
</html>
