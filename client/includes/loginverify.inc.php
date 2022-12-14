<?php
    //start session
    session_start();

    $id = openssl_decrypt($_SESSION['users_id'], "AES-128-ECB", "password@2023");

    $sql = "SELECT * FROM tblusers WHERE id='$id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users_id = $row['id'];
            $users_firstname = $row['users_firstname'];
            $users_lastname = $row['users_lastname'];
            $users_email = $row['users_email'];
            $users_phone = $row['users_phone'];
            $users_age = $row['users_age'];

            $users_student_id = $row['users_student_id'];
            $users_college = $row['users_college'];
            $users_course = $row['users_course'];
            $users_year = $row['users_year'];
            $users_semester = $row['users_semester'];
            
            $users_password = $row['users_password'];
            $users_appointment_status = $row['users_appointment_status'];
        }
    }
    else {
        unset($_SESSION['users_id']);
    }
?>