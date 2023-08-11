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

    // Validate the gender input against an array of valid values
    // Why? Because the data type is enum in the database.
    $valid_genders = array('Male', 'Female', 'Other');
    if (!in_array($gender, $valid_genders)) {
      $gender = 'Other';
    }

    $response = $db->createUser($fullname, $email, $password, $phone, $dob, $gender);
    if ($response === false) {
      header("Location: signup.php?error=1");
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

      <div class="col-md-5 col-xl-4 text-center text-md-start">
        <h2 class="display-6 fw-bold" style="margin-bottom: 0">
          <span class="underline pb-1"><strong>Sign up</strong></span>
        </h2>

        <p class="text-muted mb-5 mt-3">
          Are you a doctor?
          <a href="join.php">Register here&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <line x1="15" y1="16" x2="19" y2="12"></line>
              <line x1="15" y1="8" x2="19" y2="12"></line>
            </svg></a>&nbsp;
        </p>

        <form method="post" data-bs-theme="light" class="needs-validation" novalidate>

          <div class="mb-3 form-floating">
            <input class="form-control" type="text" id="name" placeholder="Full Name" name="fullname" value="<?= $_POST['fullname'] ?? '' ?>" autofocus="" required="" style="border-radius: 5px" />
            <label class="form-label" for="fullname">Full Name</label>
            <div class="invalid-feedback">Please enter your name</div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control <?= $email_feedback ? 'is-invalid' : '' ?>" type="email" id="email" name="email" placeholder="Email" value="<?= $_POST['email'] ?? '' ?>" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" />
            <label class="form-label" for="email">Email Address</label>
            <div class="invalid-feedback"><?= $email_feedback ?? 'Please enter a valid email address' ?></div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" value="<?= $_POST['password'] ?? '' ?>" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters" required="" style="border-radius: 5px" />
            <label class="form-label" for="pwd">Password</label>
            <div class="invalid-feedback">Password must contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters</div>
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
            <div class="invalid-feedback">Please enter a valid phone number</div>
          </div>

          <div class="mb-3 form-floating">
            <input class="form-control" type="date" name="dob" value="<?= $_POST['dob'] ?? '' ?>" required="" max="<?= date('Y-m-d') ?>" style="border-radius: 5px" />
            <label class="form-label">Date of Birth</label>
            <div class="invalid-feedback">Please enter your Date of Birth</div>
          </div>

          <div class="mb-3 form-floating">
            <select class="form-select" id="gender" name="gender" autofocus="" required="" style="border-radius: 5px">
              <option value="" <?= (!isset($_POST['gender'])) ? 'selected' : '' ?>>Select your Gender</option>
              <option value="Male" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
              <option value="Female" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
              <option value="Other" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
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
