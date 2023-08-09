<?php include_once "includes/header.php" ?>


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


<?php include_once "includes/footer.php" ?>
