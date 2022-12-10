<?php
    include 'db.inc.php';

    //timezone manila
    date_default_timezone_set('Asia/Manila');
    //current date & time
    $timeAndDate = date('Y-m-d H:i:s');

    $d = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $timeAndDate,
        new DateTimeZone('GMT+08:00')
    );

    $timestamp = $d->getTimestamp();

    $sql = "SELECT * FROM tblschedule WHERE schedule_timestamp<'$timestamp';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];

            $sql = "DELETE FROM tblschedule WHERE id='$id';";
            mysqli_query($conn, $sql);
        }
    }

    //echo "success";
?>