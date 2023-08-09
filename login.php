<?php include_once "includes/header.php" ?>


<section class="py-4 py-md-5 my-5">
  <div class="container py-md-5" data-aos="fade-up">
    <div class="row">
      <div class="col-md-6 text-center">
        <img class="img-fluid w-100" src="assets/img/illustrations/login.svg" />
      </div>
      <div class="col-md-5 col-xl-4 text-center text-md-start">
        <h2 class="display-6 fw-bold mb-5">
          <span class="underline pb-1"><strong>Login</strong><br /></span>
        </h2>
        <form method="post" data-bs-theme="light" class="needs-validation" novalidate>
          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="email" id="email" name="email" placeholder="Email" autofocus="" required="" pattern="^[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" style="border-radius: 5px" /><label class="form-label" for="email">Email Address</label>
            <div class="invalid-feedback">Please a valid email address</div>
          </div>
          <div class="mb-3 form-floating">
            <input class="shadow-sm form-control" type="password" id="pwd" name="password" placeholder="Password" autofocus="" required="" style="border-radius: 5px" /><label class="form-label" for="pwd">Password</label>
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