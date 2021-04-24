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
    <div class="header">
        <p class="fs-1"><b>Payment Details</b></p>
    </div>
    </center>

    


<?php
require "partials/_footer.php";
?>
</body>

</html>