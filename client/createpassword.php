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
  if (isset($_SESSION['users_id'])) {
    header("Location: main.php");
  }
  ?>

  <script>
    if(localStorage.getItem('createpassword') != 'true') {
      window.location.href = 'login.php';
    }
  </script>

  <div class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #116736; color: white;">
      <div class="container-fluid">
        <img class="logo" src="assets/img/isu_seal.png" style="height:60px;">
        <span class="top-bar-title ms-4 me-5">ISU E-counselling</span>
      </div>
    </nav>

    <div class="main mt-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
        <span class="cen-title">Create Password</span>
        <span class="h2 mt-3 cen-title">Step 3/3</span>
        <div class="mt-4 d-flex flex-column">
          <div class=" d-flex flex-column">
            <span class="m-label mt-3">Password</span>
            <input id="password" type="password" class="m-input" autocomplete="off">

            <span class="m-label mt-3">Confirm Password</span>
            <input id="confirmPassword" type="password" class="m-input" autocomplete="off">
          </div>
        </div>
        <button id="btnSave" class="submit mt-4 mb-5" onclick="btnSave()">Finish Signup</button>
      </div>
    </div>
  </div>
  <script>
    function btnSave() {
      var formData = new FormData();

      var firstName = localStorage.getItem('firstName');
      var lastName = localStorage.getItem('lastName');
      var email = localStorage.getItem('email');
      var phone = localStorage.getItem('phone');
      var age = localStorage.getItem('age');

      var studentID = localStorage.getItem('studentID');
      var college = localStorage.getItem('college');
      var course = localStorage.getItem('course');
      var year = localStorage.getItem('year');
      var semester = localStorage.getItem('semester');

      var password = $('#password').val();
      var confirmPassword = $('#confirmPassword').val();

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

      formData.append("password", password);
      formData.append("confirmPassword", confirmPassword);

      formData.append("submit", 'save');

      $.ajax({
        url: "includes/signup.inc.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          //alert('uploading');

          $('#btnSave').text('Loading...');
          $('#btnSave').prop('disabled', true);
        },
        success: function(data) {
          //alert('uploaded');

          if(data == "empty") {
            Swal.fire({
                icon: 'error',
                text: 'Fill empty field',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Finish Signup');
            $('#btnSave').prop('disabled', false);
          }
          else if(data == "password") {
            Swal.fire({
                icon: 'error',
                text: 'Password do not match',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Finish Signup');
            $('#btnSave').prop('disabled', false);
          }
          else if (data == "success") {
            localStorage.clear();
            window.location.href = 'login.php';
          }
        }
      });
    }
  </script>
</body>
</html>