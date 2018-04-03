<?php
include 'classes/postFavorite.class.php';
session_start();
$arr = $_SESSION['postFavs'];
print_r($arr);

?>
