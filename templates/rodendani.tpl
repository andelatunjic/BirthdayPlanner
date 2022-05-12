<section id="sadrzaj">
    <h2>Rođendani</h2>
    <p>Ovdje možete pregledavati, kreirati i ažurirati rođendane.</p>
    
    <p>U nastavku se nalazi popis svih rođendana za grupe za koje je zadužen prijavljen moderator.</p> 
    <table id="tablicaRodendan" class="display">
        <caption>Rođendani</caption><br>
        <thead>
            <tr>
                <th>ID rezervacije</th>
                <th>ID rođendana</th>
                <th>Naziv rođendana</th>
                <th>Opis</th>
                <th>Datum</th>
                <th>Zamjenski datum</th>
                <th></th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$rodendani}
                <tr>
                    <td>{$rodendani[i].rezervacijaId}</td>
                    <td>{$rodendani[i].rodendanId}</td>
                    <td>{$rodendani[i].nazivRodendana}</td>
                    <td>{$rodendani[i].opis}</td>
                    <td>{$rodendani[i].datum}</td>
                    <td>{$rodendani[i].zamjenskiDatum}</td>
                    <td><a id='urediRodendan' href='#'> Ažuriraj </a></td>
                    <td><a id='otkaziRodendan' href='#'> Otkaži </a></td>
                </tr>
            {/section}
        </tbody>
    </table> 
    
    <p>Prikaz rezervacija za potvrđivanje/odbijanje za grupe za koje je zadužen prijavljen moderator.</p> 
    <table id="tablicaRezervacija" class="display">
        <caption>Rezervacije</caption><br>
        <thead>
            <tr>
                <th>ID rezervacije</th>
                <th>Naziv grupe</th>
                <th>Datum</th>
                <th>Zamjenski datum</th>
                <th>Broj djece</th>
                <th>Status rezervacije</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$rezervacije}
                <tr>
                    <td>{$rezervacije[i].rezervacijaId}</td>
                    <td>{$rezervacije[i].nazivGrupe}</td>
                    <td>{$rezervacije[i].datum}</td>
                    <td>{$rezervacije[i].zamjenskiDatum}</td>
                    <td>{$rezervacije[i].brojDjece}</td>
                    <td>{$rezervacije[i].statusRezervacije}</td>
                    <td><a id="proba" href='#'>Potvrdi</a></td>
                    <td><a id="proba2" href='#'>Odbij</a></td>
                </tr>
            {/section}
        </tbody>
    </table>    
        
    <p>Ovo je forma za kreiranje rođendana.</p>
    <div id="poruka" style = "color:#FB6910;">
        {$poruka}
    </div>
    
    <form novalidate name="kreirajRezervaciju" id="kreirajRezervaciju" method="POST" action= "">
        <fieldset>
            <legend>Kreiranje rođendana:</legend>
            
                <label>Odaberite rezervaciju:</label>
                <select id="rezervacija">
                    {section name=i loop=$potvrdeneRezervacije}
                        <option value="{$potvrdeneRezervacije[i][0]}">{$potvrdeneRezervacije[i][1]} : {$potvrdeneRezervacije[i][2]}</option>
                    {/section}
                </select><br><br>
            
                <label>Unesite naziv rođendana:</label><br>
                <input type="text" id="naziv"/><br><br>
                
                <label>Unesite opis rođendana:</label><br>
                <textarea name="opis" id="opis" rows="5" cols="50" placeholder="Opišite rođendan."></textarea><br><br>
               
                <input class="gumb" id="submitKreirajRodendan" name="submitKreirajRodendan" type="submit" value="Kreiraj"/>
                <input class="gumb" name="reset" type="reset" value="Resetiraj"/>
        </fieldset>
    </form><br><br>
    

</section>
