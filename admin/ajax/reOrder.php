<?php
include_once '../../sql/package.php';


if(isset($_POST["OID"]))
{
    $sql="UPDATE `order` SET `status`= 'do' WHERE `ID` = '".$_POST["OID"]."'";
    mysqli_query(connet(),$sql);
};
if(isset($_POST["PID"])&&isset($_POST["price"]))
{
    $sql="UPDATE `order` SET `total`= '".$_POST["price"]."' WHERE `ID` = '".$_POST["PID"]."'";
    mysqli_query(connet(),$sql);
};
if(isset($_POST["dID"]))
{
    $sql="DELETE FROM `order` WHERE `ID` =  '".$_POST["dID"]."'";
    mysqli_query(connet(),$sql);
};
/*
if(isset($_POST["DDGID"]))
{
    $sql="DELETE FROM `goods` WHERE `GID` =  '".$_POST["DDGID"]."'";
    mysqli_query(connet(),$sql);
}*/
