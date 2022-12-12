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

        /* main wrapper */
        .main-wrapper {
            width: 1000px;
            margin: 0 auto;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* table wrapper */
        .table-wrapper {
            min-width: 500px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #e8e4e4;
        }

        /* table header */
        .table-header {
            display: flex;
            flex-direction: row;
            gap: 0.7rem;
            width: 100%;
        }

        .header-button {
            display: flex;
            flex-direction: row;
            gap: 0.5rem;
            padding: 0.7rem;
            padding-right: 1rem;
            border: none;
            background-color: royalblue;
            border: 1px solid royalblue;
            color: white;
            cursor: pointer;
        }

        /* table main */
        .table-content {
            width: 100%;
            height: 100px;
            border-collapse: separate;
            border-spacing: 0 5px;
        }

        .th-column {
            width: 30%;
            text-align: start;
            padding: 10px;
        }

        .tr-rows {
            background-color: white;
        }

        .tr-rows:last-child {
            border-spacing: 0;
        }

        .td-rows {
            padding: 10px;
        }

        /* graph wrapper */
        .graph-main {
            margin: 4rem 10rem;
            padding: 4rem;
            height: 600px;
            box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
        }

        /* print data */
        .print-wrapper {
            padding-left: 7rem;
            padding-right: 7rem;
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
            width: 300px;
            text-align: start;
            padding: 10px;
            border-bottom: 1px solid black;
        }

        .table-th-column:first-child {
            padding-left: 50px;
        }

        .table-tr-rows {
            background-color: white;
        }

        .table-td-rows {
            padding: 0 10px;
            text-transform: capitalize;
        }

        .table-td-rows:first-child {
            padding-left: 50px;
        }
    </style>
    
    <title>Document</title>
</head>
<body>
    <div class="print-wrapper">
        <div class="logo-section">
            <img class="logo-img" src="images/merge.png">
            <img class="logo-img" src="images/minecraft.png">
        </div>

        <div class="title-section">
            <p class="title-name" style="text-alignment:center">Isabela State University - Cauayan City<br>Student Counselling</p>
        </div>

        <div class="table-section">
            <table class="table-main">
                <tr class="table-tr-column">
                    <th class="table-th-column">Room Type</th>
                    <th class="table-th-column">Price</th>
                    <th class="table-th-column">Date</th>
                </tr>

                <tr class='table-tr-rows'></tr>

                <tr class='table-tr-rows'>
                    <td class='table-td-rows'>$roomtype</td>
                    <td class='table-td-rows'>$price</td>
                    <td class='table-td-rows'>$date</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        window.onLoad = window.print();
    </script>
</body>
</html>