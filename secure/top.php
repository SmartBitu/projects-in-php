<?php
session_start();
$uname = $_SESSION['user'];
$role = $_SESSION['role'];
include 'header.php';
include 'connection.php';
?>
<div class="container">
	<div class="row main">
		<div class="col-xs-12 nav2">
			<ul>
				<li><a href="home.php?image=image.php">Profile</a></li>
				<li><a href="editpro.php?image=image.php">Edit Profile</a></li>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="editcourses.php">Edit Courses</a></li>
<?php
if($role=="admin"){
?>
				<li><a href="addcourse.php">Add Course</a></li>
				<li><a href="curriculum.php">Upload Curriculum</a></li>
<?php
}
?>						
				<li><a href="downloads.php">Download</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="row skd-profile table-responsive">
			<table class="table skd-table">