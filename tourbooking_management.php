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
         calculate($_REQUEST["oid"]);
     }
     elseif($_REQUEST["opt"]=="check")
     {
        apply($_REQUEST["uid"],$_REQUEST["code"]);

     }
     function getAll()
    {
        require("db_config.php");
        $res=array();
        $rs=mysqli_query($conn,"SELECT * from book_offer");
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
         $rs=mysqli_query($conn,"INSERT INTO book_tour (u_id,oname,o_id,name,contact,email,start_date,end_date,adult,pay,price) 
                                VALUES ('$data[u_id]','$data[oname]','$data[o_id]','$data[fname]','$data[phno]','$data[mail]','$data[sdate]','$data[edate]',
                               ' $data[peps]','$data[pay]','$data[amnt]')");
        if (mysqli_affected_rows($conn)>0) 
                {
                    $email=$data['mail'];
                     $name=$data['fname'];
                     $amount=$data['amnt'];
                     $sdate=$data['sdate'];
                     $edate=$data['edate'];
                     $oname=$data['oname'];
                    $subject="Tour Booking";
                    $msg="$name your seats are reserved for the tour $oname for $sdate to $edate and the amount you have to pay $amount ";
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
                $rs=mysqli_query($conn,"SELECT * from couch_book where u_id=$id");
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
                $rs=mysqli_query($conn,"SELECT * from coupon where user_id=$id and coupon_code='$code'and validity= 0");
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