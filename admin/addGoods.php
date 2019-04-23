<?php
include_once "../admin/checkAdmin.php";
?>

<?php
include_once "../admin/assets/checklogin.php";
?>
<?php include_once '../admin/assets/slide.php';     #头部

$GIDSQL="select * from goods";
$GNUM= mysqli_num_rows( mysqli_query(connet(),$GIDSQL))+1;
if($GNUM>9){
    $GID="G".   $GNUM ;
}else
    $GID="G0".$GNUM;                  //判断行数



if(isset($_POST['GID'])) {
    $filename = "";
    $allowedExts = array("jpg");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);     // 获取文件后缀名
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 20480000)   // 小于 200 kb
        && in_array($extension, $allowedExts)
    ) {
        if ($_FILES["file"]["error"] > 0) {
            echo "错误：: " . $_FILES["file"]["error"] . "<br>";
        } else {

            if (file_exists("../default/goods/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            } else {
                // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                move_uploaded_file($_FILES["file"]["tmp_name"], "../default/goods/" . date('Ymds') . $_FILES["file"]["name"]);
                $filename = date('Ymds') . $_FILES["file"]["name"];
            }
        }
    } else {
        echo "只支持jpg格式";
    }

    $GName=$_POST["GName"];
    $GDescription=$_POST['GDescription'];
    $type=$_POST['type'];
    $GPrice=$_POST['GPrice'];
    $stock=$_POST['stock'];
    $sql="INSERT INTO `goods`(`GID`,`GName`, `GDescription`, `type`, `GPrice`,`Gimg`,`stock`) VALUES ('".$GID."','".$GName."','".$GDescription."','".$type."','".$GPrice."','".$filename."','".$stock."')";

if(mysqli_query(connet(),$sql)) {
        echo "<script>";
        echo "alert('添加成功');";
        echo "</script>";

    }else
{
    echo "alert('系统出错，请检查配置');";
    echo "console.log($sql)";
}


}




?>




<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 商品添加</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品添加</a></dl>

    </div>


    <div class="am-g">

        <form class="am-form-inline" role="form"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="GID" value="<?php echo $GID; ?>">
            <fieldset>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">商品名称</label>
                    <input type="text" class="" name="GName"  placeholder="" >
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">商品描述</label>
                    <input type="text" class="" name="GDescription"  placeholder="" >
                </div>
                <div style="width: 120px;height: 120px;float: right;margin-right: 10%">
                    <img style="width: 120px;height: 120px;" src="../default/qrcode.jpg" id="img0">
                    <span style="float: left;margin-left: 30px"><a style="color: #6b5c4f">商品图片</a></span>
                    <input type="file" name="file" id="file" onchange="getObjectURL(this.files[0])" />
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">商品类型</label>
                    <input type="text" class="" name="type" placeholder="" value="">
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">商品定价</label>
                    <input type="text" class="" name="GPrice" placeholder="" value="">
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-email-1">存库数量</label>
                    <input type="text" class="" name="stock" placeholder="" value="">
                </div>

                <p style="margin-top: 10%">
                    <button type="submit" class="am-btn am-btn-default">添加</button>
                    <a href="index.php"><button type="button" class="am-btn am-btn-default" >返回</button></a>
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
<script>

    function getObjectURL(file) {
        var url = null;
        if (window.createObjcectURL != undefined) {
            url = window.createOjcectURL(file);
        } else if (window.URL != undefined) {
            url = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) {
            url = window.webkitURL.createObjectURL(file);
        }
        $("#img0").attr("src",url);
    };

</script>


