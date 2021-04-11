<?php
    if($_REQUEST["opt"]=="all")
    {
        getAll();
    }
    elseif($_REQUEST["opt"]=="del")
    {
        delete($_REQUEST["qid"]);
    }
    elseif($_REQUEST["opt"]=="add")
    {
        add($_REQUEST);
    }
    elseif($_REQUEST["opt"]=="edit")
    {
        getID($_REQUEST["qid"]);
    }
    elseif($_REQUEST["opt"]=="update")
    {
        update($_REQUEST);
    }
function getID($id)
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from quiz WHERE que_id='$id'");
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
    $rs=mysqli_query($conn,"UPDATE quiz
                            SET question='$data[que]',A='$data[opt1]',B='$data[opt2]',C='$data[opt3]',D='$data[opt4]',
                            answer='$data[ans]' where que_id='$data[q_id]'");
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
function getAll()
{
    require("db_config.php");
    $res=array();
    $rs=mysqli_query($conn,"SELECT * from quiz");
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
    $rs=mysqli_query($conn,"INSERT INTO quiz (question,A,B,C,D,answer) 
                            VALUES ('$data[que]','$data[opt1]','$data[opt2]','$data[opt3]','$data[opt4]','$data[ans]')");
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
    $rs=mysqli_query($conn,"DELETE from quiz where que_id=$id");
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