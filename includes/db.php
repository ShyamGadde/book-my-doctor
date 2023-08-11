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

  public function authenticate(string $email, string $password): array
  {
    $response = array();

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$email]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record) {
      $response['valid_email'] = true;
      $response['role'] = 'user';
      $response['uid'] = $record['id'];
    } else {
      $query = "SELECT * FROM doctors WHERE email = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->execute([$email]);
      $record = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($record) {
        $response['valid_email'] = true;
        $response['role'] = 'doctor';
        $response['uid'] = $record['id'];
      } else {
        $response['valid_email'] = false;
        $response['feedback'] = "This email address is not associated with any account.";
      }
    }

    if ($response['valid_email']) {
      $response['valid_password'] = password_verify($password, $record['password']);

      if (!$response['valid_password']) {
        $response['feedback'] = "Incorrect password.";
      }
    }

    return $response;
  }

  public function getDoctorTodaysAppointments(int $doctorId): array
  {
    $query = "SELECT users.fullname as patient_name, appointments.date, appointments.time FROM appointments JOIN users ON appointments.user_id = users.id WHERE appointments.doctor_id = ? AND appointments.date = ? ORDER BY appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$doctorId, date('Y-m-d')]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getDoctorUpcomingAppointments(int $doctorId): array
  {
    $query = "SELECT users.fullname as patient_name, appointments.date, appointments.time FROM appointments JOIN users ON appointments.user_id = users.id WHERE appointments.doctor_id = ? AND appointments.date > ? ORDER BY appointments.date ASC, appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$doctorId, date('Y-m-d')]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserUpcomingAppointments(int $userId): array
  {
    $query = "SELECT doctors.fullname as doctor_name, appointments.date, appointments.time FROM appointments JOIN doctors ON appointments.doctor_id = doctors.id WHERE appointments.user_id = ? AND appointments.date >= ? ORDER BY appointments.date ASC, appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$userId, date('Y-m-d')]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserAppointmentHistory(int $userId): array
  {
    $query = "SELECT doctors.fullname as doctor_name, appointments.date, appointments.time FROM appointments JOIN doctors ON appointments.doctor_id = doctors.id WHERE appointments.user_id = ? AND appointments.date < ? ORDER BY appointments.date DESC, appointments.time DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$userId, date('Y-m-d')]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function userEmailExists(string $email): bool
  {
    $query = "SELECT COUNT(*) FROM (SELECT email FROM users UNION SELECT email FROM doctors) AS emails WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
    return $count > 0;
  }

  public function createUser(string $fullname, string $email, string $password, string $phone, string $dob, string $gender): bool
  {
    $query = "INSERT INTO users (fullname, email, password, phone, dob, gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $success = $stmt->execute([$fullname, $email, $hashed_password, $phone, $dob, $gender]);
    return $success;
  }

  public function createDoctor(string $fullname, string $email, string $password, string $phone, string $gender, string $specialization, string $degree, int $experience): bool
  {
    $query = "INSERT INTO doctors (fullname, email, password, phone, gender, specialization, degree, experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $success = $stmt->execute([$fullname, $email, $hashed_password, $phone, $gender, $specialization, $degree, $experience]);
    return $success;
  }

  public function createAppointment(int $userId, int $doctorId, string $date, string $time): bool
  {
    $query = "INSERT INTO appointments (user_id, doctor_id, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $success = $stmt->execute([$userId, $doctorId, $date, $time]);
    return $success;
  }
}


return new Database();
