<?php
unset($_COOKIE['Failed']);
setcookie("Failed",'',-1);
unset($_COOKIE['Success']);
setcookie("Success",'',-1);
unset($_COOKIE['UserName']);
setcookie("UserName",'',-1);
unset($_COOKIE['UserID']);
setcookie("UserID",'',-1);
$_SESSION = array();
header("location: login.php");
?>