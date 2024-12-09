<?php
require_once __DIR__ . '/../conf/config.php';

class partnerController
{
 // Ajoutez le paramètre $statusFilter à la fonction partnerListWithPagination
public function partnerListWithPagination($startFrom, $resultsPerPage, $searchTerm = '', $statusFilter = '')
{
    $conn = config::getConnexion();

    // Construction de la requête SQL avec le filtrage par statut
    $sql = "SELECT * FROM partner WHERE 1";

    // Ajouter la recherche par terme si elle est présente
    if ($searchTerm) {
        $sql .= " AND (name LIKE :searchTerm OR email LIKE :searchTerm OR number LIKE :searchTerm)";
    }

    // Ajouter le filtrage par statut si le statut est sélectionné
    if ($statusFilter) {
        $sql .= " AND status = :statusFilter";
    }

    // Ajouter la pagination
    $sql .= " LIMIT :startFrom, :resultsPerPage";

    try {
        $stmt = $conn->prepare($sql);

        // Lier les paramètres
        if ($searchTerm) {
            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        }
        if ($statusFilter) {
            $stmt->bindValue(':statusFilter', $statusFilter);
        }

        // Lier les paramètres de pagination
        $stmt->bindValue(':startFrom', $startFrom, PDO::PARAM_INT);
        $stmt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

// Ajouter ou mettre à jour la fonction getPaginationInfo pour prendre en compte la recherche et le filtrage par statut
public function getPaginationInfo($currentPage, $resultsPerPage, $searchTerm = '', $statusFilter = '')
{
    $conn = config::getConnexion();

    // Construction de la requête SQL pour compter le nombre total de partenaires
    $sql = "SELECT COUNT(*) FROM partner WHERE 1";

    // Ajouter la recherche par terme si elle est présente
    if ($searchTerm) {
        $sql .= " AND (name LIKE :searchTerm OR email LIKE :searchTerm OR number LIKE :searchTerm)";
    }

    // Ajouter le filtrage par statut si le statut est sélectionné
    if ($statusFilter) {
        $sql .= " AND status = :statusFilter";
    }

    try {
        $stmt = $conn->prepare($sql);

        // Lier les paramètres
        if ($searchTerm) {
            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        }
        if ($statusFilter) {
            $stmt->bindValue(':statusFilter', $statusFilter);
        }

        $stmt->execute();
        $totalResults = $stmt->fetchColumn();

        // Calcul du nombre total de pages
        $totalPages = ceil($totalResults / $resultsPerPage);

        // Déterminer les pages précédente et suivante
        $prevPage = $currentPage - 1;
        $nextPage = $currentPage + 1;

        return [
            'totalResults' => $totalResults,
            'totalPages' => $totalPages,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage
        ];
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

    // select one partner by id
    function getPartnerById($id_partner)
    {
        $sql = "SELECT * from partner where id_partner = :id_partner";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_partner' => $id_partner]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // add new partner
    public function addPartner($partner)
    {
        $sql = "INSERT INTO partner (id_partner, name, email, number, status) VALUES (NULL, :name, :email, :number, :status)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'name' => $partner->getName(),
                'email' => $partner->getEmail(),
                'number' => $partner->getNumber(),
                'status' => $partner->getStatus() // Nouveau champ pour le statut
            ]);
            echo "Partner inserted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // update partner details
    function updatePartner($partner, $id_partner)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE partner SET 
                name = :name,
                email = :email,
                number = :number,
                status = :status
            WHERE id_partner = :id_partner'
        );
        try {
            $query->execute([
                'id_partner' => $id_partner,
                'name' => $partner->getName(),
                'email' => $partner->getEmail(),
                'number' => $partner->getNumber(),
                'status' => $partner->getStatus(), // Mise à jour du statut
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // delete one partner by id
    public function deletePartner($id_partner)
    {
        $sql = "DELETE FROM partner WHERE id_partner = :id_partner";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id_partner', $id_partner);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // search partners by keyword
    public function searchPartner($keyword)
    {
        $sql = "SELECT * FROM partner WHERE name LIKE :keyword OR email LIKE :keyword OR number LIKE :keyword";
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute(['keyword' => '%' . $keyword . '%']);
            return $query->fetchAll(); // Retourne les résultats sous forme de tableau
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
