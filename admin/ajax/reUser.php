
<?php
/**
 * Created by PhpStorm.
 * User: bigdee
 * Date: 2018/12/30
 * Time: 21:49
 */
include_once '../../sql/package.php';

if(isset($_POST['uid']))
{
    $sql="DELETE FROM `customer` WHERE `phone` =  '".$_POST["uid"]."'";
    mysqli_query(connet(),$sql);
}
if(isset($_POST['pwdid']))
{
    $newPWD=rand('100000','999999');  //生成随机6位数密码
    $sql="UPDATE `customer` SET `password` =  '".$newPWD."' WHERE  `phone` =  '".$_POST["pwdid"]."'";
    mysqli_query(connet(),$sql);
    echo "$".$newPWD;//输出ajax 用$符号让判别
}