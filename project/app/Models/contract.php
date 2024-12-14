<?php
class Contract {
    private $id;
    private $titre;
    private $description;
    private $date_creation;
    private $date_fin;
    private $partner_id;

    // Constructeur pour initialiser les propriétés de l'objet
    public function __construct($id, $titre, $description, $date_creation, $date_fin, $partner_id) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->date_fin = $date_fin;
        $this->partner_id = $partner_id;
    }

    // Getters
    public function getid() {
        return $this->id;
    }

    public function gettitre() {
        return $this->titre;
    }

    public function getdescription() {
        return $this->description;
    }

    public function getdate_creation() {
        return $this->date_creation;
    }

    public function getdate_fin() {
        return $this->date_fin;
    }

    public function getpartnerId() {
        return $this->partner_id;
    }

    // Setters
    public function setid($id) {
        $this->id = $id;
    }

    public function settitre($titre) {
        $this->titre = $titre;
    }

    public function setdescription($description) {
        $this->description = $description;
    }

    public function setdate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function setdate_fin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function setpartnerId($partner_id) {
        $this->partner_id = $partner_id;
    }
}
?>
