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
            $.get("surfing_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].place_id + "</td>";
                        str += "<td>" + data[i].place_name + "</td>";
                        str += "<td>" + data[i].city_name + "</td>";
                        str += "<td>" + data[i].state_name + "</td>";
                        str += "<td>" + data[i].descriptions + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#editPlace' data-pid='" + data[i].place_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-pid='" + data[i].place_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-pid='" + data[i].place_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "<button type='button' class='btn btn-warning upd' data-toggle='modal' data-target='#uploadPicture' data-pid='" + data[i].place_id + "'style='margin-right:16px;'>Select file </button></td>";
                        str += "</tr>";


                    }
                    $("#place tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("pid"));
                        var pid=$(this).data("pid");
                        $.post("surfing_management.php", {"opt":"del","pid":pid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Place Deleted", "success",function(){
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
                        
                        var pname = $("#pname").val();
                        var state = $("#sname").val();
                        var city = $("#cname").val();
                        var des = $("#des").val();
                        // var formdata = new FormData(document.getElementById("forms"));
                        // formdata.append("hname",hname);
                        // formdata.append("city",city);
                        // formdata.append("state",state);
                        // formdata.append("room",room);
                        // formdata.append("des",des);

                        // console.log(formdata);

                        //  $.ajax({
                        //      type: "post",
                        //      url: "hotel_management.php?opt=add",
                        //      data: formdata,
                        //      dataType: 'formData',
                        //      processData: false,

                        //    //  dataType: "dataType",
                        //      success: function (data) {
                        //         data = JSON.parse(data);           
                        //    //     console.log(data);
                        //         if(data.result=="true")
                        //         {
                        //             $.notify("Hotel added","success",function(){
                        //                 location.reload();

                        //             });
                        //         }
                        //         else
                        //         {
                        //             $.notify("Error", "error");
                        //         }  
                        //      }
                        //  });   
                    // //     $.post("hotel_management.php", formdata,
                    $.post("surfing_management.php",$("#forms").serialize()+"&opt=add",

                       // $.post("hotel_management.php", {"opt":"add","hname":hname,"city":city,"state":state,"room":room,"desc":desc},
                            function (data) {
                                console.log(data);
                                data = JSON.parse(data);           
                           //     console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Place added","success",function(){
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
                        var pid=$(this).data("pid");
                        console.log($(this).data("pid"));
                        $.post("surfing_management.php", {"opt":"edit","pid":pid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);

                                
                               $("#pname").val(data[0].place_name); 
                               $("#cname").val(data[0].city_name);
                               $("#sname").val(data[0].state_name);
                               $("#des").val(data[0].descriptions);
                               $("#p_id").val(data[0].place_id);
                               $('#editPlace').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("surfing_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
                    });
                    $(".upd").click(function()
                    
                    {
                        var pid=$(this).data("pid");
                        console.log($(this).data("pid"));
                        console.log(data);
                        $("#place_id").val (pid);
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
                <h2 class="pageheader-title">Places</h2>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addPlace">Add Place</button>
    </div>
    <div id="addPlace" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add new Place</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="forms">

        <table>
        <tbody>
            <tr>
            <td><label> Place name</label></td>
            <td><input type="text" placeholder="name" name="pname"/></td>
            </tr>
            <tr>
            <td><label> State</label></td>
            <td><input type="text" placeholder="state" name="sname"/></td>
            </tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname"/></td>
            </tr>
            
            <tr>
            <td><label>Description</label></td>
            <td><input type="textbox" placeholder="description" name="des"/><td>
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
    <div id="editPlace" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit Place</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="editing">
        <table>
        <tbody>
           
            <tr>
            <td><label> Place name</label></td>
            <td><input type="text" placeholder="name" name="pname" id="pname"/></td>
            </tr>
            <tr>
            <td><label> State</label></td>
            <td><input type="text" placeholder="state" name="sname" id="sname"/></td>
            </tr>
            <tr>
            <td><label> City</label></td>
            <td><input type="text" placeholder="city" name="cname" id="cname"/></td>
            </tr>
            <tr>
            <td><label>Description</label></td>
            <td><input type="textbox" placeholder="description" name="des" id="des"/><td>
            <td><input type="hidden" name="p_id" id="p_id"/>
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
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="place_id" id="place_id"/>
            <button type="submit" class="btn btn-warning" data-add="modal" name="submit">Upload</button>
        </form>
        </div>
        </div>
    </div>
    </div>

    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="place">
            <thead>
                <tr>
                    <td> place_id </td>
                    <td> place_name</td>
                    <td> state_name </td>
                    <td> city_name </td>
                    <td>Description</td>
                    <td> actions </td>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</body>

</html>