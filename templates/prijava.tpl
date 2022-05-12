<section id="sadrzaj">
    <h2>Prijava registriranih članova</h2>
    <p>Prijavite se vašim korisničkim imenom i lozinkom</p>
    <div id="error" style = "color:red;">
        {$greska}
    </div>
    <div id="uspjeh" style = "color:green;">
        {$uspjeh}
    </div>
    <form novalidate name="prijava" id="prijava" method="POST" action= "">
        <fieldset>
            <legend>Prijava:</legend>
                <label for="korisnickoIme">Korisničko ime:</label><br>
                <input name="korisnickoIme" type="text" id="korisnickoIme" autofocus/><br><br>

                <label for="lozinka">Lozinka:</label><br>
                <input name="lozinka" type="password" id="lozinka" /><br><br>
                
                <label for="zapamtiMe">Zapamti me:</label>
                <input name="zapamtiMe" type="checkbox" id="zapamtiMe" checked/><br>
                
                <a id="zaboravljenaLozinka" href="#"><h4>Zaboravljena lozinka?</h4></a>

                <input class="gumb" name="submit" type="submit" value="Prijavi se"/>
                
        </fieldset>
    </form>
    <p>Registrirani korisnik: iivic - Registrirani01</p>
    <p>Moderator: tcmrecki - Moderator01</p>
    <p>Administrator: atunjic - Admin01 </p>

</section>
