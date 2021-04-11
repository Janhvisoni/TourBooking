<?php
    if($_REQUEST["opt"]=="all")
    {
        getAll();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        delete($_REQUEST["cid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        add($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getID($_REQUEST["cid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        update($_REQUEST);
    }
function getID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from couch WHERE couch_id='$id'");
    while($row=mysqli_fetch_assoc($rs))
    {
    $res[]=$row;
    } 
    echo json_encode($res);
}
function update($data)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"UPDATE couch
                            SET couch_name='$data[aname]',city_name='$data[cname]',address='$data[address]', facilities='$data[facilities]', 
                            amenities='$data[amenities]',room_offer='$data[room]',fare='$data[fare]' where couch_id='$data[c_id]'");
    if (mysqli_affected_rows($conn)) 
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
function getAll()
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from couch");
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
    $rs=mysqli_query($conn,"INSERT INTO couch (couch_name,city_name,address,facilities,amenities,room_offer,fare) 
                            VALUES ('$data[aname]','$data[cname]','$data[address]','$data[facilities]','$data[amenities]','$data[room]','$data[fare]')");
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
 function delete($id)
 {
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"DELETE from couch where couch_id=$id");
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