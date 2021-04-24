<div class="container">
	<div class="row main">
	<?php 
		if(isset($_GET['wrong']))
		{
			echo '<div class="alert alert-danger alert-dismissable fade in skd-alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Username or Password Incorrect.</strong></div>';
		}
	?>
	  <div class="col-sm-2"></div>
	  <div class="col-sm-6" id="login">
			<form class="form-horizontal" action="login.php" method="post">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<h1 class="form-title">Administrator Login</h1>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="username">Username:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="password">Password:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
						</div>
				</div>
					<input type="hidden" name="role" value="admin">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<div class="submit">
						<input type="submit" value="Login" class="btn btn-info">
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>