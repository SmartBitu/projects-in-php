<?php include 'top.php';?>
	<form action="uploadcr.php" method="post" enctype="multipart/form-data">
	<tr>
		<td class="skd-right">Select File:</td>
		<td>
			<input type="file" name="file" required>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;">
			<input type="submit" value="Upload" class="btn btn-info btn-lg">
		</td>
	</tr>
	</form>
<?php include 'bottom.php';?>