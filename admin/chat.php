<?php
include_once '../admin/checkAdmin.php';
?>
<?php
include_once "../admin/assets/checklogin.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员聊天界面</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="../amazeui/css/amazeui.min.css"/>
    <link rel="stylesheet" href="../default/style.css"/>
    <script src="../amazeui/js/jquery.min.js"></script>
    <script src="../amazeui/js/amazeui.min.js"></script>
    <script> var t2 = window.setInterval("GetChat()",3000);</script>
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
            <a href="#title-link" class="">客户列表</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="#right-link" class="">
                <i class="am-header-icon  am-icon-home"></i>
            </a>
        </div>
    </header>
    <div class="my-nav-bar">
        <ol class="am-breadcrumb">
            <li><a href="#">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li><a href="#">我的聊天</a></li>
        </ol>
    </div>
    <div class="am-cf am-padding-sm" >
        <ul class="am-comments-list am-comments-list-flip">
            <?php
            include_once '../sql/package.php';
            $sql="SELECT * FROM `chat`";
            $query=mysqli_query(connet(),$sql);
            $user=Array();
            $unread=Array();
            $read=Array();
            while($row=mysqli_fetch_array($query,MYSQLI_NUM)){
                $user[$row[1]]=$row[6];   //put the phone,new to Array. phone As a index of Array.
            }
            $unread=array_keys($user,0);    //unread new
            $read=array_keys($user,1);

            for($i=0;$i<count($unread);$i++){
                if($unread[$i]!="admin"){
                echo '<li class="am-comment">';
                echo "<a href=\"../admin/chatdetial.php?phone=$unread[$i]\">";    //post-link
                echo '<img class="am-comment-avatar" src="../default/img1.jpg" alt=""/> <!-- 头像 -->';
                echo '</a>';
                echo '<div class="am-comment-main">';
                echo '<header class="am-comment-hd">';
                echo '<div class="am-comment-meta" style="background:#fb286e;;">';
                    echo "<a href=\"../admin/chatdetial.php?phone=$unread[$i]\" class=\"am-comment-author\">".$unread[$i].'</a>';
                    $lastTime=0;
                    $sqlt="SELECT `time` FROM `chat` WHERE `phone`='$unread[$i]' ";
                    $queryt=mysqli_query(connet(),$sqlt);
                    while($rowt=mysqli_fetch_array($queryt,MYSQLI_NUM))
                    $lastTime= $rowt[0];               //assign the lastime to the variable
                echo "<time datetime=\"$lastTime\" title=$lastTime class=\"am-fr\">$lastTime</time>";
                echo '</div>';
                echo '</header>';
                echo '</div>';
                echo '</li>';
                }
            }

          for($i=0;$i<count($read);$i++){
            if($read[$i]!="admin") {
                echo '<li class="am-comment">';
                echo "<a href=\"../admin/chatdetial.php?phone=$read[$i]\">";    //post-link
                echo '<img class="am-comment-avatar" src="../default/img1.jpg" alt=""/> <!-- 头像 -->';
                echo '</a>';
                echo '<div class="am-comment-main">';
                echo '<header class="am-comment-hd">';
                echo '<div class="am-comment-meta">';
                echo "<a href=\"../admin/chatdetial.php?phone=$read[$i]\" class=\"am-comment-author\">" . $read[$i] . '</a>';
                $lastTimeD=0;
                $sqltD="SELECT `time` FROM `chat` WHERE `phone`='$read[$i]' ";
                $querytD=mysqli_query(connet(),$sqltD);
                while($rowtD=mysqli_fetch_array($querytD,MYSQLI_NUM))
                    $lastTimeD= $rowtD[0];               //assign the lastime to the variable
                echo "<time datetime=\"$lastTimeD\" title=$lastTimeD class=\"am-fr\">$lastTimeD</time>";
                echo '</div>';
                echo '</header>';
                echo '</div>';
                echo '</li>';
            }
            }




            ?>

        </ul>
    </div>


</div>


</body>
</html>



