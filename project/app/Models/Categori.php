<?php

class Categorie
{
    // Properties
    private $id;
    private $nom;
    private $type;

    // Constructor
    public function __construct($id, $nom, $type)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
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

    
}


?>