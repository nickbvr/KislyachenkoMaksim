<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$id = $_POST['id'];
$target = $_POST['target'];
$type = $_POST['type'];
if($type==1){
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$following = intval($row['following'])+1;
	$followingcount = $row['followingcount']."@".$target;
	$query2 = mysqli_query($db,"UPDATE `users` SET following='".$following."',followingcount='".$followingcount."' WHERE user_id='".$id."'");
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$target."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$followers = intval($row['followers'])+1;
	$followerscount = $row['followerscount']."@".$id;
	$query2 = mysqli_query($db,"UPDATE `users` SET followers='".$followers."',followerscount='".$followerscount."' WHERE user_id='".$target."'");
}else{
	if($type==0){
		$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$following = intval($row['following'])-1;
		$followingcount = str_replace("@".$target, "", $row['followingcount']);
		$query2 = mysqli_query($db,"UPDATE `users` SET following='".$following."',followingcount='".$followingcount."' WHERE user_id='".$id."'");
		$query1 = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$target."' ");
		$row1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);
		$followers = intval($row1['followers'])-1;
		$followerscount = str_replace("@".$id, "", $row['followerscount']);
		$query2 = mysqli_query($db,"UPDATE `users` SET followers='".$followers."',followerscount='".$followerscount."' WHERE user_id='".$target."'");
	}
}















?>

