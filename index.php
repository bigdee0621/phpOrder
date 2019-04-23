<?php
/**";
 "* Created by PhpStorm.";
 "* User: luejianhan";
 "* Date: 2018/3/18";
 "* Time: 21:35";
 "*/
require_once './include.php';

connet();


if(setWeb(2)==1){ //网站是否开放
 echo "<script>";
 echo "window.location.href='close.html'; ";
 echo "</script>";
}

/*<script src="amazeui/js/jquery.min.js">
 $("#Buys").click(function(){

</script>*/
?>


