<section id="sadrzaj">
    <h2>Opis projektnog zadatka</h2>
    <p>
        Cilj ovog projektnog zadatka je izraditi sustav koji omogućuje upravljanje rođendanima. Uloge koje korisnik može imati su neregistrirani korisnik,
        registrirani korisnik, moderator te administrator koji upravlja cijelom aplikacijom.
    </p>

    <h2>Opis projektnog rješenja</h2>
    <p>
       Rješenje je izgrađen sustav za upravljanje rođendanima. Neregistrirani korisnik ima uvid u statistiku broja rođendana po grupi, vidi popis korisnika na rođendanu, a odabirom rođendana
       vidi materijale korisnika. Također, može pratiti zadnjih 10 dodanih rođendana po svakoj grupi. <br>
       Registrirani korisnik može vidjeti sve što i neregistrirani te dodatno može kreirati/ažurirati rezervacije termina za rođendan, vidjeti sve rezervacije i u kojem su statusu, postaviti materijale
       za rođendane pri čemu bira vrstu materijala i daje suglasnost za njihov prikaz. Također može vidjeti i galeriju materijala za rođendan koje može filtrirati. <br>
       Moderator može sve što i uloge niže razine, a dodatno može pregledavati/ažurirati/kreirati rođendane za grupe za koje je zadužen. Potvrđuje/odbija rezervacije, a rođendane može otkazati uz navođenje zamjenskog termina. <br>
       Administrator ima sva prava i upravlja cijelom aplikacijom. Kreira/ažurira grupe i dodjeljuje im moderatore, može napraviti sigurnosnu kopiju iz baze i vratiti podatke iz nje te ima uvid u statistiku.
    </p>

    <h2>ERA model</h2>
    <img src="{$putanja}/multimedija/atunjic-ERA.png" alt="eraModel" width="400" height="400"><br>

    <h2>Navigacijski dijagram</h2>
    <img src="{$putanja}/multimedija/navigacijski.png" alt="navigacijskiDijagram" width="400" height="400"><br><br>
    <p>Neregistrirani korisnik ima pristup registraciji, statistici, popisu korisnika na rođendanu, mijenjanju dizajna
        stranice, dokumentaciji i stranici o autoru. <br>
        Registrirani korisnik dodatno ima pristup kreiranju/ažuriranju rezervacije, popisu rzervacije i galeriji materijala. <br>
        Moderator dodatno može pristupiti stranici za kreiranje/ažuriranje rođendana te popisu rezervacija. <br>
        Administrator ima pristup svemu što je na dijagramu.
    </p>

    <h2>Korištene tehnologije i alati</h2>
    <ol>
        <li>HTML</li>
        <li>CSS</li>
        <li>Javascript</li>
        <li>PHP</li>
        <li>XAMPP</li>
        <li>MySQL</li>
        <li>PHPMyAdmin</li>
        <li>FileZilla</li>
        <li>PuTTY</li>
        <li>Draw.io</li>
    </ol>

    <h2>Korištene vanjske biblioteke</h2>
    <ol>
        <li>jQUERY</li>
        <li>baza.class.php</li>
        <li>sesija.class.php</li>
        <li>Smarty</li>
    </ol>
    
</section>
