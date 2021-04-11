<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="css\font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css\login.css">
    <script src="js\jquery.min.js"></script>

    <style>
    .error
        {
            color: red;
            font-size: 12px;
            
        }
    </style>
    <script>
        $(document).ready(function(){
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
</head>
<body>

    <div class="main">
    <a href="index.php"><span><i class="fa fa-home" aria-hidden="true"></i></a>
         <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="reg.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form" >
                        <h2 class="form-title">Sign in</h2>
                        <form method="get" class="register-form" id="cform" action="check.php">
                            <div class="form-group">
                                <label for="your_name"></label>
                                <input type="text" name="username" id="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                            <div class="form-group error">
                            <?php
                              if(isset($_GET["error"]))
                              {       
                                echo($_GET["error"]);
                              }   
                              
                            ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

</body>
</html>