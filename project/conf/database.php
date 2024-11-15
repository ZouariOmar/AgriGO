<?php
/**
 * @author @ZouariOmar <zouariomar20@gmail.com>
 */

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
  public function __construct($env_path)
  {
    try {  //? Hold the .env locale file
      $dotenv = Dotenv::createImmutable($env_path);  // Navigate to the .env fil lvl
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
    return (stripos($sql, 'SELECT') === 0) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->rowCount();  // Return results for SELECT, else return affected rows for INSERT, UPDATE, DELETE
  }
}
