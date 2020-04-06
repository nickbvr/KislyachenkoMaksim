<?php
include ("../../bd.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$uploaddir = '../img/';
$avatar = explode('.',basename($_FILES['file-demo']['name']));

$id = $_COOKIE['id'];
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$login = $row['user_login'];
$kolv = count($avatar)-1;
$avatar = $avatar[$kolv];
$query = mysqli_query($db," SELECT * FROM `items` ORDER BY id DESC ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$avatar = $row['id'].".".$avatar;
$uploadfile = $uploaddir . $avatar;

if(move_uploaded_file($_FILES['file-demo']['tmp_name'], $uploadfile)){
$size = getimagesize($uploadfile);
$height = $size[1];
$width = $size[0];
$w = 240/$width;
$h = $w*$height;
$name = $_POST['name'];
$discription = $_POST['discription'];
$hashtag = $_POST['referal'];
$firm = $_POST['referal2'];


$queryfirm = mysqli_query($db," SELECT * FROM `firm` WHERE firm='".$firm."' ");
$rowfirm = mysqli_fetch_array($queryfirm, MYSQLI_ASSOC);
if($rowfirm['count']!=NULL){
	$help=intval($rowfirm['count'])+1;
	$query2 = mysqli_query($db,"UPDATE `firm` SET count='".$help."' WHERE firm='".$firm."'");
}else{
	
	
	
	
	
	
	
	$result = mysqli_query($db,"INSERT INTO firm (firm) VALUES('".$firm."') ");
}
$queryhashtag = mysqli_query($db," SELECT * FROM `hashtags` WHERE hashtag='".$hashtag."' ");
$rowhashtag = mysqli_fetch_array($queryhashtag, MYSQLI_ASSOC);
if($rowhashtag['count']!=NULL){
	$help=intval($rowhashtag['count'])+1;
	$query2 = mysqli_query($db,"UPDATE `hashtags` SET count='".$help."' WHERE hashtag='".$hashtag."'");
}else{
	$result = mysqli_query($db,"INSERT INTO hashtags (hashtag) VALUES('".$hashtag."') ");
}
$time=time();
$result = mysqli_query($db,"INSERT INTO items (pic_id,author_login,hashtags,time,discription,height_b,name,firm) VALUES('".$avatar."','".$login."','".$hashtag."','".$time."','".$discription."','".$h."','".$name."','".$firm."') ");
$result = mysqli_query($db,"INSERT INTO popular (item_id) VALUES('".$avatar."') ");
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$publ = intval($row['publnumb'])+1;
$query2 = mysqli_query($db,"UPDATE `users` SET publnumb='".$publ."' WHERE user_id='".$id."'");

header('Location:add_item.php');
























exit();
}

?>