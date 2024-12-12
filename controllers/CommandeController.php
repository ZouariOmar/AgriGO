<?php
require_once '../models/CommandeModel.php';

class CommandeController {
    private $model;

    public function __construct($pdo) {
        $this->model = new CommandeModel($pdo);
    }

    public function listCommandes() {
        // Fetch commandes
        return $this->model->getAllCommandes();
    }

    public function showCommandeDetails($id) {
        // Fetch a specific commande's details
        return $this->model->getCommandeDetails($id);
    }
}
?>
