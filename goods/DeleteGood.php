<html>
<head>
    <meta charset="utf-8">
</head>
</html>
<?php
require_once '../login/logincheck.php';//登陆检测。~
session_start();
$GID=$_GET['GID'];

DeGoods($GID);
function DeGoods($GID){

 unset($_SESSION[$GID]);//删除
    echo "<script>";
    echo  "alert('成功');";
    echo  "window.location.href=\"./BuysIndex.php\";";
    echo "</script>";

}

?>