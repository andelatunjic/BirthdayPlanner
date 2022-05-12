<section id="sadrzaj">
    <h2>Ažuriranje radnje</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice tip radnje kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje radnje:</legend>
                <label>Id radnje:</label>
                <input type="text" name="tipRadnjeId" value="{$radnja[0].tipRadnjeId}" readonly required><br><br>

                <label>Naziv radnje:</label>
                <input type="text" name="nazivRadnje" value="{$radnja[0].nazivRadnje}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
