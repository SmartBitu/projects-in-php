<?php
session_start();
include "partials/_dbconnect.php";
include "partials/_logic.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "partials/_head.php";
    ?>
    <link rel="stylesheet" href="partials/_style.css">
</head>

<body>
    <?php
    require "partials/_header.php";
    ?>
    <br><br><br><br><br>
    <center>
        <p class="header" class="fs-1"><b>Register</b></p>
    </center>
    <div class="container-fluid  col-sm-8">
        <form method="post" action="regiser.php">

            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name">
            </div>
            <div class="input-group">
                <label>Full address</label>
                <input type="text" name="address">
            </div>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>Password   .</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>

    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>