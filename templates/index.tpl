<section id="sadrzaj">
    <div id="pravokutnik">                 
        Klikni me za pomoć!            
    </div>
    <h2>Rođendani</h2>
    <p>Ovo je početna stranica stranice Rođendani.</p> 
    
    <p>Statistika broja rođendana po grupi:</p> 
    <table id="tablicaSudionici" class="display">
        <caption>Broj rođendana po grupi</caption>
        <thead>
            <tr>
                <th>Naziv grupe</th>
                <th>Broj rođendana u grupi</th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$statistika}
                <tr>
                    <td>{$statistika[i].nazivGrupe}</td>
                    <td>{$statistika[i].zbroj}</td>
                </tr>
            {/section}
        </tbody>
    </table>
    
    <p>Popis sudionika na rođendanima:</p> 
    <table id="tablicaSudioniciRodendan" class="display">
        <caption>Sudionici na rođendanu</caption>
        <thead>
            <tr>
                <th>ID rođendana</th>
                <th>Naziv rođendana</th>
                <th>Ime</th>
                <th>Prezime</th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$sudionici}
                <tr>
                    <td>{$sudionici[i].rodendanId}</td>
                    <td>{$sudionici[i].nazivRodendana}</td>
                    <td>{$sudionici[i].ime}</td>
                    <td>{$sudionici[i].prezime}</td>
                </tr>
            {/section}
        </tbody>
    </table>
   
    <!-- DRUGA MOGUĆNOST  s odabirom rođendana i prikazom sudionika_____________ 
    <h3>Rođendani</h3>
    <table id="tablicaRodendan">
        <caption>Rođendani</caption><br>
        <thead>
            <tr>
                <th>ID rezervacije</th>
                <th>Naziv rođendana</th>
                <th>Opis</th>
                <th>Broj djece</th>
                <th>Datum</th>
                <th>Zamjenski datum</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
        </tbody>
    </table>
    <button id="prikaziTablicuRodendan"> Prikaži rođendane </button> <br><br>
    
    <p>Sudionici odabranog rođendana.</p> 
    
    <table id="tablicaSudionici">
        <caption>Sudionici</caption><br>
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$sudionici}
            <tr>
                <td>{$sudionici[i].ime}</td>
                <td>{$sudionici[i].prezime}</td>
            </tr>
        {/section}
        </tbody>
    </table>
    -->
    
</section>
