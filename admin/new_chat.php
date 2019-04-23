<?php
include_once "../admin/checkAdmin.php";
?>


<?php include_once '../admin/assets/slide.php'     #头部?>



<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on">聊天列表</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">聊天列表</a></dl>



    </div>


    <form class="am-form am-g">




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






        <hr />

    </form>




    <div class="foods">
        <ul>

        </ul>

    </div>




</div>


</body>
</html>

