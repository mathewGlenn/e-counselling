<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        $studentID = $_POST['studentID'];
        $college = $_POST['college'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];

        if(empty($firstName) || empty($lastName) || empty($phone) || empty($age) || empty($studentID)) {
            echo "empty";
        }
        else {
            //created a template 
            $sql = "UPDATE tblusers SET users_firstname=?, users_lastname=?, users_phone=?, users_age=?, users_student_id=?, users_college=?, users_course=?, users_year=?, users_semester=? WHERE id=?;";
            //create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            }
            else {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $lastName, $phone, $age, $studentID, $college, $course, $year, $semester, $users_id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                echo "success";
            }
        }
    }
?>