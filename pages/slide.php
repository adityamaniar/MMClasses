<?php
    session_start();
    require("connection.php");
    require("auth.php");

    $sixaccess = $sevenaccess =$eightaccess = $nineaccess = $tenaccess = $elevenaccess = $twelveaccess = 0;

    if ($_SESSION['SESS_FIRST_NAME'] == 'manishamom' && $_SESSION['SESS_LAST_NAME'] == 'mom')
        $sixaccess = $sevenaccess =$eightaccess = $nineaccess = $tenaccess = $elevenaccess = $twelveaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha6'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha6' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $sixaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha7'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha7' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $sevenaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha8'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha8' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $eightaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha9'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha9' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $nineaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha10'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha10' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $tenaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha11'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha11' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $elevenaccess = 1;

    $result = mysqli_query($conn,"SELECT password FROM member WHERE username = 'manisha12'");
    $seventhLogin = mysqli_fetch_assoc($result);
    if ($_SESSION['SESS_FIRST_NAME'] == 'manisha12' && $_SESSION['SESS_LAST_NAME'] == $seventhLogin['password'])
        $twelveaccess = 1;
?>
<!DOCTYPE html>
<html>
<head>
<title>My Resources</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
          <li><i class="fa fa-envelope-o"></i> manishavmaniar@hotmail.com</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul>
          <li><a href=""><i class="fa fa-lg fa-home"></i></a></li>
            <?php
              if ($_SESSION['SESS_FIRST_NAME']=='manishamom') {
                echo '<li style="font-size: 12px;">';
                echo $_SESSION['SESS_FIRST_NAME'];
              }
              else
                echo '<li style="font-size: 12px;">Student Login';
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
      <li><a href="../index.html">Home</a></li>
      <li><a href="#">My Resources</a></li>
    </ul>
  </div>
</div>
<!-- End Top Background Image Wrapper -->

