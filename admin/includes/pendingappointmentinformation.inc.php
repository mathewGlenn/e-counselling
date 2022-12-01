<?php
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include 'db.inc.php';

    if($_POST['submit'] == "save") {
        $id = $_POST['id'];
        $status = "accepted";

        //created a template 
        $sql = "UPDATE tblappointment SET appointment_status=? WHERE id=?;";
        //create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //prepare the prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        }
        else {
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "ss", $status, $id);
            //run parameters inside database
            mysqli_stmt_execute($stmt);

            echo "success";
        }
    }

    if($_POST['submit'] == "cancel") {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $reason = $_POST['reason'];

        $status = "canceled";

        if(empty($reason)) {
            echo "empty";
        }
        else {
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
            <h1 style='font-size: 15px; font-family: century gothic; font-weight: 700;'>Sorry your appointment has been canceled.<h1>
            <h1 style='font-size: 15px; font-family: century gothic; font-weight: 100;'>Reason: $reason<h1>
            ";
        
            $mail->send();

            //created a template 
            $sql = "UPDATE tblappointment SET appointment_status=? WHERE id=?;";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ss", $status, $id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }
?>