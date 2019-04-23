

<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/4/1
 * Time: 19:34
 */
?>
<?php
require_once '../head.php';
require_once '../login/logincheck.php';
?>
<body>
<div class="container" style="margin-top:-25px">
	<header data-am-widget="header" class="am-header am-header-default my-header">
      <div class="am-header-left am-header-nav">
        <a href="#left-link" class="">
          <i class="am-header-icon am-icon-chevron-left" style="padding-top:15px;"></i>
        </a>
      </div>
      <h1 class="am-header-title">
        <a href="#title-link" class="">聊天详情</a>
      </h1>
      <div class="am-header-right am-header-nav">
        <a href="../index.php" class="">
          <i class="am-header-icon  am-icon-home" style="padding-top:15px;"></i>
        </a>
      </div>
    </header>
    <div class="my-nav-bar">
    	<ol class="am-breadcrumb">
          <li><a href="#">首页</a></li>
          <li><a href="#">用户中心</a></li>
          <li><a href="#">聊天详情</a></li>
        </ol>
    </div>
    <div class="am-cf am-padding-sm" >
    	<ul class="am-comments-list am-comments-list-flip">

            <div id="txtHint"></div>
        </ul>
    </div>

    <div class="am-g am-cf">

	<form class="am-form" role="form">
    	<div class="am-u-sm-9 am-form-group" id="sendmsg"><input value="" id="chattext" type="test" class="am-form-field" placeholder="请输入聊天内容"></div>
        <div class="am-u-sm-3 "><button  id="chatSend" type="button" class="am-btn am-btn-danger am-radius">发送</button></div>

    </form>

    </div>
<?php

include_once '../footer.php';
?>
    <script>

        $("#chatSend").click(function(){
            var str=$("#chattext").val();
            var xmlhttp;
            $("#sendmsg").removeClass('am-form-error');//取消发送警示
            if (str.length==0)
            {
                document.getElementById("txtHint").innerHTML="";
                $( "#sendmsg").addClass('am-form-error');//警示发送框
                return;
            }
            if (window.XMLHttpRequest)
            {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function()
            {

                /*
                 readyState
                 1：已打开。对象已经创建并初始化，但还未调用send方法
                 2：已发送。已经调用send 方法，但该对象正在等待状态码和头的返回；
                 3：正在接收。已经接收了部分数据，但还不能使用该对象的属性和方法，因为状态和响应头不完整；
                 4：已加载。所有数据接收完毕
                 status
                 200（成功）  服务器已成功处理了请求。通常，这表示服务器提供了请求的网页。
                 */

                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;  //发送后返回值返回值~！
                    document.getElementById("chattext").scrollIntoView();//滚动回底部~！

                }
            }
            xmlhttp.open("GET","../chat/chatsql.php?text="+str,true);
            $("#chattext").val('');
            xmlhttp.send();

        });
        GetChat();
        var t2 = window.setInterval("GetChat()",3000);//执行定时刷新聊天内容。 window.clearInterval(t2); //去掉方法
        function GetChat() {  //获取消息函数
    var GETChat;
    if (window.XMLHttpRequest) {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        GETChat = new XMLHttpRequest();
    }
    else {
        // IE6, IE5 浏览器执行代码
        GETChat = new ActiveXObject("Microsoft.XMLHTTP");
    }

    GETChat.onreadystatechange = function () {

        /*
         readyState
         1：已打开。对象已经创建并初始化，但还未调用send方法
         2：已发送。已经调用send 方法，但该对象正在等待状态码和头的返回；
         3：正在接收。已经接收了部分数据，但还不能使用该对象的属性和方法，因为状态和响应头不完整；
         4：已加载。所有数据接收完毕
         status
         200（成功）  服务器已成功处理了请求。通常，这表示服务器提供了请求的网页。
         */

        if (GETChat.readyState == 4 && GETChat.status == 200) {
            document.getElementById("txtHint").innerHTML = GETChat.responseText;  //发送后返回值返回值~！

        }
    }
    GETChat.open("GET", "../chat/Getchat.php?GETChat=1", true);
    GETChat.send();

}
    </script>
