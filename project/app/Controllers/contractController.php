<?php
include_once '../config.php';

class contractController
{
    // Sélectionner tous les contrats avec pagination et filtrage par date_fin
    public function contractList($page = 1, $limit = 5, $dateFinFilter = '')
    {
        $start = ($page - 1) * $limit;  // Calculer le point de départ de la page
        
        // Si un filtre par date_fin est fourni, on l'ajoute à la requête SQL
        $sql = "SELECT * FROM contract WHERE 1";
        
        // Ajouter le filtre par date_fin si présent
        if ($dateFinFilter != '') {
            $sql .= " AND date_fin = :dateFinFilter";
        }
        
        $sql .= " LIMIT :start, :limit";  // Pagination

        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);

            // Si un filtre est présent, on le lie
            if ($dateFinFilter != '') {
                $query->bindValue(':dateFinFilter', $dateFinFilter);
            }

            // Lier les paramètres de pagination
            $query->bindValue(':start', $start, PDO::PARAM_INT);
            $query->bindValue(':limit', $limit, PDO::PARAM_INT);

            $query->execute();
            
            return $query->fetchAll(); // Retourne les contrats pour la page demandée
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function contractListWithPagination($startFrom, $resultsPerPage, $dateFinFilter = '')
    {
        $sql = "SELECT * FROM contract WHERE 1";
        
        // Ajout du filtre de date_fin si présent
        if ($dateFinFilter != '') {
            $sql .= " AND date_fin = :dateFinFilter";
        }
    
        // Pagination
        $sql .= " LIMIT :startFrom, :resultsPerPage";
    
        $conn = config::getConnexion();
    
        try {
            $query = $conn->prepare($sql);
    
            // Si un filtre par date_fin est appliqué
            if ($dateFinFilter != '') {
                $query->bindValue(':dateFinFilter', $dateFinFilter);
            }
    
            // Lier les valeurs pour la pagination
            $query->bindValue(':startFrom', $startFrom, PDO::PARAM_INT);
            $query->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
    
            $query->execute();
    
            return $query->fetchAll();  // Retourne la liste des contrats
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getPaginationInfo($currentPage, $resultsPerPage, $dateFinFilter = '')
{
    // Calcul du nombre total de contrats
    $totalContracts = $this->getTotalContracts($dateFinFilter);
    
    // Calcul du nombre total de pages
    $totalPages = ceil($totalContracts / $resultsPerPage);
    
    // Calcul des pages précédente et suivante
    $prevPage = $currentPage > 1 ? $currentPage - 1 : 1;
    $nextPage = $currentPage < $totalPages ? $currentPage + 1 : $totalPages;

    // Retourner les informations de pagination
    return [
        'totalPages' => $totalPages,
        'prevPage' => $prevPage,
        'nextPage' => $nextPage,
    ];
}


    // Obtenir le nombre total de contrats pour calculer la pagination (avec le filtrage par date_fin)
    public function getTotalContracts($dateFinFilter = '')
    {
        $sql = "SELECT COUNT(*) AS total FROM contract WHERE 1";

        // Ajouter le filtre par date_fin si présent
        if ($dateFinFilter != '') {
            $sql .= " AND date_fin = :dateFinFilter";
        }

        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            
            // Lier le filtre si nécessaire
            if ($dateFinFilter != '') {
                $query->bindValue(':dateFinFilter', $dateFinFilter);
            }

            $query->execute();
            $result = $query->fetch();
            return $result['total'];  // Retourne le nombre total de contrats
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Sélectionner un contrat par ID
    function getContractById($id)
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

    public function addContract($contract)
{
    $sql = "INSERT INTO contract (titre, description, date_creation, date_fin, partner_id)
            VALUES (:titre, :description, :date_creation, :date_fin, :partner_id)";
    $conn = config::getConnexion();

    try {
        $query = $conn->prepare($sql);
        $query->execute([
            'titre' => $contract->gettitre(),
            'description' => $contract->getdescription(),
            'date_creation' => $contract->getdate_creation(),
            'date_fin' => $contract->getdate_fin(),
            'partner_id' => $contract->getpartnerId()
        ]);
        echo "Contrat ajouté avec succès.";
    } catch (Exception $e) {
        die('Erreur lors de l\'ajout du contrat : ' . $e->getMessage());
    }
}

    
// Exemple de la méthode updateContract
public function updateContract($contract, $id)
{
    $db = config::getConnexion();

    $sql = 'UPDATE contract SET 
                titre = :titre,
                description = :description,
                date_creation = :date_creation,
                date_fin = :date_fin,
                partner_id = :partner_id
            WHERE id = :id';

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $id,
            'titre' => $contract->gettitre(),
            'description' => $contract->getdescription(),
            'date_creation' => $contract->getdate_creation(),
            'date_fin' => $contract->getdate_fin(),
            'partner_id' => $contract->getpartnerId()
        ]);

        echo $query->rowCount() . " contrat(s) mis à jour avec succès.";
    } catch (PDOException $e) {
        echo 'Erreur lors de la mise à jour du contrat : ' . $e->getMessage();
    }
}


    // Supprimer un contrat
    public function deleteContract($id)
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