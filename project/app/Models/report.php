<?php

class report{
    private $id;
    private $category;
    private $subject;
    private $description;
    private $piece;


    public function __construct($id,$category,$subject,$description,$piece) {
        $this->id=$id;
        $this->category = $category;
        $this->subject = $subject;
        $this->description = $description;
        $this->piece= $piece;

    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
    

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of piece
     */ 
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set the value of piece
     *
     * @return  self
     */ 
    public function setPiece($piece)
    {
        $this->piece = $piece;

        return $this;
    }
}

?>