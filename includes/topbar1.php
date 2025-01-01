<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="./views/admin.php">
        <img src="./image/neust_logo.png" alt="Select your Identity" width="40" height="40" class="me-2 rounded-circle">
        <span class="fw-bold">Visitor LogBook</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <div class="dropdown ms-auto">
          <button class="btn btn-info rounded-pill" type="button" id="roleDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="roleDropdownButton">
            <li><a class="dropdown-item" href="./views/register_student_and_faculty.php">Student/Faculty</a></li>
            <!-- <li><a class="dropdown-item" href="./views/guest.php">Guest</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
