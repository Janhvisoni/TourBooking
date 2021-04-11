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
    <link rel="stylesheet" href="css/btn.css">
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
           
            $.get("admin/package_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str +="<div class='col-6 col-md-4 col-lg-3 mb-4'>";
                        str +="<div class='card mx-auto text-center'>";
                        str +=" <a href='detail_offer.php?oid="+data[i].offer_id+"'><img class='card-img-top img' src='admin/offer_imgs/"+data[i].offer_id+".jpg' alt='know more'></a>";
                        str +="<div class='card-body'>";
                        str +="<h2 class='card-title title'><a href='detail_offer.php?oid="+data[i].offer_id+"'class='btn btn-primary'>"+data[i].offer_name+"</a></h2>"; 
                        str +="<a href='Tourbook.php?oname="+data[i].offer_name+"&oid="+data[i].offer_id+ "&sdate="+data[i].start_date+"&edate="+data[i].end_date+"' class='btn btn-secondary'>Book Now</a>"
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
<hr style="border-top: 1px solid orange;"> 

<div class="containers text-center">
  <h1 class=""> <a href="quiz.php" class="rainbow rainbow-1" style="color: black;">Quiz</a>
    
</div>
<hr style="border-top: 1px solid orange;">      

</div>
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