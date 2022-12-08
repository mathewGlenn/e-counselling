<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $password = $_POST['password'];

        if(empty($password)) {
            echo "empty";
        }
        else {
            $password = password_verify($password, $users_password);

            if($password == 1) {
                $sql = "DELETE FROM tblusers WHERE id='$users_id';";
                mysqli_query($conn, $sql);

                echo "success";
            }
            else {
                echo "password";
            }
        }
    }
?>