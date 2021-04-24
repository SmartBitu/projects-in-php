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
    <div class="header" class="fs-1"><b>T-SHIRTS</b>
    </div>
    </center>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">

                    <?php
                    $sql_query = "SELECT * FROM tshirt";
                    $result_d = mysqli_query($conn, $sql_query);
                    if (mysqli_num_rows($result_d) > 0) {
                        while ($row = mysqli_fetch_array($result_d)) {
                            echo '<div class="col">';
                            echo '<form class="login-form" action="http://localhost/tmart/tshirt.php" method="POST">';
                            //echo '<a class="block relative h-48 rounded overflow-hidden" href="http://localhost/tmart/tshirt.php?item=' . $row['t_id'] . '">';
                            echo '<img alt="ecommerce" width="30%" height="40%" src="data:image/jpeg;base64,' . base64_encode($row['t_img']) . '"/>';
                            echo '
                                <div class="mt-4">
                                    <h2 class="text-gray-900 title-font text-lg font-medium">' . $row['t_name'] . '</h2>
                                    <p class="mt-1">₹ ' . $row['t_price'] . '</p>
                                </div>';
                            echo '<input type="hidden" name="t_id" value="' . $row['t_id'] . '">';
                            echo '<button class="btn btn-info" name="productid" type="submit"> Buy Now </button>';
                            //echo '<button type="submit" class="btn btn-primary">Search id</button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<label>Data not Found</label>';
                    }
                    ?>
                    <!--<img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">-->

                </div>

            </div>
        </div>
    </section>
    

<?php
require "partials/_footer.php";
?>
</body>

</html>