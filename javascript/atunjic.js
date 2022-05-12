/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ONLOAD DOGAĐAJI ZA BODY_______________________________________________________
function kreirajDogadaje(){
    
    pravokutnik = document.getElementById("pravokutnik");
    pravokutnik.addEventListener("click", function(){
        FunkcijaZaPomoc();
    });
    
    //funkcija i kolačić za promjenu dizajna u crno-bijelo______________________
    ikona = document.getElementById("crnoBijelo");
    ikona.addEventListener("click", function(){
        
        var datum = new Date(),
        datumIsteka = 'expires=';
        datum.setDate(datum.getDate() + 7);
        datumIsteka += datum.toGMTString();
        
        var poveznica = document.getElementById("crnoBijeloCss");
        var polje = poveznica.getAttribute('href').split('/');
        if (polje[5] == "atunjic.css") {
            var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic_crnoBijelo.css";
            poveznica.setAttribute('href', link);
            document.cookie = "tema=" + "baw" + ";" + datumIsteka + "; path=/";
        } 
        else if(polje[5] == "atunjic_crnoBijelo.css"){
            var link2 = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic.css";
            poveznica.setAttribute('href', link2);
            document.cookie = "tema=" + "color" + ";" + datumIsteka + "; path=/";
        }
        else{
            alert(poveznica.getAttribute('href'));
        }
    });
    
    //funkcija i kolačić za uključivanje prilagodbi za disleksiju_______________
    ikona2 = document.getElementById("prilagodbe");
    ikona2.addEventListener("click", function(){
        
        var datum = new Date(),
        datumIsteka = 'expires=';
        datum.setDate(datum.getDate() + 7);
        datumIsteka += datum.toGMTString();
        
        var poveznica = document.getElementById("prilagodbeCss");
        var polje = poveznica.getAttribute('href').split('/');
        if (polje[5] == "atunjic.css") {
            var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic_prilagodbe.css";
            poveznica.setAttribute('href', link);
            document.cookie = "disleksija=" + "on" + ";" + datumIsteka + "; path=/";
        } 
        else if(polje[5] == "atunjic_prilagodbe.css"){
            var link2 = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic.css";
            poveznica.setAttribute('href', link2);
            document.cookie = "disleksija=" + "off" + ";" + datumIsteka + "; path=/";
        }
        else{
            alert(poveznica.getAttribute('href'));
        }
    });
}
//POMOĆ_________________________________________________________________________
// Pomoć za početnu stranicu
var i=0;
function FunkcijaZaPomoc() {
    var pravokutnik = document.getElementById("pravokutnik");
    pravokutnik.style.display = "block";
    if(i === 0){
        pravokutnik.innerHTML = "Ovdje kliknite kako bi vam se otvorila navigacija.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "60px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 1){
        pravokutnik.innerHTML = "Ovdje desno prilagođavate dizajn i pristupačnost.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "900px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 2){
        pravokutnik.innerHTML = "Prikaz statistike broja rođendana";
        pravokutnik.style.top = "500px";
        pravokutnik.style.left = "5px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "100px";
        pravokutnik.style.width = "20%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 3){
        pravokutnik.innerHTML = "Sudionici na rođendanima";
        pravokutnik.style.top = "800px";
        pravokutnik.style.left = "5px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "100px";
        pravokutnik.style.width = "20%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 4){
        pravokutnik.style.display = "none";
        i = 0;
    }
}
// Pomoć za korisničke račune
function help() {
    var pravokutnik = document.getElementById("pomocDva");
    pravokutnik.style.display = "block";
    if(i === 0){
        pravokutnik.innerHTML = "Ovdje kliknite kako bi vam se otvorila navigacija.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "60px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 1){
        pravokutnik.innerHTML = "Ovdje desno prilagođavate dizajn i pristupačnost.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "900px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 2){
        pravokutnik.innerHTML = "Prikaz korisnika za blokiranje/Deblokiranje";
        pravokutnik.style.top = "350px";
        pravokutnik.style.left = "800px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "100px";
        pravokutnik.style.width = "20%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 3){
        pravokutnik.style.display = "none";
        i = 0;
    }
}
//pomoć za ažuriranje rezervacije
function pomozi() {
    var pravokutnik = document.getElementById("treca");
    pravokutnik.style.display = "block";
    if(i === 0){
        pravokutnik.innerHTML = "Ovdje kliknite kako bi vam se otvorila navigacija.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "60px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 1){
        pravokutnik.innerHTML = "Ovdje desno prilagođavate dizajn i pristupačnost.";
        pravokutnik.style.top = "15px";
        pravokutnik.style.left = "900px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "10px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 2){
        pravokutnik.innerHTML = "Ovjde možete ažurirati Rezervaciju. Pripazite na format datuma.";
        pravokutnik.style.top = "350px";
        pravokutnik.style.left = "700px";
        pravokutnik.style.border = "7px solid #FB6910";
        pravokutnik.style.height = "70px";
        pravokutnik.style.width = "30%";
        pravokutnik.style.color = "black";
        pravokutnik.style.background = "#FB6910;";
        i++;
    }
    else if(i === 3){
        pravokutnik.style.display = "none";
        i = 0;
    }
}


