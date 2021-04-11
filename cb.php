<?php
  if(!isset($_COOKIE["visit"]))
  {
      header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/libs/js/notify.min.js"></script>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <!-- <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css"> -->
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
   
    <script>
        $(document).ready(function() {
           
            $.get("couchbooking_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].b_id + "</td>";
                        str += "<td>" + data[i].name + "</td>";
                        str += "<td>" + data[i].cname + "</td>";
                        str += "<td>" + data[i].contact + "</td>";
                        str += "<td>" + data[i].email+ "</td>";
                        str += "<td>" + data[i].arriving_date + "</td>";
                        str += "<td>" + data[i].departure_date + "</td>";
                        str += "<td>" + data[i].Peoples + "</td>";
                        str += "<td>" + data[i].request + "</td>";
                        str += "<td>" + data[i].pay + "</td>";
                        str += "<td>" + data[i].price + "</td>";
                        str += "</tr>";


                    }
                    $("#book tbody").html(str);   
                },
            );
        });
    </script>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Booking</h2>

            </div>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
 
  <div class="card-body">
    <h5 class="card-title">Choose 1 option to get Booking info</h5>
     </div>
  <ul class="list-group list-group-flush">
   <a href="book.php" class="card-link" style="margin-left: 20px; ">Hotel </a>
  </ul>
  <ul class="list-group list-group-flush">
   <a href="cb.php" class="card-link" style="margin-left: 20px;">Couch </a>
  </ul>
  <ul class="list-group list-group-flush">
   <a href="vb.php" class="card-link" style="margin-left: 20px;">Vehicals</a>
  </ul>
  </div>

   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="book">
            <thead>
                <tr>
                    <td>Booking_ID</td>
                    <td> Name</td>
                    <td>Apartment Name</td>
                    <td>Contact</td>
                    <td>Email</td>
                    <td>Check in</td>
                    <td>Check out</td>
                    <td>Peoples</td>
                    <td>request</td>
                    <td>pay</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>