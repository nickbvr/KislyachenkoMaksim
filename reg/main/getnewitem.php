<?php 
include("../bd.php");
$title = $_POST['title'];
$discription = $_POST['discription'];
$respond1 = $_POST['respond'];
$respond = $respond1[0];
$hashtags = $_POST['hashtags'];
$id = $_POST['id'];
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$time = time();
$array = getimagesize("uploads/".$respond);
$width = $array[0];
$height = $array[1];
$help = 240/$width;
$height = $height*$help;
$height = round($height,2);
$result = mysqli_query($db,"INSERT INTO items (pic_id,author_login,hashtags,discription,time,height_b) VALUES('".$respond."','".$id."','".$hashtags."','".$discription."','".$time."','".$height."') ");
$result = mysqli_query($db,"INSERT INTO popular (item_id) VALUES('".$respond."') ");

var_dump($respond,$id,$hashtags,$discription,$time,$height);	














?>