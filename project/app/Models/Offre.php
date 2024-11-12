<?php

class Offre
{
    public $id;
    public $titre;
    public $prix;
    public $telephone;
    public $localisation;
    public $email;
    public $image;
    public $detail;
    public $date_creation;
    public $categorie_id;

    public static function all()
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM offres");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Offre');
    }

    public static function find($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM offres WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject('Offre');
    }

    public function save()
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO offres (titre, prix, telephone, localisation, email, image, detail, date_creation, categorie_id) VALUES (:titre, :prix, :telephone, :localisation, :email, :image, :detail, :date_creation, :categorie_id)");
        $stmt->bindParam(':titre', $this->titre);
        $stmt->bindParam(':prix', $this->prix);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':localisation', $this->localisation);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':detail', $this->detail);
        $stmt->bindParam(':date_creation', $this->date_creation);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->execute();
        $this->id = $db->lastInsertId();
    }
}