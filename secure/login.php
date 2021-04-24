<?php
session_start();
include 'connection.php';
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$role=$_POST['role'];

$sql="select * from users where username='$username' and password='$password'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);
if($count==0){
	header("location:index.php?wrong");
}
else{
	$_SESSION['user'] = $row['username'];
	$_SESSION['role'] = $row['role'];
	header("location:home.php?image=image.php");
}
?>