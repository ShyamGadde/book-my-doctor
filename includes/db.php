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


  public function filterDoctors(string $specialization, string $degree, string $gender, string $sortField, string $search)
  {
    $sql = "SELECT * FROM doctors WHERE 1=1";
    $params = array();

    if (!empty($specialization)) {
      $sql .= " AND specialization = ?";
      $params[] = $specialization;
    }

    if (!empty($degree)) {
      $sql .= " AND degree = ?";
      $params[] = $degree;
    }

    if (!empty($gender)) {
      $sql .= " AND gender = ?";
      $params[] = $gender;
    }

    if (!empty($search)) {
      $sql .= " AND fullname LIKE ?";
      $params[] = "%" . $search . "%";
    }

    switch ($sortField) {
      case "fullname":
        $sql .= " ORDER BY fullname ASC";
        break;
      case "experience":
        $sql .= " ORDER BY experience DESC";
        break;
      default:
        break;
    }

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}


return new Database();
