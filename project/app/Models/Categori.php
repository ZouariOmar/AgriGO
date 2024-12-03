<?php

class Categorie
{
    // Properties
    private $id;
    private $type;

    // Constructor
    public function __construct($id,$type)
    {
        $this->id = $id;
        $this->type = $type;

    }

    // Getters
    public function getId()
    {
        return $this->id;
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

    public function setType($type)
    {
        $this->type = $type;
    }
}

?>