<pre style="margin-top: 80px">
  <?= var_dump($_POST) ?>
</pre>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Sign up - BookMyDoctor</title>
  <link rel="canonical" href="https://bookmydoctor.infinityfreeapp.com/signup.php" />
  <meta property="og:url" content="https://bookmydoctor.infinityfreeapp.com/signup.php" />
  <meta name="twitter:description" content="BookMyDoctor lets you book an appointment with your preferred doctor online with little to no hassle. Whether you need a consultation, a check-up, or a treatment, you can find the right doctor for your needs and schedule a visit at your convenience. No more waiting in long queues, no more wasting time on phone calls, no more hassle. Just book, visit, and get well." />
  <meta name="twitter:image" content="https://bookmydoctor.infinityfreeapp.com/assets/img/bmd_icon.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta property="og:type" content="website" />
  <meta name="description" content="BookMyDoctor lets you book an appointment with your preferred doctor online with little to no hassle. Whether you need a consultation, a check-up, or a treatment, you can find the right doctor for your needs and schedule a visit at your convenience. No more waiting in long queues, no more wasting time on phone calls, no more hassle. Just book, visit, and get well." />
  <meta property="og:image" content="https://bookmydoctor.infinityfreeapp.com/assets/img/bmd_icon.png" />
  <meta name="twitter:title" content="BookMyDoctor" />
  <script>
    (function() {
      // JavaScript snippet handling Dark/Light mode switching

      const getStoredTheme = () => localStorage.getItem("theme");
      const setStoredTheme = (theme) => localStorage.setItem("theme", theme);
      const forcedTheme = document.documentElement.getAttribute(
        "data-bss-forced-theme"
      );

      const getPreferredTheme = () => {
        if (forcedTheme) return forcedTheme;

        const storedTheme = getStoredTheme();
        if (storedTheme) {
          return storedTheme;
        }

        const pageTheme =
          document.documentElement.getAttribute("data-bs-theme");

        if (pageTheme) {
          return pageTheme;
        }

        return window.matchMedia("(prefers-color-scheme: dark)").matches ?
          "dark" :
          "light";
      };

      const setTheme = (theme) => {
        if (
          theme === "auto" &&
          window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
          document.documentElement.setAttribute("data-bs-theme", "dark");
        } else {
          document.documentElement.setAttribute("data-bs-theme", theme);
        }
      };

      setTheme(getPreferredTheme());

      const showActiveTheme = (theme, focus = false) => {
        const themeSwitchers = [].slice.call(
          document.querySelectorAll(".theme-switcher")
        );

        if (!themeSwitchers.length) return;

        document
          .querySelectorAll("[data-bs-theme-value]")
          .forEach((element) => {
            element.classList.remove("active");
            element.setAttribute("aria-pressed", "false");
          });

        for (const themeSwitcher of themeSwitchers) {
          const btnToActivate = themeSwitcher.querySelector(
            '[data-bs-theme-value="' + theme + '"]'
          );

          if (btnToActivate) {
            btnToActivate.classList.add("active");
            btnToActivate.setAttribute("aria-pressed", "true");
          }
        }
      };

      window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", () => {
          const storedTheme = getStoredTheme();
          if (storedTheme !== "light" && storedTheme !== "dark") {
            setTheme(getPreferredTheme());
          }
        });

      window.addEventListener("DOMContentLoaded", () => {
        showActiveTheme(getPreferredTheme());

        document
          .querySelectorAll("[data-bs-theme-value]")
          .forEach((toggle) => {
            toggle.addEventListener("click", (e) => {
              e.preventDefault();
              const theme = toggle.getAttribute("data-bs-theme-value");
              setStoredTheme(theme);
              setTheme(theme);
              showActiveTheme(theme);
            });
          });
      });
    })();
  </script>
  <link rel="icon" type="image/png" sizes="206x169" href="assets/img/bmd_fav.png" />
  <link rel="icon" type="image/png" sizes="206x169" href="assets/img/bmd_fav.png" />
  <link rel="icon" type="image/png" sizes="206x169" href="assets/img/bmd_fav.png" />
  <link rel="icon" type="image/png" sizes="206x169" href="assets/img/bmd_fav.png" />
  <link rel="icon" type="image/png" sizes="496x364" href="assets/img/bmd_icon.png" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="manifest" href="manifest.json" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+SC&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata&amp;display=swap" />
  <link rel="stylesheet" href="assets/css/aos.min.css" />
  <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css" />
</head>

