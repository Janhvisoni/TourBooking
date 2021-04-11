<?php
if($_REQUEST["opt"]=="hid")
{
    $target_file="hotel_imgs/".$_POST["hotel_id"].".jpg";
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
elseif($_REQUEST["opt"]=="pid")
{
    $target_file="place_imgs/".$_POST["place_id"].".jpg";
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
elseif($_REQUEST["opt"]=="tid")
{
    $target_file="vehicle_imgs/".$_POST["t_id"].".jpg";
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
elseif($_REQUEST["opt"]=="oid")
{
    $target_file="vehicle_imgs/".$_POST["o_id"].".jpg";
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
elseif($_REQUEST["opt"]=="apt")
{
    $target_file="vehicle_imgs/".$_POST["cid"].".jpg";
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>