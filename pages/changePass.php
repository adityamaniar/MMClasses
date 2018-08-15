<?php
/**
 * Created by PhpStorm.
 * User: aditya
 * Date: 13/8/18
 * Time: 11:02 PM
 */

    require_once("connection.php");
    $std = $_GET['std'];
    if($std == 6)
      $standard = 'manisha6';
    else if($std == 7)
        $standard = 'manisha7';
    else if($std == 8)
        $standard = 'manisha8';
    else if($std == 9)
        $standard = 'manisha9';
    else if($std == 10)
        $standard = 'manisha10';
    else if($std == 11)
        $standard = 'manisha11';
    else if($std == 12)
        $standard = 'manisha12';
?>

<html>
    <head>
        <title>Change Passsword</title>
    </head>
    <body>
        <form action="changePassForm.php" method="post">
            <?php
                $result = mysqli_query($conn,"SELECT password FROM member WHERE username = '$standard'");
                $seventhLogin = mysqli_fetch_assoc($result);
                $answer = $seventhLogin['password'];
            ?>
            Old password is: <?php echo "$answer"; ?><br>
            Enter New Password: <input type="text" name="NewPass"><br>
            <input type="hidden" name="std" value="<?php echo $standard; ?>">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
