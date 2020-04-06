<?php
// Скрипт проверки
#
include("bd.php");
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {


$idtest = $_COOKIE['id'];
$query = mysqli_query($db,"SELECT * FROM items WHERE id='".$idtest."'");
$userdata = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
echo $idtest;
	
	
if (($userdata['user_hash'] !== $_COOKIE['hash']) or($userdata['user_id'] !== $_COOKIE['id'])  ) {
setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");
print "Хм, что-то не получилось";
} else {
print "Привет, ".$userdata['user_login'].
". Всё работает!";
}
} else {
print "Включите куки";
}
?>