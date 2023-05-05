<?php

class BeautySalon {

    public $Beauty_salonID = 0;
    public $Naziv = '';

    public function getBeauty_salonID() {
        return $this->Beauty_salonID;
    }

    public function getNaziv() {
        return $this->Naziv;
    }

    public function setBeauty_salonID($Beauty_salonID) {
        $this->Beauty_salonID = $Beauty_salonID;
    }

    public function setNaziv($Naziv) {
        $this->Naziv = $Naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM beauty_salon');
        $beautySalonNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $beauty_salon = new BeautySalon();
            $beauty_salon->setBeauty_salonID($red['Beauty_salonID']);
            $beauty_salon->setNaziv($red['Naziv']);
            array_push($beautySalonNiz, $beauty_salon);
        }
        return $beautySalonNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO beauty_salon (Naziv)
            VALUES ('$this->Naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($Beauty_salonID) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM beauty_salon WHERE Beauty_salonID=' . $Beauty_salonID);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

?>