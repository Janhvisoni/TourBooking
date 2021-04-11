<?php
    include('navbar.php');
    if(!isset($_COOKIE["visit"]))
    {
        header("Location:login.php?error=login");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico">
    

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	<link rel="stylesheet" href="css/style.css">
    <script src="js\jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>


    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">


<style>
    .above{
        margin-left: 200px;
        margin-right: 200px;
    }
    
    .extra
    {
        margin-top: 50px;
        margin-left: 30px;
        font-size: 20px;
    }
    .img
    {
        height:139px; 
        width: 247px;
    }
    .extra:hover{
        background-color: orangered;
    }
    .extra:link
    {
        color: white;
    }
    .extra:active{
        color: white;
    }
    a:link{
        text-decoration: none;
    }
</style>
<script>
        $(document).ready(function() {
           
            $.get("admin/hotel_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str +="<div class='col-6 col-md-4 col-lg-3 mb-4'>";
                        str +="<div class='card mx-auto text-center'>";
                        str +=" <a href='detail_hotel.php?hid="+data[i].hotel_id+"'><img class='card-img-top img' src='admin/hotel_imgs/"+data[i].hotel_id+".jpg' alt='know more'></a>";
                        str +="<div class='card-body'>";
                        str +="<h2 class='card-title title'><a href='detail_hotel.php?hid="+data[i].hotel_id+"'class='btn btn-primary'>"+data[i].hotel_name+"</a></h2>"; 
                        str +="<a href='Hotelbook.php?hname="+data[i].hotel_name+"&hid="+data[i].hotel_id+"' class='btn btn-secondary'>Book Now</a>"
                        str +="</div>";
                        str +="</div>";
                        str +="</div>";
                        
                    }
                    $("#row ").html(str);
        })
    });
    
    </script>
</head>

<body>
<div class="above">

<div  data-spy="scroll" data-target=".navbar" >
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="book_hotel.php" class="nav-item nav-link active extra ">Hotel</a>
                <a href="book_couch.php" class="nav-item nav-link extra">Apartments</a>
                <a href="book_vehical.php" class="nav-item nav-link extra">Vehical</a>
               
            </div>
        </div>
    </nav>
</div> 
<hr style="border-top: 1px solid orange;">       


<div class="container-fluid">
  <div class="row" id="row">
  
        
    </div>
</div>

</div>

<footer>
    <div id="footer">
        <div class="container">
            
                
    </div>
</footer>

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