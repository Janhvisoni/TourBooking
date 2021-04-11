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
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <script src="assets/libs/js/notify.min.js"></script>
    <script>
    $(document).ready(function () {
        $.get("user_management.php", {"opt":"all"},
        function (data, textStatus, jqXHR) {
            console.log(data);
            data=JSON.parse(data);
            console.log(data);

            var str="";
            for(var i=0;i<data.length;i++)
            {
                    str+="<tr>";
                    str+="<td>"+data[i].user_id+"</td>";
                    str+="<td>"+data[i].first_name+"</td>";
                    str+="<td>"+data[i].last_name+"</td>";
                    str+="<td>"+data[i].username+"</td>";
                    str+="<td>"+data[i].gender+"</td>";
                    str+="<td>"+data[i].role+"</td>";
                    str+="<td>"+data[i].contact_no+"</td>";
                    str+="<td>"+data[i].email_id+"</td>";
                    str+="<td><button type='button'  class='btn btn-danger del' data-uid='" + data[i].user_id + "'style='margin-right:16px;' >Delete</button></td>";
                    str+="</tr>";


            }
            $("#user tbody").html(str);
            $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("uid"));
                        var uid=$(this).data("uid");
                        $.post("user_management.php", {"opt":"del","uid":uid},
                            function (data, textStatus, jqXHR) {
                                console.log(data);
                                data = JSON.parse(data);  
                              
                                if(data.result=="true")
                                {
                                    $.notify("User Banned", "success",function(){
                                        location.reload();

                                    });
                                }
                                else
                                {
                                    $.notify("Error", "error");
                                }
                            },
                           
                        );
                    });
        },
    );
    });
    </script>
</head>
<body>
    <?php include('navbar.php'); 
        include('db_config.php');
    ?>
     <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Users</h2>
        
                                </div>
                            </div>
                        </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="user">
    <thead>
      <tr> 
          <td> user_id </td> 
          <td> first_name</td> 
          <td> last_name </td> 
          <td> username </td> 
          <td> gender </td> 
          <td> role </td>
          <td> contact number </td>  
          <td>email_id </td>
          <td>Action</td>
               
          
      </tr>
    </thead>
    <tbody>

    </tbody>
    </table>
    
    </div>
</body>
</html>