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
            <a href='includes/logout.inc.php'><button type='button' class='btn me-4 btn-secondary pr-4'>Logout</button></a>
            <a href='deleteaccount.php'><button type='button' class='btn btn-danger pr-4'>Delete Account</button></a>
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
          <div  class="mt-4 d-flex justify-content-around reg-forms">
            <div class=" d-flex flex-column reg-forms-col-1"> 
              <span class="m-label">First Name</span>
              <input id="firstName" type="text" class="m-input" value="<?php echo "$users_firstname"; ?>">
  
              <span class="m-label mt-3">Last Name</span>
              <input id="lastName" type="text" class="m-input" value="<?php echo "$users_lastname"; ?>">
  
              <span class="m-label mt-3 ">Email Address</span>
              <input id="email" type="text" disabled class="m-input" value="<?php echo "$users_email"; ?>">
  
              <span class="m-label mt-3">Phone Number</span>
              <input id="phone" type="text" class="m-input" value="<?php echo "$users_phone"; ?>">
              
              <span class="m-label mt-3">Age</span>
              <input id="age" type="tel" class="m-input" value="<?php echo "$users_age"; ?>">
            </div>
  
            <div class=" d-flex flex-column reg-forms-col-2">
              <span class="m-label">Student ID</span>
              <input id="studentID" type="text" class="m-input" value="<?php echo "$users_student_id"; ?>">
  
              <span class="m-label mt-3">College</span>
              <select id="college" type="text" class="m-input">
                <option hidden><?php echo "$users_college"; ?></option>
                <option value="CAS">CAS</option>
                <option value="CBM">CBM</option>
                <option value="CCSICT">CCSICT</option>
                <option value="CCJE">CCJE</option>
                <option value="SAS">SAS</option>
              </select>
  
              <span class="m-label mt-3">Course</span>
              <select id="course" type="text" class="m-input">
                <option hidden><?php echo "$users_course"; ?></option>
              </select>
  
              <span class="m-label mt-3">Year Level</span>
              <select id="year" type="text" class="m-input">
                <option hidden><?php echo "$users_year"; ?></option>
                <option value="1st">1st Year</option>
                <option value="2nd">2nd Year</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>
              </select>

              <span class="m-label mt-3">Semester</span>
              <select id="semester" type="text" class="m-input">
                <option hidden><?php echo "$users_semester"; ?></option>
                <option value="1st">1st Sem</option>
                <option value="2nd">2nd Sem</option>
              </select>
            </div>
          </div>
        </div>
        <button id="btnUpdate" class="submit mt-5" onclick="btnUpdate()">Save changes</button>
      </div>
    </div>
  </div>

  <script>
    $("#college").change(function() {
      if($("#college").val() == "CAS") {
        $("#course").html("");
      }
      else if ($("#college").val() == "CBM") {
        $("#course").html("");
      }
      else if ($("#college").val() == "CCSICT") {
        $("#course").html("<option>BSIT</option><option>BSCS</option>");
      }
      else if ($("#college").val() == "CCJE") {
        $("#course").html("");
      }
      else if ($("#college").val() == "SAS") {
        $("#course").html("");
      }
    });

    function btnUpdate() {
      var formData = new FormData();

      var firstName = $('#firstName').val();
      var lastName = $('#lastName').val();
      var phone = $('#phone').val();
      var age = $('#age').val();

      var studentID = $('#studentID').val();
      var college = $('#college').val();
      var course = $('#course').val();
      var year = $('#year').val();
      var semester = $('#semester').val();

      formData.append("firstName", firstName);
      formData.append("lastName", lastName);
      formData.append("phone", phone);
      formData.append("age", age);

      formData.append("studentID", studentID);
      formData.append("college", college);
      formData.append("course", course);
      formData.append("year", year);
      formData.append("semester", semester);
 
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

            $('#btnUpdate').text('Loading...');
            $('#btnUpdate').prop('disabled', true);
          },
          success:function(data) {
            //alert('uploaded');

            if(data == "empty") {
              Swal.fire({
                  icon: 'error',
                  text: 'Fill empty field',
                  confirmButtonColor: '#16a085',
              });

              $('#btnUpdate').text('Save changes');
              $('#btnUpdate').prop('disabled', false);
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