<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';

        $id = $_POST['id'];
        $email = $_POST['email'];
        $notes = $_POST['notes'];
        $status = "completed";

        //created a template 
        $sql = "UPDATE tblappointment SET appointment_meeting_notes=?, appointment_status=? WHERE id=?;";
        //create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //prepare the prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        }
        else {
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "sss", $notes, $status, $id);
            //run parameters inside database
            mysqli_stmt_execute($stmt);

            $sql = "UPDATE tblusers SET users_appointment_status='false' WHERE users_email='$email';";
            mysqli_query($conn, $sql);

            echo "success";
        }
    }
?>