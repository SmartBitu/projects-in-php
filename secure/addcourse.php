<?php
include 'top.php';
?>
				<tr>
					<th>Course Name</th>
					<th>Course Description</th>
				</tr>
				<form action="add.php" method="post">
				<tr>
					<td><input type="text" name="cname" class="form-control" placeholder="Enter Course Name" required></td>
					<td><textarea name="cdesc" class="form-control" required placeholder="Enter Course Description"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center;">
						<input type="submit" value="Add Course" class="btn btn-info">
					</td>
				</tr>
				</form>
<?php include 'bottom.php';?>