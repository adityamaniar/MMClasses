<?php
	//Start session
	session_start();
    ob_start();
	//Include database connection details
	require_once('../connection.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Sanitize the POST values
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if ($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
 
	//Create query
	$qry="SELECT * FROM member WHERE username='$username' AND password='$password'";
	$result=mysqli_query($conn,$qry);
 
	//Check whether the query was successful or not
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
			$_SESSION['SESS_STANDARD'] = $member['standard'];
			$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			$_SESSION['SESS_LAST_NAME'] = $member['password'];

			session_write_close();
			header("location: ../resources.php");
			exit();
		} else {
			//Login failed
			$errmsg_arr = 'Username and/or Password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: login.php");
				exit();
			}
		}
	} else {
		die("Query failed");
	}
?>