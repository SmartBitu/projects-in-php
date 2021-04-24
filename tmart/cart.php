<?php
session_start();
include "partials/_dbconnect.php";
if (!isset($_SESSION['success']) || $_SESSION['success'] != true) {
    $_SESSION['message'] = "login in required";
    header("location: login.php");
}
include "partials/_logic.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "partials/_head.php";
    ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <link rel="stylesheet" href="partials/_style.css">
</head>

<body>
    <?php
    require "partials/_header.php";
    ?>
    <br><br><br><br><br>




    <!-- Cart ---->
    <div id="shopping-cart">
        <center>
            <div class="header" class="fs-1">
                <div class="txt-heading"><b>Your Cart</b></div>
            </div>
        </center>
        <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
        <?php
            $total_quantity =0;
            $total_price= 0;
        $username = $_SESSION['username'];
        $sql = "SELECT * from cart where username='$username'";
        $results = mysqli_query($conn, $sql);
        if (mysqli_num_rows($results) > 0) {
        ?>
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Name</th>
                            <th style="text-align:left;">Color</th>
                            <th style="text-align:right;">Border</th>
                            <th style="text-align:right;">Logo</th>
                            <th style="text-align:right;">Text</th>
                            <th style="text-align:center;">Size</th>
                            <th style="text-align:center;">Quantity</th>
                            <th style="text-align:center;">Price</th>
                            <th style="text-align:center;">Remove</th>
                        </tr>
                        <?php
                      
                            while ($row = mysqli_fetch_array($results)) {
                        
                        
                        $query = "SELECT * from tshirt where t_id='" . $row['t_id'] . "'";
                        $res = mysqli_query($conn, $query);
                        while ($col = mysqli_fetch_array($res)) {
                            $t_img = $col["t_img"];
                            $t_name = $col["t_name"];
                            $t_price = $col["t_price"];
                        }
                        ?>
                        <tr>
                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($t_img); ?>" class="cart-item-image" /><?php echo $t_name; ?></td>
                            <td><?php echo $row["t_color"]; ?></td>
                            <td><?php echo $row["b_color"]; ?></td>
                            <td><?php echo $row["t_logo"]; ?></td>
                            <td><?php echo $row["b_text"]; ?></td>
                            <td><?php echo $row["t_size"]; ?></td>
                            <td style="text-align:right;"><?php echo $row["quantity"]; ?></td>
                            <td style="text-align:right;"><?php echo "₹ " . $t_price; ?></td>
                            <!--<td style="text-align:right;"><?php //echo "₹ " . number_format($row['totalprice'], 2); 
                                                                ?></td>-->
                            <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $row["c_id"]; ?>" class="btnRemoveAction"><img src="img/icon-delete.png" alt="Remove Item" /></a></td>
                        </tr>
                    <?php
                    $total_quantity += $row["quantity"];
                    $total_price += ($t_price * $row["quantity"]);
                }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="5"><strong><?php echo "₹ " . number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            <?php

        } else {
            ?>
                <div class="no-records">Your Cart is Empty</div>
            <?php
        }
            ?>
            <form action="cart.php" method="POST">

                <button class="btn btn-info" name="productsave" type="submit"> Buy Now </button>
            </form>
    </div>

    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>