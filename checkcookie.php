<?php
session_start();
echo $_COOKIE['prv'];
if(!isset($_COOKIE['prv'])){
	header("Location: nocookie.php");
	exit;
} else {
	
$path = $_GET['back'];
//echo $_SERVER['HTTP_HOST'] ;
echo $path;
	header("Location: " .$path);
	exit;
}
?>	