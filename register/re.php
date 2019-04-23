<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/17
 * Time: 13:01
 */

                require_once '../sql/package.php';
				$Phone=$_POST["Phone"];
				$Gender=$_POST["gender"];
				$Username=$_POST["username"];
				$UPWD=$_POST["repeatPass"];
                $add=$_POST["add"];

                connet();
				$data=array("$Phone","$UPWD","$Username","$day","$day","$Gender","$add",0,"$Username","$Phone");
if(insert("customer",$data)){
	setcookie("user", $Username, time() + 3600, "/");
	setcookie("phone", $Phone, time() + 3600, "/");
	echo  "<script type='text/javascript'>";
	echo "alert('注册成功');";
	echo  "window.location.href = \"../index.php\";";
	echo "</script>";
}else
{
	echo "<script type='text/javascript'>";
	echo "alert('注册失败，用户已经存在');";
	echo  "history.back();";
	echo "</script>";
}
				?>
<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head>
<body>

</body>

</html>
