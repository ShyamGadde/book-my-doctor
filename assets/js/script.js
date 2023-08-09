// Responsive Navbar
(function () {
  "use strict"; // Start of use strict

  var mainNav = document.querySelector("#mainNav");

  if (mainNav) {
    // Collapse Navbar
    var collapseNavbar = function () {
      var scrollTop =
        window.pageYOffset !== undefined
          ? window.pageYOffset
          : (
              document.documentElement ||
              document.body.parentNode ||
              document.body
            ).scrollTop;

      if (scrollTop > 100) {
        mainNav.classList.add("navbar-shrink");
      } else {
        mainNav.classList.remove("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    collapseNavbar();
    // Collapse the navbar when page is scrolled
    document.addEventListener("scroll", collapseNavbar);
  }
})(); // End of use strict

// Form validation
(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// Submit form on sort change
(function () {
  "use strict"; // Start of use strict

  document.querySelector("#sort-field").addEventListener("change", function () {
    this.form.submit();
  });
})(); // End of use strict

// Persist filter and sort values across page loads
(function () {
  "use strict"; // Start of use strict

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
})(); // End of use strict
