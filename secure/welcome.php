<?php
session_start();
$uname = $_SESSION['user'];
include 'header.php';
include 'connection.php';
?>
<div class="container">
	<div class="row main center skd-info">
		<h1>Welcome
		<?php
			$sql = "select * from users where username='$uname'";
			$res = mysqli_query($con,$sql);
			$count = mysqli_num_rows($res);
			if($count>0)
			{
				while($row = mysqli_fetch_assoc($res))
				{
					echo $row['firstname']." ".$row['lastname'];
				}
			}
			else{
				header("location:error1.php");
			}
		?> !!!</h1>
		<h3 class="skd-color">Congratulations !!! Your account has been created successfully.</h3><br>
		<a href="dp.php"><button type="button" class="btn btn-default btn-lg">Continue to your Profile</button></a>
	</div>
</div>
<?php include 'footer.php';?>