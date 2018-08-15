<?php
	session_start();
	require("connection.php");
	
	$file_name = $_FILES["userfile"]["name"];
	$target_dir = $_POST["dir"];
	$target_file = $target_dir . "/". basename($_FILES["userfile"]["name"]);
    move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file);
    date_default_timezone_set("Asia/Kolkata");
    $todayDate = date("Y-m-d");
	$qry = "insert into upload(username, ".$target_dir.", date) values ('manishamom','$file_name', '$todayDate')";
	$result = mysqli_query($conn,$qry);
	if($result) {
		header("location:slide.php");
		exit();
	}
	else {
		echo "Error: " . $qry . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>