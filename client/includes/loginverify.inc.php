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
            $users_email = $row['users_email'];
            $users_fullname = $row['users_fullname'];
            $users_college = $row['users_college'];
            $users_course = $row['users_course'];
            $users_year = $row['users_year'];
        }
    }
    else {
        unset($_SESSION['users_id']);
    }
?>