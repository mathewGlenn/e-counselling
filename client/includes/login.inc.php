<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            echo "empty";
        }
        else {
            //created a template 
            $sql = "SELECT * FROM tblusers WHERE users_email=?;";
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
                $result = mysqli_stmt_get_result($stmt);
                //count result
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $password = password_verify($password, $row['users_password']);

                        $plaintext = $id;
                        $id = openssl_encrypt($plaintext, "AES-128-ECB", "password@2023");

                        if($password == 1) {
                            //start session
                            session_start();
                            //create session
                            $_SESSION['users_id'] = $id;
        
                            echo "success";
                        }
                        else {
                            echo "password";
                        }
                    }
                }
                else {
                    echo "email";
                }
            }
        }
    }
?>