<?php
require_once '../config/database.php';

class ProductModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function addProduct($libelle, $prix, $categorie, $description, $image) {
        try {
            $sql = 'INSERT INTO produit (libelle, prix, id_categorie, date_creation, description, image) VALUES (?,?,?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle, $prix, $categorie, date('Y-m-d'), $description, $image]);
        } catch (PDOException $e) {
            echo "Error adding product: " . $e->getMessage();
            return false;
        }
    }

    public function deleteProduct($id) {
        if (!is_numeric($id) || $id <= 0) {
            echo "Invalid product ID.";
            return false;
        }

        try {
            $sql = 'DELETE FROM produit WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error deleting product: " . $e->getMessage();
            return false;
        }
    }

    public function updateProduct($id, $libelle, $prix, $discount, $categorie, $description, $image = null) {
        try {
            if ($image) {
                $sql = 'UPDATE produit SET libelle=?, prix=?, discount=?, id_categorie=?, description=?, image=? WHERE id=?';
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([$libelle, $prix, $discount, $categorie, $description, $image, $id]);
            } else {
                $sql = 'UPDATE produit SET libelle=?, prix=?, discount=?, id_categorie=?, description=? WHERE id=?';
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute([$libelle, $prix, $discount, $categorie, $description, $id]);
            }
        } catch (PDOException $e) {
            echo "Error updating product: " . $e->getMessage();
            return false;
        }
    }

    public function getProductById($id) {
        try {
            $sql = 'SELECT * FROM produit WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching product: " . $e->getMessage();
            return null;
        }
    }

    public function getAllProducts() {
        try {
            $sql = "SELECT produit.*, categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id";
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error fetching products: " . $e->getMessage();
            return [];
        }
    }
}
?>
