<?php
// models/CategoryModel.php
require_once '../config/database.php';

class CategoryModel {

    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categorie";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Get a category by its ID
    public function getCategoryById($id) {
        try {
            $sql = 'SELECT * FROM categorie WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error message
            error_log('Error fetching category by ID: ' . $e->getMessage());
            return null;
        }
    }

    public function addCategory($libelle, $description, $icone) {
        try {
            $sql = 'INSERT INTO categorie (libelle, description, icone) VALUES (:libelle, :description, :icone)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':icone', $icone, PDO::PARAM_STR);
    
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                error_log('Failed to insert category.');
                return false;
            }
        } catch (PDOException $e) {
            error_log('Error adding category: ' . $e->getMessage());
            return false;
        }
    }
    

    // Update a category
    public function updateCategory($id, $libelle, $description, $icone) {
        try {
            $sql = 'UPDATE categorie SET libelle = :libelle, description = :description, icone = :icone WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':icone', $icone, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log error message
            error_log('Error updating category: ' . $e->getMessage());
            return false;
        }
    }

    // Delete a category
    public function deleteCategory($id) {
        try {
            $sql = 'DELETE FROM categorie WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log error message
            error_log('Error deleting category: ' . $e->getMessage());
            return false;
        }
    }
}
?>
