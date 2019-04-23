<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/20
 * Time: 22:29
 */
require_once '../login/logincheck.php';//登陆检测。~
require_once '../sql/package.php';

function echoBuys(){
    $TNum=0;
for($I=0;$I<10;$I++) {
    if (isset($_SESSION['G0' . $I])) {
        $BuyID='G0'.$I;
        //unset($_SESSION['G0'.$I]);//删除
        $TNum+=1;
        GPrice($BuyID,$TNum);

        }
}
}



function GPrice($GID,$TNum){

    $Query ="select * from goods where `GID`='".$GID."'";
    $GQuery = mysqli_query(connet(), $Query);
    $GTatol=$_SESSION[$GID];
    while($row=mysqli_fetch_array($GQuery,MYSQLI_NUM)){
    echo "<li>";
       echo "<div class=\"imgpanel\"><a href=\"#\"><img src=\"../default/goods/$row[5]\" class=\"am-img-responsive\" /></a></div>";
        echo "<div class=\"infopanel\">";
        echo "<div class=\"Gname\" >";
        echo "<h3><a href=\"$row[6]\">$row[1]</a></h3>";
        echo "<i name='$row[0]'>&nbsp;</i>";   //为jquery提供GID
        echo "</div>";
        echo "<div class=\"DD2\" >";
        echo "<p>价格：<span id=\"$TNum\" class=\"red2 bold\">$row[4]</span> 元  X";
        echo "<input onchange=\"checkedNum(\$(this),$row[9])\" class=\"am-input-sm txt-qty\" value=\"$GTatol\" /></p>";
        echo "</div>";
        echo "<p><span class=\"am-fr\"><a href=\"./DeleteGood.php?GID=$row[0]\" class=\"am-badge am-badge-danger am-round\">删除</a></span>库存：<span id=\"$row[0]\" class=\"red2 bold\">$row[9]</span> 件</p>";
        echo "</div>";
         echo "</li>";

      return $row[4];    //返回商品得价格

    }


    mysqli_close(connet());
}

?>
<script>
    function checkedNum(num,umnum) {     //判断存库与订购量函数

        var ipNum=num.val();
        if(ipNum<=0)
        {
            alert("不能少于0件");
            num.val(1);
        }
        if(ipNum>umnum)
        {
            alert("订购量不能超过存库量")
            num.val(umnum);

        }

    }
</script>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>购物车</title>
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
        <a href="#title-link" class="">购物车</a>
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
        <div class="cart-list-panel">
            <ul class="am-avg-sm-1 cart-panel-ul">
               <?php echo echoBuys(); ?>
            </ul>
        </div>
    </div>
    <div class="cart_foot">共选中<span class="red2 bold" id="total_good">{$total}</span>种商品；总价：<span class="red2 bold" id="total_amount"></span>元；</span></div>
    <div class="cart-tool">
        <a class="am-btn am-btn-sm am-btn-success" href="../index.php">
          <i class="am-icon-chevron-left"></i>
          返回
        </a>
       <a class="am-btn am-btn-sm am-btn-warning" id="Total">
          <i class="am-icon-shopping-cart"></i>
          结账
        </a>
    </div>

  <?php require_once '../footer.php'; ?>


<script>

    var countTotal1=0;
    var Total1=0;
    $(".DD2").each(function () {
        var price1=Number($(this).find('span').text());
        var googNum1=Number($(this).find('input').val());
        Total1 = price1 * googNum1;
        countTotal1 = Total1 + countTotal1;
    });
    $("#total_amount").text(countTotal1);

    $('.DD2 input').on('click',function(){

        var countTotal=0;
        var Total=0;
        $(".DD2").each(function () {
            var price=Number($(this).find('span').text());
            var googNum=Number($(this).find('input').val());
            Total = price * googNum;
            countTotal = Total + countTotal;  //计算总金额

        });
        $("#total_amount").text(countTotal);
    });
    var $elements = $('.DD2');
    var len = $elements.length;  //通过数div获取种类数
    $("#total_good").text(len);


    $("#Total").on('click',function() {
        var price, GoodsNum, post, Gname;
        post ="";//初始化
        var GID="";
        var num = 0;
        var Gnum=0;
        var GDList = new Array();
        var GDNum = new Array();
        var GIDList= new Array();
            $(".Gname").each(function () {
                Gname = $(this).find('a').text();
                GID=$(this).find('i').attr('name');
                GDList[num] = Gname;//将商品名字添加到数组
                GIDList[num]=GID;//将GID添加到数组
                num++;
            });
        $(".DD2").each(function () {
            price = $(this).find('span').text();
            GoodsNum = $(this).find('input').val();
            GDNum[Gnum] =GoodsNum; //将商品数量添加到数组
            Gnum++;
        });

        var i= 0;
        var msg="";//初始化
        for(i;i<GDList.length;i++){
            post="GID"+i+"="+GIDList[i]+"&&"+"GNum"+i+"="+GDNum[i]+"&&"+post;  //post内容
            var n="-------------------------\n----【商品】："+GDList[i]+"。----\n----  【数量】   ：  "+GDNum[i]+"    件    ----\n ";
           msg=n+msg;
        }   //输出订单确认框。


        var cmsg="你的订购的商品如下\n "+msg;
        if(msg.length==0){//判断商品是否为空
            alert('你订购的商品为空');
          window.location.reload();
        }else{
          if(confirm(cmsg)){ window.location.href="../goods/Order.php?"+post;};}

    }
    )
</script>