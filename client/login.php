<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

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
    <div class="container-fluid cont">
      <style>
        .bg-glass {
          padding: 20px 50px;
          background-color: #11673677;
          border: 0;
          backdrop-filter: saturate(200%) blur(25px);
        }
      </style>

      <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100px">
              <img src="assets/img/isu_seal.png" alt="" style="height: 70px"/>
              <h5 class="mt-2" style="text-align: center; font-weight: 400">
                <small>ISU Cauayan</small><br/>E-Counselling
              </h5>
            </div>

            <form>
              <label class="form-label mt-5">Email address</label>
              <input type="email" id="email" class="form-control"/>

              <label class="form-label mt-2">Password</label>
              <input type="password" id="password" class="form-control"/>

              <button type="button" class="btn my-4" style="width: 100%; background-color: #ffaa01" id="login" onclick="btnLogin()">Login</button>

              <a href="signup.php" style="color: white; margin-top: 20px;">No account yet? Sign up here.</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      function btnLogin() {
        var formData = new FormData();
        var email = $('#email').val();
        var password = $('#password').val();

        formData.append("email", email);
        formData.append("password", password);
        formData.append("submit", '1');

        $.ajax({
            url:"includes/login.inc.php",
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
              else if(data == "email") {
                Swal.fire({
                    icon: 'error',
                    text: 'No user',
                    confirmButtonColor: '#16a085',
                });
              }
              else if (data == "password") {
                Swal.fire({
                    icon: 'error',
                    text: 'Wrong password',
                    confirmButtonColor: '#16a085',
                });
              }
              else if (data == "success") {
                window.location.href = 'main.php';
              }
            }
        });
      }
  </script>
</body>
</html>