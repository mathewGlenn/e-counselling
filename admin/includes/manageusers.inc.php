<?php
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include 'db.inc.php';
    
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        //created a template
        $sql = "SELECT employee_email FROM tblemployee WHERE employee_email=?;";
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

        if(empty($name) || empty($email) || empty($role) || empty($password) || empty($confirmPassword)) {
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
                if($password != $confirmPassword) {
                    echo "password";
                }
                else {
                    $password = password_hash($password, PASSWORD_BCRYPT);
    
                    //created a template 
                    $sql = "INSERT INTO tblemployee (employee_name, employee_email, employee_role, employee_password) VALUES (?, ?, ?, ?);";
                    //create a prepared statement
                    $stmt = mysqli_stmt_init($conn);
                    //prepare the prepared statement
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    }
                    else {
                        //bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $role, $password);
                        //run parameters inside database
                        mysqli_stmt_execute($stmt);

                        echo "success";
                    }
                }
            }
        }
    }
?>