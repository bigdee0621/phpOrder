

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
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
<div class="container">
    <header data-am-widget="header" class="am-header am-header-default my-header">
        <div class="am-header-left am-header-nav">
            <a href="#left-link" class="">
                <i class="am-header-icon am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class="">用户注册</a>
        </h1>
        <div class="am-header-right am-header-nav">
            <a href="#right-link" class="">
                <i class="am-header-icon  am-icon-home"></i>
            </a>
        </div>
    </header>
    <div class="cart-panel">
            <form class="am-form" role="form" method="post" id="form" action="re.php">
            <div class="am-form-group am-form-icon">
                <i class="am-icon-phone" style="color:#f09513"></i>
                <input name="Phone" type="text" class="am-form-field  my-radius" id="txtPhone"
                       placeholder="请输入手机号码" required>
                <span id="Phone.info" style="color:red"></span>

            </div>
            <div class="am-form-group am-form-icon">
                <i class="am-icon-user" style="color:#329cd9"></i>
                <input type="text" class="am-form-field  my-radius" id="txtUserName" name="username"
                       placeholder="请输入您的姓名" required>
                <span id="username.info" style="color:red"></span>
            </div>
                <div class="am-form-group am-form-icon">
                <label for="gender" class="col-sm-2 control-label">性别:    &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label>
                            <input type="radio" name="gender" id="txtgender" value="男" checked> 男
                               &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" id="txtgender" value="女">女
                        </label>
                    <div

            <div class="am-form-group am-form-icon">
                <i class="am-icon-lock" style="color:#329cd9"></i>
                <input type="password" class="am-form-field  my-radius" name="password" id="txtPassword"
                       placeholder="请输入密码" required>
                <span id="password.info" style="color:red"></span>
            </div>
            <div class="am-form-group am-form-icon">
                <i class="am-icon-lock" style="color:#e9c740"></i>
                <input type="password" class="am-form-field  my-radius" name="repeatPass" id="txtRepeatPass"
                       placeholder="请再次输入密码" required>
                <span id="repeatPass.info" style="color:red"></span>
            </div>
            <div class="am-form-group am-form-icon">
                <i class="am-icon-envelope" style="color:#78c3ca"></i>
                <input type="text" class="am-form-field  my-radius" id="" name="add"
                       placeholder="请输入您的常用收外卖地址" required>
                <span id="add" style="color:red"></span>
            </div>

            <div class="am-checkbox">
                <label>
                    <input  id="protocol" type="checkbox" > 我已阅读并同意<a href="#">《协议》</a>
                    <span id="pro" style="color:red"></span>
                </label>
            </div>

            <p class="am-text-center"> <button type="submit" class="am-btn am-btn-danger am-radius am-btn-block">注册</button></p>

            <p class="am-text-center"> <button type="button"  onclick="back()" class="am-btn am-btn am-radius am-btn-block">返回</button></p>
        </form>
    </div>
<?php
require_once '../footer.php';

?>

    <script type="text/javascript">



        var flag = {
            "Phone": false,
            "username": false,
            "gender": false,
            "password": false,
            "protocal":false,
        };

        $(function () {
            // Phone验证
            $("#txtPhone").blur(function () {
                var Phone = $(this).val();
                var pattern = /^1\d{10}$/;
                var xmlhttp;


                if (!pattern.test(Phone)) {
                    $("#Phone\\.info").html("手机格式不正确");
                    return;
                } else if (Phone.length == 0) {
                    $("#Phone\\.info").html("");
                    return;
                }
                if (window.XMLHttpRequest) {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                    xmlhttp = new XMLHttpRequest();
                }
                else {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        $("#Phone\\.info").html(xmlhttp.responseText);  //发送后返回值返回值~！
                    }
                }
                xmlhttp.open("GET", "../test/gethint.php?q=" + Phone, true);
                xmlhttp.send();

                $("#Phone\\.info").html("");
                flag.Phone = true;

                // 手机验证
            });

            $("#txtUserName").blur(function () {
                // 用户名校验
                var username = $(this).val();
                // 校验规则，可调整
                var pattern = /^[\u4E00-\u9FA5A-Za-z]+$/;
                if (!pattern.test(username)) {
                    $("#username\\.info").html("姓名不合法");
                    return;
                }
                else {
                    $("#username\\.info").html("");
                    flag.username = true;
                }
            });

            /*$("#txtgender").blur(function(){
             // 性别校验
             var gender = $(this:checked).val();

             // 校验规则，可调整
             //var pattern = /\S/;

             if(gender=""){
             $("#gender\\.info").html("请选择性别");
             return;
             }else{
             $("#gender\\.info").html("");
             flag.gender = true;
             return;
             }
             });*/

            // 密码校验
            $("#txtPassword").blur(function () {
                var password = $(this).val();

                var pattern = /\b(^['A-Za-z0-9]{4,20}$)\b/;
                if (!pattern.test(password)) {
                    $("#password\\.info").html("密码格式不正确");
                    return;
                } else {
                    $("#password\\.info").html("");
                    flag.password = true;
                    return;
                }
            });


            // 密码重复校验
            $("#txtRepeatPass").blur(function () {
                var repeatPass = $(this).val();
                var pattern = /\b(^['A-Za-z0-9]{4,20}$)\b/;
                if (repeatPass != $("#txtPassword").val()) {
                    $("#repeatPass\\.info").html("两次密码输入不一致");
                    return;
                } else {
                    $("#repeatPass\\.info").html("");
                    flag.password = true;
                    return;
                }
            });

            $('#protocol').blur(function(){
                if($('#protocol').is(':checked')) {
                    $("#pro").html("");
                    flag.password = true;
                   // alert( flag.password);
                    return;
                } else {
                    flag.password = false;
                    $("#pro").html("请选择，不同意不放人~！！！");
                    return;
                }
            });

            $("#form").submit(function () {
                var ok = flag.Phone && flag.password ;
            //    alert(flag.protocal);
                if (ok == false) {
                    alert("信息格式有误，请重新输入");
                    window.location.reload();
                    return false;
                }
                return true;
            });

        })

        function back() {
            history.back();
        }




    </script>