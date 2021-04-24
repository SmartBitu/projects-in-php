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
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<tr>
		<td class="skd-right">Select picture:</td>
		<td>
			<input type="file" name="file" required>
		</td>
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