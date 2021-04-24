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
</head>

<body>
    <?php
    require "partials/_header.php";
    ?>
    <br><br><br><br>
    
    <div class="header" class="fs-1">
        <center><b>T-SHIRT customization</b></center>
    </div>
    

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="row">
                <div class="col-sm-5">
                    <div1>
                    <?php $sql_query = "SELECT * FROM tshirt where t_id = '$t_id'";
                    $result_d = mysqli_query($conn, $sql_query);
                    if (mysqli_num_rows($result_d) > 0) {
                        while ($row = mysqli_fetch_array($result_d)) {
                            echo '<br><br><h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">' . $row['t_name'] . '
                            </h1>
                            <p class="mb-8 leading-relaxed"><b>₹ ' . $row['t_price'] . '</b></p>';
                    
                            echo '<form method="POST" action="tshirt.php?tid='. $row['t_id'].'">' ?>
                                <label>Enter T-Shirt Color : </label>
                                <input type="color" name="t_color"><br><br>
                                <label>Enter T-Shirt Border Color : </label>
                                <input type="color" name="b_color"><br><br>

                                <label>Enter T-Shirt Logo : </label>
                                <input type="file" name="t_logo"><br><br>

                                <label>Text On backside of T-shirt : </label>
                                <input type="text" name="b_text"><br><br>

                                <label>Enter T-Shirt Size : </label>
                                <select name="t_size" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>No selected</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="3XL">3XL</option>
                                </select><br>

                                <label>Enter T-Shirt Quantity : </label>
                                <input type="number" name="t_quantity"><br><br>
                                <input type="hidden" value="<?php echo $t_id; ?>" name="t_id">
                                <button class="btn btn-info" name="productadd" type="submit"> Add to Cart </button>

                                
                            </form>
                    </div1>

            </div>
    <?php
                            echo '<div class="col-sm-4">
                    <img alt="hero"  src="data:image/jpeg;base64,' . base64_encode($row['t_img']) . '"/>
                </div>';
                        }
                    } else {
                        echo 'No data Found';
                    }
    ?>



        </div>
        </div>
    </section>
    


    <?php
    require "partials/_footer.php";
    ?>
</body>

</html>