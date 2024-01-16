<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 13/8/18
 * Time: 11:10 PM
 */

    require_once("connection.php");
    $newPass = $_POST['NewPass'];
    $stand = $_POST['std'];
    echo $newPass;
    echo $stand;
    $result = "UPDATE member SET password = '$newPass' WHERE username = '$stand'";
    if (mysqli_query($conn, $result)) {
        header("Location: slide.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
?>