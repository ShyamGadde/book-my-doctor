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
  <div class="toast-container position-fixed top-0 end-0 me-2 mt-2">
    <div class="toast fade" style="border-radius: 5px;" data-aos="fade-left" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <svg class="bd-placeholder-img me-2" style="border-radius: 5px;" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong class="me-auto">BookMyDoctor</strong>
        <!-- <small>11 mins ago</small> -->
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Congratulations! Your appointment has been booked successfully.
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      const successValue = params.get('success');
      if (successValue === '1') {
        let toastElement = document.querySelector('.toast');
        let toast = new bootstrap.Toast(toastElement);
        toast.show();
      }
    });
  </script>

  <div class="container my-4">
    <h2 data-aos="fade-up" class="mb-4" style="font-weight: bold">
      <span class="underline pb-2">Upcoming</span>&nbsp;Appointments
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
              <th class="col-4">Doctor</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php foreach ($upcoming_appointments as $appointment) : ?>

              <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= date('h:i A', strtotime($appointment['time'])) ?></td>
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
      Appointment&nbsp;<span class="underline pb-2">History</span>
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
              <th class="col-4">Date</th>
              <th class="col-4">Time</th>
              <th class="col-4">Doctor</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php foreach ($appointment_history as $appointment) : ?>

              <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= date('h:i A', strtotime($appointment['time'])) ?></td>
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
