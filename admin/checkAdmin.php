<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/4/12
 * Time: 21:06
 */
header("Content-type: text/html; charset=utf-8");
if(isset($_COOKIE['admin']))
{
}else{
    echo "<script>";
    echo "alert('你无权访问');";
    echo  "window.location.href=\"../login/login.php\";";
    echo "</script>";
};
include_once '../sql/package.php';