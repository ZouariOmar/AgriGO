<?php
class Config
{
    private $db;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'dbprojet';


    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Hello";

        } catch (PDOException $e) {
            die('Error: Failed to connect to the DB  ' . $e->getMessage());
        }
    }
    

    public function getConnection()
    {
        return $this->db;  
    }
}
?>
