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
         calculate($_REQUEST["hid"]);
     }
     elseif($_REQUEST["opt"]=="id")
     {
         show($_REQUEST["uid"]);
     }
     elseif($_REQUEST["opt"]=="check")
     {
        apply($_REQUEST["uid"],$_REQUEST["code"]);

     }
     elseif($_REQUEST["opt"]=="show")
     {
         show($_REQUEST["uid"]);
     }
     function getID($id)
    {
        require("db_config.php");
        $res=array();
        $rs=mysqli_query($conn,"SELECT * from book WHERE hotel_id='$id'");
        while($row=mysqli_fetch_assoc($rs))
        {
        $res[]=$row;
        } 
        echo json_encode($res);
    }
     function getAll()
    {
        require("db_config.php");
        $res=array();
        $rs=mysqli_query($conn,"SELECT * from book");
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
        
       
         $rs=mysqli_query($conn,"INSERT INTO book (u_id,h_id,h_name,full_name,phone_number,email_id,arr_date,dept_date,rooms,adult,child,types,request,pay,price) 
                                VALUES ('$data[u_id]','$data[h_id]','$data[hname]','$data[fname]','$data[phno]','$data[mail]','$data[atime]','$data[dtime]','$data[room]',
                                '$data[adult]','$data[child]','$data[type]','$data[req]','$data[pay]','$data[amnt]')");
        if (mysqli_affected_rows($conn)>0) 
                {
                    $email=$data['mail'];
                    $name=$data['hname'];
                    $amount=$data['amnt'];
                    $atime=$data['atime'];
                    $dtime=$data['dtime'];
                   $subject="Hotel Booking";
                   $msg="your booking is confirmed for $name the time $atime to $dtime and the amount you have to pay $amount ";
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
    function calculate($id)
    {
        require("db_config.php");
        $res=array();
            $rs=mysqli_query($conn,"SELECT * from room_type where hotel_id=$id");
            while($row=mysqli_fetch_assoc($rs))
            {
            $res[]=$row;
            } 
            echo json_encode($res);
    }
    function show($id)
    {
        require("db_config.php");
        $res=array();
            $rs=mysqli_query($conn,"SELECT * from book where u_id=$id");
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