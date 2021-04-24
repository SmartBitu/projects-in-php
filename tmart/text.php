<?php include "partials/_dbconnect.php";
$result = mysqli_query($conn, "INSERT INTO `cart`(`username`, `t_id`, `t_color`, `b_color`, `t_logo`, `b_text`, `t_size`, `totalprice`, `quantity`) VALUES ('xyz', '1', 'black', 'black', '0', 'text', 'XX', '1500', '5')");
?>