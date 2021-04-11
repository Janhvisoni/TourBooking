<?php
    if($_REQUEST["opt"]=="all")
    {
        getAll();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        delete($_REQUEST["oid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        add($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getID($_REQUEST["oid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        update($_REQUEST);
    }
function getID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from offers WHERE offer_id='$id'");
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
    $rs=mysqli_query($conn,"UPDATE offers
                            SET offer_name='$data[oname]',descriptions='$data[des]',fare='$data[fare]',start_date='$data[sdate]'
                            ,end_date='$data[edate]' where offer_id='$data[o_id]'");
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
    $rs=mysqli_query($conn,"SELECT * from offers");
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
    $rs=mysqli_query($conn,"INSERT INTO offers (offer_name,descriptions,fare,start_date,end_date) 
                            VALUES ('$data[oname]','$data[des]','$data[fare]','$data[sdate]','$data[edate]')");
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
    $rs=mysqli_query($conn,"DELETE from offers where offer_id=$id");
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