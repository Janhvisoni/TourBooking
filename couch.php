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
           
            $.get("couch_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        
                        str += "<tr>";
                        str += "<td>" + data[i].couch_id + "</td>";
                        str += "<td>" + data[i].couch_name + "</td>";
                        str += "<td>" + data[i].city_name + "</td>";
                        str += "<td>" + data[i].address + "</td>";
                        str += "<td>" + data[i].facilities + "</td>";
                        str += "<td>" + data[i].amenities + "</td>";
                        str += "<td>" + data[i]. room_offer  + "</td>";
                        str += "<td>" + data[i].fare + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#editCouch' data-cid='" + data[i].couch_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-cid='" + data[i].couch_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-cid='" + data[i].couch_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "<button type='button' class='btn btn-warning upd' data-toggle='modal' data-target='#uploadPicture' data-cid='" + data[i].couch_id + "'style='margin-right:16px;'>Select file </button></td>";
                        str += "</tr>";


                    }
                    $("#couch tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("cid"));
                        var cid=$(this).data("cid");
                        $.post("couch_management.php", {"opt":"del","cid":cid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Couch Deleted", "success",function(){
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
                        
                        var aname = $("#aname").val();
                        var city = $("#cname").val();
                        var address = $("#address").val();
                        var facilities=$("#facilities").val();
                        var amenities=$("#amenities").val();
                        var room = $("#room").val();
                        var fare = $("#fare").val();
                        
                    $.post("couch_management.php",$("#forms").serialize()+"&opt=add",

                            function (data) {
                                console.log(data);
                                data = JSON.parse(data);           
                               console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Couch added","success",function(){
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
                        
                        var cid=$(this).data("cid");
                        console.log($(this).data("cid"));
                        $.post("couch_management.php", {"opt":"edit","cid":cid},
                            function (data, textStatus, jqXHR) {
                                console.log(data);
                                data = JSON.parse(data);  
                                console.log(data);
                               $("#aname").val(data[0].couch_name); 
                               $("#cname").val(data[0].city_name);
                               $("#address").val(data[0].address);
                               $("#facilities").val(data[0].facilities); 
                               $("#amenities").val(data[0].amenities);
                               $("#room").val(data[0].room_offer); 
                               $("#fare").val(data[0].fare);
                               $("#c_id").val(data[0].couch_id);
                               $('#editCouch').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("couch_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
                    });
                    $(".upd").click(function()
                    
                    {
                        var cid=$(this).data("cid");
                        console.log($(this).data("cid"));
                        console.log(data);
                        $("#couch_id").val (cid);
                        $('#uploadPicture').modal('show');               

                    });   
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
                <h2 class="pageheader-title">Apartments</h2>

            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCouch">Add </button>
    </div>
    <div id="addCouch" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add new couch</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="forms">

        <table>
        <tbody>
            <tr>
            <td><label> Couch name</label></td>
            <td><input type="text" placeholder="name" name="aname"/></td>
            </tr>
            <tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname"/></td>
            </tr>
            <tr>
            <td><label> Address</label></td>
            <td><input type="text" placeholder="address" name="address"/></td>
            </tr>
            <tr>
            <td><label>Facilities</label></td>
            <td><input type="text" placeholder="facilities" name="facilities"/></td>
            </tr>
            <tr>
            <td><label>Amenities</label></td>
            <td><input type="textbox" placeholder="amenities" name="amenities"/><td>
            </tr>
            <td><label>Room</label></td>
            <td><input type="text" placeholder="rooms" name="room"/></td>
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


    <div id="editCouch" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit couch</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="editing">
        <table>
        <tbody>
           
        <tr>
            <td><label> Couch name</label></td>
            <td><input type="text" placeholder="name" name="aname" id="aname"/></td>
            </tr>
            <tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname" id="cname"/></td>
            </tr>
            <tr>
            <td><label> Address</label></td>
            <td><input type="text" placeholder="address" name="address" id="address"/></td>
            </tr>
            <tr>
            <td><label>Facilities</label></td>
            <td><input type="text" placeholder="facilities" name="facilities" id="facilities"/></td>
            </tr>
            <tr>
            <td><label>Amenities</label></td>
            <td><input type="textbox" placeholder="amenities" name="amenities" id="amenities"/><td>
            </tr>
            <td><label>Room</label></td>
            <td><input type="text" placeholder="rooms" name="room" id="room"/></td>
            </tr>
            <tr>
            <td><label>Fare</label></td>
            <td><input type="textbox" placeholder="fare" name="fare" id="fare"/></td>
            <td><input type="hidden" name="c_id" id="c_id"/></td>
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
        <form action="upload.php?opt=apt" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="couch_id" id="couch_id"/>
            <button type="submit" class="btn btn-warning" data-add="modal" name="submit">Upload</button>
        </form>
        </div>
        </div>
    </div>
    </div>



   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="couch">
            <thead>
                <tr>
                    <td> couch_id </td>
                    <td> couch_name</td>
                    <td> city_name </td>
                    <td> address </td>
                    <td> facilities </td>
                    <td> amenities </td>
                    <td> room_offer </td>
                    <td> fare </td>
                    <td> actions </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>