<?php   
session_start(); //đảm bảo đã sử dụng cùng một session
session_destroy(); //destroy the session
header("location:index.php"); //dẫn đến trang index sau khi log out
//exit();
?> 