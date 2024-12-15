<?php
require_once '../config/database.php';

class ProductModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    /**
     * Add a new product to the database.
     */
    public function addProduct($libelle, $prix, $categorie, $description, $image) {
        try {
            $sql = 'INSERT INTO produit (libelle, prix, id_categorie, date_creation, description, image) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$libelle, $prix, $categorie, date('Y-m-d'), $description, $image]);
            return $this->pdo->lastInsertId(); // Return the last inserted ID
        } catch (PDOException $e) {
            throw new Exception("Error adding product: " . $e->getMessage());
        }
    }

    /**
     * Delete a product by ID.
     */
    public function deleteProduct($id) {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid product ID.");
        }

        try {
            $sql = 'DELETE FROM produit WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0; // Return true if rows were affected
        } catch (PDOException $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

    /**
     * Update product details.
     */
    public function updateProduct($id, $libelle, $prix, $discount, $categorie, $description, $image = null) {
        try {
            if ($image) {
                $sql = 'UPDATE produit SET libelle = ?, prix = ?, discount = ?, id_categorie = ?, description = ?, image = ? WHERE id = ?';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$libelle, $prix, $discount, $categorie, $description, $image, $id]);
            } else {
                $sql = 'UPDATE produit SET libelle = ?, prix = ?, discount = ?, id_categorie = ?, description = ? WHERE id = ?';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$libelle, $prix, $discount, $categorie, $description, $id]);
            }
            return $stmt->rowCount() > 0; // Return true if rows were affected
        } catch (PDOException $e) {
            throw new Exception("Error updating product: " . $e->getMessage());
        }
    }

    /**
     * Get product details by ID.
     */
    public function getProductById($id) {
        try {
            $sql = 'SELECT * FROM produit WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching product: " . $e->getMessage());
        }
    }

    /**
     * Get all products.
     */
    public function getAllProducts() {
        try {
            $sql = 'SELECT produit.*, categorie.libelle AS categorie_libelle FROM produit 
                    INNER JOIN categorie ON produit.id_categorie = categorie.id';
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error fetching products: " . $e->getMessage());
        }
    }

    /**
     * Fetch products by multiple IDs.
     */
    public function getProductsByIds(array $ids) {
        try {
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM produit WHERE id IN ($placeholders)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($ids);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error fetching products by IDs: " . $e->getMessage());
        }
    }

    /**
     * Get products with pagination.
     */
    public function getProductsPaginated($limit, $offset) {
        try {
            $sql = 'SELECT produit.*, categorie.libelle AS categorie_libelle FROM produit 
                    INNER JOIN categorie ON produit.id_categorie = categorie.id 
                    LIMIT ? OFFSET ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $limit, PDO::PARAM_INT);
            $stmt->bindParam(2, $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error fetching paginated products: " . $e->getMessage());
        }
    }

    /**
     * Search products by name or description.
     */
    public function searchProducts($keyword) {
        try {
            $sql = "SELECT produit.*, categorie.libelle AS categorie_libelle FROM produit 
                    INNER JOIN categorie ON produit.id_categorie = categorie.id 
                    WHERE produit.libelle LIKE ? OR produit.description LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $searchTerm = '%' . $keyword . '%';
            $stmt->execute([$searchTerm, $searchTerm]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Error searching products: " . $e->getMessage());
        }
    }
}