//______________________________________________________________________________
$(document).ready(function(){
    $('#meni').click(PrikaziSakrijNavigaciju);
    
    provjeriKolacicTeme();
    provjeriKolacicPrilagodbi();
    uvjetiKoristenja();
 
    var kod; //captcha
    
    var naslov = $(document).find("title").text();
    
    switch(naslov){
        case "Početna stranica":
            $('#prikaziTablicuRodendan').click(popuniTablicuRodendan);
            $("#tablicaRodendan").on('click','#prikaziSudionike', dohvatiIdRezervacije);
            $('#tablicaSudionici').DataTable();
            $('#tablicaSudioniciRodendan').DataTable();
            break;
        case "Prijava":
            zapamtiMe();
            provjeriZapamtiMe();
            $('#zaboravljenaLozinka').click(posaljiNovuLozinku);
            break;
        case "Registracija":
            validacijaRegistracije();
            kreirajCaptchu();
            break;
        case "Grupe":
            $('#submitKreirajGrupu').click(kreirajGrupu);
            $('#submitDodjeliModeratora').click(dodjeliModeratora);
            $("#tablicaGrupa").on('click','#urediGrupuAdmin', urediGrupuAdmin);
            $('#tablicaGrupa').DataTable();
            break;
        case "Rođendani":
            oznaci();
            $("#tablicaRodendan").on('click','#urediRodendan', urediRodendanModerator);
            $("#tablicaRodendan").on('click','#otkaziRodendan', otkaziRodendan);
            $("#tablicaRezervacija").on('click','#proba', prihvati);
            $("#tablicaRezervacija").on('click','#proba2', odbij);
            $('#submitKreirajRodendan').click(kreirajRodendan);
            
            $('#tablicaRodendan').DataTable();
            $('#tablicaRezervacija').DataTable();
            break;
        case "Otkaži rođendan":
            $('#otkaziRodendan').click(provjeriDatum);
            break;
        case "Galerija":
            
            break;
        case "Korisnički računi":
            $("#korisnici").on('click','#blokOdblok', blokOdblok);
            $('#pomocDva').click(help);
            $('#korisnici').DataTable();
            break;
        case "Dnevnik":
            
            break;
        case "Rezervacije":
            $('#submitKreirajRezervaciju').click(kreirajRezervaciju);
            $('#submitObrisiRezervaciju').click(obrisiRezervaciju);
            $('#dodajMaterijal').click(dodajMaterijal);
            $("#tablicaRezervacija").on('click','#urediRezervaciju', urediRezervacijuRegistrirani);           
            
            $('#tablicaRezervacija').DataTable();
            break;
        case "Ažuriraj rezervaciju":
            $('#azurirajRezervaciju').click(provjeriDatum);
            $('#treca').click(pomozi);
            break;
    }
});

