<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fill information</title>

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
  //start session
  session_start();
  //check session
  if(isset($_SESSION['users_id'])) {
    header("Location: main.php");
  }
  ?>

  <div class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #116736; color: white;">
      <div class="container-fluid">
        <img class="logo" src="assets/img/isu_seal.png" style="height:60px;">
        <span class="top-bar-title ms-4 me-5">ISU E-counselling</span>
      </div>
    </nav>

    <div class="main mt-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
        <span class="cen-title">Fill all the information below to continue on making your account.</span>
        <span class="h2 mt-3 cen-title">Step 1/3</span>
        <div class="mt-4 d-flex flex-column">

          <div class="mt-4 d-flex justify-content-around reg-forms">
            <div class=" d-flex flex-column reg-forms-col-1">
              <span class="m-label">First Name <strong class="required">*</strong></span>
              <input id="firstName" type="text" class="m-input">

              <span class="m-label mt-3">Last Name <strong class="required">*</strong></span>
              <input id="lastName" type="text" class="m-input">

              <span class="m-label mt-3">Email Address <strong class="required">*</strong></span>
              <input id="email" type="text" class="m-input">

              <span class="m-label mt-3">Phone Number <strong class="required">*</strong></span>
              <input id="phone" type="text" class="m-input">

              <span class="m-label mt-3">Age <strong class="required">*</strong></span>
              <input id="age" type="tel" class="m-input">
            </div>

            <div class=" d-flex flex-column reg-forms-col-2">
              <span class="m-label">Student ID <strong class="required">*</strong></span>
              <input id="studentID" type="text" class="m-input">

              <span class="m-label mt-3">College <strong class="required">*</strong></span>
              <select id="college" type="text" class="m-input">
                <option value="" hidden>--Select College--</option>
                <option value="CAS">CAS</option>
                <option value="CBM">CBM</option>
                <option value="CCSICT">CCSICT</option>
                <option value="CCJE">CCJE</option>
                <option value="SAS">SAS</option>
              </select>

              <span class="m-label mt-3">Course <strong class="required">*</strong></span>
              <select id="course" type="text" class="m-input">
                <option value="" hidden>--Select Course--</option>
              </select>

              <span class="m-label mt-3">Year Level <strong class="required">*</strong></span>
              <select id="year" type="text" class="m-input">
                <option value="1st">1st Year</option>
                <option value="2nd">2nd Year</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>
              </select>

              <span class="m-label mt-3">Semester <strong class="required">*</strong></span>
              <select id="semester" type="text" class="m-input">
                <option value="1st">1st Sem</option>
                <option value="2nd">2nd Sem</option>
              </select>
            </div>
          </div>
        </div>
        <button id="btnNext" class="submit mt-4 mb-5" onclick="btnNext()">Next</button>
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

    function btnNext() {
      var formData = new FormData();

      var firstName = $('#firstName').val();
      var lastName = $('#lastName').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var age = $('#age').val();

      var studentID = $('#studentID').val();
      var college = $('#college').val();
      var course = $('#course').val();
      var year = $('#year').val();
      var semester = $('#semester').val();

      formData.append("firstName", firstName);
      formData.append("lastName", lastName);
      formData.append("email", email);
      formData.append("phone", phone);
      formData.append("age", age);

      formData.append("studentID", studentID);
      formData.append("college", college);
      formData.append("course", course);
      formData.append("year", year);
      formData.append("semester", semester);
 
      formData.append("submit", 'next1');

      $.ajax({
        url: "includes/signup.inc.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          //alert('uploading');

          $('#btnNext').text('Loading...');
          $('#btnNext').prop('disabled', true);
        },
        success: function(data) {
          //alert('uploaded');

          if(data == "empty") {
            Swal.fire({
                icon: 'error',
                text: 'Fill empty field',
                confirmButtonColor: '#16a085',
            });

            $('#btnNext').text('Next');
            $('#btnNext').prop('disabled', false);
          }
          else if(data == "email1") {
            Swal.fire({
                icon: 'error',
                text: 'Invalid Email',
                confirmButtonColor: '#16a085',
            });

            $('#btnNext').text('Next');
            $('#btnNext').prop('disabled', false);
          }
          else if(data == "email2") {
            Swal.fire({
                icon: 'error',
                text: 'Email already exist',
                confirmButtonColor: '#16a085',
            });

            $('#btnNext').text('Next');
            $('#btnNext').prop('disabled', false);
          }
          else if (data == "success") {
            $("#college").html("<option value='' hidden>--Select College--</option>");
            $("#course").html("<option value='' hidden>--Select Course--</option>");

            localStorage.setItem('firstName', firstName);
            localStorage.setItem('lastName', lastName);
            localStorage.setItem('email', email);
            localStorage.setItem('phone', phone);
            localStorage.setItem('age', age);

            localStorage.setItem('studentID', studentID);
            localStorage.setItem('college', college);
            localStorage.setItem('course', course);
            localStorage.setItem('year', year);
            localStorage.setItem('semester', semester);

            localStorage.setItem('verifyemail', 'true');

            window.location.href = 'verifyemail.php';
          }
        }
      });
    }
  </script>
</body>
</html>