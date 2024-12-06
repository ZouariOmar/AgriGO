<?php
require(__DIR__ . '/../conf/config.php');

class contractController
{
    // Liste de tous les contrats
    public function contractList()
    {
        $sql = "SELECT * FROM contract";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur lors de la récupération des contrats : ' . $e->getMessage());
        }
    }

    // Sélection d'un contrat par ID
    function getcontractById($id)
    {
        $sql = "SELECT * FROM contract WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur lors de la récupération du contrat : ' . $e->getMessage());
        }
    }

    // Ajouter un nouveau contrat
    public function addcontract($contract)
    {
        $sql = "INSERT INTO contract (titre, description, date_creation, date_fin)
                VALUES (:titre, :description, :date_creation, :date_fin)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'titre' => $contract->gettitre(),
                'description' => $contract->getdescription(),
                'date_creation' => $contract->getdate_creation(),
                'date_fin' => $contract->getdate_fin()
            ]);
            echo "Contrat ajouté avec succès.";
        } catch (Exception $e) {
            die('Erreur lors de l\'ajout du contrat : ' . $e->getMessage());
        }
    }

    // Mettre à jour un contrat
    function updatecontract($contract, $id)
    {
        $db = config::getConnexion();

        $sql = 'UPDATE contract SET 
                    titre = :titre,
                    description = :description,
                    date_creation = :date_creation,
                    date_fin = :date_fin
                WHERE id = :id';

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'titre' => $contract->gettitre(),
                'description' => $contract->getdescription(),
                'date_creation' => $contract->getdate_creation(),
                'date_fin' => $contract->getdate_fin(),
            ]);

            echo $query->rowCount() . " contrat(s) mis à jour avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du contrat : ' . $e->getMessage();
        }
    }

    // Supprimer un contrat
    public function deletecontract($id)
    {
        $sql = "DELETE FROM contract WHERE id = :id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            echo "Contrat supprimé avec succès.";
        } catch (Exception $e) {
            die('Erreur lors de la suppression du contrat : ' . $e->getMessage());
        }
    }
}
