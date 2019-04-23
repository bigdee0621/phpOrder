<?php
require_once '../head.php';
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
			<a href="#title-link" class="">用户登录</a>
		</h1>
		<div class="am-header-right am-header-nav">
			<a href="#right-link" class="">
				<i class="am-header-icon  am-icon-home" style="padding-top:15px;"></i>
			</a>
		</div>
	</header>
	<div class="cart-panel">
		<form class="am-form">
			<div class="am-form-group am-form-icon">
				<i class="am-icon-user" style="color:#329cd9"></i>
				<input id="user" type="text" class="am-form-field  my-radius" placeholder="请输入您的手机号">
			</div>
			<div class="am-form-group am-form-icon">
				<i class="am-icon-lock" style="color:#329cd9"></i>
				<input id="PWD" type="password" class="am-form-field  my-radius" placeholder="请输入您的密码">
			</div>
			<div class="am-checkbox">
				<label>
					<input id="cookie" type="checkbox"> 记住密码
				</label>
			</div>
			<p class="am-text-center"><button id="login" type="button" class="am-btn am-btn-primary am-radius am-btn-block">立即登录</button></p>
			<p class="am-text-center"><button id="reginster" type="button" class="am-btn am-btn-warning am-radius am-btn-block">立即注册</button></p>
		</form>
	</div>

<?php require_once '../footer.php';
if(isset($_COOKIE['user'])){
	echo "<script>";
	echo "alert('你已经登陆了');";
	echo  "window.location.href='../goods/BuysIndex.php';";
	echo "</script>";}

?>
	<script>

		$('#login').on('click',function(){
			var user=$('#user').val();
			var PWD=$('#PWD').val();
			var cookie=0;
			if(user.length==0)
			{alert('请输入账号')}
			else if(PWD.length==0){
				alert('请输入密码~~！！！！')
			}else {
				if ($("#cookie").is(':checked')) {
					cookie = 1};  //判断【记住密码】是否被选择~！
				var path = "../login/loginsql.php?" + 'phone='+ user + "&&" + 'PWD='+PWD + '&&' + 'cookie='+cookie;
			window.location.href=path;
			}

		} );
		$('#reginster').on('click',function(){
			window.location.href="../register/register.php";
		})
	</script>