$(document).ready(function(){
    
    var naslov = $(document).find("title").text();
    
    switch(naslov){
        
        case "Podaci sustava":
            $("#tablicaDnevnik").on('click','#urediDnevnik', urediDnevnik);
            $('#tablicaDnevnik').DataTable();
            
            $("#tablicaGrupa").on('click','#urediGrupu', urediGrupu);
            $('#tablicaGrupa').DataTable();
            
            $("#tablicaKorisnik").on('click','#urediKorisnika', urediKorisnika);
            $('#tablicaKorisnik').DataTable();
            
            $("#tablicaMaterijali").on('click','#urediMaterijale', urediMaterijale);
            $('#tablicaMaterijali').DataTable();
            
            $("#tablicaPostavke").on('click','#urediPostavke', urediPostavke);
            $('#tablicaPostavke').DataTable();
            
            $("#tablicaRezervacija").on('click','#urediRezervaciju', urediRezervaciju);
            $('#tablicaRezervacija').DataTable();
            
            $("#tablicaRodendan").on('click','#urediRodendan', urediRodendan);
            $('#tablicaRodendan').DataTable();
            
            $("#tablicaSudionici").on('click','#urediSudionika', urediSudionika);
            $('#tablicaSudionici').DataTable();
            
            $("#tablicaSudjeluje").on('click','#urediSudjeluje', urediSudjeluje);
            $('#tablicaSudjeluje').DataTable();
            
            $("#tablicaTipRadnje").on('click','#urediTipRadnje', urediTipRadnje);
            $('#tablicaTipRadnje').DataTable();
            
            $("#tablicaUloga").on('click','#urediUlogu', urediUlogu);
            $('#tablicaUloga').DataTable();
            
            $("#tablicaUpravljanjeGrupom").on('click','#urediUpravljanjeGrupom', urediUpravljanjeGrupom);
            $('#tablicaUpravljanjeGrupom').DataTable();
            
            $("#tablicaVrstaMaterijala").on('click','#urediVrstuMaterijala', urediVrstuMaterijala);
            $('#tablicaVrstaMaterijala').DataTable();
            break;
    }
});

//PODACI SUSTAVA________________________________________________________________
//dnevnik
function urediDnevnik(){
    var odabraniRed = $(this).closest("tr"); 
    var dnevnikId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediDnevnik.php?id="+dnevnikId;
    window.location.replace(link);
}

//grupe
function urediGrupu(){
    var odabraniRed = $(this).closest("tr"); 
    var grupaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediGrupu.php?id="+grupaId;
    window.location.replace(link);
}

//korisnici
function urediKorisnika(){
    var odabraniRed = $(this).closest("tr"); 
    var korisnikId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediKorisnika.php?id="+korisnikId;
    window.location.replace(link);
}

//materijali
function urediMaterijale(){
    var odabraniRed = $(this).closest("tr"); 
    var materijalId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediMaterijale.php?id="+materijalId;
    window.location.replace(link);
}

//postavke
function urediPostavke(){
    var odabraniRed = $(this).closest("tr"); 
    var postavkeId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediPostavke.php?id="+postavkeId;
    window.location.replace(link);
}

//rezervacije
function urediRezervaciju(){
    var odabraniRed = $(this).closest("tr"); 
    var rezervacijaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediRezervacije.php?id="+rezervacijaId;
    window.location.replace(link);
}

//rođendani
function urediRodendan(){
    var odabraniRed = $(this).closest("tr"); 
    var rodendanId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediRodendane.php?id="+rodendanId;
    window.location.replace(link);
}

//sudionici
function urediSudionika(){
    var odabraniRed = $(this).closest("tr"); 
    var sudionikId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediSudionike.php?id="+sudionikId;
    window.location.replace(link);
}

//sudjelovanje
function urediSudjeluje(){
    var odabraniRed = $(this).closest("tr"); 
    var sudionikId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var rezervacijaId = odabraniRed.find("td:eq(1)").text();
    var link = "../obrasci/urediSudjeluje.php?idS="+sudionikId+"&idR="+rezervacijaId;
    window.location.replace(link);
}

//tipovi radnji
function urediTipRadnje(){
    var odabraniRed = $(this).closest("tr"); 
    var tipId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediTipRadnje.php?id="+tipId;
    window.location.replace(link);
}

//uloge
function urediUlogu(){
    var odabraniRed = $(this).closest("tr"); 
    var ulogaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediUlogu.php?id="+ulogaId;
    window.location.replace(link);
}

//upravljanje grupama
function urediUpravljanjeGrupom(){
    var odabraniRed = $(this).closest("tr"); 
    var moderatorId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var grupaId = odabraniRed.find("td:eq(1)").text();
    var link = "../obrasci/urediUpravljanjeGrupom.php?idM="+moderatorId+"&idG="+grupaId;
    window.location.replace(link);
}

//vrste materijala
function urediVrstuMaterijala(){
    var odabraniRed = $(this).closest("tr"); 
    var vrstaId = odabraniRed.find("td:eq(0)").text(); // Dohvaćanje prvog stupca
    var link = "../obrasci/urediVrstuMaterijala.php?id="+vrstaId;
    window.location.replace(link);
}
