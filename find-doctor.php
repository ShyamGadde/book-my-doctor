<?php
session_start();

if (($_SESSION['role'] ?? '') === 'doctor') {
  header("Location: dashboard.php");
  exit();
}

include_once "includes/header.php";

/** @var Database $db */
$db = require_once "includes/db.php";

if (($_GET["filter"] ?? '') === "true") {
  $doctors = $db->filterDoctors($_GET['specialization'], $_GET['degree'], $_GET["gender"], $_GET["sort-field"], $_GET["search"]);
} else {
  $doctors = $db->getDoctors();
}
?>

<div style="margin-top: 80px">
  <div class="toast-container position-fixed top-0 end-0 me-2 mt-2">
    <div class="toast fade bg-danger-subtle" style="border-radius: 5px;" data-aos="fade-left" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <svg class="bd-placeholder-img me-2" style="border-radius: 5px;" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong class="me-auto">BookMyDoctor</strong>
        <!-- <small>11 mins ago</small> -->
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        There was an error while booking your appointment. Please try again.
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      const errorValue = params.get('error');
      if (errorValue === '1') {
        let toastElement = document.querySelector('.toast');
        let toast = new bootstrap.Toast(toastElement);
        toast.show();
      }
    });
  </script>

  <div class="container">
    <form id="filter-form">
      <input type="hidden" name="filter" value="true">
      <div class="row py-2">
        <div class="col col-12 col-md-6 p-0 px-2 mt-0 mb-2 mb-md-0 d-flex align-items-center">

          <div class="dropdown d-flex flex-grow-1">
            <button class="btn btn-white border dropdown-toggle flex-grow-1" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
              Filter by&nbsp;
            </button>

            <div class="dropdown-menu" style="border-radius: 5px;">

              <!-- Filter form -->
              <div class="px-4 py-3" style="width: 400px; max-width: 100vw">
                <div class="mb-3 form-floating">
                  <select class="form-select" id="specialization" name="specialization" autofocus="" style="border-radius: 5px">
                    <option selected value="">Choose specialization</option>
                    <option>Dentist</option>
                    <option>Gynecologist/Obstetrician</option>
                    <option>Dietitian/Nutrition</option>
                    <option>Physiotherapist</option>
                    <option>General Surgeon</option>
                    <option>Orthopedist</option>
                    <option>General Physician</option>
                    <option>Pediatrician</option>
                    <option>Gastroenterologist</option>
                  </select><label class="form-label" for="specialization">Specialization</label>
                </div>

                <div class="mb-3 form-floating">
                  <select class="form-select" id="degree" autofocus="" name="degree" style="border-radius: 5px">
                    <option selected value="">Choose degree</option>
                    <option>MBBS</option>
                    <option>MS</option>
                    <option>MD</option>
                    <option>Bachelor of Dental Surgery (BDS)</option>
                    <option>Master of Dental Surgery (MDS)</option>
                    <option>Bachelor of Physiotherapy (BPT)</option>
                    <option>Master of Physiotherapy (MPT)</option>
                    <option>BSc</option>
                    <option>MSc</option>
                  </select><label class="form-label" for="degree">Degree</label>
                </div>

                <div class="mb-3 form-floating">
                  <select class="form-select" id="gender" name="gender" autofocus="" style="border-radius: 5px">
                    <option selected value="">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select><label class="form-label" for="gender">Gender</label>
                </div>

                <div class="d-flex justify-content-between">
                  <input class="btn btn-dark rounded-pill" type="reset" value="Reset">
                  <input class="btn btn-primary rounded-pill" type="submit" value="Filter" />
                </div>
              </div>
            </div>
          </div>

          <!-- Sort form -->
          <div class="d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text">Sort by:</span><select id="sort-field" class="form-select" name="sort-field" style="
                      border-top-right-radius: 5px;
                      border-bottom-right-radius: 5px;
                    ">
                <option value="relevance" selected="">Relevance</option>
                <option value="fullname">Name</option>
                <option value="experience">Experience</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Search form -->
        <div class="col p-0 px-2 m-0 col-12 col-md-6">
          <div class="d-flex align-items-center">
            <input class="form-control ms-md-auto" type="search" name="search" placeholder="Search" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px" />

            <button class="btn btn-primary btn-secondary" type="submit" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search" style="font-size: 18px">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
              </svg>
            </button>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

