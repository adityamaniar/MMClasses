<?php
	$id = $_GET['id'];
	$std = $_GET['std'];
	
	require_once('connection.php');

	$sql = "DELETE FROM student WHERE Sr_no = $id"; 

	if (mysqli_query($conn, $sql)) {
	    header('Location: manageRegister.php?std='.$std);
	    exit;
	} else {
	    echo "Error deleting record";
	}
?>