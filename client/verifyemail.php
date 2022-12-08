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

  <script>
    if(localStorage.getItem('verifyemail') != 'true') {
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
        <span class="cen-title">Verify your email</span>
        <span class="h2 mt-3 cen-title">Step 2/3</span>
        <div class="mt-4 d-flex flex-column">
          <div class=" d-flex flex-column">
            <span class="m-label mt-3">Enter One-Time-Password</span>
            <input id="otp" type="text" class="m-input">
          </div>
        </div>
        <button id="btnNext" class="submit mt-4 mb-5" onclick="btnNext()">Next</button>
      </div>
    </div>
  </div>

  <script>
    function btnNext() {
      var formData = new FormData();

      var otp = $('#otp').val();

      formData.append("otp", otp);
 
      formData.append("submit", 'next2');

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
          else if(data == "otp") {
            Swal.fire({
                icon: 'error',
                text: 'Wrong OTP Pin',
                confirmButtonColor: '#16a085',
            });

            $('#btnNext').text('Next');
            $('#btnNext').prop('disabled', false);
          }
          else if (data == "success") {
            localStorage.setItem('createpassword', 'true');

            window.location.href = 'createpassword.php';
          }
        }
      });
    }
  </script>
</body>
</html>