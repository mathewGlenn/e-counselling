<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment</title>

  <link rel="stylesheet" href="assets/css/styles.css"/>

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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="main.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="appointment.php">Appointment</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="main mt-3">
      <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
        <div style="text-align:center;">
          <span class="cen-title">Fill all the information below to book for an appointment</span>
        </div>

        <div class="mt-4 d-flex flex-column">
          <span class="m-label">Schedule of appointment</span>
          <select id="schedule" type="text" class="m-input">

          <?php
          $sql = "SELECT * FROM tblschedule;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $date = $row['schedule_date'];
              $time = $row['schedule_time'];

              $date = date('F d, Y', strtotime($date));
              $time = date("g:i A", strtotime($time));

              echo "
                <option value='$id'>$date - $time</option>
              ";
            }
          }
          else {
            echo "
              <option hidden>No available</option>
            ";
          }
          ?>
          </select>

          <span class="m-label mt-3">Meeting arrangement</span>
          <select id="arrangement" type="text" class="m-input">
            <option hidden></option>
            <option>Online</option>
            <option>Face-to-face</option>
          </select>

          <span class="m-label mt-3">Service</span>
          <select id="services" type="text" class="m-input" onchange="enableType(this)">
            <option hidden></option>
            <option value="1">Individual Inventory</option>
            <option value="2">Counselling Services</option>
            <option value="3">Information Services</option>
            <option value="4">Follow-up Services</option>
            <option value="5">Psychological Testing and Evaluation</option>
            <option value="6">Referral</option>
            <option value="7">Placement Services</option>
          </select>

          <span class="m-label mt-3 type" id="l-type">Type of counselling</span>
          <select type="text" name="types" id="types" class="m-input type" onchange="enableCase(this)">
            <option hidden></option>
            <option value="1">Individual</option>
            <option value="2">Group</option>
            <option value="3">Follow-up</option>
            <option value="4">Consultaion</option>
          </select>

          <span class="m-label mt-3 case" id="l-case">Case</span>
          <select type="text" name="cases" class="m-input case" id="cases">
            <option hidden></option>
            <option value="1">Family</option>
            <option value="2">Girl-Boy Relationship</option>
            <option value="3">Personal</option>
            <option value="4">Testing Interpretation</option>
            <option value="5">Academic</option>
            <option value="6">Interpersonal</option>
            <option value="7">Gender Sensitivity Issue</option>
            <option value="8">Cultural Differences</option>
            <option value="9">Career concern</option>
          </select>

          <span class="m-label mt-3">Additional information</span>
          <input id="additional" type="text" class="m-input">

          <button class="submit" onclick="btnSave()">Set appointment</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function enableType(answer) {
      console.log(answer.value);
      if (answer.value == 2) {
        document.getElementById('types').classList.remove('type');
        document.getElementById('l-type').classList.remove('type');
      } else {
        document.getElementById('types').classList.add('type');
        document.getElementById('cases').classList.add('case');

        document.getElementById('l-type').classList.add('type');
        document.getElementById('l-case').classList.add('case');
      }
    }

    function enableCase(answer) {
      console.log(answer.value);
      if (answer.value == 0) {
        document.getElementById('cases').classList.add('case');
        document.getElementById('l-case').classList.add('case');
      } else {
        document.getElementById('cases').classList.remove('case');
        document.getElementById('l-case').classList.remove('case');
      }
    }
  </script>
  
  <script>
    function btnSave() {
      var scheduleText = $("#schedule option:selected").text();
      var scheduleValue = $("#schedule").val();

      var arrangement = $("#arrangement").val();
      var services = $("#services option:selected").text();
      var counselling = $("#types option:selected").text();
      var cases = $("#cases option:selected").text();
      var additional = $("#additional").val();

      var formData = new FormData();
      formData.append("scheduleValue", scheduleValue);
      formData.append("scheduleText", scheduleText);
      formData.append("arrangement", arrangement);
      formData.append("services", services);
      formData.append("counselling", counselling);
      formData.append("cases", cases);
      formData.append("additional", additional);
      formData.append("submit", '1');

      $.ajax({
          url:"includes/appointment.inc.php",
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

            if(data == "availability") {
              Swal.fire({
                  icon: 'error',
                  text: 'No available date for appointment',
                  confirmButtonColor: '#16a085',
              });
            }
            else if(data == "empty") {
              Swal.fire({
                  icon: 'error',
                  text: 'Fill empty field',
                  confirmButtonColor: '#16a085',
              });
            }
            else if(data == "taken") {
              Swal.fire({
                  icon: 'error',
                  text: 'Sorry, but the day you selected is already taken.',
                  confirmButtonColor: '#16a085',
              }).then(function() {
                window.location.href = 'appointment.php';
              });
            }
            else if (data == "success") {
              Swal.fire({
                  icon: 'success',
                  text: 'Your submission has been sent',
                  confirmButtonColor: '#16a085',
              }).then(function() {
                window.location.href = 'main.php';
              });
            }
          }
      });
    }
  </script>
</body>
</html>