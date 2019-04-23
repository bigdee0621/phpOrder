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



if(isset($_POST['name']))
{
    $name= $_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $sqladd= "UPDATE `customer` SET `rename`="."'$name'".",`rephone`="."'$phone'".",`add`="."'$address'"." WHERE name = "."'$temp'";

    if(mysqli_query(connet(),$sqladd))
    {
        echo "<script>
       alert('修改成功');

           </script>";
    }

}

$queryuser="SELECT * FROM `customer` WHERE name = "."'$temp'";
$resultUser=mysqli_query(connet(),$queryuser);
$rowuser=mysqli_fetch_array($resultUser,MYSQL_NUM);

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的收货地址</title>
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
            <a href="#title-link" class="">我的收货地址</a>
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

    <div class="am-cf cart-panel">
        <div class="withdrawals-panel">
            <div class="partners-title-panel">

                <form action="" class="am-form" method="post">
                    <fieldset>
                        <legend>收货地址</legend>
                        <div class="am-form-group">
                            <label for="doc-vld-name">收件人：</label>
                            <input type="text" id="doc-vld-name" minlength="3" value="<?php echo $rowuser[8]?>" name="name" class="am-form-field" required/>
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name">联系电话：</label>
                            <input type="text" id="doc-vld-name" minlength="3" value="<?php echo $rowuser[9]?>" name="phone"class="am-form-field" required/>
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-name">地址：</label>
                            <input type="text" id="doc-vld-name" minlength="3" value="<?php echo $rowuser[6]?>" name="address"   class="am-form-field" required/>
                        </div>
                    </fieldset>
                    <button class="am-btn am-btn-secondary am-fr" type="submit">修改</button>
                    <button class="am-btn am-btn-danger am-fr" type="button"><a href="javascript:history.back(-1)" style="color: #ffffff">返回</a> </button>
                </form>





        </div>
    </div>
</div>

<?php require_once '../footer.php'; ?>


