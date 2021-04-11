<?php
    if($_REQUEST["opt"]=="all")
    {
        getAll();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        delete($_REQUEST["tid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        add($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getID($_REQUEST["tid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        update($_REQUEST);
    }
function getID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from transport WHERE transport_id='$id'");
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
    $rs=mysqli_query($conn,"UPDATE transport
                            SET transport_name='$data[tname]',transport_type='$data[type]',AC='$data[AC]', 
                            seater='$data[seater]',t_fare='$data[fare]' where transport_id='$data[t_id]'");
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
    $rs=mysqli_query($conn,"SELECT * from transport");
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
    $rs=mysqli_query($conn,"INSERT INTO transport (transport_name,transport_type,AC,seater,t_fare) 
                            VALUES ('$data[tname]','$data[type]','$data[AC]','$data[seater]','$data[fare]')");
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
    $rs=mysqli_query($conn,"DELETE from transport where transport_id=$id");
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