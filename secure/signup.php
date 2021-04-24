<?php
session_start();
include 'connection.php';
$fname=mysqli_real_escape_string($con,$_POST['firstname']);
$lname=mysqli_real_escape_string($con,$_POST['lastname']);
$uname=mysqli_real_escape_string($con,$_POST['username']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$profile=mysqli_real_escape_string($con,$_POST['profile']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$confpass=mysqli_real_escape_string($con,$_POST['confpass']);
$role=mysqli_real_escape_string($con,$_POST['role']);
$image=mysqli_real_escape_string($con,$_POST['dp']);
if($password==$confpass){
	$sql="select * from users where username='$uname'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res); 
	if($count==0){
		$sql="insert into users(firstname,lastname,username,email,profile,password,role) values ('$fname','$lname','$uname','$email','$profile','$password','$role')";
		$res=mysqli_query($con,$sql);
		if($res){
			$_SESSION['user'] = $uname;
			$_SESSION['role'] = $role;
			header("location:welcome.php");
		}
		else{
			header("location:error.php");
		}
	}
	else{
		header("location:index.php?exist");
	}
}
else{
	header("location:index.php?error");
}
?>