<?php
session_start();

include 'header.php';
if(empty($_SESSION['user']))
{
include 'body.php';
}else{
	header("location:home.php?image=image.php");
}
include 'footer.php';
?>