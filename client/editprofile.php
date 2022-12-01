<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit profile</title>

  <link rel="stylesheet" href="assets/css/styles.css" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- sweetalert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <?php
  include "includes/db.inc.php";
  include "includes/loginverify.inc.php";

  //check session
  if (!isset($_SESSION['users_id'])) {
      header("Location: login.php");
  }
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

    <div class="main mt-3">
      <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
        <div style="text-align:center;">
          <span class="cen-title">Edit profile</span>
        </div>

        <div class="mt-4 d-flex flex-column">
          <span class="m-label">Full Name</span>
          <input id="fullname" type="text" class="m-input" placeholder="Last name, First name, Middle initial" value="<?php echo "$users_fullname"; ?>">

          <span class="m-label mt-3">College</span>
          <input id="college" type="text" class="m-input" placeholder="ex. CCSICT, IAT, SAC" value="<?php echo "$users_college"; ?>">

          <span class="m-label mt-3">Course</span>
          <input id="course" type="text" class="m-input" placeholder="ex. BSIT, BSE, HRM" value="<?php echo "$users_course"; ?>">

          <span class="m-label mt-3">Year</span>
          <select id="year" type="text" class="m-input">
            <option hidden><?php echo "$users_year"; ?></option>
            <option value="1st">1st Year</option>
            <option value="2nd">2nd Year</option>
            <option value="3rd">3rd Year</option>
            <option value="4th">4th Year</option>
          </select>

          <button class="submit" onclick="btnUpdate()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      function btnUpdate() {
        var formData = new FormData();

        var fullname = $('#fullname').val();
        var college = $('#college').val();
        var course = $('#course').val();
        var year = $('#year').val();

        formData.append("fullname", fullname);
        formData.append("college", college);
        formData.append("course", course);
        formData.append("year", year);
        formData.append("submit", '1');

        $.ajax({
            url:"includes/editprofile.inc.php",
            method:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function() {
              //alert('uploading');
            },
            success:function(data) {
              //alert('uploaded');

              if(data == "empty") {
                Swal.fire({
                    icon: 'error',
                    text: 'Fill empty field',
                    confirmButtonColor: '#16a085',
                });
              }
              else if (data == "success") {
                window.location.href = 'profile.php';
              }
            }
        });
      }
  </script>
</body>
</html>