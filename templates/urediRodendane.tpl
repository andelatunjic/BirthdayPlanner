<section id="sadrzaj">
    <h2>Ažuriranje rođendana</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice rođendan kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka" style="color:orange;">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje rođendana:</legend>
                <label>Id rođendana:</label>
                <input type="text" name="rodendanId" value="{$rodendan[0].rodendanId}" readonly required><br><br>

                <label>Id rezervacije:</label>
                <input type="text" name="rezervacijaId" value="{$rodendan[0].rezervacijaId}" required><br><br>
                
                <label>Naziv rođendana:</label>
                <input type="text" name="nazivRodendana" value="{$rodendan[0].nazivRodendana}" required><br><br>
                
                <label>Opis rođendana:</label>
                <textarea rows="5" cols="50" name="opis" required >{$rodendan[0].opis}</textarea><br><br>
               
                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>

</section>
