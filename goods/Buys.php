<html>
<head>
    <meta charset="utf-8">
</head>
</html>
<?php
require_once '../login/logincheck.php';
session_start();
$GID=$_GET['GID'];


SetBuys($GID);
function SetBuys($GID){

    if(isset($_SESSION[$GID]))        //商品重复添加情况存在加一，不存在就设置为一；
        $_SESSION[$GID]=$_SESSION[$GID]+1;
    else
        $_SESSION[$GID]=1;
    echo "<script>";
    echo  "alert('商品加入成功');";
    echo   "history.back();";
    echo "</script>";

}

?>