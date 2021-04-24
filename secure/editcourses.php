<?php include 'top.php';?>
				<tr>
					<th>Course Name</th>
					<th>Course Description</th>
					<th>Edit Course</th>
					<th>Delete Course</th>
				</tr>
				<?php
					include 'connection.php';
					$sql="select * from courses";
					$res=mysqli_query($con,$sql);
					$count=mysqli_num_rows($res);
					if($count>0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
				?>	
				<tr>
					<td><?php echo htmlspecialchars($row['course_name'], ENT_QUOTES);?></td>
					<td><?php echo htmlspecialchars($row['course_des'], ENT_QUOTES);?></td>
					<td class="skd-edit"><a href="edit.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td class="skd-delete"><a href="remove.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				<?php
						}
					}
				?>
<?php include 'bottom.php';?>