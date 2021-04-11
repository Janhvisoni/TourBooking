<?php
    include('sendmail.php');
     if($_REQUEST["opt"]=="all")
     {
         getAll();
     } 
     elseif($_REQUEST["opt"]=="add")
     {
         add($_REQUEST);
     }
     elseif($_REQUEST["opt"]=="cal")
     {
         calculate($_REQUEST["tid"]);
     }
     elseif($_REQUEST["opt"]=="id")
     {
         show($_REQUEST["uid"]);
     }
     elseif($_REQUEST["opt"]=="check")
     {
        apply($_REQUEST["uid"],$_REQUEST["code"]);

     }
     function getAll()
    {
        require("db_config.php");
        $res=array();
        $rs=mysqli_query($conn,"SELECT * from book_transport");
        while($row=mysqli_fetch_assoc($rs))
        {
        $res[]=$row;
        } 
        echo json_encode($res);


    } 
     function add($data)
    {
        require("db_config.php");
        $res=array();
       
         $rs=mysqli_query($conn,"INSERT INTO book_transport (u_id,transport_id,t_name,full_name,phone_number,email_id,arr_date,dept_date,request,pay,price) 
                                VALUES ('$data[u_id]','$data[t_id]','$data[tname]','$data[fname]','$data[phno]','$data[mail]','$data[atime]','$data[dtime]',
                                '$data[req]','$data[pay]','$data[amnt]')");
        if (mysqli_affected_rows($conn)>0) 
                {
                     $email=$data['mail'];
                     $name=$data['tname'];
                     $amount=$data['amnt'];
                    $subject="Vehical Booking";
                    $msg="$name is booked for you and the amount you have to pay $amount ";
                    echo sendMail($email,$subject,$msg);
                    $res["result"]="true";
            
            } 
            else 
            {
                $res["result"]="false";
                $res["msg"]=mysqli_error($conn);
                
            }
            echo json_encode($res);
    }
    function show($id)
        {
            require("db_config.php");
            $res=array();
                $rs=mysqli_query($conn,"SELECT * from book_transport where u_id=$id");
                while($row=mysqli_fetch_assoc($rs))
                {
                $res[]=$row;
                } 
                echo json_encode($res);
        }
        function apply($id,$code)
        {
            require("db_config.php");
            $res=array();
                $rs=mysqli_query($conn,"SELECT * from coupon where user_id=$id and coupon_code='$code' and validity= 0");
                if (mysqli_affected_rows($conn)>0) 
                {
                    $rs=mysqli_query($conn,"UPDATE coupon SET validity = 1 where coupon_code='$code'");
                    $res["result"]="true";
            
            } 
            else 
            {
                $res["result"]="false";
                $res["msg"]=mysqli_error($conn);
                
            }
            echo json_encode($res);
        }
    
    
?>