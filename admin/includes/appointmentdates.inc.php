<?php
    include 'db.inc.php';

    if($_POST['submit'] == "save") {
        $datePicker = $_POST['datePicker'];
        $timePicker = $_POST['timePicker'];

        if(empty($datePicker) || empty($timePicker)) {
            echo "empty";
        }
        else {
            //created a template 
            $sql = "INSERT INTO tblschedule (schedule_date, schedule_time) VALUES (?, ?);";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ss", $datePicker, $timePicker);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }

    if($_POST['submit'] == "delete") {
        $id = $_POST['id'];

        $sql = "DELETE FROM tblschedule WHERE id='$id';";
        mysqli_query($conn, $sql);
    
        echo "success";
    }
?>