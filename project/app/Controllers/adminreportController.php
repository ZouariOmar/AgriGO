<?php
require "../config.php";
include "../Models/adminreport.php";      

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
        $conn = config::getConnexion();  // Assuming the database connection is set
    
        try {
            // Insert the Report_ID and status 'RECEIVED' into the 'rapportstat' table
            $sql = "INSERT INTO rapportstat (Stat_ID,StatRapportID, Status) VALUES (NULL,:StatRapportID, :Status)";
            $query = $conn->prepare($sql);
            $query->execute([
                'StatRapportID' => $reportId,  // Ensure this is the correct column name
                'Status' => 'RECEIVED',  // Default status
            ]);
    
            // Debugging: Check if the insert was successful
            if ($query->rowCount() > 0) {
                echo "Admin report inserted successfully.";
            } else {
                echo "Failed to insert admin report.";
            }
    
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function updateReport($report, $id)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE rapportstat SET 
                status = :status
            WHERE StatID = :id'
        );

        try {
            $query->execute([
                'Status' => $report->getStatus(),
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
