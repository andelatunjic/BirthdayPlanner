<section id="sadrzaj">
    <h2>Ažuriranje sudionika</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice sudionik kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje sudionika:</legend>
                <label>Id korisnika:</label>
                <input type="text" name="sudionikId" value="{$sudionik[0].sudionikId}" readonly required><br><br>

                <label>Ime:</label>
                <input type="text" name="ime" value="{$sudionik[0].ime}" required><br><br>
                
                <label>Prezime:</label>
                <input type="text" name="prezime" value="{$sudionik[0].prezime}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
