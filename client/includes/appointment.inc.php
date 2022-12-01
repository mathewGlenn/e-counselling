<?php
    if(isset($_POST['submit'])) {
        include 'db.inc.php';
        include 'loginverify.inc.php';

        $scheduleValue = $_POST['scheduleValue'];

        $sql = "SELECT * FROM tblschedule WHERE id='$scheduleValue';";
        $result = mysqli_query($conn, $sql);
        $availability = mysqli_num_rows($result);

        $scheduleText = $_POST['scheduleText'];
        $arrangement = $_POST['arrangement'];
        $services = $_POST['services'];
        $counselling = $_POST['counselling'];
        $cases = $_POST['cases'];
        $additional = $_POST['additional'];
        $status = "pending";

        if($scheduleText == "No available") {
            echo "availability";
        }
        else if(empty($arrangement) || empty($services)) {
            echo "empty";
        }
        else {
            if($services == "Counselling Services") {
                if(empty($counselling) || empty($cases)) {
                    echo "empty";
                }
                else {
                    if($availability == 0) {
                        echo "taken";
                    }
                    else {
                        //created a template 
                        $sql = "INSERT INTO tblappointment (users_email, users_fullname, users_college, users_course, users_year, appointment_schedule, appointment_arrangement, appointment_service, appointment_counselling, appointment_case, appointment_additional_information, appointment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                        //create a prepared statement
                        $stmt = mysqli_stmt_init($conn);
                        //prepare the prepared statement
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed";
                        }
                        else {
                            //bind parameters to the placeholder
                            mysqli_stmt_bind_param($stmt, "ssssssssssss", $users_email, $users_fullname, $users_college, $users_course, $users_year, $scheduleText, $arrangement, $services, $counselling, $cases, $additional, $status);
                            //run parameters inside database
                            mysqli_stmt_execute($stmt);

                            echo "success";
                        }

                        $sql = "DELETE FROM tblschedule WHERE id='$scheduleValue';";
                        mysqli_query($conn, $sql);
                    }
                }
            }
            else {
                if($availability == 0) {
                    echo "taken";
                }
                else {
                    //created a template 
                    $sql = "INSERT INTO tblappointment (users_email, users_fullname, users_college, users_course, users_year, appointment_schedule, appointment_arrangement, appointment_service, appointment_additional_information, appointment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                    //create a prepared statement
                    $stmt = mysqli_stmt_init($conn);
                    //prepare the prepared statement
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    }
                    else {
                        //bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt, "ssssssssss", $users_email, $users_fullname, $users_college, $users_course, $users_year, $scheduleText, $arrangement, $services, $additional, $status);
                        //run parameters inside database
                        mysqli_stmt_execute($stmt);

                        echo "success";
                    }

                    $sql = "DELETE FROM tblschedule WHERE id='$scheduleValue';";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
?>