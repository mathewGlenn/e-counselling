<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $scheduleValue = $_POST['scheduleValue'];

        $sql = "SELECT * FROM tblschedule WHERE id='$scheduleValue';";
        $result = mysqli_query($conn, $sql);
        $availability = mysqli_num_rows($result);

        if ($availability > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sheduledateformat = $row['schedule_date'];
            }
        }

        $scheduleText = $_POST['scheduleText'];
        $arrangement = $_POST['arrangement'];
        $counselling = $_POST['counselling'];
        $cases = $_POST['cases'];
        $question1 = $_POST['question1'];
        $question2 = $_POST['question2'];
        $question3 = $_POST['question3'];
        $status = "pending";

        if($scheduleText == "No available") {
            echo "availability";
        }
        else if(empty($arrangement) || empty($counselling) || empty($cases) || empty($question1) || empty($question2) || empty($question3)) {
            echo "empty";
        }
        else {
            if($users_appointment_status == 'true') {
                echo "taken1";
            }
            else {
                if($availability == 0) {
                    echo "taken2";
                }
                else {
                    //created a template 
                    $sql = "INSERT INTO tblappointment (users_firstname, users_lastname, users_email, users_phone, users_age, users_student_id, users_college, users_course, users_year, users_semester, appointment_schedule, appointment_arrangement, appointment_counselling, appointment_case, appointment_question_answer_1, appointment_question_answer_2, appointment_question_answer_3, appointment_status, appointment_schedule_date_format) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                    //create a prepared statement
                    $stmt = mysqli_stmt_init($conn);
                    //prepare the prepared statement
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    }
                    else {
                        //bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $users_firstname, $users_lastname, $users_email, $users_phone, $users_age, $users_student_id, $users_college, $users_course, $users_year, $users_semester, $scheduleText, $arrangement, $counselling, $cases, $question1, $question2, $question3, $status, $sheduledateformat);
                        //run parameters inside database
                        mysqli_stmt_execute($stmt);
    
                        echo "success";
                    }
    
                    $sql = "UPDATE tblusers SET users_appointment_status='true' WHERE users_email='$users_email';";
                    mysqli_query($conn, $sql);
    
                    $sql = "DELETE FROM tblschedule WHERE id='$scheduleValue';";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
?>