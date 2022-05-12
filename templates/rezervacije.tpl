<section id="sadrzaj">
    <h2>Rezervacije termina</h2>
    <p>Ovdje možete pregledavati, kreirati i ažurirati svoje rezervacije.</p>
    <p>U nastavku se nalaze rezervirani termini i njihov status:</p>
   
    <table id="tablicaRezervacija" class="display">
        <caption>Rezervacije</caption>
        <thead>
            <tr>
                <th>ID rezervacije</th>
                <th>Naziv grupe</th>
                <th>Datum</th>
                <th>Zamjenski datum</th>
                <th>Broj djece</th>
                <th>Status rezervacije</th>
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
                    {if $rezervacije[i].statusRezervacije != "Prihvaćeno"}
                    <td><a id='urediRezervaciju' href='#'> Ažuriraj </a></td>
                    {/if}
                </tr>
            {/section}
        </tbody>
    </table>    
        
    <p>Ovo je forma za kreiranje rezervacija.</p>
    <div id="poruka" style = "color:#FB6910;">
        {$poruka}
    </div>
    
    <form novalidate name="kreirajRezervaciju" id="kreirajRezervaciju" method="POST" action= "">
        <fieldset>
            <legend>Kreiranje rezervacije:</legend>
            
                <label>Odaberite grupu:</label>
                <select id="grupa">
                    {section name=i loop=$grupe}
                        <option value="{$grupe[i][0]}">{$grupe[i][1]}</option>
                    {/section}
                </select><br><br>
            
                <label>Odaberite datum:</label><br>
                <input type="text" id="datumRezervacije" placeholder="1.1.2021. 15:15"/><br><br>
                
                <label>Broj djece:</label><br>
                <input type="number" id="brojDjece" name="brojDjece" min="1" max="30"><br><br>
               
                <input class="gumb" id="submitKreirajRezervaciju" name="submitKreirajRezervaciju" type="submit" value="Kreiraj"/>
                <input class="gumb" name="reset" type="reset" value="Resetiraj"/>
        </fieldset>
    </form><br>
    
    <p>Brisanje rezervacija koje su u tijeku ili su odbijene.</p>
    <form novalidate name="obrisiRezervaciju" id="obrisiRezervaciju" method="POST" action= "">
        <fieldset>
            <legend>Brisanje rezervacije:</legend>
            
                <label>Odaberite rezervaciju koju želite obrisati:</label>
                <select id="reze">
                    {section name=i loop=$rezeZaBrisati}
                        <option value="{$rezeZaBrisati[i][0]}">{$rezeZaBrisati[i][0]} <--> {$rezeZaBrisati[i][1]}</option>
                    {/section}
                </select><br><br>
               
                <input class="gumb" id="submitObrisiRezervaciju" name="submitObrisiRezervaciju" type="submit" value="Obriši"/>
                
        </fieldset>
    </form><br>
    
    <p>Dodavanje sudionika:</p>
    <form novalidate name="materijal" id="materijal" method="POST" action= "" enctype="multipart/form-data">
        <fieldset>
            <legend>Dodavanje materijala:</legend>
            
                <label>Vrsta materijala:</label>
                <select id="vrstaMaterijala">
                    {section name=i loop=$vrstaMaterijala}
                        <option value="{$vrstaMaterijala[i][0]}">{$vrstaMaterijala[i][1]}</option>
                    {/section}
                </select><br><br>
            
                <label>Rezervacija:</label>
                <select id="rezervacijaId">
                    {section name=i loop=$rezePotvrdene}
                        <option value="{$rezePotvrdene[i][0]}">{$rezePotvrdene[i][0]} <--> {$rezePotvrdene[i][1]}</option>
                    {/section}
                </select><br><br>
                
                <label for="suglasnost">Javni prikaz:</label>
                <input name="suglasnost" type="checkbox" id="suglasnost" /><br><br>
                
                <label for="materijal">Materijal:</label>
                <input type="file" name="materijal" id="materijal"/><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
               
                <input class="gumb" id="dodajMaterijal" name="dodajMaterijal" type="submit" value="Dodaj"/>
                <input class="gumb" name="reset" type="reset" value="Resetiraj"/>
        </fieldset>
    </form><br><br>

</section>
