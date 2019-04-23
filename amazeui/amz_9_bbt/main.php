<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/18
 * Time: 21:35
 */
require_once '../sql/package.php';
connet();


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>商家首页</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="amazeui/css/amazeui.min.css"/>
    <link rel="stylesheet" href="default/style.css"/>
    <script src="amazeui/js/jquery.min.js"></script>
    <script src="amazeui/js/amazeui.min.js"></script>
</head>

<body>
<div class="container">
    <header data-am-widget="header" class="am-header am-header-default my-header">
        <div class="am-header-left am-header-nav am-dropdown"  data-am-dropdown>
            <a href="javascript:;" class="am-dropdown-toggle"  data-am-dropdown-toggle>
                <i class="am-header-icon am-icon-th-large"></i>
            </a>
            <div style="display:none">

            </div>
            <ul class="am-dropdown-content">
                <li><a href="#">关于我们</a></li>
                <li><a href="#">新闻中心</a></li>
                <li><a href="#">团购</a></li>
                <li><a href="#">商城</a></li>
                <li><a href="#">收银台</a></li>
                <li><a href="#">相册</a></li>
                <li><a href="#">视频</a></li>
            </ul>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">营养生活</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="#right-link" class="">
                <i class="am-header-icon  am-icon-share-alt"></i>
            </a>
        </div>
    </header>
    <!-- banner -->
    <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{&quot;directionNav&quot;:false}'>
        <ul class="am-slides">
            <li>
                <img src="default/bing-1.jpg">
            </li>
            <li>
                <img src="default/bing-1.jpg">
            </li>
            <li>
                <img src="default/bing-1.jpg">
            </li>
            <li>
                <img src="default/bing-1.jpg">
            </li>
        </ul>
    </div>
    <div class="am-cf am-g my-shop-nav">
        <div class="my-shop-nav-panellf">
            <div class=" my-shop-nav-img am-circle ">
                <img src="default/img1.jpg" class="am-circle m-img-thumbnail" />
            </div>
        </div>
        <div class="my-shop-nav-panelrt am-fr">
            <ul class="am-nav am-nav-pills my-shop-nav-ul">
                <li><a href="#">关于我们</a></li>
                <li><a href="#">新闻中心</a></li>
                <li><a href="#">团购</a></li>

            </ul>
        </div>
    </div>
    <div class="am-cf am-g">
        <ul class="am-avg-sm-2 my-shop-product-list">
      
            <?php
              echo "<li>";
              echo    "<div class=\"am-panel am-panel-default\">";
              echo        "<div class=\"am-panel-bd\">";
              echo            "<img class=\"am-img-responsive\" src=\"default/img2.jpg\" /> ";
              echo            "<h3><a href=\"#\">PHHPH</a></h3>";
              echo            "<div>";
              echo                  "<span class=\"list-product-price-span\">￥89.00</span>";
              echo             "</div>";
              echo           "<hr data-am-widget=\"divider\" style=\"\" class=\"am-divider am-divider-default am-cf\"/>";
              echo           "<ol class=\"am-avg-sm-3 product-list-share\">";
              echo               "<li><a href=\"#\"><img src=\"default/icon1.png\" class=\"am-img-responsive\" /></a></li>";
              echo               "<li><a href=\"#\"><img src=\"default/icon3.png\" class=\"am-img-responsive\" /></a></li>";
              echo           "</ol>";
              echo         "</div>";
              echo    "</div>";
              echo "</li>";
            ?>
        </ul>
    </div>


    <footer data-am-widget="footer" class="am-footer am-footer-default" data-am-footer="{  }">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
        <div class="am-footer-miscs ">
            <p>CopyRight©2014 AllMobilize Inc. 模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></p>
            <p>京ICP备13033158</p>
        </div>
    </footer>
    <!--底部-->
    <div data-am-widget="navbar" class="am-navbar am-cf my-nav-footer " id="">
        <ul class="am-navbar-nav am-cf am-avg-sm-4 my-footer-ul">
            <li>
                <a href="/wap/" class="">
                    <span class="am-icon-home"></span>
                    <span class="am-navbar-label">首页</span>
                </a>
            </li>
            <li>
                <a href="###" class="">
                    <span class=" am-icon-phone"></span>
                    <span class="am-navbar-label">电话</span>
                </a>
            </li>
            <li>
                <a href="###" class="">
                    <span class=" am-icon-comments"></span>
                    <span class="am-navbar-label">聊天</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class=" am-icon-map-marker"></span>
                    <span class="am-navbar-label">地图</span>
                </a>
            </li>
            <li style="position:relative">
                <a href="javascript:;" onClick="showFooterNav();" class="">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label">会员</span>
                </a>
                <div class="footer-nav" id="footNav">
                    <span class=" am-icon-bank"><a href="#">买家中心</a></span>
                    <span class="am-icon-suitcase"><a href="#">卖家中心</a></span>
                    <span class="am-icon-usd"><a href="#">我的钱包</a></span>
                    <span class="am-icon-user"><a href="#">个人资料</a></span>
                    <span class="am-icon-th-list"><a href="#">帮助中心</a></span>
                    <span class="am-icon-comments"><a href="#">消息中心</a></span>
                    <span class="am-icon-power-off"><a href="#">安全退出</a></span>
                </div>
            </li>
        </ul>
        <script>
            function showFooterNav(){
                $("#footNav").toggle();
            }
        </script>
    </div>
</div>
</body>
</html>
