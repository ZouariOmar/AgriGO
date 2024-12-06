<?php

class contract{
    private $id;
    private $titre;
    private $description;
    private $date_creation;
    private $date_fin;


    public function __construct($id,$titre,$description,$date_creation,$date_fin) {
        $this->id=$id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->date_fin = $date_fin;

    }

    /**
     * Get the value of titre
     */ 
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getdate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setdate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

        /**
     * Get the value of date_fin
     */ 
    public function getdate_fin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_fin
     *
     * @return  self
     */ 
    public function setdate_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }
}

?>