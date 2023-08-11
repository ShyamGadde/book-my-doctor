<?php
session_start();

if (($_SESSION['role'] ?? '') === 'doctor') {
  header("Location: dashboard.php");
  exit();
} elseif (($_SESSION['role'] ?? '') === 'user') {
  header("Location: my-appointments.php");
  exit();
}

/** @var Database $db */
$db = require_once "includes/db.php";

$email_feedback;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  if ($db->userEmailExists($email)) {
    $email_feedback = "This email address is already associated with an account.";
  } else {
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $specialization = filter_input(INPUT_POST, 'specialization', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $degree = filter_input(INPUT_POST, 'degree', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $experience = filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validate the gender input against an array of valid values
    $valid_genders = array('Male', 'Female', 'Other');
    if (!in_array($gender, $valid_genders)) {
      $gender = 'Other';
    }

    $response = $db->createDoctor($fullname, $email, $password, $phone, $gender, $specialization, $degree, $experience);

    if ($response === false) {
      header("Location: join.php?error=1");
    } else {
      header("Location: login.php?success=1");
    }
  }
}

include_once "includes/header.php"
?>


<section style="margin-top: 80px;">
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
        There was an error creating your account. Please try again.
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

  <div class="container py-md-5" data-aos="fade-up">
    <div class="row">

      <div class="col-md-6 text-center">
        <img class="img-fluid w-100" src="assets/img/illustrations/register.svg" />
      </div>

      <div class="col-md-5 text-center text-md-start">

        <h2 class="display-6 fw-bold mb-5" style="margin-bottom: 0">
          <span class="underline pb-2"><strong>Join BookMyDoctor</strong></span>
        </h2>

        <form class="needs-validation" method="post" data-bs-theme="light" novalidate="">

          <div class="mb-3 form-floating">
            <input class="form-control" type="text" id="name" placeholder="Full Name" name="fullname" value="<?= $_POST['fullname'] ?? '' ?>" autofocus="" required="" style="border-radius: 5px" /><label class="form-label" for="fullname">Full Name</label>
            <div class="invalid-feedback">Please enter your name</div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control <?= $email_feedback ? 'is-invalid' : '' ?>" type="email" id="email" name="email" placeholder="Email" value="<?= $_POST['email'] ?? '' ?>" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" /><label class="form-label" for="email">Email Address</label>
            <div class="invalid-feedback"><?= $email_feedback ?? 'Please enter a valid email address' ?></div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" value="<?= $_POST['password'] ?? '' ?>" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters" required="" style="border-radius: 5px" />
            <label class="form-label" for="pwd">Password</label>
            <div class="invalid-feedback">
              Password must contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters
            </div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="confirm-pwd" name="password_repeat" placeholder="Repeat Password" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" style="border-radius: 5px" />
            <label class="form-label" for="confirm-pwd">Confirm Password</label>
            <div class="invalid-feedback">Passwords do not match!</div>
          </div>

          <script>
            const password = document.getElementById("pwd");
            const confirmPassword = document.getElementById("confirm-pwd");

            function validatePassword() {
              if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match!");
              } else {
                confirmPassword.setCustomValidity("");
              }
            }

            password.onchange = validatePassword;
            confirmPassword.onkeyup = validatePassword;
          </script>

          <div class="mb-3 form-floating">
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Phone Number" value="<?= $_POST['phone'] ?? '' ?>" autofocus="" required="" minlength="10" maxlength="10" style="border-radius: 5px" /><label class="form-label">Phone</label>
            <div class="invalid-feedback">
              Please enter a valid phone number
            </div>
          </div>

          <div class="mb-3 form-floating">
            <select class="form-select" id="specialization" name="specialization" autofocus="" required="" style="border-radius: 5px">
              <option <?= !isset($_POST['specialization']) ? 'selected' : '' ?> value="">Select your specialization</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Dentist' ? 'selected' : '' ?>>Dentist</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Gynecologist/Obstetrician' ? 'selected' : '' ?>>Gynecologist/Obstetrician</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Dietitian/Nutrition' ? 'selected' : '' ?>>Dietitian/Nutrition</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Physiotherapist' ? 'selected' : '' ?>>Physiotherapist</option>
              <option <?= ($_POST['specialization'] ?? '') == 'General Surgeon' ? 'selected' : '' ?>>General Surgeon</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Orthopedist' ? 'selected' : '' ?>>Orthopedist</option>
              <option <?= ($_POST['specialization'] ?? '') == 'General Physician' ? 'selected' : '' ?>>General Physician</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Pediatrician' ? 'selected' : '' ?>>Pediatrician</option>
              <option <?= ($_POST['specialization'] ?? '') == 'Gastroenterologist' ? 'selected' : '' ?>>Gastroenterologist</option>
            </select>
            <label class="form-label" for="specialization">Specialization</label>
            <div class="invalid-feedback">
              Please select your Specialization
            </div>
          </div>

          <div class="mb-3 form-floating">
            <select class="form-select" id="degree" required="" autofocus="" name="degree" style="border-radius: 5px">
              <option <?= !isset($_POST['degree']) ? 'selected' : '' ?> value="">Select your degree</option>
              <option <?= ($_POST['degree'] ?? '') == 'MBBS' ? 'selected' : '' ?>>MBBS</option>
              <option <?= ($_POST['degree'] ?? '') == 'MS' ? 'selected' : '' ?>>MS</option>
              <option <?= ($_POST['degree'] ?? '') == 'MD' ? 'selected' : '' ?>>MD</option>
              <option <?= ($_POST['degree'] ?? '') == 'Bachelor of Dental Surgery (BDS)' ? 'selected' : '' ?>>Bachelor of Dental Surgery (BDS)</option>
              <option <?= ($_POST['degree'] ?? '') == 'Master of Dental Surgery (MDS)' ? 'selected' : '' ?>>Master of Dental Surgery (MDS)</option>
              <option <?= ($_POST['degree'] ?? '') == 'Bachelor of Physiotherapy (BPT)' ? 'selected' : '' ?>>Bachelor of Physiotherapy (BPT)</option>
              <option <?= ($_POST['degree'] ?? '') == 'Master of Physiotherapy (MPT)' ? 'selected' : '' ?>>Master of Physiotherapy (MPT)</option>
              <option <?= ($_POST['degree'] ?? '') == 'BSc' ? 'selected' : '' ?>>BSc</option>
              <option <?= ($_POST['degree'] ?? '') == 'MSc' ? 'selected' : '' ?>>MSc</option>
            </select><label class="form-label" for="degree">Degree</label>
            <div class="invalid-feedback">Please select your Degree</div>
          </div>

          <div class="mb-3 form-floating">
            <input class="form-control" type="number" id="experience" name="experience" placeholder="Years of Experience" value="<?= $_POST['experience'] ?? '' ?>" required="" style="border-radius: 5px" /><label class="form-label" for="experience">Experience (years)</label>
            <div class="invalid-feedback">
              Please enter your years of experience
            </div>
          </div>

          <div class="mb-3 form-floating">
            <select class="form-select" id="gender" name="gender" autofocus="" required="" style="border-radius: 5px">
              <option <?= !isset($_POST['gender']) ? 'selected' : '' ?> value="">Select your Gender</option>
              <option <?= isset($_POST['gender']) && $_POST['gender'] == 'Male' ? 'selected' : '' ?> value="Male">Male</option>
              <option <?= isset($_POST['gender']) && $_POST['gender'] == 'Female' ? 'selected' : '' ?> value="Female">Female</option>
              <option <?= isset($_POST['gender']) && $_POST['gender'] == 'Other' ? 'selected' : '' ?> value="Other">Other</option>
            </select><label class="form-label" for="gender">Gender</label>
            <div class="invalid-feedback">
              Please select your Gender
            </div>
          </div>

          <div class="mb-5 mt-5">
            <button class="btn btn-primary shadow rounded-pill" type="submit">
              Create account
            </button>
          </div>

        </form>

        <p class="text-muted">
          Have an account?
          <a href="login.php">Log in&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <line x1="15" y1="16" x2="19" y2="12"></line>
              <line x1="15" y1="8" x2="19" y2="12"></line>
            </svg></a>&nbsp;
        </p>

      </div>
    </div>
  </div>
</section>


<?php include_once "includes/footer.php" ?>
