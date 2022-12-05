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

  $id = $_GET['id'];

  $sql = "SELECT * FROM tblappointment WHERE id='$id';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $users_id = $row['id'];
      $users_email = $row['users_email'];
      $users_fullname = $row['users_fullname'];
      $users_college = $row['users_college'];
      $users_course = $row['users_course'];
      $users_year = $row['users_year'];
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

        <div class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='pendingappointments.php';">
          <i class="fa-solid fa-hourglass-start ic-inactive me-3"></i>
          Pending appointments
        </div>

        <div class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2" onclick="location.href='acceptedappointments.php';">
          <i class="fa-solid fa-address-card ic-active me-3"></i>
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
      </div>
    </div>

    <div class="main">
      <span class="page-title">Accepted appointment information</span>

      <!-- <div class="d-flex flex-row justify-content-around mt-4">
      <div class="d-flex flex-column p-4"> -->

      <div class="d-flex flex-row mt-4" style="padding-bottom: 0.9rem;">
        <div class="d-flex flex-column">
          <span class="info-name">Name</span>
          <span class="info-val"><?php echo "$users_fullname"; ?></span>

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

      <div class="mt-2">
        <span class="title-2 ">Add other information</span>
      </div>

      <div class="d-flex flex-column py-3">
        <span class="info-name">Meeting Notes</span>
        <textarea id="notes" placeholder="Enter notes from the meeting here..." class="mt-2 p-2" style="height: 150px; width: 100%; background: #efefef; border-radius: 10px;"></textarea>
      </div>

      <div class="mt-2">
        <button class="btn btn-success" onclick="btnComplete()">Complete meeting</button>
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
    
    function btnComplete() {
      Swal.fire({
        icon: 'warning',
        text: 'Are you sure you want to save this appointment as complete?',
        confirmButtonColor: '#34495e',
        confirmButtonText:`Yes`,
        cancelButtonColor: '#16a085',
        cancelButtonText:`No`,
        showCancelButton: true,
        reverseButtons: true,
        focusCancel: true
        }).then((result) => {
          if (result.value) {
            var formData = new FormData();
            var id = "<?php echo "$users_id"; ?>";
            var notes = $('#notes').val();

            formData.append("id", id);
            formData.append("notes", notes);
            formData.append("submit", '1');

            $.ajax({
                url:"includes/acceptedappointmentinformation.inc.php",
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

                  if (data == "success") {
                    Swal.fire({
                        icon: 'success',
                        text: 'Appointment has been completed',
                        confirmButtonColor: '#16a085',
                    }).then(function() {
                      window.location.href = 'acceptedappointments.php';
                    });
                  }
                }
            });
 	        }
      });
    }
  </script>
</body>
</html>