<?php

session_start();
require_once('connection.php');

$err = false;


     if (empty($_POST["year"])) {
     $yearErr = "Year is required";
	 $_SESSION['yearErr'] = $yearErr;
	 $err=true;
   } else {
     $year = $_POST["year"];
   }
   
 
     if (empty($_POST["name"])) {
     $nameErr = "Name is required";
	 $_SESSION['nameErr'] = $nameErr;
	 $err=true;
   } else {
     $name = $_POST["name"];
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
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
     }
  }
   
   
     $rname = $_POST["rname"];
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$rname)) {
       $rnameErr = "Only letters and white space allowed"; 
     }
       
     $res = $_POST["res"];
   
   
   if (empty($_POST["mbl"])) {
     $mblErr = "Mobile No. is required";
	 $_SESSION['mblErr'] = $mblErr;
         $err = true;
   } else {
     $mbl = $_POST["mbl"];
   }

   if (empty($_POST["std"])) {
     $stdErr = "Standard is required";
	 $_SESSION['stdErr']=$stdErr;
	 $err=true;
   } else {
     $std = $_POST["std"];
   }

   
if($err) {
		session_write_close();
		header("location: register.php");
		exit();
	}
else {
	$qry="insert into student(year,name,pname,rname,res,mbl,std,date) values('$year','$name','$pname','$rname','$res','$mbl','$std',CURDATE())";	
	$result=mysqli_query($conn,$qry);
		if($result) {
		  header("location: ../home.php");
		  exit();
		}
	}

?>