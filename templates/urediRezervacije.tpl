<section id="sadrzaj">
    <div id="treca" href="#">                 
        Klikni me za pomoć!            
    </div>
    <h2>Ažuriranje rezervacije</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice Rezervacije kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka" style="color:red;">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje rezervacije:</legend>
                <label>Id rezervacije:</label>
                <input type="text" name="rezervacijaId" value="{$rezervacija[0].rezervacijaId}" readonly required><br><br>

                <label>Id korisnika:</label>
                <input type="text" name="korisnikId" value="{$rezervacija[0].korisnikId}" required><br><br>
                
                <label>Id grupe:</label>
                <input type="text" name="grupaId" value="{$rezervacija[0].grupaId}" required><br><br>
                
                <label>Datum:</label>
                <input type="text" name="datum" id="datum" value="{$rezervacija[0].datum}" required><br><br>
                
                <label>Broj djece:</label>
                <input type="text" name="brojDjece" value="{$rezervacija[0].brojDjece}" required><br><br>
                
                <label>Status rezervacije:</label>
                <input type="text" name="statusRezervacije" value="{$rezervacija[0].statusRezervacije}" required><br><br>
                
                <label>Zamjenski datum:</label>
                <input type="text" name="zamjenskiDatum" id="zamjenskiDatumModerator" value="{$rezervacija[0].zamjenskiDatum}" placeholder="1.1.2021. 15:15"><br><br>
                
                <button name="submit" id="azurirajRezervaciju" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
