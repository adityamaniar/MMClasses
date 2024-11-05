<?php
	$mysql_hostname = "localhost";
	$mysql_user = "adityamaniar";
	$mysql_password = "Aavm@240196";
	$mysql_database = "simplelogin";
	$conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>