function dodajMaterijal(){
 
    var vrstaMaterijala = $("#vrstaMaterijala :selected").val();
    var rezervacija = $("#rezervacijaId :selected").val();
    var suglasnost = $("#suglasnost").is(":checked");
    
    $.ajax({
        url: '../obrasci/rezervacije.php',
        type: 'POST',
        data: {
            VrstaMaterijala: vrstaMaterijala, 
            Rezervacija: rezervacija,
            Suglasnost: suglasnost
        },
        dataType: 'json',
        success: function(data){
            alert(data);
        }     

     });
    
}

//NAVIGACIJA____________________________________________________________________
function PrikaziSakrijNavigaciju(){
    var navigacija = document.getElementById('navigacija');
    if (navigacija.style.display === "block") {
        navigacija.style.display = "none";
    }
    else {
        navigacija.style.display = "block";
    }
}

//RAD S KOLAČIĆIMA______________________________________________________________
//funkcija za dohvaćanje cookie-a -w3schools-
function dohvatiCookie(imeCookie) {
    var ime = imeCookie + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var polje = decodedCookie.split(';');
    for(var i = 0; i <polje.length; i++) {
      var c = polje[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(ime) == 0) {
        return c.substring(ime.length, c.length);
      }
    }
    return "";
}
//funkcija za provjeru kolacica teme
function provjeriKolacicTeme(){
    var poveznica = document.getElementById("crnoBijeloCss");
    var polje = poveznica.getAttribute('href').split('/');
    if (dohvatiCookie("tema") == "baw"){
         var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic_crnoBijelo.css";
        poveznica.setAttribute('href', link);
    }
    else if(dohvatiCookie("tema") == "color"){
        var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic.css";
        poveznica.setAttribute('href', link);
    }
}
//funkcija za provjeru kolacica prilagodbi
function provjeriKolacicPrilagodbi(){
    var poveznica = document.getElementById("prilagodbeCss");
    var polje = poveznica.getAttribute('href').split('/');
    if (dohvatiCookie("disleksija") == "on"){
        var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic_prilagodbe.css";
        poveznica.setAttribute('href', link);
    }
    else if(dohvatiCookie("disleksija") == "off"){
        var link = polje[0]+"/"+polje[1]+"/"+polje[2]+"/"+polje[3]+"/"+polje[4]+"/"+"atunjic.css";
        poveznica.setAttribute('href', link);
    }
}
//funkcija za prihvacanje uvjeta korištenja i spremanja u kolacic
function uvjetiKoristenja(){
    if (dohvatiCookie("uvjetiKoristenja") != "prihvaceni"){
        alert("Ova stranica koristi kolačiće kako bi Vam mogla prikazati web stranicu i olakšati njzinu upotrebu. Molimo Vas da prhvatite uvjete korištenja za daljnji pregled stranice. Hvala.");
        var datum = new Date(),
        datumIsteka = 'expires=';
        datum.setDate(datum.getDate() + 7);
        datumIsteka += datum.toGMTString();
        document.cookie = "uvjetiKoristenja=" + "prihvaceni" + ";" + datumIsteka + "; path=/";
    }
}
//funkcija za provjeru kolacica korisničkog imena spremljenog sa "Zapamti me"
function provjeriZapamtiMe(){
    if (dohvatiCookie("korisnik") != ""){
        $("#korisnickoIme").val(dohvatiCookie("korisnik"));
    }
}

//PRIJAVA_______________________________________________________________________
function zapamtiMe(){
    $(".gumb").on('click',function(){ 
        var korisnickoIme = $("#korisnickoIme").val();
        var zapamtiMe = $("#zapamtiMe").is(":checked");
        if(zapamtiMe){
            $.ajax({
                url: "../obrasci/prijava.php",
                type: 'POST',
                success: function(){
                    var datum = new Date(),
                    datumIsteka = 'expires=';
                    datum.setDate(datum.getDate() + 7);
                    datumIsteka += datum.toGMTString();
                    document.cookie = "korisnik=" + korisnickoIme + ";" + datumIsteka + "; path=/";
                }   
            });
        }    
    });
}
//zaboravljena lozinka
function posaljiNovuLozinku(){
    var korime = $("#korisnickoIme").val();

    $.ajax({
        url: "../obrasci/prijava.php",
        type: "POST",
        data: {"korisnickoimeloz": korime},
        dataType: "json",
        success: function(data){
            $('#uspjeh').text(data);
        }
    });
}

