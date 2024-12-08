<?php 

class response{
    private $id;
    private $reportid;
    private $Response;

    public function __construct($id,$reportid,$Response) {
        $this->id=$id;
        $this->reportid = $reportid;
        $this->Response = $Response;

    }

    /**
     * Get the value of reportid
     */ 
    public function getReportid()
    {
        return $this->reportid;
    }

    /**
     * Set the value of reportid
     *
     * @return  self
     */ 
    public function setReportid($reportid)
    {
        $this->reportid = $reportid;

        return $this;
    }

    /**
     * Get the value of Response
     */ 
    public function getResponse()
    {
        return $this->Response;
    }

    /**
     * Set the value of Response
     *
     * @return  self
     */ 
    public function setResponse($Response)
    {
        $this->Response = $Response;

        return $this;
    }
}