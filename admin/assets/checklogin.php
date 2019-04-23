
<?php
/**
 * Created by PhpStorm.
 * User: luejianhan
 * Date: 2018/5/4
 * Time: 13:59
 */

include_once '../sql/package.php';
header("Content-type: text/html; charset=utf-8");

if(isset($_COOKIE['admin']))
{
}else{
    echo "<script>

    alert('你无权访问');
    window.location.href='../index.php';
    </script>

    ";
};
?>
<script>
    //  document.getElementById('d2').src="index.php";
</script>
