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

  if($employee_role != "Admin") {
    header("Location: login.php");
  }

  $id = $_GET['id'];

  $sql = "SELECT * FROM tblemployee WHERE id='$id';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['employee_name'];
      $email = $row['employee_email'];
      $role = $row['employee_role'];
    }
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

        <?php 
        if($employee_role == "Admin") {
          echo "
          <div class='sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2' onclick='btnManageUser()'>
            <i class='fa-solid fa-users ic-active me-3'></i>
            Manage Users
          </div>
          ";
        }
        ?>
        <script>
          function btnManageUser() {
            location.href='manageusers.php';
          }
        </script>

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='myaccount.php';">
          <i class="fa-solid fa-user ic-inactive me-3"></i>
          My Account
        </div>
      </div>
    </div>

    <div class="main">
      <div class="d-flex justify-content-between flex-row">
        <span class="page-title">Edit User</span>
        <button id="btnDelete" class="btn btn-danger px-4">Delete user</button>
      </div>
      <div class="d-flex flex-row">
        <div class="w-50 ms-auto me-auto mt-5 card p-5">
          <span class="m-label mt-3">Name</span>
          <input class="m-input w-100" id="name" value='<?php echo "$name"; ?>'></input>

          <span class="m-label mt-3">User Role</span>
          <select id="role" type="text" class="m-input w-100">
            <option hidden><?php echo "$role"; ?></option>
            <option>Admin</option>
            <option>Counsellor</option>
          </select>
          <button id="btnUpdate" type="button" class="btn btn-primary mt-4" onclick="btnUpdate()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  function btnUpdate() {
    Swal.fire({
      icon: 'warning',
      text: 'Are you sure you want to update this user?',
      confirmButtonColor: '#34495e',
      confirmButtonText: `Yes`,
      cancelButtonColor: '#16a085',
      cancelButtonText: `No`,
      showCancelButton: true,
      reverseButtons: true,
      focusCancel: true
    }).then((result) => {
      if (result.value) {
        var formData = new FormData();
        var id = "<?php echo "$id"; ?>";
        var name = $('#name').val();
        var role = $('#role').val();

        formData.append("id", id);
        formData.append("name", name);
        formData.append("role", role);
        formData.append("submit", 'update');

        $.ajax({
          url:"includes/manageusersedit.inc.php",
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
              window.location.href = 'manageusers.php';
            }
          }
        });
      }
    });
  }

  $('#btnDelete').on('click', function () {
    var el = $(this);

    Swal.fire({
      icon: 'warning',
      text: 'Are you sure you want to delete this user?',
      confirmButtonColor: '#e74c3c',
      confirmButtonText:`Delete`,
      cancelButtonColor: '#16a085',
      cancelButtonText:`Cancel`,
      showCancelButton: true,
      reverseButtons: true,
      focusCancel: true
      }).then((result) => {
        if (result.value) {
          var formData = new FormData();
          var id = "<?php echo "$id"; ?>";

          formData.append("id", id);
          formData.append("submit", 'delete');

          $.ajax({
            url:"includes/manageusersedit.inc.php",
            method:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function() {
              //alert('uploading');

              $('#btnDelete').prop('disabled', true);
            },
            success:function(data) {
              //alert('uploaded');

              if (data == "success") {
                window.location.href = 'manageusers.php';
              }
            }
          });
        }
      });
    });
  </script>
</body>
</html> 