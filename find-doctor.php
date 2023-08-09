<?php include_once "includes/header.php" ?>


<div style="margin-top: 80px; background: #24285b">
  <div class="container">
    <form id="filter-form">
      <div class="row py-2">
        <div class="col p-0 mt-0 mb-2 mb-md-0 d-flex align-items-center justify-content-between col-12 col-md-6">
          <div class="dropdown">
            <button class="btn btn-outline-info dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="border-radius: 5px;">
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
                    <option value="M">Male</option>
                    <option value="F">Female</option>
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
              <span class="input-group-text" style="
                      border-top-left-radius: 5px;
                      border-bottom-left-radius: 5px;
                    ">Sort by:</span><select id="sort-field" class="form-select" name="sort-field" style="
                      border-top-right-radius: 5px;
                      border-bottom-right-radius: 5px;
                    ">
                <option value="relevance" selected="">Relevance</option>
                <option value="name">Name</option>
                <option value="experience">Experience</option>
              </select>
            </div>
          </div>

        </div>

        <div class="col p-0 m-0 col-12 col-md-6">
          <!-- Search form -->
          <div class="d-flex align-items-center justify-content-center">
            <input class="form-control ms-md-auto w-75" type="search" name="search" placeholder="Search" style="border-radius: 5px" />
            <button class="btn btn-primary btn-secondary px-4 ms-2" type="submit" style="border-radius: 10px">
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

<section class="mt-5">
  <div class="container text-center">
    <div class="row row-cols-md-2 g-4">
      <div class="col">
        <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
          <div>
            <img class="rounded-circle" src="https://randomuser.me/api/portraits/women/0.jpg" />
          </div>
          <div class="card-body">
            <h4 class="card-title">Dr. Jane Doe</h4>
            <h6 class="text-muted card-subtitle mb-2">
              General Physician, MD
            </h6>
            <h6 class="text-muted card-subtitle mb-2">
              18 years of experience overall
            </h6>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-info shadow rounded-pill" href="tel:#">Call</a><button class="btn btn-primary rounded-pill shadow" type="button" data-bs-toggle="modal" data-bs-target="#modal-1">
              Book Appointment
            </button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
          <div>
            <img class="rounded-circle" src="https://randomuser.me/api/portraits/women/0.jpg" />
          </div>
          <div class="card-body">
            <h4 class="card-title">Dr. Jane Doe</h4>
            <h6 class="text-muted card-subtitle mb-2">
              General Physician, MD
            </h6>
            <h6 class="text-muted card-subtitle mb-2">
              18 years of experience overall
            </h6>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-info shadow rounded-pill" href="#">Call</a><a class="btn btn-primary shadow rounded-pill" href="#">Book Appointment</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
          <div>
            <img class="rounded-circle" src="https://randomuser.me/api/portraits/women/0.jpg" />
          </div>
          <div class="card-body">
            <h4 class="card-title">Dr. Jane Doe</h4>
            <h6 class="text-muted card-subtitle mb-2">
              General Physician, MD
            </h6>
            <h6 class="text-muted card-subtitle mb-2">
              18 years of experience overall
            </h6>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-info shadow rounded-pill" href="#">Call</a><a class="btn btn-primary shadow rounded-pill" href="#">Book Appointment</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
          <div>
            <img class="rounded-circle" src="https://randomuser.me/api/portraits/women/0.jpg" />
          </div>
          <div class="card-body">
            <h4 class="card-title">Dr. Jane Doe</h4>
            <h6 class="text-muted card-subtitle mb-2">
              General Physician, MD
            </h6>
            <h6 class="text-muted card-subtitle mb-2">
              18 years of experience overall
            </h6>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-info shadow rounded-pill" href="#">Call</a><a class="btn btn-primary shadow rounded-pill" href="#">Book Appointment</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 border-dark shadow pt-4" data-aos="fade-up" style="border-radius: 5px">
          <div>
            <img class="rounded-circle" src="https://randomuser.me/api/portraits/women/0.jpg" />
          </div>
          <div class="card-body">
            <h4 class="card-title">Dr. Jane Doe</h4>
            <h6 class="text-muted card-subtitle mb-2">
              General Physician, MD
            </h6>
            <h6 class="text-muted card-subtitle mb-2">
              18 years of experience overall
            </h6>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-info shadow rounded-pill" href="#">Call</a><a class="btn btn-primary shadow rounded-pill" href="#">Book Appointment</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php if (($_SESSION['role'] ?? '') === 'user') : ?>
  <div class="modal fade" role="dialog" tabindex="-1" id="modal-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content rounded-4">
        <div class="modal-header">
          <h4 class="modal-title">Pick a Date and Time</h4>
          <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
        </div>
        <form action="book-appointment.php" method="post" class="needs-validation" novalidate>
          <div class="modal-body">
            <div class="input-group my-3">
              <span class="input-group-text" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Date</span>
              <input class="form-control" type="date" name="date" required="" min="<?= date('Y-m-d'); ?>" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;" />
              <div class="invalid-feedback">Please a choose a date</div>
            </div>
            <div class="input-group my-3">
              <span class="input-group-text" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">Time</span>
              <input class="form-control" type="time" name="date" required="" min="10:00" max="22:00" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;" />
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

<?php else : ?>
  <div class="modal fade" role="dialog" tabindex="-1" id="modal-1" data-bs-backdrop="static">
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
