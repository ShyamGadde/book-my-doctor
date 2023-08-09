<?php include_once "includes/header.php" ?>


<div style="margin-top: 80px; background: #24285b">
  <div class="container">
    <div class="row py-2 gy-2">
      <div class="col p-0 d-flex justify-content-between col-12 col-md-6">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
            Filter by&nbsp;
          </button>
          <div class="dropdown-menu">
            <form>
              <div class="mb-3 form-floating">
                <select class="form-select" id="specialization" name="specialization" autofocus="" required="" style="border-radius: 5px">
                  <option value="undefined" selected="">
                    Select your specialization
                  </option>
                  <option value="">Dentist</option>
                  <option value="">Gynecologist/Obstetrician</option>
                  <option value="">Dietitian/Nutrition</option>
                  <option value="">Physiotherapist</option>
                  <option value="">General Surgeon</option>
                  <option value="">Orthopedist</option>
                  <option value="">General Physician</option>
                  <option value="">Pediatrician</option>
                  <option value="">Gastroenterologist</option>
                </select><label class="form-label" for="specialization">Specialization</label>
              </div>
              <div class="mb-3 form-floating">
                <select class="form-select" id="degree" required="" autofocus="" name="degree" style="border-radius: 5px">
                  <option value="" selected="">Select your degree</option>
                  <option value="">MBBS</option>
                  <option value="">MS</option>
                  <option value="">MD</option>
                  <option value="">Bachelor of Dental Surgery (BDS)</option>
                  <option value="">Master of Dental Surgery (MDS)</option>
                  <option value="">Bachelor of Physiotherapy (BPT)</option>
                  <option value="">Master of Physiotherapy (MPT)</option>
                  <option value="">BSc</option>
                  <option value="">MSc</option>
                </select><label class="form-label" for="degree">Degree</label>
              </div>
              <div class="mb-3 input-group d-flex align-items-center" style="
                      border-radius: 5px;
                      border: 1px solid rgb(177, 177, 188);
                    ">
                <span class="input-group-text" style="
                        border-top-left-radius: 5px;
                        border-bottom-left-radius: 5px;
                      ">Gender</span>
                <div class="form-check mx-3">
                  <input class="form-check-input" type="radio" id="formCheck-1" name="gender" required="" /><label class="form-check-label" for="formCheck-1">Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="formCheck-2" name="gender" required="" /><label class="form-check-label" for="formCheck-2">Female</label>
                </div>
              </div>
              <input class="btn btn-primary" type="submit" />
            </form>
          </div>
        </div>
        <form class="d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text" style="
                    border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;
                  ">Sort by:</span><select class="form-select" style="
                    border-top-right-radius: 5px;
                    border-bottom-right-radius: 5px;
                  ">
              <option value="" selected="">Relevance</option>
              <option value="">Name</option>
              <option value="">Experience</option>
            </select>
          </div>
        </form>
      </div>
      <div class="col p-0 col-12 col-md-6">
        <form class="d-flex justify-content-center">
          <input class="form-control ms-md-auto w-75" type="search" name="search" placeholder="Search" style="border-radius: 5px" /><button class="btn btn-primary btn-secondary px-4 ms-2" type="submit" style="border-radius: 10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search" style="font-size: 18px">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
          </button>
        </form>
      </div>
    </div>
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
            <a class="btn btn-info shadow rounded-pill" href="#">Call</a><button class="btn btn-primary rounded-pill shadow" type="button" data-bs-toggle="modal" data-bs-target="#modal-1">
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
<div class="modal fade" role="dialog" tabindex="-1" id="modal-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h4 class="modal-title">Pick a Date and Time</h4>
        <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <input class="form-control" type="date" name="date" required="" /><input class="form-control" type="date" required="" />
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">
          Cancel</button><button class="btn btn-primary" type="button">
          Book Appointment
        </button>
      </div>
    </div>
  </div>
</div>


<?php include_once "includes/footer.php" ?>
