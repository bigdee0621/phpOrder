<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/4/2
 * Time: 17:28
 */
require_once '../sql/package.php';
require_once '../login/logincheck.php';
$text=$_GET["GETChat"];
$user=$_COOKIE["user"];
$phone=$_COOKIE['phone'];
$sql = "SELECT * FROM `chat` WHERE `phone`='$phone'  or `connet`='$phone'";
$query = mysqli_query(connet(), $sql);
if(isset($text)) {
    while ($row = mysqli_fetch_array($query, MYSQL_NUM)) {
        if (intval($phone) == intval($row[1])) {
            echo "<li class=\"am-comment am-comment-flip\"><!-- 头像显示在右手边 am-comment-flip -->";
            echo "<a href=\"\">";
            echo "<img class=\"am-comment-avatar\" src=\"../default/img1.jpg\" alt=\"\"/> <!-- 头像 -->";
            echo "</a>";
            echo "<div class=\"am-comment-main\">";
            echo "<header class=\"am-comment-hd\">";
            echo "<div class=\"am-comment-meta\" style=\"background:#204661\">";
            echo "<a style='color: #ffffff;' href=\"#link-to-user\" class=\"am-comment-author\">$row[3]</a>";
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
        } else {
            echo "<li class=\"am-comment-danger \"><!-- 头像显示在左手边 am-comment-flip -->";
            echo "<a href=\"\">";
            echo "<img class=\"am-comment-avatar\" src=\"../default/img1.jpg\" alt=\"\"/> <!-- 头像 -->";
            echo "</a>";
            echo "<div class=\"am-comment-main\">";
            echo "<header class=\"am-comment-hd\">";
            echo "<div class=\"am-comment-meta\" style=\"background:#ee208b\">";
            echo "<a style='color: #ffffff' href=\"#link-to-user\" class=\"am-comment-author\" >$row[3]</a>";   //用户名字
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