<script>
  document.querySelector("#sort-field").addEventListener("change", function() {
    this.form.submit();
  });

  const form = document.querySelector("#filter-form");
  const searchParams = new URLSearchParams(window.location.search);

  for (const [key, value] of searchParams.entries()) {
    const input = form.querySelector(`[name="${key}"]`);
    if (input) {
      if (input.type === "radio") {
        const radioInput = form.querySelector(
          `[name="${key}"][value="${value}"]`
        );
        if (radioInput) {
          radioInput.checked = true;
        }
      } else {
        input.value = value;
      }
    }
  }
</script>

<section class="mt-3">
  <div class="container text-center">
    <div class="row row-cols-md-2 g-4">

      <?php foreach ($doctors as $doctor) : ?>

        <div class="col">
          <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
            <div>
              <img class="rounded-circle" src="<?= $doctor['image_link'] ?>" />
            </div>
            <div class="card-body">
              <h4 class="card-title">Dr. <?= $doctor['fullname'] ?></h4>
              <h6 class="text-muted card-subtitle mb-2">
                <?= $doctor['specialization'] ?>, <?= $doctor['degree'] ?>
              </h6>
              <h6 class="text-muted card-subtitle mb-2">
                <?= $doctor['experience'] ?> years of experience overall
              </h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <a class="btn btn-info shadow rounded-pill" href="tel:<?= $doctor['phone'] ?>">Call</a>
              <button class="btn btn-primary rounded-pill shadow book-appointment-btn" type="button" data-bs-toggle="modal" data-bs-target="#book-appointment-modal" data-doctor-id=<?= $doctor['id'] ?>>
                Book Appointment
              </button>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>


<?php if (($_SESSION['role'] ?? '') === 'user') : ?>

  <div class="modal fade" role="dialog" tabindex="-1" id="book-appointment-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h4 class="modal-title">Pick a Date and Time</h4>
          <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <form action="book-appointment.php" method="post" class="needs-validation" novalidate>
          <div class="modal-body">
            <input type="hidden" name="user_id" value="<?= $_SESSION['uid'] ?>">
            <input type="hidden" name="doctor_id" id="doctor-id">
            <div class="input-group my-3">
              <span class="input-group-text" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Date</span>
              <input class="form-control" type="date" name="date" required="" min="<?= date('Y-m-d'); ?>" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;" />
              <div class="invalid-feedback">Please a choose a date</div>
            </div>
            <div class="input-group my-3">
              <span class="input-group-text" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Time</span>
              <input class="form-control" type="time" name="time" required="" min="10:00" max="22:00" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;" />
              <div class="invalid-feedback">Please a choose a time between 10 AM and 10 PM</div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light shadow" type="button" data-bs-dismiss="modal" style="border-radius: 5px;">Cancel</button>
            <button class="btn btn-primary shadow" type="submit" style="border-radius: 5px;">Book Appointment</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll(".book-appointment-btn").forEach((btn) => {
      btn.addEventListener("click", function() {
        const doctorId = this.dataset.doctorId;
        document.querySelector("#doctor-id").value = doctorId;
      });
    });
  </script>

<?php else : ?>

  <div class="modal fade" role="dialog" tabindex="-1" id="book-appointment-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h4 class="modal-title">Please Login!</h4>
          <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="">You need to first login with your account in order for you to book an appointment.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-light shadow" type="button" data-bs-dismiss="modal" style="border-radius: 5px;">Cancel</button>
          <a class="btn btn-primary shadow" href="login.php" style="border-radius: 5px;">Login</a>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>


<?php include_once "includes/footer.php" ?>
