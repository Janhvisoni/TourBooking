
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Travel</title>
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

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

<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>


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
	color: white;
}
.size{
	height: 233px;
	width: 349px;
}
</style>
<script>
	$(document).ready(function() {
	   
		$.get("admin/surfing_management.php", {
				"opt": "all"
			},
			function(data, textStatus, jqXHR) {
				
				data = JSON.parse(data);
				var str = "";
				for (var i = 0; i < data.length; i++) {
					str += "<div class='col-lg-4 col-md-4 col-sm-6'>";
					str +="<div class='fh5co-blog box'>";
					str += "<a href='#'><img class='img-responsive size' src='admin/place_imgs/"+data[i].place_id+".jpg' alt=''></a>";
					str += "<div class='blog-text'>";
					str += "<div class='prod-title'>";
					str +="<h3><a href='#'>"+data[i].place_name+"</a></h3>";
					str +="<span class='posted_by'><a href=''>"+data[i].city_name+"</a></span><br>";
					str +="<span class='posted_by'>"+data[i].date+"</span><br>";
					str +="<p style='color:black'>"+data[i].descriptions+"</p>";
					str +="<p><a href='https://en.wikipedia.org/wiki/"+data[i].place_name+"'>Learn More...</a></p>";
					str +="</div>";
					str +="</div>"; 
					str +="</div>";
					str +="</div>";  
				}
				$("#surf ").html(str);
	})
});

</script>
</head>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">

	<?php include("navbar.php") ?>

	<div class="jumbotron jumbotron-fluid top text">
	<h1 class="display-4 ">Exploring world!</h1>

	</div>

	

	<div id="fh5co-blog-section" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					<h3>Our Blog</h3>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p> -->
				</div>
			</div>
		</div>
		
		<div class="container">
	
		
				<div id="surf">

				</div>

		</div>
		</div>
	<footer>
		<div id="footer">
			<div class="container">
				
					
		</div>
		</div>
	</footer>



<!-- jQuery -->



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
<script src="js/classie.js"></script>
<script src="js/selectFx.js"></script>

<!-- Main JS -->
<script src="js/main.js"></script>

</body>
</html>

