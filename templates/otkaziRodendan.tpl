
<section id="sadrzaj">
    <h2>Otkazivanje rođendana</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice rođendan kojeg možete otkazati i dati mu zamjenski datum.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Promjena termina:</legend>
                <label>Id rezervacije:</label>
                <input type="text" name="rezervacijaId" value="{$rodendan[0].rezervacijaId}" readonly required><br><br>
            
                <label>Id rođendana:</label>
                <input type="text" name="rodendanId" value="{$rodendan[0].rodendanId}" readonly required><br><br>

                <label>Datum rođendana:</label>
                <input type="text" name="datum" value="{$rodendan[0].datum}" readonly required><br><br>
                
                <label>Zamjenski datum:</label>
                <input type="text" name="zamjenskiDatum" id="datum" value="{$rodendan[0].zamjenskiDatum}" placeholder="3.4.2021. 15:45" required><br><br>
                
                <button name="submit" id="otkaziRodendan" type="submit">Spremi zamjenski datum</button>
        </fieldset>    

    </form>

</section>