//REGISTRACIJA__________________________________________________________________
function validacijaRegistracije(){
    $("#gumb").attr("disabled", true);

    $("#ime").on("keyup", provjerePodataka);
    $("#prezime").on("keyup", provjerePodataka);
    $("#korisnickoIme").on("keyup", provjerePodataka);
    $("#korisnickoIme").on("keyup", provjeriKorisnickoIme);
    $("#email").on("keyup", provjerePodataka);
    $("#lozinka").on("keyup", provjerePodataka);
    $("#plozinka").on("keyup", provjerePodataka);
    $("#kod").on("keyup", provjerePodataka);
}

function provjerePodataka(){
    var ime = $("#ime").val();
    var prezime = $("#prezime").val();
    var korisnickoIme = $("#korisnickoIme").val();
    var email = $("#email").val();
    var lozinka = $("#lozinka").val();
    var plozinka = $("#plozinka").val();
    var kod = $("#kod").val();
    var greske = "";
    
    if (ime == "" || prezime == "" || korisnickoIme == "" || lozinka == "" || email == "" || lozinka == "" || plozinka == "" || kod == ""){
        greske += "Popunite sva polja.<br>";
    }
    if (ime.length < 1 || prezime.length <1 || korisnickoIme.length < 4 || lozinka.length < 5 || email.length < 5 || lozinka.length < 1 || plozinka.length < 1 || kod.length < 1){
        greske += "Username mora imati min 4 znaka a lozinka 5. <br>";
    }
    else if (ime.length > 45 || prezime.length > 45 || korisnickoIme.length > 25){
        greske += "Ime i prezime mogu imati najviše 45 znakova, a username 25. <br>";
    }
    
    if (lozinka != plozinka){
        greske += "Lozinka i ponovljena lozinka moraju biti jednake. <br>";
    }

    if (email.includes("@") == false) {
        greske += "Email mora sadržavati @. <br>";
    }
    
    const regex = new RegExp(/[A-Z]/);
    var ok = regex.test(lozinka);
    if (ok == false) {
        greske += "Lozinka mora imati barem jedno veliko slovo. <br>";
    }
    if (kod != code){
        greske += "CAPTCHA provjera je neuspješna. <br>";
    }

    $(".greske").empty();
    if (greske!= ""){
        $(".greske").append(greske);
        $(".gumb").attr("disabled", true);
    }
    else {
        $(".gumb").attr("disabled", false);
    }
}
//AJAX provjera korisničkog imena u bazi
function provjeriKorisnickoIme(){
    var korime = $("#korisnickoIme").val();

    $.ajax({
        url: "../obrasci/registracija.php",
        type: "POST",
        data: {"korisnickoime": korime},
        dataType: "json",
        success: function(data){
            $('#greskaKorime').text(data["poruka"]);
        }
    });
}

