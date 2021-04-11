<?php
  include('navbar.php');
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
  <script>
    $(document).ready(function () {
      
      $.get("admin/transport_management.php", {
                    "opt": "edit",
                    "tid":<?php echo $_GET["tid"];?>
                },
                function(data, textStatus, jqXHR) {
                  console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    var str = "";
                    $("#tname").html(data[0].transport_name);
                    $("#type").html(data[0].transport_type);
                    $("#AC").html(data[0].AC);
                    $("#seater").html(data[0].seater);
                    $("#fare").html(data[0].t_fare);
                    $("#display").attr("src","admin/vehicle_imgs/"+data[0].transport_id+".jpg");
                    for (var i = 0; i < data.length; i++) {
                      var str = "<a href='VehicalBook.php?tname="+data[i].transport_name+"&tid="+data[i].transport_id+"' class='btn btn-secondary'>Book Now</a>";
                    $("#book").html(str);
                    }
        })
    
    });
  </script>
</head>
<body>
 
<div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  
                    <div class="mt-3">
                    <div>
                      <img src="" id="display" style="width: 370px; height:200px"/>
                    </div>
        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="tname">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="type">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">AC</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="AC">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Seater</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="seater">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Fare</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="fare">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"></h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="book">
                    
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
  
</body>
</html>
