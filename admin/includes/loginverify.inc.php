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
        }
    }
    else {
        unset($_SESSION['employee_id']);
    }
?>