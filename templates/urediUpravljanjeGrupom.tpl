<section id="sadrzaj">
    <h2>Ažuriranje upravljanja grupom</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice upravljanje grupom kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje upravljanja:</legend>
                <label>Id moderatora:</label>
                <input type="text" name="moderatorId" value="{$upravljanje[0].moderatorId}" required><br><br>

                <label>Id grupa:</label>
                <input type="text" name="grupaId" value="{$upravljanje[0].grupaId}" required><br><br>
                
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
