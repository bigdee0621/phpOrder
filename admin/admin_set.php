<?php
include_once "../admin/checkAdmin.php";
?>
<?php
include_once "../admin/assets/checklogin.php";
?>

<?php include_once '../admin/assets/slide.php'     #头部?>



    <div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on">网站设置</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">网站设置</a></dl>



    </div>


        <form class="am-form-inline"  method="post" enctype="multipart/form-data">




        <div class="am-cf am-padding-sm" >
            <ul class="am-comments-list am-comments-list-flip">
    <?php
include_once '../sql/package.php';

$sql="select * from web_info";
$query=mysqli_query(connet(),$sql);
$row=mysqli_fetch_array($query,MYSQLI_NUM);
echo '店名:<input type="text" name="name" id="name" value="'.$row[0].'">'."<br>";

echo 'banner图:<br>';

    echo '                <input type="file" name="file" id="file" style=" width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;"  onchange="getObjectURL(this.files[0])" />
   <label for="file" id="img0" style="    font-size: 1.25em;
    font-weight: 700;
    width: 640px;
    height: 128px;;
    color: white;
    background-image: url(../default/banner/'.$row[1].');
    display: inline-block;"> </label>';



if($row[2]==0){
    echo '<br></br>网站状态 <input type="radio" name="status" id="status" value="0" checked> 开放';
    echo "    &nbsp;&nbsp;&nbsp;&nbsp";
    echo   '<input type="radio" name="status" id="status" value="1">关闭';
}else
{
    echo '网站状态 <input type="radio" name="status" id="status" value="0"> 开放';
    echo "    &nbsp;&nbsp;&nbsp;&nbsp";
    echo   '<input type="radio" name="status" id="status" value="1"  checked>关闭';
};?>
    <br>
              <div style="text-align: center"> <button type="submit" class="am-btn am-btn-primary" id="post" >设置</button></div>

        </form>
</body>
</html>



<?php

function WEB_update($arg,$NewArg){
$sql="UPDATE `web_info` SET  `$arg`='$NewArg' WHERE 1";
 if(mysqli_query(connet(),$sql)){
echo "<script>
window.location.href='../admin/admin_set.php'

</script>";
   }   //刷新

}
if(isset($_POST['name']))
{


    WEB_update('name',$_POST['name']);

}
if(isset($_POST['status']))
{
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

            if (file_exists("../default/banner/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            } else {
                // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                move_uploaded_file($_FILES["file"]["tmp_name"], "../default/banner/" . date('Ymds') . $_FILES["file"]["name"]);
                $filename = date('Ymds') . $_FILES["file"]["name"];
            }
        }
    } else {
        echo "只支持jpg格式";
    }
    echo "<script>
alert(1);

</script>";
    WEB_update('banner',$filename);

}
if(isset($_POST['status']))
{

    WEB_update('status',$_POST['status']);

}




?>






        <hr />





        <div class="foods">
            <ul>

            </ul>

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
        $("#img0").css("background-image","url("+url+")");
    };

</script>


