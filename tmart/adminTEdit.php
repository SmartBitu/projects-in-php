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
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 sidenav">
                <?php require "partials/_sidebar.php"; ?>
            </div>
            <div class="col-sm-10">
                <div id="shopping-cart">

                    <center>
                        <?php
                        if(isset($_GET['action'])){
                            switch ($_GET["action"]) {
                                case "edit":
                        $tid = $_GET['code'];
                        $query = "SELECT * from tshirt where `t_id`='$tid'";
                        $results = mysqli_query($conn, $query);
                        if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_array($results)) {
                        ?>
                        <br><br>
                        <div class="container-fluid  col-sm-8">
                            <form method="post" action="adminTOptions.php">

                                <?php include('errors.php'); ?>
                                <div class="input-group">
                                    <label>Full Name</label>
                                    <input type="text" name="t_name" value="<?php echo $row['t_name']; ?>">
                                </div>
                                <div class="input-group">
                                    <label>T-shirt Price</label>
                                    <input type="text" name="t_price" value="<?php echo $row['t_price']; ?>">
                                </div>
                                <div class="input-group">
                                    <label>T-shirt Image</label>
                                    <input type="file" name="t_img">
                                </div>
                        
                        
                        <input type="hidden" name="t_id" value="<?php echo $row['t_id']; ?>">
                        <center>
                            <div>
                                <button type="submit" class="btn" name="t_update">Update T-Shirt</button>

                            </div>
                            </center>
                            <?php
                        }}
                        break;
                        ?>
                            </form>
                            </div>
                        
                        <?php
                        }}
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>