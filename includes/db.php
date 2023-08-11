<?php
class Database
{
  private string $host = "localhost";
  private string $username = "root";
  private string $password = "";
  private string $dbname = "bookmydoctor";
  private mysqli $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function __destruct()
  {
    $this->conn->close();
  }

  public function getDoctors(): array
  {
    $query = "SELECT * FROM doctors";
    $result = $this->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
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
    if (!empty($params)) {
      $types = str_repeat('s', count($params));
      $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function authenticate(string $email): bool|array
  {
    $response = array();

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();

    if ($record) {
      $response['role'] = 'user';
      $response['record'] = $record;
      return $response;
    } else {
      $query = "SELECT * FROM doctors WHERE email = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $record = $result->fetch_assoc();

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

  public function getDoctorTodaysAppointments(int $doctorId): array
  {
    $query = "SELECT users.fullname as patient_name, appointments.date, appointments.time FROM appointments JOIN users ON appointments.user_id = users.id WHERE appointments.doctor_id = ? AND appointments.date = ? ORDER BY appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("is", $doctorId, date('Y-m-d'));
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getDoctorUpcomingAppointments(int $doctorId): array
  {
    $query = "SELECT users.fullname as patient_name, appointments.date, appointments.time FROM appointments JOIN users ON appointments.user_id = users.id WHERE appointments.doctor_id = ? AND appointments.date > ? ORDER BY appointments.date ASC, appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("is", $doctorId, date('Y-m-d'));
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getUserUpcomingAppointments(int $userId): array
  {
    $query = "SELECT doctors.fullname as doctor_name, appointments.date, appointments.time FROM appointments JOIN doctors ON appointments.doctor_id = doctors.id WHERE appointments.user_id = ? AND appointments.date >= ? ORDER BY appointments.date ASC, appointments.time ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("is", $userId, date('Y-m-d'));
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getUserAppointmentHistory(int $userId): array
  {
    $query = "SELECT doctors.fullname as doctor_name, appointments.date, appointments.time FROM appointments JOIN doctors ON appointments.doctor_id = doctors.id WHERE appointments.user_id = ? AND appointments.date < ? ORDER BY appointments.date DESC, appointments.time DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("is", $userId, date('Y-m-d'));
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function userEmailExists(string $email): bool
  {
    $query = "SELECT COUNT(*) FROM (SELECT email FROM users UNION SELECT email FROM doctors) AS emails WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_row()[0];
    return $count > 0;
  }

  public function createUser(string $fullname, string $email, string $password, string $phone, string $dob, string $gender): bool
  {
    $query = "INSERT INTO users (fullname, email, password, phone, dob, gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssssss", $fullname, $email, $hashed_password, $phone, $dob, $gender);
    $success = $stmt->execute();
    return $success;
  }

  public function createDoctor(string $fullname, string $email, string $password, string $phone, string $gender, string $specialization, string $degree, int $experience): bool
  {
    $query = "INSERT INTO doctors (fullname, email, password, phone, gender, specialization, degree, experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("sssssssi", $fullname, $email, $hashed_password, $phone, $gender, $specialization, $degree, $experience);
    $success = $stmt->execute();
    return $success;
  }

  public function createAppointment(int $userId, int $doctorId, string $date, string $time): bool
  {
    $query = "INSERT INTO appointments (user_id, doctor_id, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("iiss", $userId, $doctorId, $date, $time);
    $success = $stmt->execute();
    return $success;
  }
}

return new Database();
