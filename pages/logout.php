<?php
session_start();
if (isset($_SESSION['SESS_FIRST_NAME'])) {
    unset($_SESSION['SESS_STANDARD']);
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
   header("location: ../index.php");
 }
?>
