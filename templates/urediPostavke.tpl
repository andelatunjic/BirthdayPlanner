<section id="sadrzaj">
    <h2>Ažuriranje postavki</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice postavke kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Konfiguracija:</legend>
                <label>Id postavke:</label>
                <input type="text" name="id" value="{$postavke[0].postavkeId}" readonly required><br><br>

                <label>Id admin:</label>
                <input type="text" name="adminId" value="{$postavke[0].adminId}" required><br><br>
                
                <label>Straničenje:</label>
                <input type="text" name="stranicenje" value="{$postavke[0].stranicenje}" required><br><br>
                
                <label>Trajanje kolačića:</label>
                <input type="text" name="trajanjeKolacica" value="{$postavke[0].trajanjeKolacica}" required><br><br>
                
                <label>Pomak vremena:</label>
                <input type="text" name="pomakVremena" value="{$postavke[0].pomakVremena}" required><br><br>
                
                <label>Trajanje aktivacijskog linka:</label>
                <input type="text" name="trajanjeAktivacijskogLinka" value="{$postavke[0].trajanjeAktivacijskogLinka}" required><br><br>
                
                <label>Broj neuspješnih prijava:</label>
                <input type="text" name="brojNeuspjesnihPrijava" value="{$postavke[0].brojNeuspjesnihPrijava}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
