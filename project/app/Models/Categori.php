<?php

class Categorie
{
    public $id;
    public $nom;
    public $type;

    public static function all()
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Categorie');
    }

    public static function find($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject('Categorie');
    }

    public function save()
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO categories (nom, type) VALUES (:nom, :type)");
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':type', $this->type);
        $stmt->execute();
        $this->id = $db->lastInsertId();
    }
}