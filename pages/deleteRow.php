<?php
	$id = $_GET['id'];
	$filePath = $_GET['filePath'];
	
	require_once('connection.php');

	$sql = "DELETE FROM upload WHERE id = $id";
	unlink($filePath);

	if (mysqli_query($conn, $sql)) {
	    header('Location: slide.php');
	    exit;
	} else {
	    echo "Error deleting record";
	}
?>