<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>

    <link rel="stylesheet" href="assets/css/styles.css" />
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
      </div>
    </nav>

    <div class="main mt-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">  
        <span class="cen-title">Delete Account</span>
        <span class=" mt-3 cen-title">You are about to delete your account. Please enter your password to continue.</span>
        <div class="mt-4 d-flex flex-column">
          <div class=" d-flex flex-column"> 
            <span class="m-label mt-3">Password</span>
            <input id="otp" type="text" class="m-input">
          </div>
        </div>

        <button class="btn btn-danger mt-4" >Delete account</button>
        <button class="btn btn-secondary mt-3 mb-5" >Cancel</button>
      </div>
    </div>
  </div>

  <script>
  </script>
</body>
</html>