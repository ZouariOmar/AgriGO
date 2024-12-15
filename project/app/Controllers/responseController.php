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

    function getResponseById($id)
    {
        $sql = "SELECT * FROM Responses WHERE ResponseID = $id";
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
    


        // Other methods...
    
        public function updateResponse($response, $id)
        {
            $db = config::getConnexion();
    
            $query = $db->prepare(
                'UPDATE Responses SET 
                    Response = :response
                WHERE ResponseID = :id'
            );
    
            try {
                $query->execute([
                    'response' => $response->getResponse(),
                    'id' => $id  
                ]);
    
                // Check if the query was successful
                if ($query->rowCount() > 0) {
                    return true; // Success
                } else {
                    return false; // No rows affected
                }
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }





public function deleteResponse($id)
    {
        $sql = "DELETE FROM responses WHERE ResponseID = :id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            echo "Response with ID $id has been successfully deleted.<br>";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


}
