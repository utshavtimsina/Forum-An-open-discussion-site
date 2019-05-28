<?php  
session_start();
session_destroy();
setcookie('remember', '', time() + (86400 * 30), "/");
setcookie('uid', '', time() + (86400 * 30), "/");
setcookie('username', '', time() + (86400 * 30), "/");
setcookie('profile_pic', '', time() + (86400 * 30), "/");
header('location:index.php');
?>