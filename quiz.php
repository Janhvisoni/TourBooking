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
           
            $.get("quiz_management.php", {
                    "opt": "all"
                },
                function(data, textStatus, jqXHR) {
                    
                    data = JSON.parse(data);
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        str += "<tr>";
                        str += "<td>" + data[i].que_id + "</td>";
                        str += "<td>" + data[i].question + "</td>";
                        str += "<td>" + data[i].A + "</td>";
                        str += "<td>" + data[i].B + "</td>";
                        str += "<td>" + data[i].C + "</td>";
                        str += "<td>" + data[i].D + "</td>";
                        str += "<td>" + data[i].answer + "</td>";
                        str += "<td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#edit' data-qid='" + data[i].que_id + "'style='margin-right:16px;'>Edit</button>";
                        str += "<a href='' class='btn btn-success ' data-qid='" + data[i].que_id + "'style='margin-right:16px;' >View</a>";
                        str += "<button type='button'  class='btn btn-danger del' data-qid='" + data[i].que_id + "'style='margin-right:16px;' >Delete</button>";
                        str += "</tr>";


                    }
                    $("#quiz tbody").html(str);
                    $(".del").click(function(e)
                    
                    {
                        e.preventDefault();
                        console.log($(this).data("qid"));
                        var qid=$(this).data("qid");
                        $.post("quiz_management.php", {"opt":"del","qid":qid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Question Deleted", "success",function(){
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
                        
                        var hname = $("#hname").val();
                        var city = $("#cname").val();
                        var state = $("#sname").val();
                        var room = $("#room").val();
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
                    $.post("quiz_management.php",$("#forms").serialize()+"&opt=add",

                       // $.post("hotel_management.php", {"opt":"add","hname":hname,"city":city,"state":state,"room":room,"desc":desc},
                            function (data) {
                                console.log(data);
                                data = JSON.parse(data);           
                               console.log(data);
                                if(data.result=="true")
                                {
                                    $.notify("Question added","success",function(){
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
                        var qid=$(this).data("qid");
                        console.log($(this).data("qid"));
                        $.post("quiz_management.php", {"opt":"edit","qid":qid},
                            function (data, textStatus, jqXHR) {
                                data = JSON.parse(data);  
                                console.log(data);
                               $("#question").val(data[0].question); 
                               $("#opt1").val(data[0].A);
                               $("#opt2").val(data[0].B);
                               $("#opt3").val(data[0].C); 
                               $("#opt4").val(data[0].D);
                               $("#ans").val(data[0].answer);
                               $("#q_id").val(data[0].que_id);

                               $('#edit').modal('show');               
                            },
                           
                           
                        );
                    });
                    $(".chng").click(function()
                    
                    {
                        
                        $.get("quiz_management.php",$("#editing").serialize()+"&opt=update",
                            function (data, textStatus, jqXHR) {
                                 console.log(data);
                                data = JSON.parse(data);  
                                
                            },
                           
                           
                        );
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
                <h2 class="pageheader-title">Quiz</h2>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add">Add </button>
    </div>
    <div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add new question</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="forms">

        <table>
        <tbody>
        <tr>
            <td><label> Question</label></td>
            <td><input type="text" placeholder="question" name="que" /></td>
            </tr>
            <tr>
            <td><label> Option 1</label></td>
            <td><input type="text" placeholder="opt1" name="opt1" /></td>
            </tr>
            <tr>
            <td><label> Option 2</label></td>
            <td><input type="text" placeholder="opt2" name="opt2" /></td>
            </tr>
            <tr>
            <td><label> Option 3</label></td>
            <td><input type="text" placeholder="opt3" name="opt3" /></td>
            </tr>
            <tr>
            <td><label> Option 4</label></td>
            <td><input type="text" placeholder="opt4" name="opt4" /></td>
            </tr>

            <tr>
            <td><label> Answer</label></td>
            <td><input type="text" placeholder="ans" name="ans"/></td>
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


    <div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-body">
        <form id="editing">
        <table>
        <tbody>
           
            <tr>
            <td><label> Question</label></td>
            <td><input type="text" placeholder="question" name="que" id="que"/></td>
            </tr>
            <tr>
            <td><label> Option 1</label></td>
            <td><input type="text" placeholder="opt1" name="opt1" id="opt1"/></td>
            </tr>
            <tr>
            <td><label> Option 2</label></td>
            <td><input type="text" placeholder="opt2" name="opt2" id="opt2"/></td>
            </tr>
            <tr>
            <td><label> Option 3</label></td>
            <td><input type="text" placeholder="opt3" name="opt3" id="opt3"/></td>
            </tr>
            <tr>
            <td><label> Option 4</label></td>
            <td><input type="text" placeholder="opt4" name="opt4" id="opt4"/></td>
            </tr>

            <tr>
            <td><label> Answer</label></td>
            <td><input type="text" placeholder="ans" name="ans" id="ans"/></td>
            <td><input type="hidden" name="q_id" id="q_id"/></td>
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



   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="quiz">
            <thead>
                <tr>
                    <td> ID </td>
                    <td> Question</td>
                    <td> Option 1 </td>
                    <td> Option 2 </td>
                    <td> Option 3 </td>
                    <td> Option 4 </td>
                    <td> answer </td>
                    <td> actions </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>