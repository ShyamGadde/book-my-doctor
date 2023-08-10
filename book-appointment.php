<?php

$user_id = $_POST['user_id'];
$doctor_id = $_POST['doctor_id'];
$date = $_POST['date'];
$time = $_POST['time'];

/** @var Database $db */
$db = require_once "includes/db.php";

$response = $db->createAppointment($user_id, $doctor_id, $date, $time);

if ($response === false) {
  header("Location: book-appointment.php?error=1");
} else {
  header("Location: my-appointments.php?success=1");
}
