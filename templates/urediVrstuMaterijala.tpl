<section id="sadrzaj">
    <h2>Ažuriranje vrste materijala</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice vrsta materijala kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje vrste materijala:</legend>
                <label>Id vrste materijala:</label>
                <input type="text" name="vrstaMaterijalaId" value="{$vrsta[0].vrstaMaterijalaId}" readonly required><br><br>

                <label>Naziv:</label>
                <input type="text" name="nazivMaterijala" value="{$vrsta[0].nazivMaterijala}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
