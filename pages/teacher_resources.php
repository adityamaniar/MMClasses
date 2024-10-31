<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collapsible Tables</title>
    <style>
        .collapsible {
            background-color: #03fcd3;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            text-align: centre;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        .content {
            padding: 0 10px;
            display: none;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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

    </style>
</head>
<body>

<?php
    session_start();
    require("connection.php");

    // SQL query to retrieve unique standards from the member table
    $standardsQuery = "SELECT standard FROM member WHERE standard IS NOT NULL ORDER BY mem_id";
    $standardsResult = $conn->query($standardsQuery);

    // Check if the query was successful
    if ($standardsResult) {
        // Fetch and process the standards
        while ($standardRow = $standardsResult->fetch_assoc()) {
            $standard = $standardRow['standard'];

            // Display collapsible button for each standard
            echo '<button class="collapsible">' . $standard . '</button>';
            echo '<div class="content">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th class=fixed-column>Uploads</th>';
            echo '<th class=fixed-column>Date</th>';
            echo '<th class=fixed-column>Cancel</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // SQL query to retrieve data (filename and date) from student_resource for the current standard
            $resourceQuery = "SELECT filename, date, id FROM student_resource WHERE standard = '$standard' ORDER BY date DESC";
            $resourceResult = $conn->query($resourceQuery);

            // Check if the query was successful
            if ($resourceResult) {
                // Fetch and process the resource data
                while ($resourceRow = $resourceResult->fetch_assoc()) {
                    $filename = $resourceRow['filename'];
                    $date = $resourceRow['date'];
                    $id = $resourceRow['id'];
                    $dirName = $standard . "/";

                    // Display each row in the table
                    echo "<tr>";
                    echo "<td class='fixed-column'><a href='" . $dirName.$filename . "' download>" . $filename . "</a></td>";
                    echo "<td class='fixed-column'>" . date('Y-m-d', strtotime($date)) . "</td>";
                    echo "<td class='fixed-column'><a href='delete_row.php?id=" . $id . "&filePath=" . $dirName.$filename . "'>Click to Delete Row</a></td>";
                    echo "</tr>";
                }

                // Free the resource result set
                $resourceResult->free();
            } else {
                echo "Error: " . $resourceQuery . "<br>" . $conn->error;
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
            echo '<label for="file" multiple>Select files to upload:</label>';
            echo '<input type="file" name="files[]" id="file" multiple/>';
            echo '<input type="hidden" name="dir" value="' . $standard . '" />';
            echo '<input type="submit" value="Upload" name="submit" />';
            echo '</form>';
            echo '<a href="manageRegister.php?std=3">Manage Registrations</a><br>';
            echo '<a href="change_password.php?standard=' . $standard . '">Change Password</a>';
        }

        // Free the standards result set
        $standardsResult->free();
    } else {
        echo "Error: " . $standardsQuery . "<br>" . $conn->error;
    }

    $conn->close();
?>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>
</html>