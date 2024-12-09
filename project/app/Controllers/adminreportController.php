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
    

    // Method to update the status of a report
    public function updateReportStatus($reportId, $status)
    {
        $conn = config::getConnexion();
        $sql = "UPDATE rapportstat SET ST = :status WHERE StatRapportID = :reportid";
        $sql1 = "UPDATE rapports SET sta = :status WHERE Report_ID = :reportid";
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'status' => $status,
                'reportid' => $reportId
            ]);
            $query1 = $conn->prepare($sql1);
            $query1->execute([
                'status' => $status,
                'reportid' => $reportId
            ]);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
