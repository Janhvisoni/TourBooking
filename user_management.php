<?php
    if($_REQUEST["opt"]=="all")
    {
        getAllUsers();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        deleteUser($_REQUEST["uid"]);
    }
 function getAllUsers()
 {
     require("db_config.php");
     $res=array();
     $rs=mysqli_query($conn,"select *from user_detail");
     while($row=mysqli_fetch_assoc($rs))
     {
        $res[]=$row;
     } 
     echo json_encode($res);


 } 
 function deleteUser($id)
 {
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"DELETE from user_detail where user_id=$id");
    if (mysqli_affected_rows($conn)>0) 
        {
            $res["result"]="true";
     
      } 
      else 
      {
        $res["result"]="false";
        
      }
      echo json_encode($res);
 }  
   
?>