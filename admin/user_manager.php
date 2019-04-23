<?php
include_once "../admin/checkAdmin.php";
?>


<?php include_once '../admin/assets/slide.php';     #头部





if(isset($_GET['phone']))
{
    $GID=$_GET['phone'];
    $sql="SELECT * FROM customer WHERE phone = '".$GID."'";
    $query=mysqli_query(connet(),$sql);
    $row=mysqli_fetch_assoc($query);
}

?>




<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 用户信息修改</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">用户信息修改</a></dl>

    </div>


    <div class="am-g">

        <form class="am-form-inline" role="form"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="phone" value="<?php echo $row['phone']?>">
            <fieldset>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">用户账户:</label><label><span><?php echo $row['phone']?></span></label>
                </div>
                <br>
                <br>
                <br>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">用户名:</label>
                    <input type="text" class="" name="name"  placeholder="" value="<?php echo $row['name']?>">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">性别:</label>
                    <input type="text" class="" name="gender" placeholder="" value="<?php echo $row['gender']?>">
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">收货电话:</label>
                    <input type="text" class="" name="rephone"  placeholder="" value="<?php echo $row['rephone']?>">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">收货地址:</label>
                    <input type="text" class="" name="add"  placeholder="" value="<?php echo $row['add']?>">
                </div>

                <?php
                if(isset($_POST['gender'])) {
                    $name=$_POST['name'];
                    $gender=$_POST['gender'];
                    $rephone=$_POST['rephone'];
                    $phone=$_POST['phone'];
                    $add=$_POST['add'];
                   $sql="UPDATE `customer` SET `name`='".$name."',`gender`='".$gender."',`rephone`='".$rephone."',`add`='".$add."' where `phone`='".$phone."'";
                    if(mysqli_query(connet(),$sql))
                    {
                        echo "<script>alert('修改成功')</script>";
                    }
                }
                ?>



                <p style="margin-top: 10%">
                    <button type="submit" class="am-btn am-btn-default">修改</button>
                    <a href="user_list.php"><button type="button" class="am-btn am-btn-default" >返回</button></a>
                </p>
            </fieldset>
        </form>

    </div>




</div>


<div class="foods">
    <ul>

    </ul>
    <dl>
        <a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a>
    </dl>
</div>




</div>


</body>
</html>
