<?php
header("Content-type: text/html; charset=utf-8");
if(isset($_COOKIE['user']))
{
}else{
	echo "<script>";
	echo "alert('您还没登陆！~ 请先登陆');";
	echo  "window.location.href=\"../login/login.php\";";
	echo "</script>";
};

?>