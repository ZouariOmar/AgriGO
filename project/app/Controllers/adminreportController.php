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
            $sql = "INSERT INTO rapportstat (StatID, StatRapportID, ST) 
                    VALUES (NULL, :StatRapportID, :st)";
            $query = $conn->prepare($sql);

            $query->execute([
                'StatRapportID' => $reportId, // Ensure this corresponds to a valid ID in 'rapports'
                'st' => 'RECIEVED',      // Default status
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



    
    
function updateReportStatus($id, $status)
{
    $db = config::getConnexion();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Log values for debugging
    error_log("Debug: Status = '" . $status . "', ID = '" . $id . "'");

    if (empty($status) || empty($id)) {
        error_log("Error: Invalid values for status or ID.");
        return false;
    }

    try {
        $query = $db->prepare(
            'UPDATE `rapportstat` SET 
                `ST` = :st 
            WHERE `StatID` = :id'
        );

        // Execute the query
        $result = $query->execute([
            'st' => $status,
            'id' => $id
        ]);

        // Log the result
        error_log("Query executed. Result: " . var_export($result, true));

        if ($query->rowCount() > 0) {
            error_log("Update successful.");
            return true;
        } else {
            error_log("No rows updated.");
            return false;
        }
    } catch (PDOException $e) {
        error_log("PDO Exception: " . $e->getMessage());
        return false;
    }
}




}