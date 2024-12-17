<?php

class Partner {
    private $id_partner;
    private $name;
    private $email;
    private $number;
    private $status;


    public function __construct($id_partner, $name, $email, $number, $status) {
        $this->id_partner = $id_partner;
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id_partner;
    }

    public function setId($id_partner)
    {
        $this->id_partner = $id_partner;

        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getemail()
    {
        return $this->email;
    }

   
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

   
    public function getnumber()
    {
        return $this->number;
    }

   
    public function setnumber($number)
    {
        $this->number = $number;

        return $this;
    }
    
    public function getstatus()
    {
        return $this->status;
    }

    public function setstatus($status)
    {
        $this->status = $status;

        return $this;
    }
}

?>