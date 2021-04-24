<?php
session_start();
$uname = $_SESSION['user'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$email=$_POST['email'];
$profile=$_POST['profile'];

include 'connection.php';

$sql="update users set firstname='$fname', lastname='$lname', email='$email', profile='$profile' where username='$uname'";
$res=mysqli_query($con,$sql);
if($res)
{
	header("location:home.php?image=image.php");
}
else
{
	header("location:error1.php");
}
?>
