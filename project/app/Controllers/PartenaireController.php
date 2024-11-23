<?php
require "../../conf/config.php";

class PartenaireController
{
    // select all Partenaire list
    public function PartenaireList()
    {
        $sql = "SELECT * FROM Partenaire";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    //select one Partenaire by id
    function getPartenaireById($id)
    {
        $sql = "SELECT * from Partenaire where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Partenaire = $query->fetch();
            return $Partenaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // add new Partenaire
    public function addPartenaire($Partenaire)
    {
        $sql = "INSERT INTO Partenaire (id,name,email,telephone)
        VALUES (NULL,:name,:email,:telephone)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'name' => $Partenaire->getName(),
                'email' => $Partenaire->getemail(),
                'telephone' => $Partenaire->gettelephone()

            ]);
            echo "Partenaire inserted succcefully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function updatePartenaire($Partenaire, $id)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE Partenaire SET 
                name = :name,
                email = :email,
                telephone = :telephone
            WHERE id = :id'
        );
        try {
            $query->execute([
                'id' => $id,
                'name' => $Partenaire->getName(),
                'email' => $Partenaire->getemail(),
                'telephone' => $Partenaire->gettelephone(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




    // delete one Partenaire by id
    public function deletePartenaire($id)
    {
        $sql = "DELETE FROM Partenaire WHERE id=:id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
