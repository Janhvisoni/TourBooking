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
         calculate($_REQUEST["cid"]);
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
        $rs=mysqli_query($conn,"SELECT * from book_couch");
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
       
         $rs=mysqli_query($conn,"INSERT INTO book_couch (u_id,cname,c_id,name,contact,email,arriving_date,departure_date,Peoples,request,pay,price) 
                                VALUES ('$data[u_id]','$data[cname]','$data[c_id]','$data[fname]','$data[phno]','$data[mail]','$data[atime]','$data[dtime]',
                               ' $data[peps]','$data[req]','$data[pay]','$data[amnt]')");
        if (mysqli_affected_rows($conn)>0) 
                {
                    $email=$data['mail'];
                    $name=$data['cname'];
                    $amount=$data['amnt'];
                    $atime=$data['atime'];
                    $dtime=$data['dtime'];
                   $subject="Couch Booking";
                   $msg="your Couch booking $name is confirmed for  the time $atime to $dtime and the amount you have to pay $amount ";
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
                $rs=mysqli_query($conn,"SELECT * from couch where couch_id=$id");
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
                $rs=mysqli_query($conn,"SELECT * from book_couch where u_id=$id");
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
                $rs=mysqli_query($conn,"SELECT * from coupon where user_id=$id and coupon_code='$code'");
                if (mysqli_affected_rows($conn)>0) 
                {
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