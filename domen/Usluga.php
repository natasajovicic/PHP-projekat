<?php

class Usluga {

    public $UslugaID;
    public $NazivUsluge;
    public $OpisUsluge;
    public $Cena;
    public $Beauty_salonID;

    public function getUslugaID() {
        return $this->UslugaID;
    }

    public function getNazivUsluge() {
        return $this->NazivUsluge;
    }

    public function getOpisUsluge() {
        return $this->OpisUsluge;
    }

    public function getCena() {
        return $this->Cena;
    }

    public function getBeauty_salonID() {
        return $this->Beauty_salonID;
    }

    public function setUslugaID($UslugaID) {
        $this->UslugaID = $UslugaID;
    }

    public function setNazivUsluge($NazivUsluge) {
        $this->NazivUsluge = $NazivUsluge;
    }

    public function setOpisUsluge($OpisUsluge) {
        $this->OpisUsluge = $OpisUsluge;
    }

    public function setCena($Cena) {
        $this->Cena = $Cena;
    }

    public function setBeauty_salonID($Beauty_salonID) {
        $this->Beauty_salonID = $Beauty_salonID;
    }

    public static function vratiSvePodatkeIzBaze() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT UslugaID, NazivUsluge, OpisUsluge, Cena, Naziv 
                                        FROM beauty_salon, usluga
                                        WHERE beauty_salon.Beauty_salonID=usluga.Beauty_salonID');
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new Usluga();
            $usluga->setUslugaID($red['UslugaID']);
            $usluga->setNazivUsluge($red['NazivUsluge']);
            $usluga->setOpisUsluge($red['OpisUsluge']);
            $usluga->setCena($red['Cena']);
            $usluga->setBeauty_salonID($red['Naziv']);
            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }
    
    //sortiranje rastuce
    public static function sortAsc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT UslugaID, NazivUsluge, OpisUsluge, Cena, Naziv
                                        FROM beauty_salon, usluga
                                        WHERE beauty_salon.Beauty_salonID=usluga.Beauty_salonID
                                        ORDER BY UslugaID ASC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new Usluga();
            $usluga->setUslugaID($red['UslugaID']);
            $usluga->setNazivUsluge($red['NazivUsluge']);
            $usluga->setOpisUsluge($red['OpisUsluge']);
            $usluga->setCena($red['Cena']);
            $usluga->setBeauty_salonID($red['Naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    //sortiranje opadajuce
    public static function sortDesc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT UslugaID, NazivUsluge, OpisUsluge, Cena, Naziv
                                        FROM beauty_salon, usluga
                                        WHERE beauty_salon.Beauty_salonID=usluga.Beauty_salonID
                                        ORDER BY UslugaID DESC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new Usluga();
            $usluga->setUslugaID($red['UslugaID']);
            $usluga->setNazivUsluge($red['NazivUsluge']);
            $usluga->setOpisUsluge($red['OpisUsluge']);
            $usluga->setCena($red['Cena']);
            $usluga->setBeauty_salonID($red['Naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    //pretraga po nazivu usluge
    public static function vratiPoNazivu($pretraga) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT UslugaID, NazivUsluge, OpisUsluge, Cena, Naziv
                                        FROM beauty_salon, usluga
                                        WHERE beauty_salon.Beauty_salonID=usluga.Beauty_salonID
                                        AND NazivUsluge LIKE '%$pretraga%'");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new Usluga();
            $usluga->setUslugaID($red['UslugaID']);
            $usluga->setNazivUsluge($red['NazivUsluge']);
            $usluga->setOpisUsluge($red['OpisUsluge']);
            $usluga->setCena($red['Cena']);
            $usluga->setBeauty_salonID($red['Naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO usluga (NazivUsluge, OpisUsluge, Cena, Beauty_salonID)
            VALUES ('$this->NazivUsluge', '$this->OpisUsluge', '$this->Cena', '$this->Beauty_salonID')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($UslugaID) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM usluga WHERE UslugaID=' . $UslugaID);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

?>