<?php
  if(!isset($_COOKIE["visit"]))
  {
//            echo "Welcome";
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
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <!-- <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css"> -->
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
</head>
<body>

    <?php
        include('navbar.php');
      
  
    ?>
    
    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>
        
                                </div>
                            </div>
                        </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <body>

                    <div class="row">

<!-- ============================================================== -->
<!-- new customer  -->
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
    <div class="card border-3 border-top border-top-primary">
        <div class="card-body">
            <h5 class="text-muted"> Today's Views</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">1245</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end new customer  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- visitor  -->
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
    <div class="card border-3 border-top border-top-primary">
        <div class="card-body">
            <h5 class="text-muted">Earning</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">13000</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end earning  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- total orders  -->
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
    <div class="card border-3 border-top border-top-primary">
        <div class="card-body">
            <h5 class="text-muted">Users</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">1340</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end total orders  -->
<!-- ============================================================== -->
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
    <div class="card border-3 border-top border-top-primary">
        <div class="card-body">
            <h5 class="text-muted">Enquiry</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">1000</h1>
            </div>
            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<div class="text-md-right footer-links d-none d-sm-block">
    <a href="javascript: void(0);">About</a>
    <a href="javascript: void(0);">Support</a>
    <a href="javascript: void(0);">Contact Us</a>
</div>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>

<!-- ============================================================== -->
<!-- end main wrapper  -->


    
                    
</body>

</html>