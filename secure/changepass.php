<?php
session_start();
$uname = $_SESSION['user'];
$pass=$_POST['password'];
$conf=$_POST['confpass'];

include 'connection.php';
if($pass==$conf)
{
	$sql="update users set password='$pass' where username='$uname'";
	$res=mysqli_query($con,$sql);
	header("location:home.php?image=image.php");
}
else
{
	header("location:error1.php");
}
?>
