<?php
require_once "../config.php";

class responseController
{

    public function responseList($reportId) {
        $db = config::getConnexion(); 
        $sql = "SELECT * FROM Responses WHERE reportid = :id";
        
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $reportId, PDO::PARAM_INT);
            $stmt->execute();
            
            // Fetch the results and return them
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("PDO Exception: " . $e->getMessage());
            die('Error: ' . $e->getMessage());
        }
        
    }

    function getReportById($id)
    {
        $sql = "SELECT * from Responses where ResponseID = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $response= $query->fetch();
            return $response;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addResponse($response)
    {
        $sql = "INSERT INTO Responses (ResponseID, reportid, Response)
                VALUES (NULL, :reportid, :response)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'reportid' => $response->getReportId(),
                'response' => $response->getResponse()
            ]);
            $responseId = $conn->lastInsertId();  // Returns the ID of the last inserted row

            return $responseId;  // Ensure this is being returned correctly
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
