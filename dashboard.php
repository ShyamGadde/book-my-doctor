<?php
session_start();

if (($_SESSION['role'] ?? '') !== 'doctor') {
  header("Location: login.php");
  exit();
}

/** @var Database $db */
$db = require_once "includes/db.php";

$todays_appointments = $db->getDoctorTodaysAppointments($_SESSION['uid']);
$upcoming_appointments = $db->getDoctorUpcomingAppointments($_SESSION['uid']);

include_once "includes/header.php";
?>


<section style="margin-top: 80px">
  <div class="container my-4">

    <h2 data-aos="fade-up" class="mb-4" style="font-weight: bold">
      <span class="pb-2 underline">Today's</span>&nbsp;Appointments
    </h2>

    <?php if (empty($todays_appointments)) : ?>

      <div data-aos="fade-up" data-aos-delay="150" class="text-center my-3" style="height: 250px">
        <img class="img-fluid h-100 rounded-circle" src="assets/img/illustrations/no-data.jpg" />
      </div>

    <?php else : ?>

      <div class="table-responsive" data-aos="fade-up" data-aos-delay="150">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th class="col-6">Time</th>
              <th class="col-6">Patient</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php foreach ($todays_appointments as $appointment) : ?>

              <tr>
                <td><?= date('h:i A', strtotime($appointment['time'])) ?></td>
                <td><?= $appointment['patient_name'] ?></td>
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
      <span class="pb-2 underline">Upcoming</span>&nbsp;Appointments
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
              <th class="col-4">Date</th>
              <th class="col-4">Time</th>
              <th class="col-4">Patient</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php foreach ($upcoming_appointments as $appointment) : ?>

              <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= date('h:i A', strtotime($appointment['time'])) ?></td>
                <td><?= $appointment['patient_name'] ?></td>
              </tr>

            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    <?php endif; ?>

  </div>
</section>


<?php include_once "includes/footer.php" ?>
