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
      
      $.get("admin/couch_management.php", {
                    "opt": "edit",
                    "cid":<?php echo $_REQUEST["cid"];?>
                },
                function(data, textStatus, jqXHR) {
                  console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    var str = "";
                    $("#aname").html(data[0].couch_name);
                    $("#cname").html(data[0].city_name);
                    $("#address").html(data[0].address);
                    $("#room").html(data[0].room_offer);
                    $("#facilities").html(data[0].facilities);
                    $("#amenities").html(data[0].amenities);
                    $("#fare").html(data[0].fare);
                    $("#display").attr("src","admin/couch_imgs/"+data[0].couch_id+".jpg");
                    for (var i = 0; i < data.length; i++) {
                      var str = "<a href='Couchbook.php?cname="+data[i].couch_name+"&cid="+data[i].couch_id+"' class='btn btn-secondary'>Book Now</a>";
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
                      <h6 class="mb-0"> Name </h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="aname">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="cname">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="address">
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Facilities</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="facilities">
                    </div>
                  </div>
                  
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Room</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="room">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">amenities</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="amenities">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">fare</h6>
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
