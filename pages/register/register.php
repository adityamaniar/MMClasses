<?php
session_start();
?>
<!DOCTYPE HTML> 
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1">
				<meta charset="utf-8">
				<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
				<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
				<link rel="stylesheet" href="../layout/styles/reg.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>				
	</head>
	<body> 
		<div class="box">
			<style>
			.error{
				color:red;
			}
			</style>
			<form method="post" action="registerStu.php">
			<p>Fields marked with <span class="error">*</span> are compulsory to be filled</p> 
			<h4>Personal Details:</h4>
			<input type="text" id="ad" name="name" value placeholder="Full Name Of The Student" autofocus/><span class="error"> *
			<?php if( isset($_SESSION['nameErr']) ) {
										echo $_SESSION['nameErr'];
										unset($_SESSION['nameErr']);
										}?></span>
			<input type="text" id="ad1" name="pname" value placeholder="Full Name Of The Parent:" /><span class="error"> * 
			<?php if( isset($_SESSION['pnameErr']) ) {
										echo $_SESSION['pnameErr'];
										unset($_SESSION['pnameErr']);
										}?></span></br><p></p></br>
			<input type="text" name="rname" id="ad" value placeholder="Recommended/Referred By"/></br><p></p></br>
			<h4>Contact Details:</h4><p></p>022-
				<input type="text" id="add" name="res" value placeholder="Res" />
						 +91-<input type="text" id="add1" name="mbl" value placeholder="Mobile"/><span class="error"> * <?php if( isset($_SESSION['mblErr']) ) {
										echo $_SESSION['mblErr'];
										unset($_SESSION['mblErr']);
										}?></span></br><p></p></br>
			<h4>Year:</h4>
			<input id="ad" type="text" name="year" value placeholder="Admission for year" /> <span class="error"> * <?php if( isset($_SESSION['yearErr']) ) {
										echo $_SESSION['yearErr'];
										unset($_SESSION['yearErr']);
										}?></span><p>Eg: 2024-25</p></br><p></p></br>
									<h4>Standard: <span class="error">*</h4>

			<span class="error"> <?php if( isset($_SESSION['stdErr']) ) {
										echo $_SESSION['stdErr'];
										unset($_SESSION['stdErr']);
										}?></span><p></p>
					<div class="stdd"><input type="radio" id="six" name="std" value="6">Std 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<script>
					  $('#six').click(function()
						{
						  $('.six1').removeAttr("disabled");
						  $('.seven').attr("disabled",true);
						  $('.eight').attr("disabled",true);
						  $('.ten').attr("disabled",true);
						  });</script>
					<input type="radio" name="std" id="sev" class="ad2" value="7">Std 7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<script>
					  $('#sev').click(function()
						{
						  $('.seven').removeAttr("disabled");
						  $('.six1').attr("disabled",true);
						  $('.eight').attr("disabled",true);
						  $('.ten').attr("disabled",true);
						});</script>
					<input type="radio" name="std" id="eig" class="ad2" value="8">Std 8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<script>
					  $('#eig').click(function()
						{
						  $('.eight').removeAttr("disabled");
						  $('.six1').attr("disabled",true);
						  $('.seven').attr("disabled",true);
						  $('.ten').attr("disabled",true);
						});</script>
					<input type="radio" name="std" id="nin" class="ad2" value="9">Std 9&10 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<script>
					  $('#nin').click(function()
						{
						  $('.eight').removeAttr("disabled");
						  $('.six1').attr("disabled",true);
						  $('.seven').attr("disabled",true);
						  $('.ten').attr("disabled",true);
						});</script>
					<input type="radio" name="std" id="ten1" class="ad2" value="10">Std 10(crash course)</div></br><p></p>
					<script>
					  $('#ten1').click(function()
						{
						  $('.ten').removeAttr("disabled");
						  $('.six1').attr("disabled",true);
						  $('.seven').attr("disabled",true);
						  $('.eight').attr("disabled",true);
						});
					</script>
					</br></br><input id="button" type="submit" name="submit" value="submit"> 
			
			</form>
		</div>
	</body>
</html>