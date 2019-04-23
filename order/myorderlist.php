
<?php
require_once '../head.php';

require_once '../login/logincheck.php';//登陆检测。~
require_once '../sql/package.php';
?>

<body>
<div class="container" style="margin-top:-25px">
    <header data-am-widget="header" class="am-header am-header-default my-header">
        <div class="am-header-left am-header-nav">
            <a href="javascript:window.history.back(-1)" class="">
                <i class="am-header-icon am-icon-chevron-left" style="padding-top:15px;"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">我的订单</a>
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
            <li><a href="../goods/BuysIndex.php">用户中心</a></li>
            <li><a href="#">我的订单</a></li>
        </ol>
    </div>


    <div class="am-cf cart-panel">
        <div class="cart-list-panel">
            <ul class="am-avg-sm-1 cart-panel-ul">
                <?php
                $temp=$_COOKIE['user'];
               $orderQuery="SELECT * FROM `order` WHERE `name` = "."'$temp'";
                $result=mysqli_query(connet(),$orderQuery);
                while($result1=mysqli_fetch_array($result,MYSQL_NUM))
                {
                    $time=ltrim($result1[6],'$');
                    $hour=substr($time,8,2);
                    $min=substr($time,10,2);

                   if( $result1[7]=='undo')
                   {
                       $status="<span><a class=\"am-badge am-badge-danger am-round\">未配送</a></span>";
                   }
                    else
                    {
                        $status="<span><a class=\"am-badge am-badge-success am-round\">已配送</a></span>";
                    }

                    echo '            <li>
                    <div class="infopanel">
                        <h3><a href="#">订单号:'.$time.$result1[0].'</a></h3>
                        <p>订单内容：'.$result1[4].'</p>
                        <p>价格：<span class="red2 bold">'.$result1[5].'</span> 元 </p>
                        <p>收货地址：<span class=" bold">'.$result1[3].'</span></p>
                        <p>配送状态：'.$status.'</p>
                        <p>下单时间：'. $hour.":".$min.'</p>
                    </div>
                </li>
  ';
                    mysqli_close(connet());
                }
                ?>
            </ul>
        </div>
    </div>

<?php

include_once '../footer.php';
?>


