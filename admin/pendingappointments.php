<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pending Appointments</title>

  <link rel="stylesheet" href="assets/css/styles.css" />

  <script src="https://kit.fontawesome.com/09866f33f8.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
  if (!isset($_SESSION['employee_id'])) {
      header("Location: login.php");
  }
  ?>

  <div class="w-100">
    <div class="sidebar pt-3 d-flex flex-column align-items-center">
      <div class="d-flex flex-column">
        <img src="assets/img/isu_seal.png" alt="" style="height:80px; object-fit: contain;">
        <h4 class="mt-2 text-light" style="text-align: center; font-weight: 400">
            <small class="text-light">ISU Cauayan</small><br />E-Counselling
        </h4>
      </div>

      <div class="d-flex mt-5 flex-column align-items-center w-100">
        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3"
          onclick="location.href='dashboard.php';">
          <i class="fa-solid fa-chart-area ic-inactive me-3"></i>
          Dashboard
        </div>
  
        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='pendingappointments.php';">
          <i class="fa-solid fa-hourglass-start ic-active me-3"></i>
          Pending appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='acceptedappointments.php';">
          <i class="fa-solid fa-address-card ic-inactive me-3"></i>
          Accepted appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='completedmeetings.php';">
          <i class="fa-solid fa-handshake ic-inactive me-3"></i>
          Completed meetings
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
          onclick="location.href='appointmentdates.php';">
          <i class="fa-solid fa-calendar-check ic-inactive me-3"></i>
          Appointment dates
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='profile.php';">
            <i class="fa-solid fa-user ic-inactive me-3"></i>
            My Account
          </div>
      </div>
    </div>

    <div class="main">
      <span class="page-title">Pending appointments</span>

      <div class="mt-5">
        <table class="table table-hover">
          <thead class="thead">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Schedule</th>
              <th scope="col">Arrangement</th>
            </tr>
          </thead>

          <tbody id="tbody">
          <?php
          $sql = "SELECT * FROM tblappointment WHERE appointment_status='pending' ORDER BY id DESC;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          $count = 0;
      
          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $count++;

              $id = $row['id'];
              $fullname = $row['users_fullname'];
              $email = $row['users_email'];
              $schedule = $row['appointment_schedule'];
              $arrangement = $row['appointment_arrangement'];

              echo "
              <tr style='cursor: pointer;' class='clickable-row' data-href='pendingappointmentinformation.php?id=$id'>
                <th scope='row'>$count</th>
                <td>$fullname</td>
                <td>$email</td>
                <td>$schedule</td>
                <td>$arrangement</td>
              </tr>
              ";
            }
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  </script>
</body>
</html>