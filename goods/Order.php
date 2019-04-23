
<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/23
 * Time: 12:41
 */
require_once '../login/logincheck.php';//登陆检测。~
require_once '../sql/package.php';

function echoBuys()
{
    $numGet=0;


    $goodsID=array();
    $fare=0;
    for ($i = 0; $i < checkGoodsNum('goods'); $i++) {                   //i为商品种类数量
        if (isset($_GET['GID' . $i])) {
//echo $_GET['GID'.$i]."*".$_GET['GNum'.$i]."<br>";
            $goodsID[$numGet] = $_GET['GID' . $i];
            $Total= $_GET['GNum' . $i];
            queryNP($goodsID[$numGet],$Total,$fare);
            $numGet++;
        }
    }





}
function queryNP($GID,$Total,$fare)
{
    $Query = 'select * from goods WHERE GID ='."'".$GID."'";
    $GQuery = mysqli_query(connet(), $Query);
    $row = mysqli_fetch_array($GQuery, MYSQLI_NUM);
    echo "<li>";
    echo "<div class=\"imgpanel\"><a href=\"#\"><img src=\"../default/goods/$row[5]\" class=\"am-img-responsive\" /></a></div>";
                echo "<div class=\"infopanel\">";
                 echo "<h3><a href=\"#\">$row[1]</a></h3>";  //商品名字
    echo "<div class=\"total\" total='$Total' price='$row[4]' name='$row[1]'>";
    echo "<p>&nbsp;</p>";
                 echo "<p>价格：<span class=\"red2 bold\">$row[4]</span> 元  X $Total 件</p>";
    echo "</div>";
                 echo "<p>运费：<span class=\"red2 bold\">".$fare."</span> 元</p><i id='fare' fare='$fare'></i>";
             echo "</div>";
         echo "</li>";


}

function recout(){
   return $coutMonet;
}



?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>提交订单</title>
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
            <a href="#title-link" class="">提交订单</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="#right-link" class="">
                <i class="am-header-icon  am-icon-home" style="padding-top:15px;"></i>
            </a>
        </div>
    </header>

    <div class="gray-panel">
        <div class="paoduct-title-panel">
            <h2 class="checkout-h2"><span class="am-badge am-round am-badge-warning ">1</span> 确认订单信息</h2>
            <div class="cart-list-panel">
                <ul class="am-avg-sm-1 cart-panel-ul">

