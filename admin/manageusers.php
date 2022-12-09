<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accepted Appointments</title>

  <link rel="stylesheet" href="assets/css/styles.css" />

  <script src="https://kit.fontawesome.com/09866f33f8.js" crossorigin="anonymous"></script>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
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
        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3" onclick="location.href='dashboard.php';">
          <i class="fa-solid fa-chart-area ic-inactive me-3"></i>
          Dashboard
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='pendingappointments.php';">
          <i class="fa-solid fa-hourglass-start ic-inactive me-3"></i>
          Pending appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='acceptedappointments.php';">
          <i class="fa-solid fa-address-card ic-inactive me-3"></i>
          Accepted appointments
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='completedmeetings.php';">
          <i class="fa-solid fa-handshake ic-inactive me-3"></i>
          Completed meetings
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='appointmentdates.php';">
          <i class="fa-solid fa-calendar-check ic-inactive me-3"></i>
          Appointment dates
        </div>

        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='manageusers.php';">
          <i class="fa-solid fa-users ic-active me-3"></i>
          Manage Users
        </div>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='myaccount.php';">
          <i class="fa-solid fa-user ic-inactive me-3"></i>
          My Account
        </div>
      </div>
    </div>

    <div class="main">
      <div class="d-flex flex-row ">
        <span class="page-title">Manage Users</span>
        <button onclick="window.location.href = 'loginhistory.php';" class="btn btn-primary ms-5">Login history</button>
      </div>

      <div class="d-flex flex-row">
        <div class="mt-5 w-50 me-5 px-2">
          <table class="table table-hover">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <?php
              $sql = "SELECT * FROM tblemployee;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              $count = 0;
          
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $id = $row['id'];
                  $name = $row['employee_name'];
                  $email = $row['employee_email'];
                  $role = $row['employee_role'];

                  if($employee_id != $id) {
                    $count++;
                    
                    echo "
                    <tr>
                      <th scope='row'>$count</th>
                      <td>$name</td>
                      <td>$email</td>
                      <td>$role</td>
                    </tr>
                    ";
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="w-50 card p-5">
          <span class="title-2">Add User</span>

          <span class="m-label mt-3">Name</span>
          <input class="m-input w-100" id="name"></input>

          <span class="m-label mt-3">Email</span>
          <input class="m-input w-100" id="email"></input>

          <span class="m-label mt-3">Role</span>
          <select id="role" type="text" class="m-input w-100">
            <option value="" hidden>--Select Role--</option>
            <option>Admin</option>
            <option>Counsellor</option>
          </select>

          <span class="m-label mt-3">Password</span>
          <input type="password" class="m-input w-100" id="password">

          <span class="m-label mt-3">Confirm Password</span>
          <input type="password" class="m-input w-100" id="confirmPassword">
          <button id="btnSave" type="button" class="btn btn-primary mt-4" onclick="btnSave()">Save</button>
        </div>
      </div>
    </div>

    <script>
      function btnSave() {
      var formData = new FormData();
      var name = $('#name').val();
      var email = $('#email').val();
      var role = $('#role').val();
      var password = $('#password').val();
      var confirmPassword = $('#confirmPassword').val();

      formData.append("name", name);
      formData.append("email", email);
      formData.append("role", role);
      formData.append("password", password);
      formData.append("confirmPassword", confirmPassword);

      formData.append("submit", '1');

      $.ajax({
        url:"includes/manageusers.inc.php",
        method:"POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function() {
          //alert('uploading');

          $('#btnSave').text('Loading...');
          $('#btnSave').prop('disabled', true);
        },
        success:function(data) {
          //alert('uploaded');

          if(data == "empty") {
            Swal.fire({
                icon: 'error',
                text: 'Fill empty field',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Save');
            $('#btnSave').prop('disabled', false);
          }
          else if(data == "email1") {
            Swal.fire({
                icon: 'error',
                text: 'Invalid Email',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Save');
            $('#btnSave').prop('disabled', false);
          }
          else if(data == "email2") {
            Swal.fire({
                icon: 'error',
                text: 'Email already exist',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Save');
            $('#btnSave').prop('disabled', false);
          }
          else if(data == "password") {
            Swal.fire({
                icon: 'error',
                text: 'Password do not match',
                confirmButtonColor: '#16a085',
            });

            $('#btnSave').text('Save');
            $('#btnSave').prop('disabled', false);
          }
          else if (data == "success") {
            window.location.href = 'manageusers.php';
          }
        }
      });
    }
    </script>
</body>
</html>