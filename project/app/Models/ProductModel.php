<?php
require_once '../config.php';

class ProductModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=SDD', 'zouari_omar', 'root');
    }

    // Add a new product
    public function addProduct($libelle, $prix, $categorie, $description, $image)
    {
        try {
            $sql = 'INSERT INTO produit (libelle, prix, id_categorie, date_creation, description, image) VALUES (?,?,?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle, $prix, $categorie, date('Y-m-d'), $description, $image]);
        } catch (PDOException $e) {
            error_log("Error adding product: " . $e->getMessage());
            return false;
        }
    }

    // Delete a product by ID
    public function deleteProduct($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            throw new InvalidArgumentException("Invalid product ID.");
        }

        try {
            $sql = 'DELETE FROM produit WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Error deleting product: " . $e->getMessage());
            return false;
        }
    }

    // Update a product
    public function updateProduct($id, $libelle, $prix, $discount, $categorie, $description, $image = null)
    {
        try {
            if ($image) {
                $sql = 'UPDATE produit SET libelle=?, prix=?, discount=?, id_categorie=?, description=?, image=? WHERE id=?';
                $params = [$libelle, $prix, $discount, $categorie, $description, $image, $id];
            } else {
                $sql = 'UPDATE produit SET libelle=?, prix=?, discount=?, id_categorie=?, description=? WHERE id=?';
                $params = [$libelle, $prix, $discount, $categorie, $description, $id];
            }

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Error updating product: " . $e->getMessage());
            return false;
        }
    }

    // Fetch a product by ID
    public function getProductById($id)
    {
        try {
            $sql = 'SELECT produit.*, categorie.libelle as categorie_libelle FROM produit 
                    LEFT JOIN categorie ON produit.id_categorie = categorie.id WHERE produit.id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching product: " . $e->getMessage());
            return null;
        }
    }

    // Fetch all products
    public function getAllProducts()
    {
        try {
            $sql = "SELECT produit.*, categorie.libelle as 'categorie_libelle' FROM produit 
                    INNER JOIN categorie ON produit.id_categorie = categorie.id";
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error fetching products: " . $e->getMessage());
            return [];
        }
    }
    public function getTotalProducts()
    {
        try {
            $query = "SELECT COUNT(*) as total FROM produit";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total;
        } catch (PDOException $e) {
            error_log("Error getting total products: " . $e->getMessage());
            return 0;
        }
    }

    public function getProductsPaginated($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT p.*, c.libelle AS categorie_libelle 
                  FROM produit p 
                  LEFT JOIN categorie c ON p.id_categorie = c.id 
                  ORDER BY p.id DESC 
                  LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>