//CAPTCHA_______________________________________________________________________
//funkcija za kreiranje i prikaz koda, gotovo rješenje s interneta
function kreirajCaptchu(){
    //čišćenje sadržaja diva
    $("#captcha").text("");
    var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!?";
    var lengthOtp = 6;
    var captcha = [];

    for (var i = 0; i < lengthOtp; i++) {
        //nema ponavljanja zankova
        var index = Math.floor(Math.random() * charsArray.length + 1); //dohvati sljedeći znak iz polja
        captcha.push(charsArray[index]);
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "25px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);

    code = captcha.join("");

    $("#captcha").append(canv);
}

//GRUPE_________________________________________________________________________
//kreiranje nove grupe
function kreirajGrupu() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var nazivGrupe = $("#nazivGrupe").val();
    var opisGrupe = $("#opisGrupe").val();
    
    if(nazivGrupe == ""){
        poruka.text("Molimo vas da popunite naziv grupe.");
    }
    else {
        $.ajax({
            url: '../obrasci/grupe.php',
            type: 'POST',
            data: {
                nazivgrupe: nazivGrupe, 
                opisgrupe: opisGrupe,
            },
            dataType: 'json',
            success: function(data){
                alert(data);
            }     
             
         });
    }
}
function urediGrupuAdmin(){
    var odabraniRed = $(this).closest("tr"); 
    var grupaId = odabraniRed.find("td:eq(0)").text(); 
    var link = "../obrasci/urediGrupu.php?id="+grupaId;
    window.location.replace(link);
}
//dodjeljivanje moderatora
function dodjeliModeratora() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var grupa = $("#grupa :selected").val();
    var moderator = $("#moderator :selected").val();
    
    $.ajax({
        url: '../obrasci/grupe.php',
        type: 'POST',
        data: {
            Grupa: grupa, 
            Moderator: moderator 
        },
        dataType: 'json',
        success: function(data){
            alert(data);
        }    
     });
    
}
//odabir grupe za ažuriranje
function odaberiGrupu() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var grupa = $("#grupaAzuriraj :selected").val();
    
    $.ajax({
        url: '../obrasci/grupe.php',
        type: 'POST',
        data: {
            GrupaAzuriranje: grupa
        },
        dataType: 'json',
        success: function(data){
            $('#poruka').text(data);
        }    
     });
}

//REZERVACIJE___________________________________________________________________
//kreiranje nove rezervacije
function kreirajRezervaciju() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var grupa = $("#grupa :selected").val();
    var datum = $("#datumRezervacije").val();
    var brojDjece = $("#brojDjece").val();
    
    const regex = new RegExp(/^([1-9]|[1|2][0-9]|[3][0|1])[.]([1-9]|[1][0-2])[.]([1-9][9][0-9]{2}|2[0-9]{3})[.] ([0-9]|1[0-9]|2[0-3])[:]([1-9]|[1-5][0-9])$/);
    var ok = regex.test(datum);
    
    if(datum == "" || brojDjece == ""){
        poruka.text("Molimo vas da popunite sva polja.");
    }
    else if(ok == false){
        poruka.text("Molimo vas da popunite datum ispravno.");
    }
    else {
        $.ajax({
            url: '../obrasci/rezervacije.php',
            type: 'POST',
            data: {
                Grupa: grupa, 
                Datum: datum, 
                BrojDjece: brojDjece
            },
            dataType: 'json',
            success: function(data){
                alert(data);
            }     
         });
    }
}

//Obriši rezervaciju
function obrisiRezervaciju() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var id = $("#reze :selected").val();
    
    $.ajax({
        url: '../obrasci/rezervacije.php',
        type: 'POST',
        data: {
            IdZaBrisanje: id
        },
        dataType: 'json',
        success: function(data){
            alert(data);
        }     
     });
    
}

//uredi rezervaciju
function urediRezervacijuRegistrirani(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediRezervacije.php?id="+rezervacijaId;
    window.location.replace(link);
}
function provjeriDatum(){
    //31.1.1900. 9:59
    const regex = new RegExp(/^([1-9]|[1|2][0-9]|[3][0|1])[.]([1-9]|[1][0-2])[.]([1-9][9][0-9]{2}|2[0-9]{3})[.] ([0-9]|1[0-9]|2[0-3])[:]([1-9]|[1-5][0-9])$/);
    
    var datum = $("#datum").val(); 
    
    var ok1 = regex.test(datum);
    
    var greska1 = false;
    
    if (ok1)
    {
        $("#datum").css("background", "green");
    } else {
        $("#datum").css("background", "red");
        greska1=true;
    }
    
    if (greska1 == true) {
        event.preventDefault();
    }
}

