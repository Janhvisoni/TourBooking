<?php
    if($_REQUEST["opt"]=="all")
    {
        getAllHotels();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        deleteHotel($_REQUEST["hid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        addHotel($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getHotelbyID($_REQUEST["hid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        updateHotel($_REQUEST);
    }
function getHotelbyID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from hotels WHERE hotel_id='$id'");
    while($row=mysqli_fetch_assoc($rs))
    {
    $res[]=$row;
    } 
    echo json_encode($res);
}
function updateHotel($data)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"UPDATE hotels
                            SET hotel_name='$data[hname]',city_name='$data[cname]',state_name='$data[sname]', 
                            no_of_rooms='$data[room]',Descriptions='$data[des]' where hotel_id='$data[h_id]'");
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
function getAllHotels()
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from hotels");
    while($row=mysqli_fetch_assoc($rs))
    {
    $res[]=$row;
    } 
    echo json_encode($res);


} 
function addHotel($data)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"INSERT INTO hotels (hotel_name,city_name,state_name,no_of_rooms,Descriptions) 
                            VALUES ('$data[hname]','$data[cname]','$data[sname]','$data[room]','$data[des]')");
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
 function deleteHotel($id)
 {
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"DELETE from hotels where hotel_id=$id");
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