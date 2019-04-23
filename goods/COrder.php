<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/3/25
 * Time: 14:56
 */

require_once '../login/logincheck.php';//登陆检测。~

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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
<div class="container">
	<header data-am-widget="header" class="am-header am-header-default my-header">
      <div class="am-header-left am-header-nav">
        <a href="#left-link" class="">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <h1 class="am-header-title">
        <a href="#title-link" class="">订单创建成功</a>
      </h1>
      <div class="am-header-right am-header-nav">
        <a href="#right-link" class="">
          <i class="am-header-icon  am-icon-home"></i>
        </a>
      </div>
    </header>


                <?php
                require_once "../sql/package.php";
                if($_GET['phone']) {
                    $phone = $_GET['phone'];
                    $name = $_GET['name'];
                    $add = $_GET['add'];
                    $detail = $_GET['detail'];
                    $total = $_GET['total'];
                    $ID=checkGoodsNum('order')+1;//total num + 1 SQL
                    $status="undo";
                    $day=date("YmdHis");
                    $data = array("$ID","$phone", "$name", "$add", "$detail", "$total","$day","$status");
                    if(insert("order", $data))
                    {echoTitle("订单创建成功");
                        mysqli_close(connet());
                        session_destroy(); }//删除所有session购物车的 ~！！！
                    else{
                        echoTitle("订单创建失败，请联系管理人员，~！！");
                        mysqli_close(connet());
                    };
                    $IDcout=intval(intval($ID));
                   $Query = "SELECT * FROM `order` WHERE `ID`=$IDcout";//

                    $GQuery = mysqli_query(connet(), $Query);
                    $row=mysqli_fetch_array($GQuery,MYSQLI_NUM);
                    echoOrderdetil($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);//输出商品内容
                    mysqli_close(connet());

                }

                function echoTitle($title){
                    return $title;}
                function echoOrderdetil($OID,$OPhone,$Oname,$Oadd,$Odetail,$Ototal,$Odate){
                    $context="你的订单号:".$Odate.$OID."。<br>联系人/电话：".$Oname."/".$OPhone."。<br>地址：".$Oadd."。 <br>订单详情：".$Odetail."。<br>总金额为：￥".$Ototal;
                    echo "<h2 class=\"checkout-h2\"><i class=\"am-icon-lightbulb-o am-text-danger\"></i> 订单创建成功</h2>";
                    echo " <div class=\"cart-list-panel\">";
                    echo "<p>". $context."</P>";
                    echo "  </div>";
			         echo " <div>";
                    }

                ?>

            	<ul class="am-avg-sm-2 am-text-center">
                	<li class="am-text-center am-padding-sm"><a href="../order/myorderlist.php"><button type="button" class="am-btn am-btn-danger am-btn-block am-radius am-btn-sm">查看订单</button></a></li>
                    <li class="am-text-center am-padding-sm"><button type="button" id="index" class="am-btn am-btn-success am-btn-block am-radius am-btn-sm">继续购物</button></li>
                </ul>
        	</div>
        </div>

    </div>
</body>
<?php require_once '../footer.php';?>
<script>
$('#index').click(function(){window.location.href="../Index.php";} );

</script>