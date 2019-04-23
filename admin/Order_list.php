<?php
include_once "../admin/checkAdmin.php";
?>



<?php include_once '../admin/assets/slide.php'     #头部?>



<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 订单列表</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">订单列表</a></dl>


    </div>


    <form class="am-form am-g">


        <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
            <tr class="am-success">
                <th class="table-check"></th>

                <th class="table-id">ID</th>
                <th class="table-title">商品内容</th>
                <th class="table-type">总价</th>
                <th class="table-type">收货人</th>
                <th class="table-type">收货电话</th>
                <th class="table-author am-hide-sm-only">地址</th>
                <th class="table-date am-hide-sm-only">是否派单</th>
                <th class="table-id">日期</th>
                <th width="163px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>



            <?php
            $sql="SELECT * FROM `order`";
            $query=mysqli_query(connet(),$sql);
            while($row=mysqli_fetch_array($query,MYSQL_NUM))   #输出列表
            {
                 $status="已派单";
                 if($row[7]=="undo"){
                     $status="未派单";
                 }


                echo '
              <tr>
        <td><input type="checkbox" value="'.$row[0].'" /></td>
        <td>'.$row[0].'</td>
        <td>'.$row[4].'</td>
        <td><input value= '.$row[5].' type="text" readonly="readonly" id="ip'.$row[0].'"></td>
        <td class="am-hide-sm-only">'.$row[2].'</td>
        <td class="am-hide-sm-only">'.$row[1].'</td>
         <td class="am-hide-sm-only">'.$row[3].'</td>
              <td class="am-hide-sm-only">'.$status.'</td>
                            <td class="am-hide-sm-only">'.$row[6].'</td>

        <td><div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
            <botton class="am-btn am-btn-default am-btn-xs am-text-secondary am-round" type="button" onclick="finish(\''.$row[0].'\')"><span class="am-icon-check"> </span></botton>
             <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-round" type="button" onclick="goto(\'ip'.$row[0].'\')" ><span class="am-icon-pencil-square-o"></span></button>
              <button class="am-btn am-btn-default am-btn-xs am-text-danger am-round" type="button"  onclick="deorder(\''.$row[0].'\')" ><span class="am-icon-trash-o"></span></button>

            </div>
          </div></td>
      </tr>

        ';
            }
            ?>



            </tbody>
        </table>


        <ul class="am-pagination am-fr">
            <li class="am-disabled"><a href="#">«</a></li>
            <li class="am-active"><a href="#">1</a></li>

            <li><a href="#">»</a></li>
        </ul>




        <hr />

    </form>




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

function finish(OID){
    if(confirm("确定完成该订单吗"))
    {
        $.ajax({
            url:"../admin/ajax/reOrder.php",
            type:"POST",
            data:{
                OID:OID
    },
        success: function(data,status){
            alert("订单已完成");
            window.location.reload();
        }
    });
    }
}



$("input").blur(function(){
    var price=$(this).val();
    var OID = parseInt($(this).attr("id").replace(/[^0-9]/ig,""))  ;//将HTML id转化为商品id
  if(confirm("确定要修改此订单价格吗"))
    {
        $.ajax({
            url:"../admin/ajax/reOrder.php",
            type:"POST",
            data:{
                PID:OID,
                price:price
            },
            success: function(data,status){
                alert("修改价格成功");
                window.location.reload();
                $(this).attr("readonly","readonly");
            }
        });
    }

    $(this).attr("readonly","readonly");
});


function goto(ipid){
    $("#"+ipid).removeAttr("readonly");
    $("#"+ipid).focus();
}

function deorder(OID){
    if(confirm("确定删除该订单吗"))
    {
        $.ajax({
            url:"../admin/ajax/reOrder.php",
            type:"POST",
            data:{
                dID:OID
            },
            success: function(data,status){
                alert("订单删除成功");
                window.location.reload();
            }
        });
    }
}


</script>