<body>
  <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/"><span style="font-family: Armata, sans-serif">BookMyDoctor</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
        <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="find-doctor.html">Find Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my-appointments.html">My Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.html">Dashboard</a>
          </li>
        </ul>
        <div class="theme-switcher dropdown">
          <a class="dropdown-toggle active" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="
                padding-left: 9px;
                padding-right: 9px;
                margin-top: 10px;
                margin-bottom: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
              "><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-sun-fill mb-1">
              <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
            </svg></a>
          <div class="dropdown-menu">
            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="light"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-sun-fill opacity-50 me-2">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
              </svg>Light</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="dark"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-moon-stars-fill opacity-50 me-2">
                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
              </svg>Dark</a><a class="dropdown-item d-flex align-items-center" href="#" data-bs-theme-value="auto"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-half opacity-50 me-2">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
              </svg>Auto</a>
          </div>
        </div>
        <a class="btn btn-primary shadow" role="button" href="login.php" style="border-radius: 5px">Login</a><a class="btn btn-primary shadow" role="button" href="#" style="border-radius: 5px">Logout</a>
      </div>
    </div>
  </nav>
  <section class="py-4 py-md-5 my-5">
    <div class="container py-md-5" data-aos="fade-up">
      <div class="row">
        <div class="col-md-6 text-center d-flex">
          <img class="img-fluid w-100" src="assets/img/illustrations/register.svg" />
        </div>
        <div class="col-md-5 col-xl-4 text-center text-md-start">
          <h2 class="display-6 fw-bold" style="margin-bottom: 0">
            <span class="underline pb-1"><strong>Sign up</strong></span>
          </h2>
          <p class="text-muted mb-5 mt-3">
            Are you a doctor?
            <a href="doctor-onboarding.html">Register here&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <line x1="15" y1="16" x2="19" y2="12"></line>
                <line x1="15" y1="8" x2="19" y2="12"></line>
              </svg></a>&nbsp;
          </p>
          <form method="post" data-bs-theme="light" class="needs-validation" novalidate>
            <div class="mb-3 form-floating">
              <input class="form-control" type="text" id="name" placeholder="Full Name" name="name" autofocus="" required="" style="border-radius: 5px" />
              <label class="form-label" for="name">Full Name</label>
              <div class="invalid-feedback">Please enter your name</div>

            </div>
            <div class="mb-3 form-floating">
              <input class="shadow-sm form-control" type="email" id="email" name="email" placeholder="Email" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" />
              <label class="form-label" for="email">Email Address</label>
              <div class="invalid-feedback">Please enter a valid email address</div>

            </div>
            <div class="mb-3 form-floating">
              <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters" required="" style="border-radius: 5px" />
              <label class="form-label" for="pwd">Password</label>
              <div class="invalid-feedback">Password contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters</div>

            </div>
            <div class="mb-3 form-floating">
              <input class="shadow-sm form-control" type="password" id="confirm-pwd" name="password_repeat" placeholder="Repeat Password" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters" required="" style="border-radius: 5px" /><label class="form-label" for="confirm-pwd">Confirm Password</label>
              <div class="invalid-feedback">Password contain at least one number and one uppercase and lowercase letter, and must be between 8 to 20 characters</div>

            </div>
            <div class="mb-3 form-floating">
              <input class="form-control" type="tel" id="phone" name="phone" placeholder="Phone Number" autofocus="" required="" minlength="10" maxlength="10" style="border-radius: 5px" /><label class="form-label">Phone</label>
              <div class="invalid-feedback">Please enter a valid phone number</div>

            </div>
            <div class="mb-3 input-group" style="border-radius: 5px">
              <span class="input-group-text" style="
                    border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;
                  ">DOB</span><input class="form-control" type="date" name="dob" required="" style="
                    border-top-right-radius: 5px;
                    border-bottom-right-radius: 5px;
                  " />
              <div class="invalid-feedback">Please enter your Date of Birth</div>

            </div>
            <div class="mb-3 input-group d-flex align-items-center" style="border-radius: 5px; border: 1px solid rgb(177, 177, 188)">
              <span class="input-group-text" style="
                    border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;
                  ">Gender</span>
              <div class="form-check mx-3">
                <input class="form-check-input" type="radio" id="formCheck-1" name="gender" value="M" required="" /><label class="form-check-label" for="formCheck-1">Male</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="formCheck-2" name="gender" value="F" required="" /><label class="form-check-label" for="formCheck-2">Female</label>
              </div>
            </div>
            <div class="mb-5">
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
  <footer class="mt-auto">
    <div class="container py-4 py-lg-5">
      <hr />
      <div class="text-muted d-flex justify-content-between align-items-center pt-3">
        <p class="mb-0">Copyright © 2023 BookMyDoctor</p>
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
              </svg></a>
          </li>
          <li class="list-inline-item">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
              </svg></a>
          </li>
          <li class="list-inline-item">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
              </svg></a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/aos.min.js"></script>
  <script src="assets/js/bs-init.js"></script>
  <script src="assets/js/startup-modern.js"></script>
</body>

</html>
