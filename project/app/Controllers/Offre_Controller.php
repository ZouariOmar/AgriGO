<?php

class OffreController
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create offre
    public function createOffre()
    {
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $telephone = $_POST['telephone'];
        $localisation = $_POST['localisation'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $detail = $_POST['detail'];
        $date_creation = date('Y-m-d H:i:s');
        $categorie_id = $_POST['categorie_id'];

        $query = "INSERT INTO offres (titre, prix, telephone, localisation, email, image, detail, date_creation, categorie_id) 
                  VALUES (:titre, :prix, :telephone, :localisation, :email, :image, :detail, :date_creation, :categorie_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':detail', $detail);
        $stmt->bindParam(':date_creation', $date_creation);
        $stmt->bindParam(':categorie_id', $categorie_id);
        $stmt->execute();
    }

    // Read offre
    public function readOffres()
    {
        $query = "SELECT * FROM offres";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $offres;
    }

    //Update offre
    public function updateOffre($id)
    {
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $telephone = $_POST['telephone'];
        $localisation = $_POST['localisation'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $detail = $_POST['detail'];
        $categorie_id = $_POST['categorie_id'];

        $query = "UPDATE offres SET titre = :titre, prix = :prix, telephone = :telephone, localisation = :localisation, 
                  email = :email, image = :image, detail = :detail, categorie_id = :categorie_id 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':detail', $detail);
        $stmt->bindParam(':categorie_id', $categorie_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Delete offre
    public function deleteOffre($id)
    {
        // Supprimer une offre de la table "offres"
        $query = "DELETE FROM offres WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}