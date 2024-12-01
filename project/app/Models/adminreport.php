<?php 

class adminreport {
    private $id;
    private $StatRapportID;
    private $ST;

    public function __construct($id,$StatRapportID,$ST) {
        $this->id=$id;
        $this->StatRapportID = $StatRapportID;
        $this->ST = $ST;

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
    public function getST()
    {
        return $this->ST;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($ST)
    {
        $this->ST = $ST;

        return $this;
    }
}