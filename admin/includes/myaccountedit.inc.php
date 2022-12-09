<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $name = $_POST['name'];
        $currentpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        if(empty($name) || empty($currentpassword)) {
            echo "empty";
        }
        else {
            $password = password_verify($currentpassword, $employee_password);

            if($password == 1) {
                if($newpassword == "" && $confirmpassword == "") {
                    //created a template 
                    $sql = "UPDATE tblemployee SET employee_name=? WHERE id=?;";
                    //create a prepared statement
                    $stmt = mysqli_stmt_init($conn);
                    //prepare the prepared statement
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    }
                    else {
                        //bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt, "ss", $name, $employee_id);
                        //run parameters inside database
                        mysqli_stmt_execute($stmt);

                        echo "success";
                    }
                }
                else {
                    if(empty($newpassword) || empty($confirmpassword)) {
                        echo "empty";
                    }
                    else {
                        if($newpassword == $confirmpassword) {
                            $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);

                            //created a template 
                            $sql = "UPDATE tblemployee SET employee_name=?, employee_password=? WHERE id=?;";
                            //create a prepared statement
                            $stmt = mysqli_stmt_init($conn);
                            //prepare the prepared statement
                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "SQL statement failed";
                            }
                            else {
                                //bind parameters to the placeholder
                                mysqli_stmt_bind_param($stmt, "sss", $name, $newpassword, $employee_id);
                                //run parameters inside database
                                mysqli_stmt_execute($stmt);

                                echo "success";
                            }
                        }
                        else {
                            echo "password2";
                        }
                    }
                }
            }
            else {
                echo "password1";
            }
        }
    }
?>