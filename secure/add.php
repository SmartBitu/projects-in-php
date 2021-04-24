<?php
include 'connection.php';
$cname=$_POST['cname'];
$cdes=$_POST['cdesc'];
$sql="insert into courses(course_name, course_des) values('$cname', '$cdes')";
$res=mysqli_query($con,$sql);
if($res)
{
	header("location:courses.php");
}
else{
	header("location:error1.php");
}
?>