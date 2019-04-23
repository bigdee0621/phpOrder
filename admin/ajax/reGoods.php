<?php
include_once '../../sql/package.php';


if(isset($_POST["GID"]))
{
    $sql="UPDATE `goods` SET `online`= '1' WHERE `GID` = '".$_POST["GID"]."'";
    mysqli_query(connet(),$sql);

}
if(isset($_POST["DGID"]))
{
    $sql="UPDATE `goods` SET `online`= '0' WHERE `GID` = '".$_POST["DGID"]."'";
    mysqli_query(connet(),$sql);
}

if(isset($_POST["DDGID"]))
{
    $sql="DELETE FROM `goods` WHERE `GID` =  '".$_POST["DDGID"]."'";
    mysqli_query(connet(),$sql);
}
