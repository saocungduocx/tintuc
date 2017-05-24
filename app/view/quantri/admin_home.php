<?php session_start();
echo "<h1>Xin chao: ".$_SESSION['login_user']."da vao trang admin</h1>";

?>
<a href="<?=BASE_URL?>vi/quantri/thoat">Now click here to logout</a>