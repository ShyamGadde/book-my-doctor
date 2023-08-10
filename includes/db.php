<?php

class Database
{
  private string $host = "localhost";
  private string $username = "root";
  private string $password = "";
  private string $dbname = "bookmydoctor";
  private \PDO $conn;

  public function __construct()
  {
    try {
      $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getDoctors()
  {
    $query = "SELECT * FROM doctors";
    $stmt = $this->conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


return new Database();
