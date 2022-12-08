<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill information</title>

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
    //start session
    session_start();
    //check session
    // if(isset($_SESSION['users_id'])) {
    //   header("Location: main.php");
    // }
    ?>

    <!-- <script>
    if(localStorage.getItem('users_verify') != 'true') {
      window.location.href = 'login.php';
    }
    </script> -->
    
    <div class="w-100">
      <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #116736; color: white;">
        <div class="container-fluid">
          <img class="logo" src="assets/img/isu_seal.png" style="height:60px;">
          <span class="top-bar-title ms-4 me-5">ISU E-counselling</span>
        </div>
      </nav>

      <div class="main mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">  
            <span class="cen-title">Fill all the information below to continue on making your account.</span>
          <span class="h2 mt-3 cen-title">Step 1/3</span>
          <div class="mt-4 d-flex flex-column">

            <div  class="mt-4 d-flex justify-content-around reg-forms">
              <div class=" d-flex flex-column reg-forms-col-1"> 
                <span class="m-label">First Name <strong class="required">*</strong></span>
                <input id="firstName" type="text" class="m-input">
    
                <span class="m-label mt-3">Last Name <strong class="required">*</strong></span>
                <input id="lastName" type="text" class="m-input">
    
                <span class="m-label mt-3">Email Address <strong class="required">*</strong></span>
                <input id="fullname" type="text" class="m-input">
    
                <span class="m-label mt-3">Phone Number <strong class="required">*</strong></span>
                <input id="fullname" type="text" class="m-input">
                
                <span class="m-label mt-3">Age <strong class="required">*</strong></span>
                <input id="fullname" type="tel" class="m-input">
               </div>
    
               <div class=" d-flex flex-column reg-forms-col-2">
                <span class="m-label">Student ID <strong class="required">*</strong></span>
                <input id="fullname" type="text" class="m-input">
    
                <span class="m-label mt-3">College <strong class="required">*</strong></span>
                <select id="college" type="text" class="m-input">
                  <option value="1st">CAS</option>
                  <option value="2nd">CBM</option>
                  <option value="3rd">CCSICT</option>
                  <option value="4th">CCJE</option>
                  <option value="4th">SAS</option>
                </select>
    
                <span class="m-label mt-3">Course <strong class="required">*</strong></span>
                <select id="course" type="text" class="m-input">
                  <option value="">--Select Course--</option>
                </select>
    
    
                <span class="m-label mt-3">Year Level <strong class="required">*</strong></span>
                <select id="year" type="text" class="m-input">
                  <option value="1st">1st Year</option>
                  <option value="2nd">2nd Year</option>
                  <option value="3rd">3rd Year</option>
                  <option value="4th">4th Year</option>
                </select>

                <span class="m-label mt-3">Semester <strong class="required">*</strong></span>
                <select id="sem" type="text" class="m-input">
                  <option value="1st">1st Sem</option>
                  <option value="2nd">2nd Sem</option>
  
                </select>
               </div>
            </div>

            
          </div>
          <button class="submit mt-4 mb-5" onclick="window.location.href='verifyemail.html'">Next</button>
        </div>
      </div>
    </div>

    <script>
      
      $(document).ready(function () {
  $("#college").change(function () {
     switch($(this).val()) {
        case '1st':
            $("#course").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
            break;
        case '2nd':
            $("#course").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
            break;
        case '3rd':
            $("#course").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
            break;
        default:
            $("#course").html("<option value=''>--select one--</option>");
     }
  });
});

      function btnSave() {
        var formData = new FormData();

        var email = localStorage.getItem('users_email');
        var password = localStorage.getItem('users_password');
        var fullname = $('#fullname').val();
        var college = $('#college').val();
        var course = $('#course').val();
        var year = $('#year').val();

        formData.append("email", email);
        formData.append("password", password);
        formData.append("fullname", fullname);
        formData.append("college", college);
        formData.append("course", course);
        formData.append("year", year);
        formData.append("submit", 'save');

        $.ajax({
            url:"includes/signup.inc.php",
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

              if(data == "empty") {
                Swal.fire({
                    icon: 'error',
                    text: 'Fill empty field',
                    confirmButtonColor: '#16a085',
                });
              }
              else if (data == "success") {
                window.location.href = 'login.php';
                localStorage.clear();
              }
            }
        });
      }


  </script>
</body>
</html>