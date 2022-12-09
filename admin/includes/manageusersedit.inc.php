<?php
    include 'db.inc.php';

    if($_POST['submit'] == "update") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];

        if(empty($name)) {
            echo "empty";
        }
        else {
            //created a template 
            $sql = "UPDATE tblemployee SET employee_name=?, employee_role=? WHERE id=?;";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "sss", $name, $role, $id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }

    if($_POST['submit'] == "delete") {
        $id = $_POST['id'];

        $sql = "DELETE FROM tblemployee WHERE id='$id';";
        mysqli_query($conn, $sql);
    
        echo "success";
    }
?>