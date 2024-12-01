<?php 

class adminreport {
    private $id;
    private $StatRapportID;
    private $Status;

    public function __construct($id,$StatRapportID,$Status) {
        $this->id=$id;
        $this->StatRapportID = $StatRapportID;
        $this->Status = $Status;

    }

    /**
     * Get the value of StatRapportID
     */ 
    public function getStatRapportID()
    {
        return $this->StatRapportID;
    }

    /**
     * Set the value of StatRapportID
     *
     * @return  self
     */ 
    public function setStatRapportID($StatRapportID)
    {
        $this->StatRapportID = $StatRapportID;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }
}