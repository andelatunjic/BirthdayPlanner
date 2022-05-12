<section id="sadrzaj">
    <h2>Ažuriranje sudjelovanja</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice sudjeluje kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje sudjelovanja:</legend>
                <label>Id sudionika:</label>
                <input type="text" name="sudionikId" value="{$sudionik[0].sudionikId}" required><br><br>

                <label>Id rezervacije:</label>
                <input type="text" name="rezervacijaId" value="{$sudionik[0].rezervacijaId}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