<?php echoBuys()?>

                </ul>
            </div>
            <div class="cart_foot">共<span class="red2 bold" id="total_good"></span>件商品；总价：<span class="red2 bold" id="total_amount"></span>元；</div>
            <div class="cart-tool">
                <a class="am-btn am-btn-sm am-btn-success am-radius" href="../goods/BuysIndex.php">
                    <i class="am-icon-chevron-left"></i>
                    返回购物车
                </a>
            </div>
        </div>
        <div class="paoduct-title-panel">
            <h2 class="checkout-h2"><span class="am-badge am-round am-badge-warning ">2</span> 确认收货地址</h2>
            <p><i class="am-icon-location-arrow"></i> 收货地址</p>
            <form class="am-form am-form-inline">
                <p><select name="" class="select-area am-radius"><option>广东省</option></select><select name="" class="select-area am-radius"><option>广州市</option></select><select name="" class="select-area am-radius"><option>白云区</option><option>花都区</option><option>海珠区</option><option>越秀区</option></select></p>
                <div class="am-form-group">
                       <?php
                       contact($_COOKIE['phone']);
                   function contact($phone)   //通过登陆检测传值~！！
                   {

                       $sql = "SELECT * FROM `customer` WHERE `phone`=" . "\"$phone\"";
                       $GQuery = mysqli_query(connet(), $sql);
                       $row = mysqli_fetch_array($GQuery, MYSQLI_NUM);
                       $add = $row[6];
                       $phoneNum = $row[0];
                       $cusName = $row[2];

                       mysqli_close(connet());
                       if ($add == '') $add = "请输入地址";
                       echo "<input type=\"text\" class=\"am-form-field am-radius\" placeholder=\"请输入地址\" value='$add'>";
                       echo " </div>";
                       echo "<hr data-am-widget=\"divider\" style=\"\" class=\"am-divider-default am-margin-bottom-sm\"/>";
                       echo "<div class=\"am-form-group am-form-icon\">";
                       echo "<i class=\"am-icon-user\"></i>";
                       echo "<input type=\"text\" class=\"am-form-field am-radius\" placeholder=\"姓名\" value='$cusName'>";
                       echo "</div>";
                       echo "<div class=\"am-form-group am-form-icon\">";
                       echo " <i class=\"am-icon-phone\"></i>";
                       echo " <input type=\"text\" class=\"am-form-field am-radius\" placeholder=\"手机号码\" value='$phoneNum'>";
                       echo " </div>";
                   }
                       ?>
                <input type="hidden" value="1" name="paytype" id="paytype">
            </form>
        </div>
        <div class="paoduct-title-panel">
            <h2 class="checkout-h2"><span class="am-badge am-round am-badge-warning ">3</span> 支付方式</h2>
            <ul class="am-list am-text-sm my-pay-ul">
                <li><a href="javascript:;" rel="1" class="hover"><span class="am-fr"><i class="am-icon-check-circle"></i>&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../default/wechat.png" class="payimg" />&nbsp;&nbsp;&nbsp;&nbsp;微信支付</a></li>
                <li><a href="javascript:;" rel="2"><span class="am-fr"><i class="am-icon-circle-thin"></i>&nbsp;&nbsp;</span><img src="../default/alipay.png" class="payimg" /> 支付宝支付</a></li>
                <li><a href="javascript:;" rel="3"><span class="am-fr"><i class="am-icon-circle-thin"></i>&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../default/money.png" class="payimg" />&nbsp;&nbsp;&nbsp;&nbsp;余额支付 &nbsp;&nbsp; <samll class="my-pay-yue">金币余额：<span class="red2">1001</span>  &nbsp;&nbsp;<span onClick="window.location.href='#'" class="red2">充值</span></samll></a></li>
            </ul>
            <script>
                $(document).ready(function(e) {
                    $(".my-pay-ul li > a").click(function(){
                        $(".my-pay-ul li > a").removeClass('hover');
                        $(".my-pay-ul li > a i").removeClass('am-icon-check-circle').addClass('am-icon-circle-thin');
                        $(this).addClass('hover');
                        var val = $(this).attr('rel');
                        $("#paytype").val(val);
                        $(this).find('i').removeClass('am-icon-circle-thin').addClass('am-icon-check-circle');


                    });
                });
            </script>
            <div>
                <ul class="am-avg-sm-2 am-text-center">
                    <li class="am-text-center am-padding-sm"><button id='post' type="button" class="am-btn am-btn-danger am-btn-block am-radius">提交订单</button></li>
                    <li class="am-text-center am-padding-sm"><button type="button" class="am-btn am-btn-success am-btn-block am-radius">继续购物</button></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    //$phone= $_GET['Phone'];
    //为jqery提供信息~！！！！！！！！！！！！
    //if(isset($_GET['phone'])) {
    //$phone = $_GET['phone'];
    $phone = $_COOKIE['phone'];
    $sql = "SELECT * FROM `customer` WHERE `phone`=" . "\"$phone\"";
    $GQuery = mysqli_query(connet(), $sql);
    $row = mysqli_fetch_array($GQuery, MYSQLI_NUM);
    $add = $row[6];
    $phoneNum = $row[0];
    $cusName = $row[2];
    echo "<div class=\"info\" url=\"?phone=$phoneNum&&name=$cusName&&add=$add&&\"></div>";//提交表单内容，与js配合使用~！
   // }

    ?>

<?php require_once '../footer.php'; ?>

    <script>
        $(document).ready(function(){
        var cout= 0;
        var totalMoney=0;
       var  Gname="";  //初始化
            var Purl="";
        $(".total").each(function () {

            var total=Number($(this).attr('total'));   //利用div获取数量再输出~！  因为php真的太烦了~~！！！！！！
            var price=Number($(this).attr('price'));
            var name=$(this).attr('name');
            totalMoney=total*price+totalMoney;
            cout=total+cout;
            Gname="商品:"+name+"X"+total+";"+Gname;
        });

        $("#total_good").text(cout);
        $("#total_amount").text(totalMoney);
        //alert($("#fare").attr('fare'));运费可以自己设置

            $(".info").each(function () {
                Purl=$(this).attr('url');
            });
           var path="../goods/COrder.php"+Purl+"detail="+Gname+"&&total="+totalMoney;   //连接路径。post有关信息//·!!!@!@@~

            $("#post").click(function(){
                window.location.href=path;
            });
       });
    </script>
