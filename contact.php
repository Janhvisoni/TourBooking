<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Travel</title>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		.top{
			background-image: url('images/2.jpg');
			height: fit-content; 
			width:100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.text{
			color:white;
			
		}
	</style>

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<?php include("navbar.php") ?>
	
		<div class="jumbotron jumbotron-fluid top text">
		<h1 class="display-4 ">Hello world!</h1>
		<!--  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		<hr class="my-4"> -->
		
		</div>
		

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Feedback Here!!</h3>
					</div>
				</div>
				<form action="reply.php" method="get/post">
					<div class="row animate-box">
						<div class="col-md-6">
							<h3 class="section-title">Our Address</h3>
							<ul class="contact-info">
								<li><i class="icon-location-pin"></i>198 West</li>
								<li><i class="icon-phone2"></i>+0000000000</li>
							</ul>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email" name="email" id="email">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="feedback" class="form-control" id="feedback" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Send Feedback" class="btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<footer>
			<div id="footer">
				<div class="container">
					
				
				</div>
			</div>
		</footer>
	
	</div>
	

	</div>
	

	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

