<?php
session_start();
include "partials/_dbconnect.php";
include "partials/_logic.php";
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header("location: adminlogin.php");
}
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
        <div class="header" class="fs-1"><b>Admin Dashboard</b>
        </div>
    </center>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 sidenav">
                <?php require "partials/_sidebar.php"; ?>
            </div>
            <div class="col-sm-10">
                


            </div>
        </div>
    </div>


    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>