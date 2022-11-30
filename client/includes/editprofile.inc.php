<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $fullname = $_POST['fullname'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year = $_POST['year'];

        if(empty($fullname) || empty($college) || empty($course)) {
            echo "empty";
        }
        else {
            //created a template 
            $sql = "UPDATE tblusers SET users_fullname=?, users_college=?, users_course=?, users_year=? WHERE id=?;";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "sssss", $fullname, $college, $course, $year, $users_id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }
?>