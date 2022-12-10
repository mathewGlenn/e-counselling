<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Appointment Dates</title>

  <link rel="stylesheet" href="assets/css/styles.css"/>

  <link href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker.min.js"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- sweetalert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://kit.fontawesome.com/09866f33f8.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  include "includes/db.inc.php";
  include "includes/loginverify.inc.php";

  //check session
  if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
  }

  include "includes/autodeleteshedule.inc.php";
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

        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='appointmentdates.php';">
          <i class="fa-solid fa-calendar-check ic-active me-3"></i>
          Appointment dates
        </div>

        <?php 
        if($employee_role == "Admin") {
          echo "
          <div class='sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2' onclick='btnManageUser()'>
            <i class='fa-solid fa-users ic-inactive me-3'></i>
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
      <span class="page-title">Appointment dates</span>
      <div class="d-flex flex-row">
        <div class="mt-5 w-50 me-5 px-5">
          <table class="table table-hover">
            <thead class="thead">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="tbody">
              <?php
              $sql = "SELECT * FROM tblschedule;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              $count = 0;
          
              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $count++;

                  $id = $row['id'];
                  $date = $row['schedule_date'];
                  $time = $row['schedule_time'];

                  $date = date('F d, Y', strtotime($date));
                  $time = date("g:i A", strtotime($time));

                  echo "
                  <tr>
                    <th scope='row'>$count</th>
                    <td>$date</td>
                    <td>$time</td>
                    <td>
                      <a class='btnDelete' data-id='$id'>
                        <div class='tbl-btn-del'><i class='fa-solid fa-trash'></i></div>
                      </a>
                    </td>
                  </tr>
                  ";
                }
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="w-50 card p-5">
          <span class="title-2">Add appointment dates</span>

          <span class="m-label mt-3">Date</span>
          <input class="m-input w-100" id="datePicker"></input>

          <span class="m-label mt-3">Time</span>
          <input type="time" class="m-input w-100" id="timePicker">

          <button id="btnSave" type="button" class="btn btn-primary mt-4" onclick="btnSave()">Save</button>
        </div>
      </div>
  </div>

  <script>
    function addDays(date, days) {
      var result = new Date(date);
      result.setDate(result.getDate() + days);
      return result;
    }

    const today = new Date();

    const elem = document.querySelector('#datePicker');
    const datepicker = new Datepicker(elem, {
      pickLevel: 0,
      daysOfWeekDisabled: [0, 6],
      minDate: addDays(today, 0),
    });

    function formatDate(date) {
      var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2)
        month = '0' + month;
      if (day.length < 2)
        day = '0' + day;

      return [year, month, day].join('-');
    }

    var date = formatDate(new Date())
    console.log(date)

    //To restrict past date
    $('#datetimepicker').attr('min', date);
  </script>

  <script>
    $('.btnDelete').on('click', function () {
      var el = $(this);

      Swal.fire({
        icon: 'warning',
        text: 'Are you sure you want to delete?',
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
            var id = el.data('id');

            formData.append("id", id);
            formData.append("submit", 'delete');

            $.ajax({
                url:"includes/appointmentdates.inc.php",
                method:"POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function() {
                  //alert('uploading');

                  $('.btnDelete').prop('disabled', true);
                },
                success:function(data) {
                  //alert('uploaded');

                  if (data == "success") {
                    window.location.href = 'appointmentdates.php';
                  }
                }
            });
          }
      });
    });

    function btnSave() {
      var formData = new FormData();
      var datePicker = $('#datePicker').val();
      var timePicker = $('#timePicker').val();

      formData.append("datePicker", datePicker);
      formData.append("timePicker", timePicker);
      formData.append("submit", 'save');

      $.ajax({
          url:"includes/appointmentdates.inc.php",
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
            else if (data == "success") {
              window.location.href = 'appointmentdates.php';
            }
          }
      });
    }
  </script>
</body>
</html>