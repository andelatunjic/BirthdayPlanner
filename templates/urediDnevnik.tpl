
<section id="sadrzaj">
    <h2>Ažuriranje dnevnika</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz dnevnika kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaDnevnikAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje dnevnika:</legend>
                <label>Id dnenvika:</label>
                <input type="text" name="idD" value="{$dnevnik[0].dnevnikId}" readonly required><br><br>

                <label>Id korisnika:</label>
                <input type="text" name="idK" value="{$dnevnik[0].korisnikId}" readonly required><br><br>
                
                <label>Id tipa radnje:</label>
                <input type="text" name="idT" value="{$dnevnik[0].tipRadnjeId}" required><br><br>
                
                <label>Radnja:</label>
                <input type="text" name="radnja" value="{$dnevnik[0].radnja}" required><br><br>
                
                <label>Upit:</label>
                <input type="text" name="upit" value="{$dnevnik[0].upit}" required><br><br>
                
                <label>Vrijeme:</label>
                <input type="text" name="vrijeme" value="{$dnevnik[0].vrijeme}" required><br><br>

                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>