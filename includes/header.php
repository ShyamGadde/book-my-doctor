<?php
session_start();
$current_page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>BookMyDoctor</title>
  <link rel="canonical" href="https://bookmydoctor.infinityfreeapp.com/" />
  <meta property="og:url" content="https://bookmydoctor.infinityfreeapp.com/" />
  <meta name="twitter:description" content="BookMyDoctor lets you book an appointment with your preferred doctor online with little to no hassle. Whether you need a consultation, a check-up, or a treatment, you can find the right doctor for your needs and schedule a visit at your convenience. No more waiting in long queues, no more wasting time on phone calls, no more hassle. Just book, visit, and get well." />
  <meta name="twitter:image" content="https://bookmydoctor.infinityfreeapp.com/assets/img/bmd_icon.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta property="og:type" content="website" />
  <meta name="description" content="BookMyDoctor lets you book an appointment with your preferred doctor online with little to no hassle. Whether you need a consultation, a check-up, or a treatment, you can find the right doctor for your needs and schedule a visit at your convenience. No more waiting in long queues, no more wasting time on phone calls, no more hassle. Just book, visit, and get well." />
  <meta property="og:image" content="https://bookmydoctor.infinityfreeapp.com/assets/img/bmd_icon.png" />
  <meta name="twitter:title" content="BookMyDoctor" />
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "BookMyDoctor",
      "url": "https://bookmydoctor.infinityfreeapp.com"
    }
  </script>
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
  <link rel=" manifest" href="manifest.json" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+SC&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata&amp;display=swap" />
  <link rel="stylesheet" href="assets/css/aos.min.css" />
  <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css" />
</head>

<body style="min-height: 100vh">

  <!-- <pre style="margin-top: 80px;">
    <?= var_dump($_POST) ?>
    <?= var_dump($_GET) ?>
  </pre> -->

  <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/"><span style="font-family: Armata, sans-serif">BookMyDoctor</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
        <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link <?= $current_page === "index" ? "active" : "" ?>" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $current_page === "find-doctor" ? "active" : "" ?>" href="find-doctor.php">Find Doctors</a>
          </li>

          <?php if (($_SESSION['role'] ?? '') === 'user') : ?>
            <li class="nav-item">
              <a class="nav-link <?= $current_page === "my-appointments" ? "active" : "" ?>" href="my-appointments.php">My Appointments</a>
            </li>
          <?php endif; ?>

          <?php if (($_SESSION['role'] ?? '') === 'doctor') : ?>
            <li class="nav-item">
              <a class="nav-link <?= $current_page === "dashboard" ? "active" : "" ?>" href="dashboard.php">Dashboard</a>
            </li>
          <?php endif; ?>
        </ul>
        <div class="theme-switcher dropdown mb-2 mb-md-0 me-3">
          <a class="d-block dropdown-toggle active" aria-expanded="false" data-bs-toggle="dropdown" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-sun-fill mb-1">
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

        <?php if (empty($_SESSION['role'])) : ?>
          <a class="btn btn-primary shadow" role="button" href="login.php" style="border-radius: 5px">Login</a>
        <?php else : ?>
          <a class="btn btn-primary shadow" role="button" href="logout.php" style="border-radius: 5px">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
