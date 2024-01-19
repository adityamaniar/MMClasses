<?php
    session_start();
    require("connection.php");
    require("auth.php");

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>My Resources</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/slide.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
    <div class="bgded overlay">
      <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <div class="fl_left">
        <ul>
          <li><i class="fa fa-phone"></i> +91 9820682840</li>
          <li><i class="fa fa-envelope-o"></i> manishavmaniar@gmail.com</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul>
          <li><a href=""><i class="fa fa-lg fa-home"></i></a></li>
            <?php
              if ($_SESSION['SESS_FIRST_NAME']=='manishamom') {
                echo '<li style="font-size: 12px;">';
                echo $_SESSION['SESS_FIRST_NAME'];
              } else {
                echo '<li style="font-size: 12px;">Student Login';
              }
              echo '</li> <li style="font-size: 12px;"><a href="logout.php">Logout</a></li>';
            ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="../index.php">Manisha Maniar</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="../index.php">Home</a></li>
          <li><a id="tocontactus" href="#contact_us">Contact Me At</a></li>
        </ul>
      </nav>
    </header>
  </div>
<!-- End Top Background Image Wrapper -->

<div class="wrapper row2">
  <div id="breadcrumb" class="hoc clear"> 
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="#">My Resources</a></li>
    </ul>
  </div>
</div>
<!-- End Top Background Image Wrapper -->

<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="together">

        <?php
            if (isset($_SESSION['SESS_STANDARD'])) {
                include("student_resources.php");
            } else {
                include("teacher_resources.php");
            }
        ?>

  </main>
</div>

<div id="contact_us" class="wrapper row4 bgded overlay">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="title">Happy to help!</h6>
      <p>If you have general questions regarding the admission process or availability of batches then feel free to contact me!</p>
      <p class="btmspace-15">Please do respect a teacher's privacy and refrain from contacting me on a Sunday or during my class hours unless urgently required.</p>
    </div>
    <div class="one_third">
      <h6 class="title">Home Contact</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
            702, Parkland (Rajit Apartment), Gulmohar Cross Road No. 10, Juhu Scheme
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +91 9820682840  </li>
        <li><i class="fa fa-envelope-o"></i> manishavmaniar@gmail.com</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Class Address</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <p class="nospace">Garage No 1, Classique bldg, Gulmohar Road, Near Juhu Galli signal</p><br>
          </article>
        </li>
      </ul>
    </div>
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_right">Created by Aditya Maniar</p>
  </div>
</div>

    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <script src="../layout/scripts/jquery.tocontactus.js"></script>

</body>
</html>