<?php
session_start();
$id = $_POST['cid'];
$cname=$_POST['cname'];
$cdesc=$_POST['cdesc'];
include 'connection.php';

$sql="update courses set course_name='$cname', course_des='$cdesc' where id='$id'";
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
