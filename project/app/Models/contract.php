<?php
class Contract {
    private $id;
    private $titre;
    private $description;
    private $date_creation;
    private $date_fin;
    private $partner_id;

    public function __construct($id, $titre, $description, $date_creation, $date_fin, $partner_id) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->date_fin = $date_fin;
        $this->partner_id = $partner_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function getPartnerId() {
        return $this->partner_id;
    }
}

?>
