<?php
    require_once("connection.php");
    $new_pass = $_POST['NewPass'];
    $standard = $_POST['std'];
    $result = "UPDATE member SET password = '$new_pass' WHERE standard = '$standard'";
    if (mysqli_query($conn, $result)) {
        header("Location: resources.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
?>