<div class="wrapper row3">
  <main class="hoc container clear"> 
    
    <div class="together">
      <div id="big six">
        <div id="six">
          <h3>6th</h3>
        </div>
        <div id="pg6">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE sixth IS NOT NULL");
              $dir = 'sixth/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['sixth'].'" download>'.$row['sixth'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
                echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
                echo '<input type="file" name="userfile" />';
                echo '<input type="hidden" name="dir" value="sixth" />';
                echo '<input type="submit" name="submit" />';
                echo '</form>';
                echo '<a href="manageRegister.php?std=6">Registered Students</a><br>';
                echo '<a href="changePass.php?std=6">Change Password</a>';
            }
          }
        ?>
      </div>


      <div id="big seven">
        <div id="seven">
          <h3>7th</h3>
        </div>
        <div id="pg7">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE seventh IS NOT NULL");
              $dir = 'seventh/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['seventh'].'" download>'.$row['seventh'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
                echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
                echo '<input type="file" name="userfile" />';
                echo '<input type="hidden" name="dir" value="seventh" />';
                echo '<input type="submit" name="submit" />';
                echo '</form>';
                echo '<a href="manageRegister.php?std=7">Registered Students</a><br>';
                echo '<a href="changePass.php?std=7">Change Password</a>';
            }
          }
        ?>
      </div>


      <div id="big eight">
        <div id="eight">
          <h3>8th</h3>
        </div>
        <div id="pg8">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE eighth IS NOT NULL");
              $dir = 'eighth/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['eighth'].'" download>'.$row['eighth'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
              echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
              echo '<input type="file" name="userfile" />';
              echo '<input type="hidden" name="dir" value="eighth" />';
              echo '<input type="submit" name="submit" />';
              echo '</form>';
              echo '<a href="manageRegister.php?std=8">Registered Students</a><br>';
                echo '<a href="changePass.php?std=8">Change Password</a>';
            }
          }
        ?>
      </div>


      <div id="big nine">
        <div id="nine">
          <h3>9th</h3>
        </div>
        <div id="pg9">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE ninth IS NOT NULL");
              $dir = 'ninth/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['ninth'].'" download>'.$row['ninth'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
              echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
              echo '<input type="file" name="userfile" />';
              echo '<input type="hidden" name="dir" value="ninth" />';
              echo '<input type="submit" name="submit" />';
              echo '</form>';
              echo '<a href="manageRegister.php?std=9">Registered Students</a><br>';
                echo '<a href="changePass.php?std=9">Change Password</a>';
            }
          }
        ?>
      </div>


      <div id="big ten">
        <div id="ten">
          <h3>10th</h3>
        </div>
        <div id="pg10">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE tenth IS NOT NULL");
              $dir = 'tenth/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['tenth'].'" download>'.$row['tenth'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
              echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
              echo '<input type="file" name="userfile" />';
              echo '<input type="hidden" name="dir" value="tenth" />';
              echo '<input type="submit" name="submit" />';
              echo '</form>';
              echo '<a href="manageRegister.php?std=10">Registered Students</a><br>';
                echo '<a href="changePass.php?std=10">Change Password</a>';
            }
          }
        ?>
      </div>


      <div id="big eleven">
        <div id="eleven">
          <h3>11th</h3>
        </div>
        <div id="pg11">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE eleventh IS NOT NULL");
              $dir = 'eleventh/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['eleventh'].'" download>'.$row['eleventh'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
              echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
              echo '<input type="file" name="userfile" />';
              echo '<input type="hidden" name="dir" value="eleventh" />';
              echo '<input type="submit" name="submit" />';
              echo '</form>';
              echo '<a href="manageRegister.php?std=11">Registered Students</a><br>';
                echo '<a href="changePass.php?std=11">Change Password</a>';
            }
          }
        ?>
      </div>

      <div id="big twelve">
        <div id="twelve">
          <h3>12th</h3>
        </div>
        <div id="pg12">  
          <table style="width:100%">
            <tr>
              <th id="dhano">UPLOADS</th>
              <th id="dhano">DATE</th>
              <?php
                if (isset($_SESSION['SESS_FIRST_NAME']))
                  if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                    echo '<th id="dhano">Cancel</th>';
              ?>
            </tr>

            <?php    
              $result1 = mysqli_query($conn,"SELECT * FROM upload WHERE twelfth IS NOT NULL");
              $dir = 'twelfth/';
              while($row = mysqli_fetch_assoc($result1)) {
                $date = strtotime($row['date']);
                echo '<tr>
                      <td><a href="'.$dir.$row['twelfth'].'" download>'.$row['twelfth'].'</a></td>
                      <td>'.date("j F Y", $date).'</td>';
                      if($_SESSION['SESS_FIRST_NAME']=="manishamom")
                        echo '<td><a href="deleteRow.php?id='.$row['id'].'">Click to Delete Row</a></td>';
                    echo '</tr>';
              }
            ?>
          </table>             
        </div>

        <?php
          if (isset($_SESSION['SESS_FIRST_NAME'])) 
          {
            if($_SESSION['SESS_FIRST_NAME']=="manishamom") 
            {
              echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
              echo '<input type="file" name="userfile" />';
              echo '<input type="hidden" name="dir" value="twelfth" />';
              echo '<input type="submit" name="submit" />';
              echo '</form>';
              echo '<a href="manageRegister.php?std=12">Registered Students</a><br>';
                echo '<a href="changePass.php?std=12">Change Password</a>';
            }
          }
        ?>
      </div>
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
          502, Diwani Mahal, Gulmohar Road No. 1, Juhu Scheme, Opposite Irla Masjid
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +91 9820682840  </li>
        <li><i class="fa fa-envelope-o"></i> manishavmaniar@hotmail.com</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Class Address</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <p class="nospace">Garage No 1, Classique bldg, Gulmohar Road, Near Juhu Galli signal</p><br>
            <time class="font-xs block btmspace-10">Monday, Wednesday, Friday, 4pm-8pm</time>
            <time class="font-xs block btmspace-10">Tuesday, Thursday, 4pm-6pm</time>
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
  <script>

    function a() {
      $( "#seven" ).animate({
      marginTop: "+=100px"},
      function(){$('#pg6').slideDown("fast");
      });
    }
      
    function b() {
      $( "#seven" ).animate({
      marginTop: "-=100px"},
      function(){$('#pg6').hide();
      });
    }

    var ab = [a,b];
    $("#six").click(function() {
      var access = <?php echo $sixaccess; ?> ;
      if (access == 1)
        ab.reverse()[1]();
    });

  </script>

  <script>

    function aa() {
      $( "#eight" ).animate({
      marginTop: "+=100px"},
      function(){$('#pg7').slideDown("fast");
      });
    }
      
    function bb() {
      $( "#eight" ).animate({
      marginTop: "-=100px"},
      function(){$('#pg7').hide();
      });
    }

    var aba = [aa,bb];
    $("#seven").click(function() { 
      var access = <?php echo $sevenaccess; ?> ;
      if (access == 1)
        aba.reverse()[1]();
    });

  </script>

  <script>

      function aaa() {
        $( "#nine" ).animate({
        marginTop: "+=100px"},
        function(){$('#pg8').slideDown("fast");
        });
      }

      function baa() {
        $( "#nine" ).animate({
        marginTop: "-=100px"},
        function(){$('#pg8').hide();
        });
      }

      var abaa = [aaa,baa];
      $("#eight").click(function() {
        var access = <?php echo $eightaccess; ?> ;
        if (access == 1)
          abaa.reverse()[1]();
      });

  </script>

  <script>

      function aaa1() {
        $( "#ten" ).animate({
        marginTop: "+=100px"},
        function(){$('#pg9').slideDown("fast");
        });
      }

      function baa1() {
        $( "#ten" ).animate({
        marginTop: "-=100px"},
        function(){$('#pg9').hide();
        });
      }

      var abaa1 = [aaa1,baa1];
      $("#nine").click(function() { 
        var access = <?php echo $nineaccess; ?> ;
        if (access == 1)
          abaa1.reverse()[1]();
      });

  </script>

  <script>

      function elevenDown() {
        $( "#eleven" ).animate({
        marginTop: "+=100px"},
        function(){$('#pg10').slideDown("fast");
        });
      }

      function elevenUp() {
        $( "#eleven" ).animate({
        marginTop: "-=100px"},
        function(){$('#pg10').hide();
        });
      }

      var forTen = [elevenDown,elevenUp];
      $("#ten").click(function() { 
        var access = <?php echo $tenaccess; ?> ;
        if (access == 1)
          forTen.reverse()[1]();
      });

  </script>

  <script>

      function twelveDown() {
        $( "#twelve" ).animate({
        marginTop: "+=100px"},
        function(){$('#pg11').slideDown("fast");
        });
      }

      function twelveUp() {
        $( "#twelve" ).animate({
        marginTop: "-=100px"},
        function(){$('#pg11').hide();
        });
      }

      var forEleven = [twelveDown,twelveUp];
      $("#eleven").click(function() { 
        var access = <?php echo $elevenaccess; ?> ;
        if (access == 1)
          forEleven.reverse()[1]();
      });

  </script>

  <script>

      function abb() {
        $('#pg12').slideDown("fast");
      }

      function bbb() {
        $('#pg12').hide();
      }

      var abb = [abb,bbb];
      $("#twelve").click(function() { 
        var access = <?php echo $twelveaccess; ?> ;
        if (access == 1)
         abb.reverse()[1]();
      });

  </script>

</body>
</html>