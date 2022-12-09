<?php
    //start session
    session_start();

    $id = openssl_decrypt($_SESSION['employee_id'], "AES-128-ECB", "password@2023");

    $sql = "SELECT * FROM tblemployee WHERE id='$id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $employee_id = $row['id'];
            $employee_name = $row['employee_name'];
            $employee_email = $row['employee_email'];
            $employee_role = $row['employee_role'];
            $employee_password = $row['employee_password'];
        }
    }
    else {
        unset($_SESSION['employee_id']);
    }
?>