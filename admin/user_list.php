<?php
/**
 * Created by PhpStorm.
 * User: bigdee
 * Date: 2018/12/27
 * Time: 13:35
 */
?>
<?php
include_once "../admin/checkAdmin.php";
?>


<?php include_once '../admin/assets/slide.php'     #头部?>



<div class="admin-biaogelist">

  <div class="listbiaoti am-cf">
    <ul class="am-icon-flag on"> 用户列表</ul>

    <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">用户列表</a></dl>


  </div>


  <form class="am-form am-g">


    <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
      <thead>
      <tr class="am-secondary">

        <th class="table-id">用户账户</th>
        <th class="table-title">注册时间</th>
        <th class="table-type">用户名字</th>
        <th class="table-author am-hide-sm-only">性别 </i></th>
        <th class="table-date am-hide-sm-only">地址</th>
          <th width="163px" class="table-set">最后登录时间</th>
        <th width="163px" class="table-set">操作</th>
      </tr>
      </thead>
      <tbody>



      <?php
      $sql="SELECT * FROM customer";
      $query=mysqli_query(connet(),$sql);
      while($row=mysqli_fetch_array($query,MYSQL_NUM))
      {

        echo '
              <tr>
        <td>'.$row[0].'</td>
        <td>'.$row[3].'</td>
        <td>'.$row[2].'</td>
        <td class="am-hide-sm-only">'.$row[5].'</td>
        <td class="am-hide-sm-only">'.$row[6].'</td>
              <td class="am-hide-sm-only">'.$row[4].'</td>
        <td><div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
             <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-round" type="button" onclick="goto(\''.$row[0].'\')" ><span class="am-icon-pencil-square-o"></span></button>
              <button class="am-btn am-btn-default am-btn-xs am-text-warning am-round" type="button"  onclick="repwd(\''.$row[0].'\')" ><span class="am-icon-backward"></span></button>
             <button class="am-btn am-btn-default am-btn-xs am-text-danger am-round" type="button"  onclick="reuser(\''.$row[0].'\')" ><span class="am-icon-trash-o"></span></button>
         
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


    function repwd(pwdid){
        if(confirm("确定重置"+pwdid+"密码")){
            $.ajax({
                url:"../admin/ajax/reUser.php",
                type:"POST",
                data:{pwdid:pwdid},
                success:function (data,status) {
                    var text=getCaption(data);
                    alert("重置成功,新密码为: " + text);
                }
            })
        }
    }

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



    function getCaption(obj){    //获取某个字符后的字符函数

        var index=obj.lastIndexOf("\$");
        obj=obj.substring(index+1,obj.length);
//  console.log(obj);
        return obj;
    }

  function goto(phone){
    window.location.href="user_manager.php?phone="+phone;

  }

  $("#addGoods").click(function(){
      window.location.href="addGoods.php";
      }
    );


  function reuser(uid)
  {
      if(confirm("确定删除"+uid+"会员?")){
          $.ajax({
              url: "../admin/ajax/reUser.php",
              type: "POST",
              data:{uid:uid},
              success: function(data,status){
                  alert("成功删除");
                  window.location.reload();
              }
          });
      }

  }

</script>
