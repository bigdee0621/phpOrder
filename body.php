
<body>
<div class="container" style="margin-top:-25px">
    <header data-am-widget="header" class="am-header am-header-default my-header" >
        <div class="am-header-left am-header-nav am-dropdown"  data-am-dropdown>
            <a href="javascript:;" class="am-dropdown-toggle"  data-am-dropdown-toggle>
                <i class="am-header-icon am-icon-th-large" style="padding-top:15px;"></i>
            </a>
            <div style="display:none">

            </div>
            <ul class="am-dropdown-content">
                <li><a href="./index.php">首页</a></li>
                <li><a href="../chat/chat.php">在线联系</a></li>
                <li><a href="../goods/BuysIndex.php">结算</a></li>

            </ul>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class=""><?php
                require_once(dirname(__FILE__)."/sql/package.php");

                echo  setWeb(0);?></a>
        </h1>
        <div class="am-header-right am-header-nav">


            <?php
            if(isset($_COOKIE['user'])) {
                echo "<a href=\"../index.php\" class=\"\">";
                echo "<i class=\"am-header-icon  am-icon-share-alt\"  style='font-size:12px'>欢迎".$_COOKIE['user'];
            }else
            {
                echo "<a href=\"../login/login.php\" class=\"\">";
                echo "<i class=\"am-header-icon  am-icon-share-alt\" style='font-size:12px'>登陆/注册";
            }

            ?>

            </i>
            </a>
        </div>
    </header>

    <!-- banner -->
 <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{&quot;directionNav&quot;:false}'>
        <ul class="am-slides">
            <?php
            require_once(dirname(__FILE__)."/sql/package.php");
            echo "<li>";
            echo '<img src="../default/banner/'.setWeb(1).'">';//设置banner图
            echo "</li>";

    ?>
        </ul>
    </div>
    <div class=\"am-cf am-g\">
    <ul class=\"am-avg-sm-2 my-shop-product-list\">


<?php
Goods();
    ?>
    </ul>
    </div>