//ROĐENDANI_____________________________________________________________________
function urediRodendanModerator(){
    var odabraniRed = $(this).closest("tr"); 
    var rodendanId = odabraniRed.find("td:eq(1)").text(); 
    var link = "../obrasci/urediRodendane.php?id="+rodendanId;
    window.location.replace(link);
}
function otkaziRodendan(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); 
    var link = "./otkaziRodendan.php?id="+rezervacijaId;
    window.location.replace(link);
}
function prihvati(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); 
    var link = "../ostalo/potvrdaOdbijanje.php?idP="+rezervacijaId;
    window.location.replace(link);
}
function odbij(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); 
    var link = "../ostalo/potvrdaOdbijanje.php?idO="+rezervacijaId;
    window.location.replace(link);
}
function oznaci(){
    var signal = 1;
    $.ajax({
        url: '../obrasci/rodendani.php',
        type: 'POST',
        data: {
            Signal: signal
        },
        dataType: 'json',
        success: function(data){
            for (var i = 0; i < data.length - 1; i++) {
                var polje = data[i][1].split(' ');
                
                for (var j = i + 1; j < data.length; j++) {
                    var polje2 = data[j][1].split(' ');
                    if (polje[0] == polje2[0]) {
                        
                        $("#tablicaRezervacija tr").each(function() { 
                            var celija=$(this).find("td:eq(2)").text(); 
                            var polje3 = celija.split(' ');
                            if (polje3[0] == polje[0]) {
                                $(this).find("td:eq(2)").css('color', 'red');
                            }
                        });
                    }
                }
            }
        }     
     });
}

//kreiraj novi rođendan
function kreirajRodendan() {
    
    event.preventDefault();

    var poruka = $('#poruka');
    
    var rezervacija = $("#rezervacija :selected").val();
    var naziv = $("#naziv").val();
    var opis = $("#opis").val();
    
    if(naziv == "" || opis == ""){
        poruka.text("Molimo popunite sva polja.");
    }
    else {
        $.ajax({
            url: '../obrasci/rodendani.php',
            type: 'POST',
            data: {
                Rezervacija: rezervacija, 
                Naziv: naziv, 
                Opis: opis
            },
            dataType: 'json',
            success: function(data){
                $('#poruka').text(data);
            }     
         });
    }
}

//POČETNA STRANICA______________________________________________________________
//Prikaz rođendana i njegovih sudionika
function popuniTablicuRodendan(){
    
    var prikaziTablicuRodendan = $("#prikaziTablicuRodendan").text();
   
    $.ajax({
        url: './index.php',
        type: 'POST',
        data: {PrikaziTablicuRodendan: prikaziTablicuRodendan},
        dataType: 'json',
        success: function(response){
        
            var tablica = $("#tablicaRodendan tbody");
            for(var i = 0; i < response.length; i++){
                var rezervacijaId = response[i][0];
                var naziv = response[i][1];
                var opis = response[i][2];
                var broj = response[i][3];
                var datum = response[i][4];
                var zamjenski = response[i][5];
                
                tablica.append(
                    "<tr><td>"+rezervacijaId+
                    "</td><td>"+ naziv +
                    "</td><td>"+ opis +
                    "</td><td>"+ broj +
                    "</td><td>"+ datum +
                    "</td><td>"+ zamjenski +
                    "</td><td> <a id='prikaziSudionike' href='#'> Prikaži sudionike </a>" +
                    "</td></tr>"
                );
            }
        }     
         
     });
}
//Dohvaćanje Id-a odabranog rođendana
function dohvatiIdRezervacije(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "./index.php?idRezervacija="+rezervacijaId;
    window.location.replace(link);
}

//Korisnički  računi____________________________________________________________
function blokOdblok(){
    var odabraniRed = $(this).closest("tr"); 
    var status = odabraniRed.find("td:eq(3)").text(); 
    var idKorisnika = odabraniRed.find("td:eq(0)").text();
    
    var provjera = "Nije blokiran";
    if (status == "Blokiran") {
        provjera = "Blokiran";
    }
    
    $.ajax({
        url: '../ostalo/korisnickiRacuni.php',
        type: 'POST',
        data: {
            Provjera: provjera,
            ID: idKorisnika
        },
        dataType: 'json',
        success: function(data){
            alert(data);
        }     
     });

}