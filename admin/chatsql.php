<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/4/1
 * Time: 21:25
 */
require_once '../sql/package.php';
include_once '../admin/checkAdmin.php';

include_once "../admin/assets/checklogin.php";

$text=$_GET["text"];
$phone=$_GET['phone'];


    $day = date("Y-m-d  H:i");
    $sql1 = "INSERT INTO `chat`(`phone`, `time`, `name`, `text`, `connet`, `new`) VALUES ('admin','$day','admin','$text','$phone','1')";
    if (!$query11 = mysqli_query(connet(), $sql1)) {
        die('Error: ' . mysql_error());
    } else {
        $sql = "SELECT * FROM `chat` WHERE `phone`='$phone'  or `connet`='$phone'";
        $query = mysqli_query(connet(), $sql);
        $sql2 = "UPDATE `chat` SET `new`= 1 WHERE `phone` = '$phone'";
        mysqli_query(connet(), $sql2);
        $query = mysqli_query(connet(), $sql);
        while ($row = mysqli_fetch_array($query, MYSQL_NUM)) {
            if($row[1]=='admin'){
                echo "<li class=\"am-comment am-comment-flip\"><!-- 头像显示在右手边 am-comment-flip -->";
                echo "<a href=\"\">";
                echo "<img class=\"am-comment-avatar\" src=\"../default/img1.jpg\" alt=\"\"/> <!-- 头像 -->";
                echo "</a>";
                echo "<div class=\"am-comment-main\">";
                echo "<header class=\"am-comment-hd\">";
                echo "<div class=\"am-comment-meta\">";
                echo "<a href=\"#link-to-user\" class=\"am-comment-author\">$row[1]</a>";
                echo "<time datetime=\"2013-07-27T04:54:29-07:00\" title=\"最后的通信时间\" class=\"am-fr\">$row[2]</time>";
                echo "</div>";
                echo "</header>";
                echo "<div class=\"am-comment-bd\">";
                echo "$row[4]";
                echo "</div>";
                echo "</div>";
                echo "</li>";
                echo "</ul>";
                echo "</div>";
            } else{
                echo "<li class=\"am-comment-danger \"><!-- 头像显示在左手边 am-comment-flip -->";

                echo "<a href=\"\">";
                echo "<img class=\"am-comment-avatar\" src=\"../default/img1.jpg\" alt=\"\"/> <!-- 头像 -->";
                echo "</a>";
                echo "<div class=\"am-comment-main\">";
                echo "<header class=\"am-comment-hd\">";
                echo "<div class=\"am-comment-meta\">";
                echo "<a href=\"#link-to-user\" class=\"am-comment-author\">$row[3]</a>";
                echo "<time datetime=\"2013-07-27T04:54:29-07:00\" title=\"最后的通信时间\" class=\"am-fr\">$row[2]</time>";
                echo "</div>";
                echo "</header>";
                echo "<div class=\"am-comment-bd\">";
                echo "$row[4]";
                echo "</div>";
                echo "</div>";
                echo "</li>";
                echo "</ul>";
                echo "</div>";
            }


        }
    }


?>