<html lang="en">

<head>
  <title>Promocode</title>
  <link rel="stylesheet" href="css\as-alert-message.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js\as-alert-message.min.js"></script>
</head>

<body>

  <div class="container">
    <?php
    require("db_config.php");
    $n = 6;
    $code = "";
    $id = $_COOKIE["user_id"];
    $count = $_REQUEST['count'];
    if ($count == 2) {


      function getName($n)
      {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomString = "";

        for ($i = 0; $i < $n; $i++) {
          $index = rand(0, strlen($characters) - 1);
          $randomString .= $characters[$index];
        }
        return $randomString;
      }
      $code = getName($n);

      $res = array();
      $rs = mysqli_query($conn, "INSERT INTO coupon(user_id, coupon_code)  VALUES ($id, '$code')") or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) {
     //   echo $code;
        ?>
        <script>
          $(document).ready(function() {
            asAlertMsg({
              type: "success",
              title: "Here is your coupon code Copy this!!",
              message: "<?php echo $code ?>",
              button: {
                title: "Close Button",
                bg: "success"
              }
            })
          });
        </script>

    <?php
      } else {
        echo false;
        echo mysqli_error($conn);
    
      }
    } else {
      ?>
      <script>
        $(document).ready(function() {
          asAlertMsg({
            type: "error",
            title: "Great try",
            message: "Better luck next time!!!",
            button: {
              title: "Close Button",
              bg: "error"
            }
          })
        });
      </script>

  <?php
    }
    ?>


</body>

</html>