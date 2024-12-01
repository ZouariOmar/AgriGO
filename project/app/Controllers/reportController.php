<?php
require_once "../config.php";

class reportController
{

    public function reportList($category = null) {
        $db = config::getConnexion(); // Assurez-vous d'avoir la connexion à la base de données
        $sql = "SELECT * FROM rapports";
        
        // Si une catégorie est spécifiée, ajoutez une condition WHERE
        if ($category) {
            $sql .= " WHERE category = :category";
        }
        
        $stmt = $db->prepare($sql);
        
        // Liez le paramètre de catégorie si nécessaire
        if ($category) {
            $stmt->bindParam(':category', $category);
        }
        
        $stmt->execute();
        
        // Récupérez les résultats et retournez-les
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getReportById($id)
    {
        $sql = "SELECT * from rapports where Report_ID = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $report= $query->fetch();
            return $report;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addReport($report)
    {
        $sql = "INSERT INTO rapports (Report_ID,category,subject,description,sta)
        VALUES (NULL,:category,:subject,:description,'RECIEVED')";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'category' => $report->getCategory(),
                'subject' => $report->getSubject(),
                'description' => $report->getDescription(),

            ]);
            $reportId = $conn->lastInsertId();  // Returns the ID of the last inserted row

            return $reportId;  // Ensure this is being returned correctly
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    function updateReport($report, $id)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE rapports SET 
                category = :category,
                subject = :subject,
                description = :description,
                sta = :sta
            WHERE Report_ID = :id'
        );

        try {
            $query->execute([
                'category' => $report->getCategory(),
                'subject' => $report->getSubject(),
                'description' => $report->getDescription(),
                'sta' => "RECIEVED",
                'id' => $id  
            ]);

            // Check if the query was successful
            if ($query->rowCount() > 0) {
                return true; // Success
            } else {
                return false; // No rows were updated
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }





    public function deleteReport($id)
{
    $sql = "DELETE FROM rapports WHERE Report_ID = :id";
    $conn = config::getConnexion();
    $req = $conn->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
        echo "Report with ID $id has been successfully deleted.<br>";
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
}
