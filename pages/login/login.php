<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../layout/styles/login.css"> 
    <link rel="stylesheet" href="../../layout/styles/login1.css"> 
  </head>

  <body>
    <div class="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Login</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>WELCOME BACK!</h1>
          <?php
            if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
            echo '<ul class="err">';
            foreach($_SESSION['ERRMSG_ARR'] as $msg) {
              echo '<li style="color:white">',$msg,'</li>'; 
              }
            echo '</ul>';
            unset($_SESSION['ERRMSG_ARR']);
            }
          ?>
          <form action="logup.php" method="post">     
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="on"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <!--<p class="forgot"><a href="#">Forgot Password?</a></p>-->
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          

        </div>
        
      </div><!-- tab-content -->
      
    </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../../layout/scripts/login.js"></script>
  </body>
</html>
