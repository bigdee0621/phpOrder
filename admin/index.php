<?php

include_once "../admin/checkAdmin.php";
 ?>


<?php include_once '../admin/assets/slide.php'     #头部?>



<div class="admin-biaogelist">

  <div class="listbiaoti am-cf">
    <ul class="am-icon-flag on"> 商品列表</ul>

    <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>

    <dl>
      <a href="addGoods.php"><button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> 添加产品</button></a>
    </dl>


  </div>


  <form class="am-form am-g">


    <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
      <thead>
      <tr class="am-success">
        <th class="table-check"></th>

        <th class="table-id">ID</th>
        <th class="table-title">标题</th>
        <th class="table-type">类别</th>
        <th class="table-author am-hide-sm-only">上架/下架 <i class="am-icon-check am-text-warning"></i> <i class="am-icon-close am-text-primary"></i></th>
        <th class="table-date am-hide-sm-only">修改日期</th>
        <th width="163px" class="table-set">操作</th>
      </tr>
      </thead>
      <tbody>



      <?php
      $sql="SELECT * FROM goods";
      $query=mysqli_query(connet(),$sql);
      while($row=mysqli_fetch_array($query,MYSQL_NUM))
      {
        if($row[7]==1)
        {
          $online=' <i class="am-icon-check am-text-warning"></i>';
        }else
        {$online=' <i class="am-icon-close am-text-secondary"></i>';

        }
        echo '
              <tr>
        <td><input type="checkbox" value="'.$row[0].'" /></td>

        <td>'.$row[0].'</td>
        <td><a href="managerGoods.php?GID='.$row[0].'">'.$row[1].'</a></td>
        <td>'.$row[3].'</td>
        <td class="am-hide-sm-only">'.$online.'</td>
        <td class="am-hide-sm-only">'.$row[8].'</td>
        <td><div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
             <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-round" type="button" onclick="goto(\''.$row[0].'\')" ><span class="am-icon-pencil-square-o"></span></button>
              <button class="am-btn am-btn-default am-btn-xs am-text-danger am-round" type="button"  onclick="degoods(\''.$row[0].'\')" ><span class="am-icon-trash-o"></span></button>
            </div>
          </div></td>
      </tr>

        ';
      }
      ?>



      </tbody>
    </table>

    <div class="am-btn-group am-btn-group-xs">
      <button type="button" class="am-btn am-btn-default" id="upGoods"><span class="am-icon-save"></span> 上架</button>
      <button type="button" class="am-btn am-btn-default" id="downGoods"><span class="am-icon-save"></span> 下架</button>
      <button type="button" class="am-btn am-btn-default" id="addGoods"><span class="am-icon-plus"></span> 新增</button>
      <button type="button" class="am-btn am-btn-default" id="deGoods"><span class="am-icon-trash-o"></span> 删除</button>
    </div>


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

  //上架按钮
  $('#upGoods').click(function(){
    $.each($('input:checkbox:checked'),function(){ //获取已选checkbox
      $.ajax({
        url: "../admin/ajax/reGoods.php",
        type: "POST",
        data:{GID:$(this).val()},
        success: function(data,status){
         alert("成功上架");
         window.location.reload();
        }
      });
    })
  });

  //下架按钮
  $('#downGoods').click(function(){
    $.each($('input:checkbox:checked'),function(){
      $.ajax({
        url: "../admin/ajax/reGoods.php",
        type: "POST",
        data:{DGID:$(this).val()},
        success: function(data,status){
          alert("成功下架");
          window.location.reload();
        }
      });
    })
  });

  $('#deGoods').click(function(){

    $.each($('input:checkbox:checked'),function(){
      if(confirm("确定删除该"+$(this).val()+"商品?")){
        $.ajax({
          url: "../admin/ajax/reGoods.php",
          type: "POST",
          data:{DDGID:$(this).val()},
          success: function(data,status){
            alert("成功删除");
            window.location.reload();
          }
        });
      }
    })

  });



  function degoods(goodID){
       if(confirm("确定删除该"+goodID+"商品?")){
     $.ajax({
     url: "../admin/ajax/reGoods.php",
     type: "POST",
     data:{DDGID:goodID},
     success: function(data,status){
     alert("成功删除");
     window.location.reload();
     }
     });
     }

  }
  function goto(goodID){
    window.location.href="managerGoods.php?GID="+goodID;

  }

  $("#addGoods").click(function(){
      window.location.href="addGoods.php";
      }
    );

</script>
