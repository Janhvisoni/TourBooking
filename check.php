<?php
    session_start();
    
    $username=$_GET['username'];
    $password=$_GET['password'];

    include('db_config.php');
    $rs=mysqli_query($conn,"SELECT*FROM user_detail WHERE username='$username' and passwords='$password' and role=1");
    
    if(mysqli_affected_rows($conn))
    {
        $row=mysqli_fetch_assoc($rs);
        $_SESSION["user_id"]=$row["user_id"];
        setcookie("visit","true",0);
        header("Location: dashboard.php");
    }
    else
    {
        header("Location:index.php?error=invalid credential");
    }
?>