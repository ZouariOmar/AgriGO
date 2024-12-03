<?php
include __DIR__ . '/../config.php';


class CategorieController
{
    private $db;


    public function createCategorie($nom,$type,$date_in,$date_out,$Qnt)
    {
        $query = "INSERT INTO categories (nom,type,date_in,date_out,Qnt) VALUES (:nom,:type,:date_in,:date_out,:Qnt)";
        $stmt = $this->db->prepare($query);
        
        try {
            $stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':type',$type);
            $stmt->bindParam(':date_in', $date_in);
            $stmt->bindParam(':date_out', $date_out);
            $stmt->bindParam(':Qnt', $Qnt);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating category: " . $e->getMessage());
            return false;
        }
    }

    public function readAllCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error reading categories: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCategorie($id)
    {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                // Debugging: Output database error info
                error_log(print_r($stmt->errorInfo(), true));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression de la catégorie: " . $e->getMessage());
            return false;
        }
    }
    
    

    public function readCategorieById($id)
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error reading category by ID: " . $e->getMessage());
            return false;
        }
    }

    public function updateCategorie($id, $nom, $type, $date_in, $date_out, $Qnt)
    {
        $query = "UPDATE categories SET nom = :nom, type = :type, date_in = :date_in, date_out = :date_out, Qnt = :Qnt WHERE id = :id";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':date_in', $date_in);
            $stmt->bindParam(':date_out', $date_out);
            $stmt->bindParam(':Qnt', $Qnt);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating category: " . $e->getMessage());
            return false;
        }
    }
}