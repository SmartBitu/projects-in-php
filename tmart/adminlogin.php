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
        <div class="header" class="fs-1"><b>Admin Login</b>
        </div>
    </center>
    <div class="container-fluid  col-sm-8">
        <form method="post" action="adminlogin.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_admin">Login</button>
            </div>
            <p>
                Not yet a member? <a href="adminregiser.php">Sign up</a>
            </p>
        </form>
    </div>

    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>