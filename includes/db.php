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

  public function getDoctors(): array
  {
    $query = "SELECT * FROM doctors";
    $stmt = $this->conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function filterDoctors(string $specialization, string $degree, string $gender, string $sortField, string $search): array
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

  public function authenticate(string $email): bool|array
  {
    $response = array();

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$email]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record) {
      $response['role'] = 'user';
      $response['record'] = $record;
      return $response;
    } else {
      $query = "SELECT * FROM doctors WHERE email = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$email]);
      $record = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($record) {
        $response['role'] = 'doctor';
        $response['record'] = $record;
        return $response;
      } else {
        // Email not found in either table, authentication failed
        return false;
      }
    }
  }
}


return new Database();
