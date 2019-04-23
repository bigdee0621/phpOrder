<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/27
 * Time: 22:31
 */
header("Content-type: text/html; charset=utf-8");

setcookie("user", "", time()-3600*24*7,"/");
setcookie("phone", "", time()-3600*24*7,"/");
setcookie("admin", "", time()-3600*24*7,"/");
if(isset($_COOKIE['user'])) {
    echo "<script>";
    echo "alert('登出成功');";
    echo "window.location.href='../index.php';";
    echo "</script>";
}
else
{
    echo "<script>";
    echo "alert('亲，还没登陆呢！~ 请先登陆');";
    echo  "window.location.href=\"../login/login.php\";";
    echo "</script>";
}