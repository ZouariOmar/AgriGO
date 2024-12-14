<?php
class Contract
{
    private $id_contract;
    private $titre;
    private $description;
    private $date_creation;
    private $date_fin;
    private $id_partner;

    // Constructeur
    public function __construct($id_contract, $titre, $description, $date_creation, $date_fin, $id_partner)
    {
        $this->id_contract = $id_contract;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->date_fin = $date_fin;
        $this->id_partner = $id_partner;
    }

    // Getters
    public function getIdContract()
    {
        return $this->id_contract;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getDateFin()
    {
        return $this->date_fin;
    }

    public function getIdPartner()
    {
        return $this->id_partner;
    }

    // Setters
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    public function setIdPartner($id_partner)
    {
        $this->id_partner = $id_partner;
    }
}
?>
