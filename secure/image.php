<?php
$sql1 = "select dp from users where username='$uname'";
$res1 = mysqli_query($con,$sql1);
$dp = mysqli_fetch_assoc($res1);
$image=$dp['dp'];
?>