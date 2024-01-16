<?php
    session_start();
    require_once('connection.php');
    $err = false;
 
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
	    $_SESSION['nameErr'] = $nameErr;
	    $err=true;
    } else {
        $name = $_POST["name"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed"; 
            $_SESSION['nameErr'] = $nameErr;
	        $err=true;
        }
    }
   
    if (empty($_POST["pname"])) {
        $pnameErr = "Parent Name is required";
	    $_SESSION['pnameErr'] = $pnameErr;
	    $err=true;
    } else {
        $pname = $_POST["pname"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$pname)) {
            $pnameErr = "Only letters and white space allowed";
            $_SESSION['pnameErr'] = $pnameErr;
	        $err=true;
        }
    }
   
    $rname = $_POST["rname"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $rname)) {
        $rnameErr = "Only letters and white space allowed"; 
        $_SESSION['rnameErr'] = $rnameErr;
	    $err = true;
    }
       
    $res = $_POST["res"];

    if (empty($_POST["mbl"])) {
        $mblErr = "Mobile No. is required";
	    $_SESSION['mblErr'] = $mblErr;
        $err = true;
    } else {
        $mbl = $_POST["mbl"];
        if (!preg_match("/^[0-9]{10}/", $mbl)) {
            $mblErr = "Enter a valid mobile number";
            $_SESSION['mblErr'] = $mblErr;
            $err = true;
        }
    }
    
    if (empty($_POST["year"])) {
        $yearErr = "Year is required";
    	$_SESSION['yearErr'] = $yearErr;
    	$err=true;
    } else {
        $year = $_POST["year"];
        if (preg_match("/[a-zA-Z]/", $year)) {
            $yearErr = "No letters allowed. Please see the example below";
        	$_SESSION['yearErr'] = $yearErr;
        	$err=true;
        }
    }

    if (empty($_POST["std"])) {
        $stdErr = "Standard is required";
	    $_SESSION['stdErr'] = $stdErr;
	    $err = true;
    } else {
        $std = $_POST["std"];
    }

   
    if ($err) {
    	session_write_close();
    	header("location: register.php");
    	exit();
    } else {
	    $qry="insert into student(year,name,pname,rname,res,mbl,std,date) values('$year','$name','$pname','$rname','$res','$mbl','$std',CURDATE())";	
	    $result=mysqli_query($conn,$qry);
	    if ($result) {
	        $_SESSION['REGISTER_ID'] = true;
	        session_write_close();
	        header("location: ../index.php");
	        exit();
	    }
	}
?>