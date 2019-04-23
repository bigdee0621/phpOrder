<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/20
 * Time: 22:29
 */
require_once '../login/logincheck.php';//登陆检测。~
require_once '../sql/package.php';
$temp=$_COOKIE['user'];
$datasql="SELECT * FROM `customer` WHERE `name`="."'$temp'";
$datare=mysqli_query(connet(),$datasql);
$rowdata=mysqli_fetch_array($datare,MYSQL_NUM);
mysqli_close(connet());

if(isset($_POST['oldpw']))
{
    $oldpw=$_POST['oldpw'];
    $newpw=$_POST['newpw'];
    $cfpw=$_POST['cfpw'];
    $datasql1="SELECT `password` FROM `customer` WHERE `name`="."'$temp'";
    $datare1=mysqli_query(connet(),$datasql1);
    $rowdata1=mysqli_fetch_array($datare1,MYSQL_NUM);

    if($rowdata1[0]!=$oldpw)
    {echo "<script>alert('旧密码不符')</script>";
        break;
    }

    if($newpw!=$cfpw)
    {
        echo "<script>alert('两次密码不一致')</script>";
    break;
}
    $sqladd= "UPDATE `customer` SET `password`="."'$cfpw'"." WHERE name = "."'$temp'";

    if(    mysqli_query(connet(),$sqladd)){
        setcookie("user", "", time()-3600*24*7,"/");
        setcookie("phone", "", time()-3600*24*7,"/");
        setcookie("admin", "", time()-3600*24*7,"/");
        echo "<script>alert('修改成功，请重新登录');
            window.location.href='../index.php';</script>";

    }

    mysqli_close(connet());

}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户资料</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="../amazeui/css/amazeui.min.css"/>
    <link rel="stylesheet" href="../default/style.css"/>
    <script src="../amazeui/js/jquery.min.js"></script>
    <script src="../amazeui/js/amazeui.min.js"></script>

</head>

<body>
<div class="container" style="margin-top:-25px">
    <header data-am-widget="header" class="am-header am-header-default my-header">
        <div class="am-header-left am-header-nav">
            <a href="../user/user.php" class="">
                <i class="am-header-icon am-icon-chevron-left" style="padding-top:15px;"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">用户资料</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="../index.php" class="">
                <i class="am-header-icon  am-icon-home" style="padding-top:15px;"></i>
            </a>
        </div>
    </header>

    <div class="my-nav-bar">
        <ol class="am-breadcrumb">
            <li><a href="../index.php">首页</a></li>
            <li class="am-active">内容</li>
        </ol>
    </div>

    <style>
        div.file{display:inline-block;width:100px;height:20px;line-height:20px;position:relative;overflow:hidden;color: #ff0000
        }
        div.file input{position:absolute;left:0px;top:0px;zoom:1;filter:alpha(opacity=0);opacity:0;font-size:20px;margin-left:-240px}
    </style>

    <div class="am-cf cart-panel">
        <div class="withdrawals-panel">
            <div class="partners-title-panel">

          <div style="background-color: #0a6999;width: 100px;height:100px;float: right;position: relative;margin-right: 20px;">
           <img src="../default/img1.jpg" width="100" height="100" id="imgicon">


          </div>

                <form class="am-form" method="POST">
                    <p> <label for="doc-vld-name">   账号：<?php echo  $rowdata[0];?></label></p>
                    <p><label for="doc-vld-name">   性别：<?php echo $rowdata[5];?></label></p>
                    <p><label for="doc-vld-name">  注册时间：<?php echo  $rowdata[3];?></label></p>
                    <fieldset>

                        <legend>修改密码:  </legend>
                        <div class="am-form-group">
                            <input type="password" id="doc-vld-name" minlength="3" placeholder="输入旧密码" class="am-form-field" name="oldpw" required/>
                        </div>
                        <div class="am-form-group">
                            <input type="password" id="doc-vld-name" minlength="3" placeholder="请输入新密码" class="am-form-field" name="newpw" required/>
                        </div>
                        <div class="am-form-group">
                            <input type="password" id="doc-vld-name" minlength="3" placeholder="确认新密码" class="am-form-field" name="cfpw" required/>
                        </div>
                    </fieldset>
                    <button type="reset" class="am-btn am-fr"">重置</button>  <button type="submit" class="am-btn am-fr am-btn-secondary">修改</button>
                </form>

            </div>
        </div>
    </div>

    <?php require_once '../footer.php'; ?>


<script>



</script>