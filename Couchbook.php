<?php
include('navbar.php');
include('db_config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
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
    <link rel="stylesheet" href="datetimepicker/datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="js\jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="datetimepicker/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>
    <style>
        .forming {
            border-radius: 5px;
            background-color: orange;
            padding: 20px;
            margin-left: 200px;
            margin-right: 200px;
            color: black;
        }

        h3,
        p,
        h4 {
            color: black;
        }

        .reserve {

            background-color: orangered;
            border: none;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 16px;
            float: right;
        }
    </style>
    <script>
        var plan="";
        $(document).ready(function() { 
            $.get("admin/couch_management.php", {
                    "opt": "edit",
                    "cid":<?php echo $_REQUEST["cid"];?>},
                function(data, textStatus, jqXHR) {
                    var i;
                  console.log(data);
                    data = JSON.parse(data);
                    plan=data[0].fare;
                    console.log(plan);
                })
                $('#atime').datetimepicker({
                        inline:false,
                        });
    
                     $('#dtime').datetimepicker({
                        inline:false,
                        onSelectDate:function()
                        {
                            console.log($('#dtime').datetimepicker('getValue'));
                            var start =$('#atime').datetimepicker('getValue')
                            var end = $('#dtime').datetimepicker('getValue');
                            var diff = Math.round((end-start)/(1000*60*60*24));
                            console.log(plan);
                            console.log(diff);
                            
                         var amount=plan*diff;
                         var str = amount;
                         $("#amt").html(str);
                         $('#amnt').val(str);
                            
                            }
                        });
                        $(".code").click(function(){
                        $.get("admin/vehicalbooking_management.php", {
                            "opt": "check",
                            "uid":<?php echo $_COOKIE["user_id"];?>,
                            "code": $("#coupon").val()
                        },
                                function(data, textStatus, jqXHR) {
                                    console.log(data);
                                  data = JSON.parse(data);
                                  console.log(data);
                                  if (data.result == "true") 
                                    {
                                       
                                            amount=amount-500;
                                            console.log(amount);
                                            $("#amt").html(amount);
                                            $('#amnt').val(amount);
                                    }
                                    else
                                    {
                                        asAlertMsg({
                                                type: "error",
                                                title: "Coupon Code",
                                                message: "This code is not valid!!!!",
                                                button: {
                                                    title: "Close Button",
                                                    bg: "error"
                                                }
                                                });
                                    }
                                },

                            );
                            var str = amount;
                        
                    })
                    $(".add").click(function()

                        {
                            $.post("admin/couchbooking_management.php", $("#reserve").serialize() + "&opt=add",
                                function(data) {
                                    console.log(data);
                                    data = JSON.parse(data);
                                    console.log(data);
                                    if (data.result == "true") {
                                        $.notify("Booking added", "success", function() {
                                            location.reload();

                                        });
                                    } else {
                                        $.notify("Error", "error");
                                    }
                                },

                            );

                        });
                      
                });
     
    </script>
</head>

<body>
    <div class="forming">

        <h3>Couch Booking Form</h3>
        <p> Please complete the form below to reserve in apartments
            <?php
            echo $_GET["cname"];

            ?></p>
        <hr>

        <form id="reserve">
            <input type="hidden" name="c_id" id="c_id" value="<?php echo $_GET["cid"]; ?>" />
            <input type="hidden" name="cname" id="cname" value="<?php echo $_GET["cname"]; ?>" />
            <input type="hidden" name="u_id" id="u_id" value="<?php echo $_COOKIE['user_id']; ?>" />
            <label> Full Name</label><br>
            <input type="text" id="fname" name="fname" /><br>
            <label> Phone number</label><br>
            <input type="text" id="phno" name="phno" /><br>
            <label> Email </label> <br>
            <input type="email" id="mail" name="mail" /><br>
            <hr>
            <label> Arriving date </label><br>
            <input type="text" id="atime" name="atime"/>

            <br>
            <label> Departure date </label><br>
            <input type="text" id="dtime" name="dtime"/>
             <br>
            <hr>
            <h3>Accomodation</h3>
            <label>Number of Adults</label><br>
            <input type="text" id="peps" name="peps" /><br>
            <h4>Any Special Request</h4>
            <textarea id="req" name="req"></textarea>
            <hr>
            <h3>Payment Method</h3>
            <label>Cash</label>
            <input type="radio" name="pay" id="cash" value="cash"><br>
            <label>Net Banking</label>
            <input type="radio" name="pay" id="net" value="net"><br>
            <label> Apply Coupon Code</label><br>
            <input type="text" id="coupon" name="coupon" /><br>
            <button type="button" class="code">Check</button>
            <label>You have to pay </label>
            <label  id="amt" name="amt" ></label>
            <input type="hidden" name="amnt" id="amnt"/>
            <button type="button" class="reserve add">Reserve</button>
            <br>
            <br>
        </form>
    </div>
</body>

</html>