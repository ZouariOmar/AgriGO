<?php

class Offre
{
    // Properties
    private $id;
    private $titre;
    private $prix;
    private $telephone;
    private $localisation;
    private $email;
    private $image;
    private $detail;
    private $date_creation;
    private $categorie_id;

    // Constructor
    public function __construct($id, $titre, $prix, $telephone, $localisation, $email, $image, $detail, $date_creation, $categorie_id)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->telephone = $telephone;
        $this->localisation = $localisation;
        $this->email = $email;
        $this->image = $image;
        $this->detail = $detail;
        $this->date_creation = $date_creation;
        $this->categorie_id = $categorie_id;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }
}

?>

