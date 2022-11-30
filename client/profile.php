<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <?php 
  include "includes/db.inc.php";
  include "includes/loginverify.inc.php";
  ?>

  <div class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #116736; color: white;">
      <div class="container-fluid">
        <img class="logo" src="assets/img/isu_seal.png" style="height:60px;">
        <span class="top-bar-title ms-4 me-5">ISU E-counselling</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="main.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="appointment.php">Appointment</a>
            </li>
          </ul>

          <div class="d-flex flex-md-row flex-wrap">
            <a href='includes/logout.inc.php'><button type='button' class='btn btn-secondary pr-4'>Logout</button></a>
          </div>
        </div>
      </div>
    </nav>

    <div class="d-flex align-items-center justify-content-center" style="height: 90vh">
      <div class="card" style="width: 28rem; padding: 20px 50px;">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h3 class="card-title" style="color: black;">Profile</h3>
            <button class="btn btn-primary" onclick="location.href='editprofile.php'">Edit</button>
          </div>

          <div class="d-flex flex-column mt-5">
            <span class="info-title">Name</span>
            <span class="info-value"><?php echo "$users_fullname"; ?></span>

            <span class="info-title mt-3">Email</span>
            <span class="info-value"><?php echo "$users_contact_email"; ?></span>

            <span class="info-title mt-3">College</span>
            <span class="info-value"><?php echo "$users_college"; ?></span>

            <span class="info-title mt-3">Course</span>
            <span class="info-value"><?php echo "$users_course"; ?></span>

            <span class="info-title mt-3">Year</span>
            <span class="info-value"><?php echo "$users_year"; ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>