
<html>
<head>
    <meta charset="utf-8">
</head>
</html>
<?php
require_once '../login/logincheck.php';//登陆检测。~
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/21
 * Time: 22:57
 */
session_start();
$GID=$_GET['GID'];


SetBuys($GID);
function SetBuys($GID){

    if(isset($_SESSION[$GID]))        //商品重复添加情况存在加一，不存在就设置为一；
        $_SESSION[$GID]=$_SESSION[$GID]+1;
    else
        $_SESSION[$GID]=1;
 echo "<script>";
    echo  "window.location.href=\"../goods/BuysIndex.php\";";
    echo "</script>";
 echo  $_SESSION[$GID];

}

?>