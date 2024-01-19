<?php
    session_start();
    require("connection.php");

    function fetchDataFromDatabase() {
        require("connection.php");

        $standard = $_SESSION['SESS_STANDARD'];
        $result = mysqli_query($conn, "SELECT * FROM student_resource WHERE standard = '$standard' ORDER BY date DESC");
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Resources</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .fixed-column {
            position: sticky;
            left: 0;
        }

        .scrollable {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="scrollable">
        <table>
            <thead>
                <tr>
                    <th class="fixed-column">Uploads</th>
                    <th class="fixed-column">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $dataRows = fetchDataFromDatabase();
                    $dirName = $_SESSION['SESS_STANDARD'] . "/";
                    foreach ($dataRows as $row) {
                        echo "<tr>";
                        echo "<td class='fixed-column'><a href='" . $dirName.$row['filename'] . "' download>" . $row['filename'] . "</a></td>";
                        echo "<td class='fixed-column'>" . date('Y-m-d', strtotime($row['date'])) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Add any client-side JavaScript here if needed
    </script>
</body>
</html>
