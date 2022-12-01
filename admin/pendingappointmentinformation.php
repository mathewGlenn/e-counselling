<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pending Appointments</title>

    <link rel="stylesheet" href="assets/css/styles.css" />

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://kit.fontawesome.com/09866f33f8.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div class="w-100">
      <div class="sidebar pt-3 d-flex flex-column align-items-center">
        <div class="d-flex flex-column">
          <img
            src="assets/img/isu_seal.png"
            alt=""
            style="height: 80px; object-fit: contain"
          />
          <h4
            class="mt-2 text-light"
            style="text-align: center; font-weight: 400"
          >
            <small class="text-light">ISU Cauayan</small><br />E-Counselling
          </h4>
        </div>

        <div class="d-flex mt-5 flex-column align-items-center w-100">
          <div
            class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3"
            onclick="location.href='dashboard.html'"
          >
            <i class="fa-solid fa-chart-area ic-inactive me-3"></i>
            Dashboard
          </div>

          <div
            class="sidebar-btn-active d-flex flex-row justify-content-start align-items-center px-3 mt-2"
            onclick="location.href='pendingappointments.html'"
          >
            <i class="fa-solid fa-hourglass-start ic-active me-3"></i>
            Pending appointments
          </div>

          <div
            class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
            onclick="location.href='acceptedappointments.html'"
          >
            <i class="fa-solid fa-address-card ic-inactive me-3"></i>
            Accepted appointments
          </div>

          <div
            class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
            onclick="location.href='completedmeetings.html'"
          >
            <i class="fa-solid fa-handshake ic-inactive me-3"></i>
            Completed meetings
          </div>

          <div
            class="sidebar-btn-inactive d-flex flex-row justify-content-start align-items-center px-3 mt-2"
            onclick="location.href='appointmentdates.html'"
          >
            <i class="fa-solid fa-calendar-check ic-inactive me-3"></i>
            Appointment dates
          </div>
        </div>
      </div>

      <div class="main">
        <span class="page-title">Pending appointment information</span>

        <div class="d-flex flex-row justify-content-around mt-4">
          <div class="d-flex flex-column p-4">
            <span class="info-name">Name</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Email</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">College</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Course</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Year</span>
            <span class="info-val">Juan dela Cruz</span>
          </div>

          <div class="d-flex flex-column p-4">
            <span class="info-name">Schedule</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Arrangement</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Counselling service</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Type of counselling</span>
            <span class="info-val">Juan dela Cruz</span>

            <span class="info-name mt-3">Case</span>
            <span class="info-val">Juan dela Cruz</span>
          </div>

          <div class="d-flex flex-column p-4">
            <span class="info-name">Note from the appointer</span>
            <textarea
              disabled
              class="mt-2 p-2"
              style="
                height: 100%;
                width: 260px;
                background: #efefef;
                border-radius: 10px;
              "
            >
Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, amet nulla ratione ea labore sint dolores odio cupiditate voluptatibus facilis porro ut necessitatibus ipsum quod error ducimus repellat earum inventore!
                    </textarea
            >
          </div>
        </div>

        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            <div>
                <button class="btn btn-primary">Accept Appointment</button>
            </div>
            <div class="mt-2">
                <button class="btn btn-secondary">Cancel Appointment</button>
            </div>

            <div class="mt-4 d-flex flex-column">
                <span class="m-label ">Reason for cancelling appointment</span>
                <input type="text" class="m-input mt-2" >
                <div class="mt-3">
                    <button type="button" class="btn  btn-warning" style="width:450px;">Send notice to appointer</button>
                </div>

            </div>
        </div>
      </div>
    </div>
  </body>
</html>