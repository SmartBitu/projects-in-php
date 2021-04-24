<html>
	<head>
		<title>SK Developer Penetration Testing Website</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/sound-mouseover.js"></script>
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-2 logo">
						<a href="index.php"><img src="img/logo.png" class="skd-logo" height="70px"></a>
					</div>
					<div class="col-sm-10 nav">
						<ul>
							<li><a href="home.php?image=image.php" onmouseover="playclip();">Home</a></li>
								<audio>
									<source src="sound/click.mp3"></source>
									<source src="sound/click.ogg"></source>
								</audio>
							<li><a href="about.php" onmouseover="playclip();">About Us</a></li>
							<li><a href="service.php" onmouseover="playclip();">Services</a></li>
							<li><a href="contact.php" onmouseover="playclip();">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>