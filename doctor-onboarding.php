<?php include_once "includes/header.php" ?>


<section class="py-4 py-md-5 my-5">
  <div class="container py-md-5" data-aos="fade-up">
    <div class="row">
      <div class="col-md-6 text-center">
        <img class="img-fluid w-100 align-items-center" src="assets/img/illustrations/register.svg" />
      </div>
      <div class="col-md-5 col-xl-4 text-center text-md-start">
        <h2 class="display-6 fw-bold mb-5" style="margin-bottom: 0">
          <span class="underline pb-1"><strong>Join BookMyDoctor</strong></span>
        </h2>
        <form class="needs-validation" method="post" data-bs-theme="light" novalidate="">
          <div class="mb-3 form-floating">
            <input class="form-control" type="text" id="name" placeholder="Full Name" name="name" autofocus="" required="" style="border-radius: 5px" /><label class="form-label" for="name">Full Name</label>
            <div class="invalid-feedback">Please enter your name</div>
          </div>
          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="email" id="email" name="email" placeholder="Email" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" /><label class="form-label" for="email">Email Address</label>
            <div class="invalid-feedback">
              Please enter a valid email address
            </div>
          </div>
          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and between 8 to 20 characters" required="" style="border-radius: 5px" /><label class="form-label" for="pwd">Password</label>
            <div class="invalid-feedback">
              Password must contain at least one number and one uppercase and
              lowercase letter, and must be between 8 to 20 characters
            </div>
          </div>
          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="confirm-pwd" name="password_repeat" placeholder="Repeat Password" autofocus="" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and between 8 to 20 characters" required="" style="border-radius: 5px" /><label class="form-label" for="confirm-pwd">Confirm Password</label>
            <div class="invalid-feedback">
              Password must contain at least one number and one uppercase and
              lowercase letter, and must be between 8 to 20 characters
            </div>
          </div>
          <div class="mb-3 form-floating">
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Phone Number" autofocus="" required="" minlength="10" maxlength="10" style="border-radius: 5px" /><label class="form-label">Phone</label>
            <div class="invalid-feedback">
              Please enter a valid phone number
            </div>
          </div>
          <div class="mb-3 form-floating">
            <select class="form-select" id="specialization" name="specialization" autofocus="" required="" style="border-radius: 5px">
              <option selected value="">Select your specialization</option>
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
            <div class="invalid-feedback">
              Please select your Specialization
            </div>
          </div>
          <div class="mb-3 form-floating">
            <select class="form-select" id="degree" required="" autofocus="" name="degree" style="border-radius: 5px">
              <option selected value="">Select your degree</option>
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
            <div class="invalid-feedback">Please select your Degree</div>
          </div>
          <div class="mb-3 form-floating">
            <input class="form-control" type="number" id="experience" name="experience" placeholder="Years of Experience" required="" style="border-radius: 5px" /><label class="form-label" for="experience">Experience (years)</label>
            <div class="invalid-feedback">
              Please enter your years of experience
            </div>
          </div>
          <div class="mb-3 input-group">
            <span class="input-group-text" style="
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
              ">DOB</span><input class="form-control" type="date" name="dob" required="" style="
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
              " />
            <div class="invalid-feedback">Please enter your Date of Birth</div>
          </div>

          <div class="mb-3 form-floating">
            <select class="form-select" id="gender" name="gender" autofocus="" required="" style="border-radius: 5px">
              <option selected value="">Select your Gender</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
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
