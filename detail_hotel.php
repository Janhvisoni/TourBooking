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
      
      $.get("admin/hotel_management.php", {
                    "opt": "edit",
                    "hid":<?php echo $_GET["hid"];?>
                },
                function(data, textStatus, jqXHR) {
                  console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    var str="";
                    $("#hname").html(data[0].hotel_name);
                    $("#cname").html(data[0].city_name);
                    $("#sname").html(data[0].state_name);
                    $("#room").html(data[0].no_of_rooms);
                    $("#desc").html(data[0].descriptions);
                    $("#amen").html(data[0].amenities);    
                                   
                    $("#display").attr("src","admin/hotel_imgs/"+data[0].hotel_id+".jpg");
                    for (var i = 0; i < data.length; i++) {
                      var str = "<a href='Hotelbook.php?hname="+data[i].hotel_name+"&hid="+data[i].hotel_id+"' class='btn btn-secondary'>Book Now</a>";
                    $("#book").html(str);
                    }
        })
        $.get("admin/hotel_management.php", {
                    "opt": "inner",
                    "hid":<?php echo $_GET["hid"];?>
                },
                function(data, textStatus, jqXHR) {
                  console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    var str="";
                    for (var i = 0; i < data.length; i++) {
                    str +=  data[i].category + ":";
                    str +=  data[i].price + "<br>";
                    }

                    $("#price").html(str);  
        })
           
     });
  </script>
  <style>
  .book{
    background-color: orangered;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }
  .book:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
  </style>
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
                      <h6 class="mb-0"> Name Of Hotel</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="hname">
                    
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
                      <h6 class="mb-0">State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="sname">
                    
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
                      <h6 class="mb-0">About</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="desc">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Amenities</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="amen">
                    
                    </div>
                  </div>
                  <hr style="margin-right: 200px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prices</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="price">
                    
                    </div>
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
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Types</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="type">
                    
                    </div>
                  </div> -->
                 </div>
              </div>
            </div>
          </div>
  
</body>
</html>
