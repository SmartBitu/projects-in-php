<?php
session_start();
$uname=$_SESSION['user'];
include 'header.php';
?>
<div class="container">
	<div class="row main center skd-info">
		<h1>Set Your Profile Picture.</h1>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<label for="file">
			<span class="glyphicon glyphicon-user skd-file-icon"></span>
			<input type="file" id="file" name="file" class="skd-file">
			</label><br>
			<input type="submit" value="Upload" class="btn btn-info" name="submit">
		</form>
	</div>
</div>
<?php include 'footer.php';?>