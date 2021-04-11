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
           
            $.get("hotel_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].hotel_id + "</td>";
                        str += "<td>" + data[i].hotel_name + "</td>";
                        str += "<td>" + data[i].city_name + "</td>";
                        str += "<td>" + data[i].state_name + "</td>";
                        str += "<td>" + data[i].no_of_rooms + "</td>";
                        str += "<td>" + data[i].descriptions + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#editHotel' data-hid='" + data[i].hotel_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-hid='" + data[i].hotel_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-hid='" + data[i].hotel_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "<button type='button' class='btn btn-warning upd' data-toggle='modal' data-target='#uploadPicture' data-hid='" + data[i].hotel_id + "'style='margin-right:16px;'>Select file </button></td>";
                        str += "</tr>";


                    }
                    $("#hotel tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("hid"));
                        var hid=$(this).data("hid");
                        $.post("hotel_management.php", {"opt":"del","hid":hid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Hotel Deleted", "success",function(){
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
                    $(".add").click(function()
                    
                    {
                        
                   
                         $.post("hotel_management.php",$("#forms").serialize()+"&opt=add",

                       // $.post("hotel_management.php", {"opt":"add","hname":hname,"city":city,"state":state,"room":room,"desc":desc},
                            function (data) {
                                console.log(data);
                                data = JSON.parse(data);           
                               console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Hotel added","success",function(){
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
                    $(".edit").click(function()
                    
                    {
                        var hid=$(this).data("hid");
                        console.log($(this).data("hid"));
                        $.post("hotel_management.php", {"opt":"edit","hid":hid},
                            function (data, textStatus, jqXHR) {
                                console.log(data);
                                data = JSON.parse(data);  
                                console.log(data);

                                
                               $("#hname").val(data[0].hotel_name); 
                               $("#cname").val(data[0].city_name);
                               $("#sname").val(data[0].state_name);
                               $("#room").val(data[0].no_of_rooms); 
                               $("#des").val(data[0].descriptions);
                               $("#h_id").val(data[0].hotel_id);
                               $('#editHotel').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("hotel_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
                    });
                    $(".upd").click(function()
                    
                    {
                        var hid=$(this).data("hid");
                        console.log($(this).data("hid"));
                        console.log(data);
                        $("#hotel_id").val (hid);
                        $('#uploadPicture').modal('show');               

                    });   
                },
            );
        });
    </script>
</head>

<body>
    <?php include('navbar.php'); ?>
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Hotels</h2>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addHotel">Add Hotel</button>
    </div>
    <div id="addHotel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add new hotel</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="forms">

        <table>
        <tbody>
            <tr>
            <td><label> Hotel name</label></td>
            <td><input type="text" placeholder="name" name="hname" /></td>
            </tr>
            <tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname" /></td>
            </tr>
            <tr>
            <td><label> State</label></td>
            <td><input type="text" placeholder="state" name="sname" /></td>
            </tr>
            <tr>
            <td><label>rooms</label></td>
            <td><input type="text" placeholder="rooms" name="room" /></td>
            </tr>
            <tr>
            <td><label>Description</label></td>
            <td><input type="textbox" placeholder="description" name="des" /><td>
            </tr>
            </tbody>
            </table>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success add" data-add="modal">Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>


    <div id="editHotel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit hotel</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="editing">
        <table>
        <tbody>
           
            <tr>
            <td><label> Hotel name</label></td>
            <td><input type="text" placeholder="name" name="hname" id="hname"/></td>
            </tr>
            <tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname" id="cname"/></td>
            </tr>
            <tr>
            <td><label> State</label></td>
            <td><input type="text" placeholder="state" name="sname" id="sname"/></td>
            </tr>
            <tr>
            <td><label>rooms </label></td>
            <td><input type="text" placeholder="rooms" name="room" id="room"/></td>
            </tr>
            <tr>
            <td><label>Description</label></td>
            <td><input type="textbox" placeholder="description" name="des" id="des"/></td>
            <td><input type="hidden" name="h_id" id="h_id"/></td>
            </tr>
           
            </tbody>
            </table>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning chng" data-add="modal">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>


    <div id="uploadPicture" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Upload Picture</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form action="upload.php?opt=hid" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="hotel_id" id="hotel_id"/>
            <button type="submit" class="btn btn-warning" data-add="modal" name="submit">Upload</button>
        </form>
        </div>
        </div>
    </div>
    </div>



   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="hotel">
            <thead>
                <tr>
                    <td> hotel_id </td>
                    <td> hotel_name</td>
                    <td> city_name </td>
                    <td> state_name </td>
                    <td> no_of_rooms </td>
                    <td> Description </td>
                    <td> actions </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>