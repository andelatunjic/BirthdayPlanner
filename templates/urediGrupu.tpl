
<section id="sadrzaj">
    <h2>Ažuriranje grupe</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice grupe kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje grupe:</legend>
                <label>Id grupe:</label>
                <input type="text" name="id" value="{$grupa[0].grupaId}" readonly required><br><br>

                <label>Naziv grupe:</label>
                <input type="text" name="naziv" value="{$grupa[0].nazivGrupe}" required><br><br>
                
                <label>Opis grupe:</label>
                <textarea rows="5" cols="50" name="opis" required >{$grupa[0].opisGrupe}</textarea><br><br>

                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>