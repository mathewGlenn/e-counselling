<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <style>
        @page {
            size: auto;
            margin: 0;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }

        a {
            text-decoration: none;
        }

        label {
            font-weight: lighter;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: century gothic;
        }

        /* print data */
        .print-wrapper {
            padding-left: 6rem;
            padding-right: 6rem;
        }

        .logo-section {
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding-top: 3rem;
            padding-bottom: 2rem;
            gap: 1rem;
        }

        .logo-img {
            width: 80px;
        }

        .title-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .title-name {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        }

        .title-year {
            font-size: 20px;
            font-weight: 700;
            font-style: italic;
        }

        .table-section {
            margin-top: 2rem;
        }

        .table-main {
            width: 100%;
            height: 100px;
            border-collapse: separate;
            border-spacing: 0 5px;
        }

        .table-th-column {
            text-align: start;
            padding: 10px;
            border-bottom: 1px solid black;
        }

        .table-tr-rows {
            background-color: white;
        }

        .table-td-rows {
            padding: 0 10px;
        }
    </style>
    
    <title>Document</title>
</head>
<body>
    <div class="print-wrapper">
        <div class="logo-section">
            <img class="logo-img" src="../admin/assets/img/isu_seal.png">
        </div>

        <div class="title-section">
            <p class="title-name">ISU Cauayan Student Counselling<br>List of completed meetings</p>
            <p class="title-year"></p>
        </div>

        <div class="table-section">
            <table class="table-main">
                <tr class="table-tr-column">
                    <th class="table-th-column">Name</th>
                    <th class="table-th-column">Email</th>
                    <th class="table-th-column">Schedule</th>
                    <th class="table-th-column">Arrangement</th>
                </tr>

                <tr class='table-tr-rows'></tr>

                <?php
                    include "includes/db.inc.php";
                    
                    $sql = "SELECT * FROM tblappointment WHERE appointment_status='completed' ORDER BY id DESC;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
          
                    $count = 0;
                
                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
          
                        $id = $row['id'];
                        $fullname = $row['users_firstname'] . " " . $row['users_lastname'];
                        $email = $row['users_email'];
                        $schedule = $row['appointment_schedule'];
                        $arrangement = $row['appointment_arrangement'];

                        echo "
                        <tr class='table-tr-rows'>
                            <td class='table-td-rows'>$fullname</td>
                            <td class='table-td-rows'>$email</td>
                            <td class='table-td-rows'>$schedule</td>
                            <td class='table-td-rows'>$arrangement</td>
                        </tr>
                        ";
                      }
                    }
                ?>
            </table>
        </div>
    </div>

    <script>
        window.onLoad = window.print();
    </script>
</body>
</html>