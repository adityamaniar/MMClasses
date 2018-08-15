<?php
	$id = $_GET['id'];
	
	require_once('connection.php');

	$sql = "DELETE FROM upload WHERE id = $id"; 

	if (mysqli_query($conn, $sql)) {
	    header('Location: slide.php');
	    exit;
	} else {
	    echo "Error deleting record";
	}
?>