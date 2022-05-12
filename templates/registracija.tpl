<section id="sadrzaj">

    <h2>Registracija novih članova</h2>
    <p>Niste registrirani, a želite biti naš član? Super! Na pravom ste mjestu. 
       Sve što trebate je popuniti obrazac u nastavku s vašim osnovnim informacijama. </p>
    <div id="error" style = "color:red;">
        {$greska}
    </div>
    <div id="greskaKorime" style = "color:red;">
        {$greskaKorime}
    </div>
    <div id="uspjeh" style = "color:green;">
        {$uspjeh}
    </div>
    <form  novalidate name="registracija" id="registracija" method="POST" action="">
        <fieldset>
            <legend>Registracija:</legend>
            <label for="ime">Ime:</label><br>
            <input name="ime" type="text" id="ime" autofocus autocomplete="off"/><br><br>

            <label for="prezime">Prezime:</label><br>
            <input name="prezime" type="text" id="prezime" autocomplete="off"/><br><br>

            <label for="korime">Korisničko ime:</label><br>
            <input name="korisnickoIme" type="text" id="korisnickoIme" autocomplete="off"/><br><br>

            <label for="email">E-mail:</label><br>
            <input name="email" type="email" id="email" autocomplete="off"/><br><br>

            <label for="lozinka">Lozinka:</label><br>
            <input name="lozinka" type="password" id="lozinka" autocomplete="off"/><br><br>

            <label for="plozinka">Potvrda lozinke:</label><br>
            <input name="plozinka" type="password" id="plozinka" autocomplete="off"/><br><br>
            
            <div id="captcha"></div>
            <label for="kod">Kod sa slike:</label><br>
            <input name="kod" type="text" id="kod" autocomplete="off"><br><br>

            <input class="gumb" name="submit" id="submit" type="submit" value="Registriraj se"/>
        </fieldset>
        
        <div class="greske" style = "color:red;">
            
        </div>
    </form>


</section>
