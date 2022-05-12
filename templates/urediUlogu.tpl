<section id="sadrzaj">
    <h2>Ažuriranje uloge</h2>
    <p>U nastavku se nalaze podaci odabrane uloge koje možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaUlogeAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje uloge:</legend>
                <label>Id uloge:</label>
                <input type="text" name="id" value="{$uloga[0].ulogaId}" readonly required><br><br>

                <label>Naziv uloge:</label>
                <input type="text" name="naziv" value="{$uloga[0].nazivUloge}" required><br><br>

                <button name="submit" id="azurirajUlogu" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>

