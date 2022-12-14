<?php
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include 'db.inc.php';

    //start session
    session_start();

    if($_POST['submit'] == "next1") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        $studentID = $_POST['studentID'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];

        //created a template
        $sql = "SELECT users_email FROM tblusers WHERE users_email=?;";
        //create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //prepare the prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        }
        else {
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $email);
            //run parameters inside database
            mysqli_stmt_execute($stmt);
            //count result
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
        }

        if(empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($age) || empty($studentID) || empty($college) || empty($course)) {
            echo "empty";
        }
        else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "email1";
            }
            else if($resultCheck > 0) {
                echo "email2";
            }
            else {
                $otp = substr(str_shuffle("1234567890"), 0, 6);
                $_SESSION["otp"] = $otp;

                /* sending email */
                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'senderemail378@gmail.com';
                $mail->Password = 'ufabafqhrimodhyr';
                $mail->SMTPSecure = 'ssl'; // tls | ssl
                $mail->Port = '465'; // 587 | 465

                $mail->setFrom('senderemail378@gmail.com', 'ISU Cauayan E-Counselling');
                $mail->addAddress("$email");

                $mail->isHTML(true);
                $mail->Subject = 'ISU Cauayan E-Counselling';
                $mail->Body = "
                <p style='font-size: 15px;'>Your OTP Pin: $otp<p>
                ";
            
                $mail->send();

                echo "success";
            }
        }
    }

    if($_POST['submit'] == "next2") {
        $otp = $_POST['otp'];

        if(empty($otp)) {
            echo "empty";
        }
        else {
            if($otp == $_SESSION["otp"]) {
                echo "success";
            }
            else {
                echo "otp";
            }
        }
    }

    if($_POST['submit'] == "save") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        $studentID = $_POST['studentID'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if(empty($password) || empty($confirmPassword)) {
            echo "empty";
        }
        else {
            if($password != $confirmPassword) {
                echo "password";
            }
            else {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $appointmentstatus = "false";

                //created a template 
                $sql = "INSERT INTO tblusers (users_firstname, users_lastname, users_email, users_phone, users_age, users_student_id, users_college, users_course, users_year, users_semester, users_password, users_appointment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                //create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                //prepare the prepared statement
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                }
                else {
                    //bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "ssssssssssss", $firstName, $lastName, $email, $phone, $age, $studentID, $college, $course, $year, $semester, $password, $appointmentstatus);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);

                    echo "success";
                }
            }
        }
    }
?>