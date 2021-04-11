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
           
            $.get("transport_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].transport_id + "</td>";
                        str += "<td>" + data[i].transport_name + "</td>";
                        str += "<td>" + data[i].transport_type + "</td>";
                        str += "<td>" + data[i].seater + "</td>";
                        str += "<td>" + data[i].AC + "</td>";
                        str += "<td>" + data[i].t_fare + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#editHotel' data-tid='" + data[i].transport_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-tid='" + data[i].transport_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-tid='" + data[i].transport_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "<button type='button' class='btn btn-warning upd' data-toggle='modal' data-target='#uploadPicture' data-tid='" + data[i].transport_id + "'style='margin-right:16px;'>Select file </button></td>";
                        str += "</tr>";


                    }
                    $("#hotel tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("tid"));
                        var tid=$(this).data("tid");
                        $.post("transport_management.php", {"opt":"del","tid":tid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Transport Deleted", "success",function(){
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
                        
                   
                         $.post("transport_management.php",$("#forms").serialize()+"&opt=add",

                       // $.post("hotel_management.php", {"opt":"add","hname":hname,"city":city,"state":state,"room":room,"desc":desc},
                            function (data) {
                                console.log(data);
                                data = JSON.parse(data);           
                               console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Transport added","success",function(){
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
                        var tid=$(this).data("tid");
                        console.log($(this).data("tid"));
                        $.post("transport_management.php", {"opt":"edit","tid":tid},
                            function (data, textStatus, jqXHR) {
                                console.log(data);
                                data = JSON.parse(data);  
                                console.log(data);

                                
                               $("#tname").val(data[0].transport_name); 
                               $("#type").val(data[0].transport_type);
                               $("#AC").val(data[0].AC);
                               $("#seater").val(data[0].seater); 
                               $("#fare").val(data[0].t_fare);
                               $("#t_id").val(data[0].transport_id);
                               $('#editHotel').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("transport_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
                    });
                    $(".upd").click(function()
                    
                    {
                        var tid=$(this).data("tid");
                        console.log($(this).data("tid"));
                        console.log(data);
                        $("#t_id").val (tid);
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
            <td><label>  name</label></td>
            <td><input type="text" placeholder="name" name="tname" /></td>
            </tr>
            <tr>
            <td><label> Type</label></td>
            <td><input type="text" placeholder="type" name="type" /></td>
            </tr>
            <tr>
            <td><label> Seater</label></td>
            <td><input type="text" placeholder="seater" name="seater" /></td>
            </tr>
            <tr>
            <td><label>AC</label></td>
            <td><input type="text" placeholder="AC" name="AC" /></td>
            </tr>
            <tr>
            <td><label>Fare</label></td>
            <td><input type="textbox" placeholder="fare" name="fare"/><td>
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
            <td><label>  Name</label></td>
            <td><input type="text" placeholder="name" name="tname" id="tname"/></td>
            </tr>
            <tr>
            <td><label> Type</label></td>
            <td><input type="text" placeholder="type" name="type" id="type"/></td>
            </tr>
            <tr>
            <td><label> Seater</label></td>
            <td><input type="text" placeholder="seater" name="seater" id="seater"/></td>
            </tr>
            <tr>
            <td><label>AC</label></td>
            <td><input type="text" placeholder="AC" name="AC" id="AC"/></td>
            </tr>
            <tr>
            <td><label>Fare</label></td>
            <td><input type="textbox" placeholder="fare" name="fare" id="fare"/><td>
            <td><input type="hidden" name="t_id" id="t_id"/></td>
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
        <form action="upload.php?opt=tid" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="t_id" id="t_id"/>
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
                    <td> id </td>
                    <td> name</td>
                    <td> type </td>
                    <td> seater </td>
                    <td> AC </td>
                    <td> Fare </td>
                    <td> actions </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>