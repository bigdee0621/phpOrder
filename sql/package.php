
<html>
<head>
<meta charset="utf-8">
</head>
</html>
<?php
//数据库封装
session_start();
date_default_timezone_set("Asia/Shanghai");//设置默认时区
function connet(){
  $conn=mysqli_connect("localhost","root","",'ll') or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
 mysqli_set_charset($conn,"utf8");

 mysqli_query($conn,"set names 'utf8'");
  return $conn;
}
function insert($table,$array){
    $vals="'".join("','",array_values($array))."'";
    $sql="INSERT INTO `$table` values($vals)";

    return mysqli_query(connet(),$sql);

}
function checkGoodsNum($table){
    $Query ="SELECT * FROM `$table`";
    $SQLQuery=mysqli_query(connet(),$Query);
    return mysqli_num_rows($SQLQuery); //条数
}
$indexName = "店名";//店铺名字
$day = date("Y-m-d");
function setWeb($arg)
{

    $Query="select * from web_info";
    $requey=mysqli_query(connet(),$Query);
    $row=mysqli_fetch_array($requey,MYSQL_NUM);
    $indexName=$row[0];
    $banner=$row[1];
    $status=$row[2];
switch($arg){
    case 0:
        return $indexName;
    case 1:
        return $banner;
    case 2;
        return $status;

}

}
function Goods()
{   $GoodsNum=0;
    $Query = 'select * from goods';
    $GQuery = mysqli_query(connet(), $Query);
    while($row=mysqli_fetch_array($GQuery,MYSQLI_NUM)){
        if($row[7]==0)
        {
            continue;  //下架商品跳过
        }
        echoGoods($row[0],$row[1],$row[4],$row[5],$row[6],$row[2]);//输出商品内容
    }
    mysqli_close(connet());
}

function echoGoods($BuysID,$GoodsName,$GoodsPrice,$GoodsImg,$GoodsIndex,$GDescription){

    echo "<li>";
    echo    "<div class=\"am-panel am-panel-default\">";
    echo        "<div class=\"am-panel-bd\">";
    echo            "<img class=\"am-img-responsive\" src=\"/../default/goods/$GoodsImg\" /> ";
    echo            "<h3 style='text-align: right;margin-right: 10px;'><a href=\"$GoodsIndex\">$GoodsName</a></h3>";
    echo            "<div>";
    echo             "<span style=\"float:right;\">$GDescription</span>";
    echo             "<span class=\"list-product-price-span\" style=\"float:right;\">".$GoodsPrice."元</span>";
    echo             "</div>";
    echo           "<hr data-am-widget=\"divider\" style=\"\" class=\"am-divider am-divider-default am-cf\"/>";
    echo           "<ol class=\"am-avg-sm-2 product-list-share\">";
    //echo               "<li style='background-color:#70aa3d;'><a href=\"../goods/Buys.php?GID=$BuysID\"style='width:100%;font-size:1rem; font-family: 黑体;color: #FFFFFF;background-color:#70aa3d;'>加入购物车</a></li>";
   // echo               "<li><a href=\"#\" >&nbsp;</a></li>";
   // echo            "<li style='background-color:#ba2a2a;'><a href=\"../goods/DBuy.php?GID=$BuysID\" style='width:100%;font-size:1.1rem; font-family: 黑体;color: #FFFFFF;background-color:#ba2a2a;'>购买商品</a></li>";
   echo "  <li><button class=\"am-btn am-btn-danger am-btn-xs index-addcart-btn\" onClick=\"window.location.href='../goods/DBuy.php?GID=$BuysID'\">立即购买</button></li>";
    echo "  <li><button class=\"am-btn am-btn-success am-btn-xs index-addcart-btn\" onClick=\"window.location.href='../goods/Buys.php?GID=$BuysID'\">加入购物车</button></li>";

    echo           "</ol>";
    echo         "</div>";
    echo    "</div>";
    echo "</li>";

}
if(setWeb(2)==1){ //网站是否开放
    if(isset($_COOKIE['admin']))
    {

    }else {
        echo "<script>";
        echo "window.location.href='close.html'; ";
        echo "</script>";
    }
}
?>
