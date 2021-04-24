<?php
session_start();
$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($file_tmp, "uploads/".$file_name);
include 'connection.php';
$sql = "insert into curriculum(file) values('$file_name')";
$res = mysqli_query($con,$sql);
header("location:downloads.php");
?>
