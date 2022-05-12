<section id="sadrzaj">
    <div id="pomocDva">                 
        Klikni me za pomoć!            
    </div>
    <h2>Korisnički računi</h2>
    <p>Ovdje možete pregledavati blokirane korisnike i odblokirati ih, te isto tako blokirati neblokirane korisnike.</p>
   
    <table id="korisnici" class="display">
        <caption>Korisnici</caption><br>
        <thead>
            <tr>
                <th>ID korisnika</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Status</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$korisnici}
                <tr>
                    <td>{$korisnici[i].korisnikId}</td>
                    <td>{$korisnici[i].ime}</td>
                    <td>{$korisnici[i].prezime}</td>
                    <td>{$korisnici[i].blokiran}</td>
                    <td><a id='blokOdblok' href='#'> Blokiraj/Odblokiraj </a></td>
                  
                </tr>
            {/section}
        </tbody>
    </table>

</section>
