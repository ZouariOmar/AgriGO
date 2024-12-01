<?php

class Categorie
{
    // Properties
    private $id;
    private $nom;
    private $type;
    private $date_in;
    private $date_out;
    private $Qnt;

    // Constructor
    public function __construct($id, $nom, $type, $date_in, $date_out, $Qnt)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->date_in = $date_in;
        $this->date_out = $date_out;
        $this->Qnt = $Qnt;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDateIn()
    {
        return $this->date_in;
    }

    public function getDateOut()
    {
        return $this->date_out;
    }

    public function getQnt()
    {
        return $this->Qnt;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDateIn($date_in)
    {
        $this->date_in = $date_in;
    }

    public function setDateOut($date_out)
    {
        $this->date_out = $date_out;
    }

    public function setQnt($Qnt)
    {
        $this->Qnt = $Qnt;
    }
}

?>