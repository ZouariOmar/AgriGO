<?php

class Partenaire{
    private $id;
    private $name;
    private $email;
    private $telephone;


    public function __construct($id,$name,$email,$telephone) {
        $this->id=$id;
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;

    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function gettelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function settelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}

?>