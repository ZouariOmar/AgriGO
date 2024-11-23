<?php
/**
 * @author @ZouariOmar <zouariomar20@gmail.com>
 */

//? Include declaration part
include '/../vendor/autoload.php';  // Load Composer autoload

//? Using declaration part
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Exception\ValidationException;

class Database
{
  private $host;
  private $dbName;
  private $username;
  private $password;
  private $pdo;

  /**
   * @brief ### Construct the Database object
   */
  public function __construct()
  {
    try {  //? Hold the .env locale file
      $dotenv = Dotenv::createImmutable(__DIR__ . '../../');  // Navigate to the .env fil lvl
      $dotenv->load();
    } catch (InvalidPathException $e) {  // Catches the specific error if .env file path is incorrect or file is missing
      echo "Error: .env file not found or incorrect path specified." . $e->getMessage();
    } catch (ValidationException $e) {  // Catches validation errors (useful if you're validating required variables)
      echo "Validation Error: " . $e->getMessage();
    } catch (Exception $e) {  // Catches any other general exceptions
      echo "An unexpected error occurred: " . $e->getMessage();
    }

    //? Hold the DB data from the .env file
    $this->host = $_ENV['DB_HOST'];
    $this->dbName = $_ENV['DB_NAME'];
    $this->username = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];

    try {
      $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
    }
  }

  /**
   * @brief ### Custom SQL query method
   * @param string $sql
   * @param array $params
   * @return array|int
   */
  public function query($sql, $params = [])
  {
    // Prepare the query (for security)
    $stmt = $this->pdo->prepare($sql);

    // Attache the parameters with the query
    foreach ($params as $key => $value)
      $stmt->bindValue(":$key", $value);

    $stmt->execute();  // Execute the statement

    // Determine if the query is a SELECT statement
    if (stripos($sql, 'SELECT') === 0)
      return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Return results for SELECT
    return $stmt->rowCount();                    // Return affected rows for INSERT, UPDATE, DELETE
  }
}
