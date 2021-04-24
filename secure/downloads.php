<?php include 'top.php';?>
			<tbody>
				<tr>
					<td style="text-align:center;">To download any file just click on respective file.</td>
				</tr>
				<?php
					include 'connection.php';
					$sql="select * from curriculum";
					$res=mysqli_query($con,$sql);
					$count=mysqli_num_rows($res);
					if($count>0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
				?>	
				<tr>
					<td style="text-align:center;"><a href="download.php?name=uploads/<?php echo $row['file'];?>"><?php echo $row['file'];?></a></td>
				</tr>
			</tbody>
				<?php
						}
					}
				?>
<?php include 'bottom.php';?>