<?php
require(__DIR__ . '/../conf/config.php');

class partnerController
{
    // select all partner list
    public function partnerList()
    {
        $sql = "SELECT * FROM partner";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    //select one partner by id
    function getpartnerById($id_partner)
    {
        $sql = "SELECT * from partner where id_partner = $id_partner";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $partner = $query->fetch();
            return $partner;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // add new partner
    public function addpartner($partner)
    {
        $sql = "INSERT INTO partner (id_partner,name,email,number)
        VALUES (NULL,:name,:email,:number)";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'name' => $partner->getName(),
                'email' => $partner->getemail(),
                'number' => $partner->getnumber()

            ]);
            echo "partner inserted succcefully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function updatepartner($partner, $id_partner)
    {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE partner SET 
                name = :name,
                email = :email,
                number = :number
            WHERE id_partner = :id_partner'
        );
        try {
            $query->execute([
                'id_partner' => $id_partner,
                'name' => $partner->getName(),
                'email' => $partner->getemail(),
                'number' => $partner->getnumber(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




    // delete one partner by id
    public function deletepartner($id_partner)
    {
        $sql = "DELETE FROM partner WHERE id_partner=:id_partner";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id_partner', $id_partner);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    // Recherche des partenaires
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
