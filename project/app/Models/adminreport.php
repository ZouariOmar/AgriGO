<?php 

class adminreport {
    private $id;
    private $StatRapportID;
    private $status;

    public function __construct($id,$StatRapportID,$status) {
        $this->id=$id;
        $this->StatRapportID = $StatRapportID;
        $this->status = $status;

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
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}