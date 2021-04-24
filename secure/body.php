<div class="container">
	<div class="row main">
	<?php 
		if(isset($_GET['error']))
		{
			echo '<div class="alert alert-danger alert-dismissable fade in skd-alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Passwords does not match !!! Please Enter same password in both field.</strong></div>';
		}
		if(isset($_GET['wrong']))
		{
			echo '<div class="alert alert-danger alert-dismissable fade in skd-alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Username or Password Incorrect.</strong></div>';
		}
		if(isset($_GET['exist']))
		{
			echo '<div class="alert alert-danger alert-dismissable fade in skd-alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>User already exist, please change your username.</strong></div>';
		}
	?>
	  <div class="col-sm-6" id="login">
			<form class="form-horizontal" action="login.php" method="post">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<h1 class="form-title">Login Here</h1>
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
							<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
						</div>
				</div>
					<input type="hidden" name="role" value="user">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<div class="submit">
						<input type="submit" value="Login" class="btn btn-info">
					</div>
				</div>
			</form>
		</div>

<!-- *****************     Sign Up **********************-->

		<div class="col-sm-6" id="signup">
			<form class="form-horizontal" action="signup.php" method="post">
				<div class="col-sm-4"></div>
				<div class="col-sm-8">
					<h1 class="form-title">Signup Here</h1>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="fname">First Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="fname" placeholder="Enter first name" name="firstname" required>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="lname">Last Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lastname">
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="uname">Username:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="email">Email:</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="profile">Profile:</label>
						<div class="col-sm-8">
							<select class="form-control" id="profile" name="profile" required>
								<option>Student</option>
								<option>Web Designer</option>
								<option>Web Developer</option>
								<option>Web Penetration Tester</option>
							</select>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="password">Password:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
						</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4 skd-text" for="confpass">Confirm Password:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="confpass" placeholder="Re-enter password" name="confpass" required>
						</div>
				</div>
				<div class="col-sm-4"></div>
				<input type="hidden" name="role" value="user">
				<div class="col-sm-8">
					<div class="submit">
						<input type="submit" value="Signup" class="btn btn-info">
					</div>
				</div>
			</form>
		</div>
	 
	</div>
</div>