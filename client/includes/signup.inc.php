<?php
    include 'db.inc.php';

    if($_POST['submit'] == "continue") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

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

        if(empty($email) || empty($password) || empty($confirmPassword)) {
            echo "empty";
        }
        else {
            if($resultCheck > 0) {
                echo "email";
            }
            else {
                if($password != $confirmPassword) {
                    echo "password";
                }
                else {
                    echo "success";
                }
            }
        }
    }

    if($_POST['submit'] == "save") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $fullname = $_POST['fullname'];
        $contactEmail = $_POST['contactEmail'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year = $_POST['year'];

        if(empty($fullname) || empty($contactEmail) || empty($college) || empty($course)) {
            echo "empty";
        }
        else {
            $password = password_hash($password, PASSWORD_BCRYPT);

            //created a template 
            $sql = "INSERT INTO tblusers (users_email, users_password, users_fullname, users_contact_email, users_college, users_course, users_year) VALUES (?, ?, ?, ?, ?, ?, ?);";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "sssssss", $email, $password, $fullname, $contactEmail, $college, $course, $year);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }
?>