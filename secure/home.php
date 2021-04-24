<?php
include 'top.php';
$sql="select * from users where username='$uname'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
$dp=$_GET['image'];
if($dp=='image.php')
{
include $dp;
}
else{
	echo "<font color='red'>Not a valid file</font>";
}
if($count>0)
{
	while($row=mysqli_fetch_assoc($res))
	{
?>	
	<img src="profile/<?php echo $image;?>" height="100"><br>
	<br>
	<tr>
		<td class="skd-right">Username:</td>
		<td><?php echo $row['username'];?></td>
	</tr>
	<tr>
		<td class="skd-right">Name:</td>
		<td><?php echo $row['firstname']." ".$row['lastname'];?></td>
	</tr>
	<tr>
		<td class="skd-right">Email:</td>
		<td><?php echo $row['email'];?></td>
	</tr>
	<tr>
		<td class="skd-right">Profile:</td>
		<td><?php echo $row['profile'];?></td>
	</tr>
<?php
	}
}
else{
	header("location:error1.php");
}
?>
<?php include 'bottom.php';?>