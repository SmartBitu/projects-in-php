<?php
include 'top.php';
$sql="select * from users where username='$uname'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count>0)
{
	while($row=mysqli_fetch_assoc($res))
	{
?>	
	<img src="profile/<?php echo $row['dp'];?>" height="100"><br>
	<br>
	<tr>
		<td class="skd-right">Username:</td>
		<td><?php echo $row['username'];?></td>
	</tr>
	<form action="update.php" method="post">
	<tr>
		<td class="skd-right">Name:</td>
		<td>
			<div class="row">
				<div class="col-xs-6">
					<input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname'];?>" required>
				</div>
				<div class="col-xs-6">
					<input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'];?>" required>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td class="skd-right">Email:</td>
		<td>
			<input type="email" class="form-control" value="<?php echo $row['email'];?>" name="email" required>
		</td>
	</tr>
	<?php
		if($row['role']=="user")
		{
	?>
	<tr>
		<td class="skd-right">Profile:</td>
		<td>
			<select class="form-control" id="profile" name="profile" required>
				<?php
					$opt=$row['profile'];
					switch ($opt) {
						case "Student":
							echo "<option selected>Student</option>
								<option>Web Designer</option>
								<option>Web Developer</option>
								<option>Web Penetration Tester</option>";
							break;
						case "Web Designer":
							echo "<option>Student</option>
								<option selected>Web Designer</option>
								<option>Web Developer</option>
								<option>Web Penetration Tester</option>";
							break;
						case "Web Developer":
							echo "<option>Student</option>
								<option>Web Designer</option>
								<option selected>Web Developer</option>
								<option>Web Penetration Tester</option>";
							break;
						default:
							echo "<option>Student</option>
								<option>Web Designer</option>
								<option>Web Developer</option>
								<option selected>Web Penetration Tester</option>";
					}
				?>
			</select>
		</td>
	</tr>
		<?php }?>
	<tr class="skd-link">
		<td class="skd-right"><a href="change.php">Change Password</a></td>
		<td><a href="uppro.php">Update Profile Picture</a></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;">
			<input type="submit" value="Update" class="btn btn-info btn-lg">
		</td>
	</tr>
	</form>
<?php
	}
}
else{
	header("location:error1.php");
}
?>
<?php include 'bottom.php';?>