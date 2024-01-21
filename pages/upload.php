<?php
	session_start();
	require("connection.php");

	if (isset($_FILES['files']['name'])) {
	    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

	        $file_name = $_FILES['files']['name'][$i];
            $file_tmp_name = $_FILES['files']['tmp_name'][$i];
            $target_dir = $_POST["dir"];
            $file_destination = $target_dir . "/" . basename($file_name);

            if (move_uploaded_file($file_tmp_name, $file_destination)) {
                echo "File $file_name uploaded successfully.<br>";
                date_default_timezone_set("Asia/Kolkata");
                $today_date = date("Y-m-d");

                $qry = "INSERT INTO student_resource (standard, filename, date) VALUES
                                                    ('$target_dir', '$file_name', '$today_date')";
                $result = mysqli_query($conn, $qry);
                if ($result) {
                    echo "File uploaded into the table successfully!";
                    header("location: resources.php");
                    exit();
                } else {
                    echo "Error: " . $qry . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error uploading ". $file_name . "<br>";
            }
	    }
	}
    mysqli_close($conn);
?>