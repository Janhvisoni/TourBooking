<?php
    if($_REQUEST["opt"]=="all")
    {
        getAllPlaces();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        deletePlace($_REQUEST["pid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        addPlace($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getPlacebyID($_REQUEST["pid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        updatePlace($_REQUEST);
    }
function getPlacebyID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from places WHERE place_id='$id'");
    while($row=mysqli_fetch_assoc($rs))
    {
    $res[]=$row;
    } 
    echo json_encode($res);
}
function updatePlace($data)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"UPDATE places
                            SET place_name='$data[pname]',state_name='$data[sname]' ,city_name='$data[cname]',Descriptions='$data[des]'
                            WHERE place_id='$data[p_id]'");
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
function getAllPlaces()
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from places");
    while($row=mysqli_fetch_assoc($rs))
    {
    $res[]=$row;
    } 
    echo json_encode($res);


} 
function addPlace($data)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"INSERT INTO places (place_name,state_name,city_name,descriptions) 
                            VALUES ('$data[pname]','$data[sname]','$data[cname]','$data[des]')");
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
 function deletePlace($id)
 {
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"DELETE from places where place_id=$id");
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