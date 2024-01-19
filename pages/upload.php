<?php
	session_start();
	require("connection.php");

	if (isset($_FILES['file'])) {
	    $file_name = $_FILES["file"]["name"];
        $target_dir = $_POST["dir"];
	    $file_destination = $target_dir . "/" . basename($file_name);

        move_uploaded_file($_FILES["file"]["tmp_name"], $file_destination);

	    date_default_timezone_set("Asia/Kolkata");
        $today_date = date("Y-m-d");

	    $qry = "INSERT INTO student_resource (standard, filename, date) VALUES
	                                        ('$target_dir', '$file_name', '$today_date')";
	    $result = mysqli_query($conn, $qry);
        if ($result) {
            echo "File uploaded successfully!";
            header("location: resources.php");
            exit();
        } else {
            echo "Error: " . $qry . "<br>" . mysqli_error($conn);
        }
	}
    mysqli_close($conn);
?>