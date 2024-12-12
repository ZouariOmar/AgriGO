<?php
class CommandeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCommandes() {
        $sql = 'SELECT commande.*, utilisateur.login as "login" 
                FROM commande 
                INNER JOIN utilisateur ON commande.id_client = utilisateur.id 
                ORDER BY commande.date_creation DESC';
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommandeDetails($id) {
        $sql = 'SELECT commande.*, utilisateur.login as "login" 
                FROM commande 
                INNER JOIN utilisateur ON commande.id_client = utilisateur.id 
                WHERE commande.id = ? 
                ORDER BY commande.date_creation DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
