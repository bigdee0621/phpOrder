<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/27
 * Time: 17:52
 */
header("Content-type: text/html; charset=utf-8");
require_once '../sql/package.php';
if(isset($_COOKIE['user']) && !empty($_COOKIE['user'])){
    echo "<script>";
    echo "alert('你已经登陆了');";
    echo  "window.location.href='../goods/BuysIndex.php';";
    echo "</script>";
}
else {
    if (isset($_GET['phone']) && isset($_GET['PWD']) && isset($_GET['cookie'])) {
        $phone = $_GET['phone'];
        $passwd = $_GET['PWD'];
        $COOKIE = $_GET['cookie'];
        $SQl = "SELECT * FROM customer WHERE phone='$phone' AND password='$passwd'";
        $query = mysqli_query(connet(), $SQl);
        $row = mysqli_fetch_array($query, MYSQLI_NUM);

        if ($row&&$row[7]!=1) {
            if ($COOKIE == 0) {
                setcookie("user", $row[2], time() + 3600, "/");
                setcookie("phone", $row[0], time() + 3600, "/");
                mysqli_close(connet());
                $SQl2 = "UPDATE customer SET lastLogin='$day' WHERE phone='$phone'";   //更新最后登陆时间
                mysqli_query(connet(), $SQl2);
                echo "登陆成功";
                echo "<script>";

               echo "window.location.href='../goods/BuysIndex.php';";
                echo "</script>";

            }
            if ($COOKIE == 1) {
                setcookie("user", $row[2], time() + 3600 * 24 * 7, "/");
                setcookie("phone", $row[2], time() + 3600 * 24 * 7, "/");
                mysqli_close(connet());
                $SQl2 = "UPDATE `customer` SET `lastLogin`=`$day` WHERE `phone`=`$phone`";
                mysqli_query(connet(), $SQl2);
                echo "登陆成功";
                echo "<script>";
                echo "window.location.href='../goods/BuysIndex.php';";
                echo "</script>";
            };//设置7天免登陆
        }
  elseif($row&&$row[7]==1)
  {     setcookie("admin", $row[2], time() + 3600, "/");
      setcookie("user", $row[2], time() + 3600, "/");
      setcookie("phone", $row[0], time() + 3600, "/");
      mysqli_close(connet());
      $SQl2 = "UPDATE customer SET lastLogin='$day' WHERE phone='$phone'";   //更新最后登陆时间
      mysqli_query(connet(), $SQl2);
      echo "<script>";
      echo "window.location.href='../goods/BuysIndex.php';";
      echo "</script>";}
        else {
            echo "<script>";
            echo "alert('账号或密码错误~！！！');";
            echo "history.back();";
            echo "</script>";
        };
    } else {
        echo "<script>";
        echo "window.location.href='../login/login.php";//预防乱登入~！！
        echo "</script>";
    }
}
?>