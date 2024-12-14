<?php
include '../../conf/config.php';


class contractController
{
    // select all contract list with pagination and filtering by date_fin
    public function contractList($page = 1, $limit = 5, $statusFilter = '')
    {
        $start = ($page - 1) * $limit;  // Calculer le point de départ de la page
        
        // Si un filtre par date_fin est fourni, on l'ajoute à la requête SQL
        $sql = "SELECT * FROM contract WHERE 1";
        
        // Ajouter le filtre par status si présent
        if ($statusFilter != '') {
            $sql .= " AND date_fin = :statusFilter";
        }
        
        $sql .= " LIMIT :start, :limit";  // Pagination

        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);

            // Si un filtre est présent, on le lie
            if ($statusFilter != '') {
                $query->bindValue(':statusFilter', $statusFilter);
            }

            // Lier les paramètres de pagination
            $query->bindValue(':start', $start, PDO::PARAM_INT);
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);

            $query->execute();
            
            return $query->fetchAll(); // Retourne les contracts pour la page demandée
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Obtenir le nombre total de contracts pour calculer la pagination (avec le filtrage par date_fin)
    public function getTotalcontracts($statusFilter = '')
    {
        $sql = "SELECT COUNT(*) AS total FROM contract WHERE 1";

        // Ajouter le filtre par date_fin si présent
        if ($statusFilter != '') {
            $sql .= " AND date_fin = :statusFilter";
        }

        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            
            // Lier le filtre si nécessaire
            if ($statusFilter != '') {
                $query->bindValue(':statusFilter', $statusFilter);
            }

            $query->execute();
            $result = $query->fetch();
            return $result['total'];  // Retourne le nombre total de contracts
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
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
        $sql = "INSERT INTO contract (titre, description, date_creation, date_fin, contract_id)
                VALUES (:titre, :description, :date_creation, :date_fin, :contract_id)";
        $conn = config::getConnexion();
    
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'titre' => $contract->gettitre(),
                'description' => $contract->getdescription(),
                'date_creation' => $contract->getdate_creation(),
                'date_fin' => $contract->getdate_fin(),
                'contract_id' => $contract->getcontractId() // Utilisation du contract_id
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

    // Recherche des contracts avec pagination et filtrage par date_fin
    public function searchContract($keyword, $page = 1, $limit = 5, $statusFilter = '')
    {
        $start = ($page - 1) * $limit;  // Calculer le point de départ de la page
        
        $sql = "SELECT * FROM Contract WHERE (titre LIKE :keyword OR description LIKE :keyword OR date_creation LIKE :keyword OR date_fin LIKE :keyword)";

        // Ajouter le filtre par date_fin si nécessaire
        if ($statusFilter != '') {
            $sql .= " AND date_fin = :statusFilter";
        }

        $sql .= " LIMIT :start, :limit";  // Pagination
        
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->bindValue(':keyword', '%' . $keyword . '%');
            
            // Lier le filtre de date_fin si nécessaire
            if ($statusFilter != '') {
                $query->bindValue(':statusFilter', $statusFilter);
            }

            // Lier les paramètres de pagination
            $query->bindValue(':start', $start, PDO::PARAM_INT);
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);
            $query->execute();

            return $query->fetchAll();  // Retourne les résultats paginés
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Obtenir le nombre total de contracts pour la recherche (avec filtrage par date_fin)
    public function getTotalSearchResults($keyword, $statusFilter = '')
    {
        $sql = "SELECT COUNT(*) AS total FROM contract WHERE (titre LIKE :keyword OR description LIKE :keyword OR date_creation LIKE :keyword OR date_fin LIKE :keyword)";

        // Ajouter le filtre par date_fin si nécessaire
        if ($statusFilter != '') {
            $sql .= " AND date_fin = :statusFilter";
        }

        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute(['keyword' => '%' . $keyword . '%']);
            
            // Lier le filtre de date_fin si nécessaire
            if ($statusFilter != '') {
                $query->bindValue(':statusFilter', $statusFilter);
            }

            $result = $query->fetch();
            return $result['total'];  // Retourne le nombre total de résultats de recherche
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
