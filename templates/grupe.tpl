<section id="sadrzaj">
    <h2>Grupe za rođendane</h2>
    <p>Ovdje možete pregledavati, kreirati i ažurirati rođendanske grupe te dodjeliti moderatora grupi.</p>
    <p>U nastavku se nalazi popis svih grupa.</p> 
   
    <table class="display" id="tablicaGrupa">
        <thead>
            <tr>
                <th>ID grupe</th>
                <th>Naziv grupe</th>
                <th>Opis grupe</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            {section name=i loop=$grupeZaPregled}
                <tr>
                    <td>{$grupeZaPregled[i].grupaId}</td>
                    <td>{$grupeZaPregled[i].nazivGrupe}</td>
                    <td>{$grupeZaPregled[i].opisGrupe}</td>
                    <td><a id='urediGrupuAdmin' href='#'> Ažuriraj </a></td>
                </tr>
            {/section}
        </tbody>

    </table>    
    
    <p>Forma za dodavanje nove grupe .</p>
    <div id="poruka" style = "color:#FB6910;">
        {$poruka}
    </div>
    
    <form novalidate name="kreirajGrupu" id="kreirajGrupu" method="POST" action= "">
        <fieldset>
            <legend>Kreiranje grupe:</legend>
            
                <input name="nazivGrupe" type="text" id="nazivGrupe" placeholder="Naziv grupe:"/><br><br>
                <textarea name="opisGrupe" id="opisGrupe" rows="5" cols="50" placeholder="Opišite grupu."></textarea><br><br>
               
                <input class="gumb" id="submitKreirajGrupu" name="submitKreirajGrupu" type="submit" value="Kreiraj"/>
                <input class="gumb" name="reset" type="reset" value="Resetiraj"/>
                <input class="gumb" name="update" type="button" value="Ažuriraj"/>
        </fieldset>
    </form><br>
    
    <p>Ovo je forma za dodjeljivanje moderatora odabranoj grupi.</p>
    <form novalidate name="dodjeliModeratora" id="dodjeliModeratora" method="POST" action= "">
        <fieldset>
            <legend>Dodjeljivanje moderatora grupi:</legend>
            
                <label>Odaberite grupu:</label>
                <select id="grupa">
                    {section name=i loop=$grupe}
                        <option value="{$grupe[i][0]}">{$grupe[i][1]}</option>
                    {/section}
                </select><br><br>

                <label>Odaberite moderatora:</label>
                <select id="moderator">
                    {section name=i loop=$moderatori}
                        <option value="{$moderatori[i][0]}">{$moderatori[i][1]} {$moderatori[i][2]}</option>
                    {/section}
                </select><br><br>
               
                <input class="gumb" id="submitDodjeliModeratora" name="submitDodjeliModeratora" type="submit" value="Dodjeli"/>
                <input class="gumb" name="reset" type="reset" value="Resetiraj"/>
        </fieldset>
    </form>

</section>
