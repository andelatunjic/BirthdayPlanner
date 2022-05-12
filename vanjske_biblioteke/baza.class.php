<?php

class Baza {
    
    /*
    //dodjeljena baza
    const server = "localhost";
    const korisnik = "WebDiP2020x098";
    const lozinka = "admin_DhsY";
    const baza = "WebDiP2020x098";
    */
    
    //lokalni rad
    const server = "localhost";
    const korisnik = "root";
    const lozinka = "";
    const baza = "webdip2020x098";
    
    
    private $veza = null;
    private $greska = '';

    function spojiDB() {
        $this->veza = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);
        if ($this->veza->connect_errno) {
            echo "Neuspješno spajanje na bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        $this->veza->set_charset("utf8");
        if ($this->veza->connect_errno) {
            echo "Neuspješno postavljanje znakova za bazu: " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        return $this->veza;
    }

    function zatvoriDB() {
        $this->veza->close();
    }

    function selectDB($upit) {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        }
        if (!$rezultat) {
            $rezultat = null;
        }
        return $rezultat;
    }

    function updateDB($upit, $skripta = '') {
        $rezultat = $this->veza->query($upit);
        if ($this->veza->connect_errno) {
            echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .
            $this->veza->connect_error;
            $this->greska = $this->veza->connect_error;
        } else {
            if ($skripta != '') {
                header("Location: $skripta");
            }
        }

        return $rezultat;
    }

    function ostaliUpitDB($upit){
       $this->veza->query($upit);
       if($this->veza->connect_errno){
           echo "Greška kod upita: {$upit} - " . $this->veza->connect_errno . ", " .$this->veza->connect->error;
           $this->greska = $this->veza->connect_error;
           return "neuspjeh";
       }
       return "uspjeh";
   }   
    
    function pogreskaDB() {
        if ($this->greska != '') {
            return true;
        } else {
            return false;
        }
    }

}

?>