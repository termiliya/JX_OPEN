<?php
setcookie("user");
session_unset();
 //session_destroy();

//echo "成功退出登录<p>";
//echo "单击<a href='index.php'>这里</a>返回主界面";
header("refresh:0;url=login.php");

?>