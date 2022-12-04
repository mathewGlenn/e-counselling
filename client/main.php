<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Counselling</title>

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
    include "includes/db.inc.php";
    include "includes/loginverify.inc.php";

    //check session
    if (!isset($_SESSION['users_id'])) {
        header("Location: login.php");
    }
    ?>

    <div class="w-100">
        <section class="section-1 full-v" id="home">
            <div class="header">
                <div class="d-flex align-items-center justify-content-center s1" style="height: 100%; width: 100%;">
                    <div class="d-flex flex-row align-items-center justify-content-center s1">
                        <img src="assets/img/isu_seal.png" alt="" style="height:200px;">
                        <div class="ms-4">
                            <h1 style="font-size:55px;" class="isu-title">ISU Cauayan E-Counselling</h1>
                            <h5>Get someone to talk to about your queries, concerns, and problems.</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="m-navbar">
                <div class="d-flex flex-row align-items-center justify-content-center x1"
                    style="height: 100%; width: 100%;">

                    <button class="borderless-btn me-5 xt" onclick="location.href='profile.php';">Profile</button>
                    <button class="borderless-btn me-5 xt" onclick="location.href='#services';">Services</button>
                    <div class="outlined-cta xt" onclick="location.href='appointment.php';">Set Appointment</div>
                    <button class="borderless-btn ms-5 xt" onclick="location.href='#contactus';">Contact</button>
                    <button class="borderless-btn ms-5 xt" onclick="location.href='#aboutus';">About</button>
                </div>
            </div>
        </section>

        <section class="section-services full-v" id="services">
            <div>
                <span class="title mb-4 t1">Services</span>

                <div class="mt-5">
                    <ul class="services-list">
                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Individual inventory</span>
                        </li>

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Counselling Services</span>
                        </li>

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Information Services</span>
                        </li class="li-item">

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Placement Services</span>
                        </li>

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Followup Services</span>
                        </li>

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Psychological Testing and Evaluation</span>
                        </li>

                        <li class="li-item">
                            <img src="assets/img/check.png" alt="" class="check">
                            <span class="service">Referral</span>
                        </li>
                    </ul>
                </div>

                <div class="d-flex flex-row align-items-center justify-content-center mt-m" style="width: 100%;">
                    <a href="services.php" style="text-decoration: none;">
                        <span class="service">Read more about the services</span>
                        <i class="bi bi-arrow-right" style="color:black; font-size:30px; font-weight: 400;"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="section-aboutus full-v" id="aboutus">
            <div class="d-flex flex-row align-items-center justify-content-center s1" style="width: 100%; height: 100%;">
                <div class="abt-us-r1">
                    <span class="title t1">About us</span>

                    <span style="color: #303030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
                        volutpat interdum metus, et elementum eros euismod eget. Praesent dolor urna, luctus sed eros a,
                        pharetra lobortis erat. Vestibulum eu libero ac massa consequat eleifend. Aenean quis diam
                        placerat lorem fermentum porta ac quis odio.
                    </span>

                    <div class="read-more">
                        Read more
                    </div>
                </div>

                <div class="abt-us-r2">
                    <img src="assets/img/aboutus.svg" alt="" style="width: 100%">
                </div>
            </div>
        </section>

        <section class="section-contactus full-v s-m" id="contactus">
            <div class="d-flex flex-row align-items-center justify-content-center s1" style="width: 100%; height: 100%;">
                <div class="abt-us-r1">
                    <img src="assets/img/contactus.svg" alt="" style="width: 80%">
                </div>

                <div class="abt-us-r2">
                    <span class="title t1">Contact us</span>

                    <div class="d-flex flex-column mt-5 s1">
                        <span><img src="assets/img/ic_phone.png" alt=""> <i class="contact ms-3 t2">09752230506</i></span>
                        <span class="mt-3"><img src="assets/img/ic-mail.png" alt=""> <i class="contact ms-3 t2">guidance.cauayan@isu.edu.ph</i></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-footer" style="height: 40vh ;background-color:#116736; text-align:center">
            <div class="d-flex flex-row align-items-center justify-content-center" style="width: 100%; height: 100%;">
                <div>
                    <div class="d-flex flex-column">
                        <img src="assets/img/scroll-top.png" alt="" class="scroll-top" onclick="location.href='#home';">
                        <span class="mt-3">Back to top</span>
                    </div>

                    <div class="d-flex flex-column mt-5">
                        <span>Isabela State University - Cauayan Campus</span>
                        <span>E-Counselling</span>
                        <span>@Copyright 2022</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>