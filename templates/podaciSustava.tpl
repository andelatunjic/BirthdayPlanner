<section id="sadrzaj">
    
    
    <h2>Podaci sustava</h2>
    <p>U nastavku se nalaze svi podaci iz baze. Podatke za željene tablice možete prikazati i sakriti klikom na predviđeni gumb.<br>
        Podatke možete i ažurirati odabirom opcije >>Ažuriraj<< u zadnjem stupcu svake tablice.</p> 
  
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice dnevnik</h3>
    <table id="tablicaDnevnik" class="display">
        <caption>Zapisi dnevnika</caption><br>
        <thead>
            <tr>
                <th>ID dnevnik</th>
                <th>ID korisnik</th>
                <th>ID tip radnje</th>
                <th>Radnja</th>
                <th>Upit</th>
                <th>Vrijeme</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$dnevnik}
                <tr>
                    <td>{$dnevnik[i].dnevnikId}</td>
                    <td>{$dnevnik[i].korisnikId}</td>
                    <td>{$dnevnik[i].tipRadnjeId}</td>
                    <td>{$dnevnik[i].radnja}</td>
                    <td>{$dnevnik[i].upit}</td>
                    <td>{$dnevnik[i].vrijeme}</td>
                    <td><a id='urediDnevnik' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice grupa</h3>
    <table id="tablicaGrupa">
        <caption>Grupe rođendana</caption><br>
        <thead>
            <tr>
                <th>ID grupe</th>
                <th>Naziv grupe</th>
                <th>Opis grupe</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$grupe}
                <tr>
                    <td>{$grupe[i].grupaId}</td>
                    <td>{$grupe[i].nazivGrupe}</td>
                    <td>{$grupe[i].opisGrupe}</td>
                    <td><a id='urediGrupu' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice korisnik</h3>
    <table id="tablicaKorisnik" class="display">
        <caption>Korisnici</caption><br>
        <thead>
            <tr>
                <th>ID korisnika</th>
                <th>ID uloge</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Korisničko ime</th>
                <th>Email</th>
                <th>Lozinka</th>
                <th>Lozinka SHA256</th>
                <th>Datum registracije</th>
                <th>Uvjeti</th>
                <th>Aktiviran</th>
                <th>Blokiran</th>
                <th>Aktivacijski link</th>
                <th>Neuspješne prijave</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$korisnici}
                <tr>
                    <td>{$korisnici[i].korisnikId}</td>
                    <td>{$korisnici[i].ulogaId}</td>
                    <td>{$korisnici[i].ime}</td>
                    <td>{$korisnici[i].prezime}</td>
                    <td>{$korisnici[i].korisnickoIme}</td>
                    <td>{$korisnici[i].email}</td>
                    <td>{$korisnici[i].lozinka}</td>
                    <td>{$korisnici[i].lozinkaSHA256}</td>
                    <td>{$korisnici[i].datumRegistracije}</td>
                    <td>{$korisnici[i].uvjeti}</td>
                    <td>{$korisnici[i].aktiviran}</td>
                    <td>{$korisnici[i].blokiran}</td>
                    <td>{$korisnici[i].aktivacijskiLink}</td>
                    <td>{$korisnici[i].neuspjesnePrijave}</td>
                    <td><a id='urediKorisnika' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice materijali</h3>
    <table id="tablicaMaterijali">
        <caption>Materijali rođendana</caption><br>
        <thead>
            <tr>
                <th>ID materijala</th>
                <th>ID vrste materijala</th>
                <th>ID rezervacije</th>
                <th>Putanja</th>
                <th>Suglasnot</th>
                <th></th>
            </tr>  
        </thead>
        {section name=i loop=$materijali}
                <tr>
                    <td>{$materijali[i].materijalId}</td>
                    <td>{$materijali[i].vrstaMaterijalaId}</td>
                    <td>{$materijali[i].rezervacijaId}</td>
                    <td>{$materijali[i].putanja}</td>
                    <td>{$materijali[i].suglasnost}</td>
                    <td><a id='urediMaterijale' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        <tbody>
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice postavke</h3>
    <table id="tablicaPostavke">
        <caption>Postavke</caption><br>
        <thead>
            <tr>
                <th>ID postavki</th>
                <th>ID admina</th>
                <th>Straničenje</th>
                <th>Trajanje kolačića</th>
                <th>Pomak vremena</th>
                <th>Trajanje aktivacijskog linka</th>
                <th>Broj neuspješnih prijava</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$postavke}
                <tr>
                    <td>{$postavke[i].postavkeId}</td>
                    <td>{$postavke[i].adminId}</td>
                    <td>{$postavke[i].stranicenje}</td>
                    <td>{$postavke[i].trajanjeKolacica}</td>
                    <td>{$postavke[i].pomakVremena}</td>
                    <td>{$postavke[i].trajanjeAktivacijskogLinka}</td>
                    <td>{$postavke[i].brojNeuspjesnihPrijava}</td>
                    <td><a id='urediPostavke' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice rezervacija</h3>
    <table id="tablicaRezervacija">
        <caption>Rezervacije</caption><br>
        <thead>
            <tr>
                <th>ID rezervacije</th>
                <th>ID korisnika</th>
                <th>ID grupe</th>
                <th>Datum</th>
                <th>Broj djece</th>
                <th>Status rezervacije</th>
                <th>zamjenskiDatum</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$rezervacije}
                <tr>
                    <td>{$rezervacije[i].rezervacijaId}</td>
                    <td>{$rezervacije[i].korisnikId}</td>
                    <td>{$rezervacije[i].grupaId}</td>
                    <td>{$rezervacije[i].datum}</td>
                    <td>{$rezervacije[i].brojDjece}</td>
                    <td>{$rezervacije[i].statusRezervacije}</td>
                    <td>{$rezervacije[i].zamjenskiDatum}</td>
                    <td><a id='urediRezervaciju' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice rođendan</h3>
    <table id="tablicaRodendan">
        <caption>Rođendani</caption><br>
        <thead>
            <tr>
                <th>ID rođendana</th>
                <th>ID rezervacije</th>
                <th>Naziv rođendana</th>
                <th>Opis</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$rodendani}
                <tr>
                    <td>{$rodendani[i].rodendanId}</td>
                    <td>{$rodendani[i].rezervacijaId}</td>
                    <td>{$rodendani[i].nazivRodendana}</td>
                    <td>{$rodendani[i].opis}</td>
                    <td><a id='urediRodendan' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>    
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice sudionici</h3>
    <table id="tablicaSudionici">
        <caption>Sudionici</caption><br>
        <thead>
            <tr>
                <th>ID sudionika</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$sudionici}
                <tr>
                    <td>{$sudionici[i].sudionikId}</td>
                    <td>{$sudionici[i].ime}</td>
                    <td>{$sudionici[i].prezime}</td>
                    <td><a id='urediSudionika' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice sudjeluje</h3>
    <table id="tablicaSudjeluje">
        <caption>Sudjelovanja na rođendanima</caption><br>
        <thead>
            <tr>
                <th>ID sudionika</th>
                <th>ID rezervacije</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$sudjelovanje}
                <tr>
                    <td>{$sudjelovanje[i].sudionikId}</td>
                    <td>{$sudjelovanje[i].rezervacijaId}</td>
                    <td><a id='urediSudjeluje' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>  
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice tip radnje</h3>
    <table id="tablicaTipRadnje">
        <caption>Tipovi radnji</caption><br>
        <thead>
            <tr>
                <th>ID tipa radnje</th>
                <th>Naziv radnje</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$tipoviRadnji}
                <tr>
                    <td>{$tipoviRadnji[i].tipRadnjeId}</td>
                    <td>{$tipoviRadnji[i].nazivRadnje}</td>
                    <td><a id='urediTipRadnje' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice uloga</h3>
    <table id="tablicaUloga">
        <caption>Uloge korisnika</caption><br>
        <thead>
            <tr>
                <th>ID uloge</th>
                <th>Naziv uloge</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$uloge}
                <tr>
                    <td>{$uloge[i].ulogaId}</td>
                    <td>{$uloge[i].nazivUloge}</td>
                    <td><a id='urediUlogu' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>

    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice upravljanje grupom</h3>
    <table id="tablicaUpravljanjeGrupom">
        <caption>Upravljanje grupama</caption><br>
        <thead>
            <tr>
                <th>ID moderatora</th>
                <th>ID grupe</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$upravljanjaGrupom}
                <tr>
                    <td>{$upravljanjaGrupom[i].moderatorId}</td>
                    <td>{$upravljanjaGrupom[i].grupaId}</td>
                    <td><a id='urediUpravljanjeGrupom' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>    
    
    <!-- _______________________________________________________________________ -->
    <h3>Podaci iz tablice vrsta materijala</h3>
    <table id="tablicaVrstaMaterijala">
        <caption>Vrste materijala</caption><br>
        <thead>
            <tr>
                <th>ID vrste materijala</th>
                <th>Naziv materijala</th>
                <th></th>
            </tr>  
        </thead>
        <tbody>
            {section name=i loop=$vrsteMaterijala}
                <tr>
                    <td>{$vrsteMaterijala[i].vrstaMaterijalaId}</td>
                    <td>{$vrsteMaterijala[i].nazivMaterijala}</td>
                    <td><a id='urediVrstuMaterijala' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>
    </table>   

</section>
