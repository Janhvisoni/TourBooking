<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
	<script>
        $ (document).ready(function(){
            $("#cform").validate({
                rules:{
                    username:"required",
    
                    password:{
                        required:true,
                        minlength:3,
                    },
				},
               
            });
            
        });
    </script>

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .error
        {
            color: red;
            font-size: 18px;
            
        }
    </style>
</head>

<body style="background-image: url(assets/images/background.jpg);  background-size: cover;">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">Login<span class="splash-description"></span></div>
            <div class="error" style="text-align: center;">
						<?php
							if(isset($_GET["error"]))
							{       
								echo($_GET["error"]);
							}   
							
						?>
					</div>
            <div class="card-body">
                <form  id="cform" action="check.php" method="get/post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
     
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</body>
 
</html>