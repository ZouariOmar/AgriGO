<?php
include_once '../config.php';

class partnerController {
    public function partnerList()
    {
        // Connexion à la base de données
        $conn = config::getConnexion();

        // Requête pour obtenir la liste des partenaires
        $sql = "SELECT * FROM partner";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();  // Retourne tous les partenaires
        } catch (Exception $e) {
            die('Erreur lors de la récupération des partenaires : ' . $e->getMessage());
        }
    }
    public function addPartner($partner) {
        $conn = config::getConnexion();
        $sql = "INSERT INTO partner (name, email, number, status) VALUES (:name, :email, :number, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $partner->getName(),
            ':email' => $partner->getemail(),
            ':number' => $partner->getnumber(),
            ':status' => $partner->getstatus(),
        ]);
    }

    public function getPartnerById($id) {
        
        $sql = "SELECT * FROM partner WHERE id_partner = :id_partner ";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->bindValue(':id_partner', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur lors de la récupération du partenaire : ' . $e->getMessage());
        }
    }

    public function updatepartner($partner, $id_partner) {
        $conn = config::getConnexion();
        $sql = "UPDATE partner SET name = :name, email = :email, number = :number, status = :status WHERE id_partner = :id_partner";
        
        try {
            echo "Updating partner: " . $partner->getName() . ", " . $id_partner;
            $query = $conn->prepare($sql);
            $query->execute([
                'id_partner' => $id_partner,
                'name' => $partner->getName(),
                'email' => $partner->getEmail(),
                'number' => $partner->getNumber(),
                'status' => $partner->getStatus()
            ]);
            echo $query->rowCount() . " partenaire(s) mis à jour avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour du partenaire : ' . $e->getMessage();
        }
    }
    


    public function partnerListWithPagination($startFrom, $resultsPerPage, $searchTerm = '', $statusFilter = '') {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM partner WHERE 1";

        if ($searchTerm != '') {
            $sql .= " AND (name LIKE :searchTerm OR email LIKE :searchTerm OR number LIKE :searchTerm)";
        }
        if ($statusFilter != '') {
            $sql .= " AND status = :statusFilter";
        }

        $sql .= " LIMIT :startFrom, :resultsPerPage";

        $stmt = $conn->prepare($sql);
        if ($searchTerm != '') {
            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        }
        if ($statusFilter != '') {
            $stmt->bindValue(':statusFilter', $statusFilter);
        }

        $stmt->bindValue(':startFrom', $startFrom, PDO::PARAM_INT);
        $stmt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getPaginationInfo($currentPage, $resultsPerPage, $searchTerm, $statusFilter) {
        $conn = config::getConnexion();
        $sql = "SELECT COUNT(*) FROM partner WHERE 1";

        if ($searchTerm != '') {
            $sql .= " AND (name LIKE :searchTerm OR email LIKE :searchTerm OR number LIKE :searchTerm)";
        }
        if ($statusFilter != '') {
            $sql .= " AND status = :statusFilter";
        }

        $stmt = $conn->prepare($sql);
        if ($searchTerm != '') {
            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        }
        if ($statusFilter != '') {
            $stmt->bindValue(':statusFilter', $statusFilter);
        }

        $stmt->execute();
        $totalRows = $stmt->fetchColumn();
        $totalPages = ceil($totalRows / $resultsPerPage);

        return [
            'prevPage' => max(1, $currentPage - 1),
            'nextPage' => min($currentPage + 1, $totalPages),
            'totalPages' => $totalPages
        ];
    }
    // Supprimer un partnenaire
    public function deletepartner($id)
    {
        $sql = "DELETE FROM partner WHERE id_partner = :id_partner";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id_partner', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            echo "partenaire supprimé avec succès.";
        } catch (Exception $e) {
            die('Erreur lors de la suppression du partenaire : ' . $e->getMessage());
        }
    }
}
