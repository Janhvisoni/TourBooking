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
           
            $.get("package_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].offer_id + "</td>";
                        str += "<td>" + data[i].offer_name + "</td>";
                        str += "<td>" + data[i].descriptions + "</td>";
                        str += "<td>" + data[i].fare + "</td>";
                        str += "<td>" + data[i].start_date + "</td>";
                        str += "<td>" + data[i].end_date + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#editHotel' data-oid='" + data[i].offer_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-oid='" + data[i].offer_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-oid='" + data[i].offer_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "<button type='button' class='btn btn-warning upd' data-toggle='modal' data-target='#uploadPicture' data-oid='" + data[i].offer_id + "'style='margin-right:16px;'>Select file </button></td>";
                        str += "</tr>";


                    }
                    $("#hotel tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("oid"));
                        var oid=$(this).data("oid");
                        $.post("package_management.php", {"opt":"del","oid":oid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify(" Deleted", "success",function(){
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
                        
                   
                         $.post("package_management.php",$("#forms").serialize()+"&opt=add",
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
                        var oid=$(this).data("oid");
                        console.log($(this).data("oid"));
                        $.post("package_management.php", {"opt":"edit","oid":oid},
                            function (data, textStatus, jqXHR) {
                                console.log(data);
                                data = JSON.parse(data);  
                                console.log(data);

                                
                               $("#oname").val(data[0].offer_name); 
                               $("#des").val(data[0].descriptions);
                               $("#fare").val(data[0].fare);
                               $("#sdate").val(data[0].start_date);
                               $("#edate").val(data[0].end_date); 
                               
                               $("#o_id").val(data[0].offer_id);
                               $('#editHotel').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("package_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
                    });
                    $(".upd").click(function()
                    
                    {
                        var oid=$(this).data("oid");
                        console.log($(this).data("oid"));
                        console.log(data);
                        $("#offer_id").val (oid);
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
            <td><label>name</label></td>
            <td><input type="text" placeholder="name" name="oname" /></td>
            </tr>
            <tr>
            <td><label> Description</label></td>
            <td><input type="text" placeholder="des" name="des" /></td>
            </tr>
            <tr>
            <td><label> Fare</label></td>
            <td><input type="text" placeholder="fare" name="fare" /></td>
            </tr>
            <tr>
            <td><label>start_date</label></td>
            <td><input type="text" placeholder="start_date" name="sdate" /></td>
            </tr>
            <tr>
            <td><label>end_date</label></td>
            <td><input type="textbox" placeholder="description" name="edate" /><td>
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
            <td><label>name</label></td>
            <td><input type="text" placeholder="name" name="oname" id="oname"/></td>
            </tr>
            <tr>
            <td><label> Description</label></td>
            <td><input type="text" placeholder="des" name="des" id="des"/></td>
            </tr>
            <tr>
            <td><label> Fare</label></td>
            <td><input type="text" placeholder="fare" name="fare" id="fare" /></td>
            </tr>
            <tr>
            <td><label>start_date</label></td>
            <td><input type="text" placeholder="start_date" name="sdate" id="sdate"/></td>
            </tr>
            <tr>
            <td><label>end_date</label></td>
            <td><input type="textbox" placeholder="description" name="edate"  id="edate"/><td>
            <td><input type="hidden" name="o_id" id="o_id"/></td>
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
        <form action="upload.php?opt=oid" method="post" enctype="multipart/form-data">
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
                    <td> id </td>
                    <td> name</td>
                    <td> Description </td>
                    <td> Fare </td>
                    <td> start_date </td>
                    <td> end_date </td>
                    <td> actions </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>