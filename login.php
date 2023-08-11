<?php
session_start();

if (($_SESSION['role'] ?? '') === 'doctor') {
  header("Location: dashboard.php");
  exit();
} elseif (($_SESSION['role'] ?? '') === 'user') {
  header("Location: my-appointments.php");
  exit();
}

$auth_feedback;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  /** @var Database $db */
  $db = require_once "includes/db.php";

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $response = $db->authenticate($email, $password);

  if (!$response['valid_email']) {
    $auth_feedback = $response['feedback'];
  } else if (!$response['valid_password']) {
    $auth_feedback = $response['feedback'];
  } else {
    $_SESSION['uid'] = $response['uid'];
    $_SESSION['role'] = $response['role'];
    if ($response['role'] === 'doctor') {
      header("Location: dashboard.php");
      exit();
    } elseif ($response['role'] === 'user') {
      header("Location: my-appointments.php");
      exit();
    }
  }
}

include_once "includes/header.php"
?>


<section style="margin-top: 80px;">
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
        Your account has been created successfully. Please log in to continue.
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

  <div class="container py-md-5" data-aos="fade-up">
    <div class="row">

      <div class="col-md-6 text-center">
        <img class="img-fluid w-100" src="assets/img/illustrations/login.svg" />
      </div>

      <div class="col-md-5 col-xl-4 text-center text-md-start">

        <h2 class="display-6 fw-bold mb-5">
          <span class="underline pb-2"><strong>Login</strong><br /></span>
        </h2>

        <form method="post" data-bs-theme="light" class="needs-validation" novalidate>
          <p class="text-danger"><?= $auth_feedback ?? '' ?></p>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="email" id="email" name="email" placeholder="Email" value="<?= $email ?? '' ?>" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" /><label class="form-label" for="email">Email Address</label>
            <div class="invalid-feedback">Please enter a valid email address</div>
          </div>

          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" autofocus="" required="" style="border-radius: 5px" /><label class="form-label" for="pwd">Password</label>
            <div class="invalid-feedback">Please enter your password</div>
          </div>

          <div class="mb-5">
            <button class="btn btn-primary shadow rounded-pill" type="submit">
              Log in
            </button>

          </div>
        </form>

        <p class="text-muted">
          Don't have an account?&nbsp;<a href="signup.php">Sign up<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <line x1="15" y1="16" x2="19" y2="12"></line>
              <line x1="15" y1="8" x2="19" y2="12"></line>
            </svg></a>
        </p>

      </div>
    </div>
  </div>
</section>


<?php include_once "includes/footer.php" ?>
