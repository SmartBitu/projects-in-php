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
                        $query = "SELECT * from tshirt";
                        $results = mysqli_query($conn, $query);
                        if (mysqli_num_rows($results) > 0) {
                        ?>
                            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                                <tbody>
                                    <tr>
                                        <th style="text-align:left;">Name</th>
                                        <th style="text-align:left;">tshirt code</th>
                                        <th style="text-align:right;">price</th>
                                        <th align="left" colspan="2" style="text-align:center;">Options</th>

                                    </tr>
                                    <?php

                                    while ($row = mysqli_fetch_array($results)) {
                                    ?>
                                        <tr>
                                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['t_img']); ?>" class="cart-item-image" /><?php echo $row['t_name']; ?></td>
                                            <td><?php echo $row["t_code"]; ?></td>
                                            <td><?php echo $row["t_price"]; ?></td>

                                            <td style="text-align:center;"><a href="adminTEdit.php?action=edit&code=<?php echo $row["t_id"]; ?>" class="edit_btn">Edit</a></td>
                                            <td style="text-align:center;"><a href="adminTOptions.php?action=drop&code=<?php echo $row["t_id"]; ?>" class="del_btn">Delete</a></td>
                                        </tr>
                                    <?php
                                        // $total_quantity += $row["quantity"];
                                        //$total_price += ($t_price * $row["quantity"]);
                                    }
                                    ?>
                                    <!--<tr>
                                <td colspan="2" align="right">Total:</td>
                                <td align="right"><?php //echo $total_quantity; 
                                                    ?></td>
                                <td align="right" colspan="5"><strong><?php //echo "₹ " . number_format($total_price, 2); 
                                                                        ?></strong></td>
                                <td></td>
                            </tr>-->
                                </tbody>
                            </table>
                        <?php

                        } else {
                        ?>
                            <div class="no-records">Your Cart is Empty</div>
                        <?php
                        }
                        ?>
                        <br><br>
                        <div class="container-fluid  col-sm-8">
                            <form method="post" action="adminTOptions.php">

                                <?php include('errors.php'); ?>
                                <div class="input-group">
                                    <label>Full Name</label>
                                    <input type="text" name="t_name">
                                </div>
                                <div class="input-group">
                                    <label>T-shirt Price</label>
                                    <input type="text" name="t_price">
                                </div>
                                <div class="input-group">
                                    <label>T-shirt Image</label>
                                    <input type="file" name="t_img">
                                </div>
                        </div>
                        <input type="hidden" name="t_code" value="t<?php echo (rand(10, 1000)); ?>t">
                        <center>
                            <div>
                                <button type="submit" class="btn" name="t_add">Add T-Shirt</button>

                            </div>
                        </center>
                        </form>
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