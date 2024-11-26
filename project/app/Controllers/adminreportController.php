<?php
require_once "../config.php"; 

class adminreportController
{

    public function reportList()
    {
        $sql = "SELECT * FROM rapportstat";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getReportById($id)
    {
        $sql = "SELECT * from rapportstat where StatID = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $adminreport = $query->fetch();
            return $adminreport;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    

    
    // Function to add the report to the 'adminreport' table with default status 'RECEIVED'
    public function addAdminReport($reportId)
    {
        $conn = config::getConnexion(); // Ensure this retrieves the correct database connection

        try {
            $sql = "INSERT INTO rapportstat (StatID, StatRapportID, Status) 
                    VALUES (NULL, :StatRapportID, :Status)";
            $query = $conn->prepare($sql);

            $query->execute([
                'StatRapportID' => $reportId, // Ensure this corresponds to a valid ID in 'rapports'
                'Status' => 'RECIEVED',      // Default status
            ]);

            // Log for debugging
            error_log("SQL executed successfully with Report ID: $reportId");

            return $query->rowCount() > 0; // Check if the record was inserted
        } catch (Exception $e) {
            // Log the detailed error message and query
            error_log('Error in addAdminReport: ' . $e->getMessage());
            error_log('Report ID: ' . $reportId);

            // Optionally print the error for immediate feedback (in development environment)
            echo 'Error: ' . $e->getMessage();

            return false; // Explicitly return false on failure
        }
    }



    function adminupdateReport($report, $id)
    {
        $db = config::getConnexion();
    
        $query = $db->prepare(
            'UPDATE rapportstat SET 
                Status = :status
            WHERE StatID = :id'
        );
    
        try {
            // Execute the query with properly cased keys
            $query->execute([
                'Status' => $report->getStatus(), // Match 'Status' in DB
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
    $sql = "DELETE FROM rapportstat WHERE StatID = :id";
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
