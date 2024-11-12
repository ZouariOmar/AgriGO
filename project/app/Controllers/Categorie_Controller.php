<?php

class CategorieController
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create Cat
    public function createCategorie()
    {
        $nom = $_POST['nom'];
        $type = $_POST['type'];

        $query = "INSERT INTO categories (nom, type) VALUES (:nom, :type)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':type', $type);
        $stmt->execute();
    }

    // Read Cat
    public function readCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    // Update Cat
    public function updateCategorie($id)
    {
        $nom = $_POST['nom'];
        $type = $_POST['type'];

        $query = "UPDATE categories SET nom = :nom, type = :type WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    //Delete Cat
    public function deleteCategorie($id)
    {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}