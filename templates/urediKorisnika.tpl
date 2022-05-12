<section id="sadrzaj">
    <h2>Ažuriranje korisnika</h2>
    <p>U nastavku se nalaze podaci odabranog zapisa iz tablice korisnik kojeg možete promjeniti te potom ažurirati.</p> 
    
    <p id="poruka">{$poruka}</p>
    
    <form id="tablicaGrupaAzuriranje" novalidate method="POST" action="">
        
        <fieldset>
            <legend>Ažuriranje korisnika:</legend>
                <label>Id korisnika:</label>
                <input type="text" name="id" value="{$korisnik[0].korisnikId}" readonly required><br><br>

                <label>Id uloge:</label>
                <input type="text" name="ulogaId" value="{$korisnik[0].ulogaId}" required><br><br>
                
                <label>Ime:</label>
                <input type="text" name="ime" value="{$korisnik[0].ime}" required><br><br>
                
                <label>Prezime:</label>
                <input type="text" name="prezime" value="{$korisnik[0].prezime}" required><br><br>
                
                <label>Korisničko ime:</label>
                <input type="text" name="korisnickoIme" value="{$korisnik[0].korisnickoIme}" required><br><br>
                
                <label>Email:</label>
                <input type="text" name="email" value="{$korisnik[0].email}" required><br><br>
                
                <label>Lozinka:</label>
                <input type="text" name="lozinka" value="{$korisnik[0].lozinka}" readonly required><br><br>
                
                <label>Lozinka SHA256:</label>
                <input type="text" name="lozinkaSHA256" value="{$korisnik[0].lozinkaSHA256}" readonly required><br><br>
                
                <label>Datum registracije:</label>
                <input type="text" name="datumRegistracije" value="{$korisnik[0].datumRegistracije}" readonly required><br><br>
                
                <label>Uvjeti prihvaćeni:</label>
                <input type="text" name="uvjeti" value="{$korisnik[0].uvjeti}" required><br><br>
                
                <label>Aktiviran:</label>
                <input type="text" name="aktiviran" value="{$korisnik[0].aktiviran}" required><br><br>
                
                <label>Blokiran:</label>
                <input type="text" name="blokiran" value="{$korisnik[0].blokiran}" required><br><br>
                
                <label>Aktivacijski link:</label>
                <textarea rows="5" cols="50" name="aktivacijskiLink" required >{$korisnik[0].aktivacijskiLink}</textarea><br><br>
                
                <label>Neuspješne prijave:</label>
                <input type="text" name="neuspjesnePrijave" value="{$korisnik[0].neuspjesnePrijave}" required><br><br>

                <button name="submit" id="azurirajDnevnik" type="submit">Ažuriraj</button>
        </fieldset>    

    </form>
    

</section>
