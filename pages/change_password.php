<?php
    session_start();
    require_once("connection.php");
    require_once("auth.php");
    $standard = $_GET['standard'];

?>
<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
        <form action="change_password_form.php" method="post">
            <?php
                $result = mysqli_query($conn,"SELECT password FROM member WHERE standard = '$standard'");
                $row = mysqli_fetch_assoc($result);
                $password = $row['password'];
            ?>
            Old password is: <?php echo "$password"; ?><br>
            Enter New Password: <input type="text" name="NewPass"><br>
            <input type="hidden" name="std" value="<?php echo $standard; ?>">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
