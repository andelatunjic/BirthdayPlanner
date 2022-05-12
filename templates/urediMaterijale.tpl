<section id="sadrzaj">
    <h2>Ažuriranje materijala</h2>
    <p>U nastavku se nalaze podaci odabranog materijala kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje materijala:</legend>
                <label>Id materijala:</label>
                <input type="text" name="id" value="{$materijal[0].materijalId}" readonly required><br><br>

                <label>Vrsta materijala Id:</label>
                <input type="text" name="vrstaMaterijalaId" value="{$materijal[0].vrstaMaterijalaId}" required><br><br>
                
                <label>Rezervacija Id:</label>
                <input type="text" name="rezervacijaId" value="{$materijal[0].rezervacijaId}" required><br><br>
                
                <label>Putanja:</label>
                <textarea rows="5" cols="50" name="putanja" required >{$materijal[0].putanja}</textarea><br><br>
                
                <label>Suglasnost:</label>
                <input type="text" name="suglasnost" value="{$materijal[0].suglasnost}" required><br><br>

                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
</section>
