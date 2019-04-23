<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/20
 * Time: 22:29
 */
require_once '../login/logincheck.php';//登陆检测。~
require_once '../sql/package.php';



?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员中心</title>
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
            <a href="#left-link" class="">
                <i class="am-header-icon am-icon-chevron-left" style="padding-top:15px;"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">会员中心</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="#right-link" class="">
                <i class="am-header-icon  am-icon-home" style="padding-top:15px;"></i>
            </a>
        </div>
    </header>
    <div class="uchome-info">
        <div class="uchome-info-uimg">
            <img src="../default/img1.jpg" />
        </div>
        <div class="uchome-info-uinfo">
            <p><?php echo $_COOKIE['user'];?> &nbsp;    [<a href="../login/logout.php" class="white">退出登录</a>]</p>
            <p>帐号：<?php echo $_COOKIE['phone'];?>，余额：<span class="red">￥0.0</span></p>

        </div>
    </div>
    <!--头部导航-->

    <div class="my-nav-bar">
        <ol class="am-breadcrumb">
            <li><a href="../index.php">首页</a></li>
            <li class="am-active">内容</li>
        </ol>
    </div>

    <div class="am-cf cart-panel">
        <div class="withdrawals-panel">
            <div class="partners-title-panel">
                <div class="partners-title-panel-title"><a href="../../order/myorderlist.php"><i class="am-icon-chevron-circle-right"></i>我的订单</a></div>
            </div>
            <div class="partners-title-panel">
                <div class="partners-title-panel-title"><a href="../user/address.php"><i class="am-icon-chevron-circle-right"></i>我的收货地址</a></div>
            </div>
            <div class="partners-title-panel">
                <div class="partners-title-panel-title"><a href="../user/userdata.php"><i class="am-icon-chevron-circle-right"></i>我的注册资料</a></div>
            </div>
        </div>
    </div>
    </div>

    <?php require_once '../footer.php'; ?>


