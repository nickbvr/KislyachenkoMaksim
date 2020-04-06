<?php
include ("../../bd.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$id = $_POST['id'];
$item = $_POST['item'];
$body = $_POST['body'];
$picid = $item;
$queryu = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$rowu = mysqli_fetch_array($queryu, MYSQLI_ASSOC);
$login = $rowu['author_login'];
$time = time();
$result = mysqli_query($db,"INSERT INTO comments (name,item_id,body,time) VALUES('".$id."','".$item."','".$body."','".$time."') ");

	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$login = $row['user_login'];
	$popularq = intval($row['popularq'])+1;
	$query2 = mysqli_query($db,"UPDATE `users` SET popularq='".$popularq."' WHERE user_id='".$id."'");

	$query = mysqli_query($db,"SELECT * FROM `popular` WHERE item_id = '".$picid."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$popular = intval($row['popular'])+1;
	$query2 = mysqli_query($db,"UPDATE `popular` SET popular='".$popular."' WHERE item_id='".$picid."'");
	
	
	
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$picid."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$comk = intval($row['comments_kolv'])+1;
	$query2 = mysqli_query($db,"UPDATE `items` SET comments_kolv='".$comk."',popular='".$popular."' WHERE pic_id='".$picid."'");
	$hashtag = $row['hashtags'];
	$firm = $row['firm'];
	
	$queryh = mysqli_query($db,"SELECT * FROM `hashtags` WHERE hashtag = '".$hashtag."' ");
	$rowh = mysqli_fetch_array($queryh, MYSQLI_ASSOC);
	$popularh = intval($rowh[$login])+1;
	$query2 = mysqli_query($db,"UPDATE `hashtags` SET ".$login."='".$popularh."' WHERE hashtag='".$hashtag."'");
	
	$queryhf = mysqli_query($db,"SELECT * FROM `firm` WHERE firm = '".$firm."' ");
	$rowhf = mysqli_fetch_array($queryhf, MYSQLI_ASSOC);
	$popularhf = intval($rowhf[$login])+1;
	$query2f = mysqli_query($db,"UPDATE `firm` SET ".$login."='".$popularhf."' WHERE firm='".$firm."'");


?>