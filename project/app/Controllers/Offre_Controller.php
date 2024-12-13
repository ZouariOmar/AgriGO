<?php
include __DIR__ . '/../config.php';

class OffreController
{
    private $db;

    public function __construct()
    {
        $dbConfig = new Config();
        $this->db = $dbConfig->getConnection();
    }

    public function createOffre($titre, $prix, $telephone, $localisation, $email, $image, $detail, $categorie_id)
    {
        $query = "INSERT INTO offres (titre, prix, telephone, localisation, email, image, detail, date_creation, categorie_id) 
                  VALUES (:titre, :prix, :telephone, :localisation, :email, :image, :detail, NOW(), :categorie_id)";
        $stmt = $this->db->prepare($query);
        
        try {
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':localisation', $localisation);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':categorie_id', $categorie_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating offer: " . $e->getMessage());
            return false;
        }
    }

    public function readAllOffres()
    {
        $query = "SELECT * FROM offres";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error reading offers: " . $e->getMessage());
            return false;
        }
    }

    public function deleteOffre($id)
    {
        $query = "DELETE FROM offres WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {

                error_log(print_r($stmt->errorInfo(), true));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error deleting offer: " . $e->getMessage());
            return false;
        }
    }

    public function readOffreById($id)
    {
        $query = "SELECT * FROM offres WHERE id = :id";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error reading offer by ID: " . $e->getMessage());
            return false;
        }
    }

    public function updateOffre($id, $titre, $prix, $telephone, $localisation, $email, $image, $detail, $categorie_id)
    {
        $query = "UPDATE offres SET titre = :titre, prix = :prix, telephone = :telephone, 
                  localisation = :localisation, email = :email, image = :image, detail = :detail, 
                  categorie_id = :categorie_id WHERE id = :id";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':localisation', $localisation);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':categorie_id', $categorie_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating offer: " . $e->getMessage());
            return false;
        }
    }
    public function getTotalOffres() {
        $sql = "SELECT COUNT(*) as total FROM offres";
        try {
            $stmt = $this->db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        } catch (PDOException $e) {
            error_log("Error getting total offers: " . $e->getMessage());
            return false;
        }
    }

    public function readOffresWithPagination($limit, $offset) {
        $sql = "SELECT * FROM offres LIMIT :limit OFFSET :offset";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error reading offers with pagination: " . $e->getMessage());
            return false;
        }
    }
}

