<?php
session_start();
$id=$_GET['id'];
include 'connection.php';

$sql="delete from courses where id='$id'";
$res=mysqli_query($con,$sql);
if($res)
{
	header("location:courses.php");
}
else
{
	header("location:error1.php");
}
?>
