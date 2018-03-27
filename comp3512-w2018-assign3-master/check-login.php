<?php
$usr = $_POST['email'];
$pwd = $_POST['pass'];
setcookie("UserName",$usr,0);
include 'includes/config.inc.php';
$logindb = new LoginGateway($connection);
$row = $logindb->findById($usr);
if(isset($row['Salt'])) {
    $pwd .= $row['Salt'];
    $pwd = md5($pwd);
    checkPassword($pwd,$logindb);
    
}else {
    $fail = true;
    setcookie("Failed",$fail,0);
    $logindb->closeDB();
    header("location: login.php");
}

function checkPassword($pass,$logindb) {
    $loginSuccess = $logindb->passCheck($pass);
    $logindb->closeDB();
    if($loginSuccess[0]) {
        unset($_COOKIE['Failed']);
        setcookie("Failed",'',-1);
        setcookie("Success",true,0);
        setcookie("UserID",$loginSuccess[1],0);
        session_start();
        $_SESSION["imgFavs"] = array();
        $_SESSION["postFavs"] = array();
        header("location: index.php");
    }else {
        $fail = true;
        setcookie("Failed",$fail,0);
        header("location: login.php");
    }
}

    
    
?>