<?php
session_start();

if (($_SESSION['role'] ?? '') !== 'user') {
  header("Location: login.php");
  exit();
}

/** @var Database $db */
$db = require_once "includes/db.php";

$upcoming_appointments = $db->getUserUpcomingAppointments($_SESSION['uid']);
$appointment_history = $db->getUserAppointmentHistory($_SESSION['uid']);

include_once "includes/header.php";
?>


<section style="margin-top: 80px">
  <div class="container my-4">
    <h2 data-aos="fade-up" class="mb-4" style="font-weight: bold">
      <span class="underline">Upcoming</span>&nbsp;Appointments
    </h2>
    <?php if (empty($upcoming_appointments)) : ?>
      <div data-aos="fade-up" data-aos-delay="150" class="text-center my-3" style="height: 250px">
        <img class="img-fluid h-100 rounded-circle" src="assets/img/illustrations/no-data.jpg" />
      </div>
    <?php else : ?>
      <div class="table-responsive" data-aos="fade-up" data-aos-delay="150">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Doctor</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($upcoming_appointments as $appointment) : ?>
              <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= $appointment['time'] ?></td>
                <td><?= $appointment['doctor_name'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</section>
<section>
  <div class="container my-4">
    <h2 data-aos="fade-up" class="mb-4" style="font-weight: bold">
      Appointment&nbsp;<span class="underline">History</span>
    </h2>
    <?php if (empty($appointment_history)) : ?>
      <div data-aos="fade-up" data-aos-delay="150" class="text-center my-3" style="height: 250px">
        <img class="img-fluid h-100 rounded-circle" src="assets/img/illustrations/no-data.jpg" />
      </div>
    <?php else : ?>
      <div class="table-responsive" data-aos="fade-up" data-aos-delay="150">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Doctor</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($appointment_history as $appointment) : ?>
              <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= $appointment['time'] ?></td>
                <td><?= $appointment['doctor_name'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</section>


<?php include_once "includes/footer.php" ?>
