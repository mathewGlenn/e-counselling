<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pending Appointments</title>

  <link rel="stylesheet" href="assets/css/styles.css"/>

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

  $id = $_GET['id'];

  $sql = "SELECT * FROM tblappointment WHERE id='$id';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $users_id = $row['id'];

      $users_fullname = $row['users_firstname'] . " " . $row['users_lastname']; 
      $users_email = $row['users_email'];
      $users_phone = $row['users_phone'];
      $users_age = $row['users_age'];

      $users_student_id = $row['users_student_id'];
      $users_college = $row['users_college'];
      $users_course = $row['users_course'];
      $users_year = $row['users_year'];
      $users_semester = $row['users_semester'];
      
      $appointment_schedule = $row['appointment_schedule'];
      $appointment_arrangement = $row['appointment_arrangement'];
      $appointment_counselling = $row['appointment_counselling'];
      $appointment_case = $row['appointment_case'];
      $appointment_additional_information = $row['appointment_additional_information'];
      $appointment_question_answer_1 = $row['appointment_question_answer_1'];
      $appointment_question_answer_2 = $row['appointment_question_answer_2'];
      $appointment_question_answer_3 = $row['appointment_question_answer_3'];
    }
  }
  ?>

  <div class="w-100">
    <div class="sidebar pt-3 d-flex flex-column align-items-center">
      <div class="d-flex flex-column">
        <img src="assets/img/isu_seal.png" alt="" style="height: 80px; object-fit: contain" />
        <h4 class="mt-2 text-light" style="text-align: center; font-weight: 400">
          <small class="text-light">ISU Cauayan</small><br />E-Counselling
        </h4>
      </div>

      <div class="d-flex mt-5 flex-column align-items-center w-100">
        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3" onclick="location.href='dashboard.php';">
          <i class="fa-solid fa-chart-area ic-inactive me-3"></i>
          Dashboard
        </div>

        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='pendingappointments.php';">
          <i class="fa-solid fa-hourglass-start ic-active me-3"></i>
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

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='profile.php';">
          <i class="fa-solid fa-user ic-inactive me-3"></i>
          My Account
        </div>
      </div>
    </div>

    <div class="main">
      <span class="page-title">Pending appointment information</span>

      <div class="d-flex flex-row mt-4" style="padding-bottom: 0.9rem;">
        <div class="d-flex flex-column">

          <span class="info-name">Student ID</span>
          <span class="info-val"><?php echo "$users_student_id"; ?></span>

          <span class="info-name mt-3">Name</span>
          <span class="info-val"><?php echo "$users_fullname"; ?></span>

          <span class="info-name mt-3">Phone Number</span>
          <span class="info-val"><?php echo "$users_phone"; ?></span>

          <span class="info-name mt-3">Email</span>
          <span class="info-val"><?php echo "$users_email"; ?></span>

          <span class="info-name mt-3">College</span>
          <span class="info-val"><?php echo "$users_college"; ?></span>

          <span class="info-name mt-3">Course</span>
          <span class="info-val"><?php echo "$users_course"; ?></span>

          <span class="info-name mt-3">Year</span>
          <span class="info-val"><?php echo "$users_year"; ?></span>
          
        </div>

        <div class="d-flex flex-column p-4">
          <span class="info-name">Schedule</span>
          <span class="info-val"><?php echo "$appointment_schedule"; ?></span>

          <span class="info-name mt-3">Arrangement</span>
          <span class="info-val"><?php echo "$appointment_arrangement"; ?></span>

          <span class="info-name mt-3">Type of counselling</span>
          <span class="info-val"><?php echo "$appointment_counselling"; ?></span>

          <span class="info-name mt-3">Case</span>
          <span class="info-val"><?php echo "$appointment_case"; ?></span>
        </div>

        <div class="d-flex flex-column p-4">
          <span class="info-name">Note from the appointer</span>
          <textarea disabled class="mt-2 p-2" style=" height: 100%; width: 260px; background: #efefef; border-radius: 10px;"><?php echo "$appointment_additional_information";?></textarea>
        </div>
      </div>

      <div class="d-flex flex-column">
        <span class="info-name mt-3">Answers to initial questions</span>
        <span class="info-val mt-2 is-2" id="q1">1. Lorem Ipsum DOlor sit amit?</span>
        <p class=" mt-2 font-weight-normal" id="ans1">Lorem Ipsum DOlor sit a</p>

        <span class="info-val mt-2 is-2" id="q2">2. Lorem Ipsum DOlor sit amit?</span>
        <p class=" mt-2 font-weight-normal" id="ans2">Lorem Ipsum DOlor sit a</p>

        <span class="info-val mt-2 is-2" id="q3">3. Lorem Ipsum DOlor sit amit?</span>
        <p class=" mt-2 font-weight-normal" id="ans3">Lorem Ipsum DOlor sit a</p>
      </div>

      <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
        <div>
          <button id="btnAccept" style="width: 180px;" class="btn btn-primary" onclick="btnAccept()">Accept Appointment</button>
        </div>
        <div class="mt-2">
          <button id="btnCancel" style="width: 180px;" class="btn btn-secondary" onclick="btnCancel()">Cancel Appointment</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let question1 = document.getElementById("q1")
    let question2 = document.getElementById('q2')
    let question3 = document.getElementById('q3')

    let ans1 = document.getElementById('ans1')
    let ans2 = document.getElementById('ans2')
    let ans3 = document.getElementById('ans3')

    let chosenCase = "<?php echo "$appointment_case"; ?>";

    ans1.innerHTML = "<?php echo "$appointment_question_answer_1"; ?>"
    ans2.innerHTML = "<?php echo "$appointment_question_answer_2"; ?>"
    ans3.innerHTML = "<?php echo "$appointment_question_answer_3"; ?>"

    if(chosenCase == "Family") {
      question1.innerHTML = "Describe your Family issue.";
      question2.innerHTML = "How did your family begin to experience this problem?"
      question3.innerHTML = "How did this issue affect you?"
    } 
    else if(chosenCase == "Girl-Boy Relationship") {
      question1.innerHTML = "Describe your issue with your relationship."
      question2.innerHTML = "How often do you experience these issues?"
      question3.innerHTML = "How do each of you feel about this problem?"
    }
    else if(chosenCase == "Personal") {
      question1.innerHTML = "Describe your Personal experience of the issue."
      question2.innerHTML = "How did this issue affected your lifestyle?"
      question3.innerHTML = "How do each of you feel about this problem?"
    }
    else if(chosenCase == "Academic") {
      question1.innerHTML = "Describe the issue on your academic."
      question2.innerHTML = "Is there anyone responsible for this issue?"
      question3.innerHTML = "How did this problem affected your study?"
    }
    else if(chosenCase == "Interpersonal") {
      question1.innerHTML = "Describe your Interpersonal issues."
      question2.innerHTML = "How did you get this issues?"
      question3.innerHTML = "How much did this issue affected you?"
    }
    else if(chosenCase == "Gender Sensitivity Issue") {
      question1.innerHTML = "Describe the issue."
      question2.innerHTML = "How did this issue affected your environment?"
      question3.innerHTML = "How do you feel about it?"
    }
    else if(chosenCase == "Cultural Differences") {
      question1.innerHTML = "Describe the issue."
      question2.innerHTML = "Do you often get this problem?"
      question3.innerHTML = "How do you feel about it?"
    }
    else if(chosenCase == "Career concern") {
      question1.innerHTML = "Describe your issue."
      question2.innerHTML = "How did you get this issue?"
      question3.innerHTML = "What is your goal for this session?"
    }

    var id = "";
    var email = "";

    function btnAccept() {
      Swal.fire({
        icon: 'warning',
        text: 'Are you sure you want to accept appointment?',
        confirmButtonColor: '#34495e',
        confirmButtonText:`Yes`,
        cancelButtonColor: '#16a085',
        cancelButtonText:`No`,
        showCancelButton: true,
        reverseButtons: true,
        focusCancel: true
      }).then((result) => {
        if (result.value) {
          //data
          var formData = new FormData();
          id = "<?php echo "$users_id"; ?>";
          email = "<?php echo "$users_email"; ?>";
          var schedule = "<?php echo "$appointment_schedule"; ?>";
          var arrangement = "<?php echo "$appointment_arrangement"; ?>";
          var meetingLink = "";

          formData.append("id", id);
          formData.append("email", email);
          formData.append("schedule", schedule);
          formData.append("submit", 'accept');

          if(arrangement == "Online") {
            //meeting link
            (async () => {
              const { value: data } = await Swal.fire({
                  title: 'Meeting Link',
                  input: 'text',
                  inputLabel: 'Paste here meeting link',
                  inputPlaceholder: 'Enter meeting link',
                  confirmButtonColor: '#16a085',
                  inputValidator: (value) => {
                      if (!value) {
                        return 'You need to input meeting link'
                      }
                  }
              })

              if (data) {
                meetingLink = data;
                formData.append("meetingLink", meetingLink);

                //submit
                $.ajax({
                  url:"includes/pendingappointmentinformation.inc.php",
                  method:"POST",
                  data: formData,
                  contentType: false,
                  cache: false,
                  processData: false,
                  beforeSend:function() {
                    //alert('uploading');

                    $('#btnAccept').text('Loading...');
                    $('#btnAccept').prop('disabled', true);
                    $('#btnCancel').prop('disabled', true);
                  },
                  success:function(data) {
                    //alert('uploaded');

                    if (data == "success") {
                      Swal.fire({
                        icon: 'success',
                        text: 'Appointment has been accepted',
                        confirmButtonColor: '#16a085',
                      }).then(function() {
                        window.location.href = 'pendingappointments.php';
                      });
                    }
                  }
                });
              }
            })();
          }
          else {
            formData.append("meetingLink", meetingLink);

            //submit
            $.ajax({
                url:"includes/pendingappointmentinformation.inc.php",
                method:"POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function() {
                  //alert('uploading');

                  $('#btnAccept').text('Loading...');
                  $('#btnAccept').prop('disabled', true);
                  $('#btnCancel').prop('disabled', true);
                },
                success:function(data) {
                  //alert('uploaded');

                  if (data == "success") {
                    Swal.fire({
                      icon: 'success',
                      text: 'Appointment has been accepted',
                      confirmButtonColor: '#16a085',
                    }).then(function() {
                      window.location.href = 'pendingappointments.php';
                    });
                  }
                }
            });
          }
        }
      });
    }

    function btnCancel() {
      Swal.fire({
        icon: 'warning',
        text: 'Are you sure you want to cancel appointment?',
        confirmButtonColor: '#34495e',
        confirmButtonText:`Yes`,
        cancelButtonColor: '#16a085',
        cancelButtonText:`No`,
        showCancelButton: true,
        reverseButtons: true,
        focusCancel: true
      }).then((result) => {
        if (result.value) {
          //data
          var formData = new FormData();
          id = "<?php echo "$users_id"; ?>";
          email = "<?php echo "$users_email"; ?>";
          var reason = "";

          formData.append("id", id);
          formData.append("email", email);
          formData.append("submit", 'cancel');

          //meeting cancellation
          (async () => {
            const { value: data } = await Swal.fire({
                title: 'Meeting Cancellation',
                input: 'text',
                inputLabel: 'Reason for cancelling appointment',
                inputPlaceholder: 'Enter explanation',
                confirmButtonColor: '#16a085',
                inputValidator: (value) => {
                    if (!value) {
                      return 'You need to input explanation'
                    }
                }
            })

            if (data) {
              reason = data;
              formData.append("reason", reason);

              $.ajax({
                url:"includes/pendingappointmentinformation.inc.php",
                method:"POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function() {
                  //alert('uploading');

                  $('#btnCancel').text('Loading...');
                  $('#btnAccept').prop('disabled', true);
                  $('#btnCancel').prop('disabled', true);
                },
                success:function(data) {
                  //alert('uploaded');

                  if (data == "success") {
                    Swal.fire({
                      icon: 'success',
                      text: 'Appointment has been canceled',
                      confirmButtonColor: '#16a085',
                    }).then(function() {
                      window.location.href = 'pendingappointments.php';
                    });
                  }
                }
              });
            }
          })();
        }
      });
    }
  </script>
</body>
</html>