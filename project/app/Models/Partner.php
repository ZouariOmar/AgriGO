<?php

class partner{
    private $id_partner;
    private $name;
    private $email;
    private $number;


    public function __construct($id_partner,$name,$email,$number) {
        $this->id_partner=$id_partner;
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;

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
     * Get the value of number
     */ 
    public function getnumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setnumber($number)
    {
        $this->number = $number;

        return $this;
    }
}

?>