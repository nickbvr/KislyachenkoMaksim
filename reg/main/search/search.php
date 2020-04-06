<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");
$id = $_COOKIE['id'];
$search = $_POST['search'];
$search = htmlspecialchars_decode($search);











$kolvq = $_POST['kolvq'];
if($kolvq==0){




if($search!=NULL){


$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$query = mysqli_query($db,"SELECT * from `items` WHERE (hashtags COLLATE UTF8_GENERAL_CI LIKE '%$search%') OR (firm COLLATE UTF8_GENERAL_CI LIKE '%$search%') OR (name COLLATE UTF8_GENERAL_CI LIKE '%$search%') ORDER BY like_k  DESC ");
$i=0;
$help = 0;
$true = true;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	if($true){
	$array .= $row['pic_id'];
	$true = false;
	}else{
		$array .= "&&".$row['pic_id'];
	}
	$i++;
	if($i>50){break;}
}

echo $array;
}else{
	
$hash = $_POST['hash'];
$firm = $_POST['firm'];
$radio = $_POST['radiores'];
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$res="";
if($hash == "Хэштег"){
	$hashr == "";
}else{
	$hashr = "hashtags COLLATE UTF8_GENERAL_CI LIKE '%$hash%'";
}
if($firm == "Фирма"){
	$firmr == "";
}else{
	$firmr = "firm COLLATE UTF8_GENERAL_CI LIKE '%$firm%'";
}
if($firmr!="" && $hashr!=""){
	$res = " WHERE (".$hashr.") AND (".$firmr.") ";
}else{
	if($firmr!=""){
		$res = " WHERE ".$firmr;
	}else{
		$res = " WHERE ".$hashr;
	}
	if($firmr=="" && $hashr==""){
		$res="";
	}
	
}

$query = mysqli_query($db,"SELECT * from `items` ".$res." ORDER BY ".$radio."  DESC ");
$i=0;
$help = 0;
$true = true;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	
	if($true){
	$array .= $row['pic_id'];
	$true = false;
	}else{
		$array .= "&&".$row['pic_id'];
	}
	$i++;
	if($i>50){break;}
}
	
	
	
	
echo $array;	
	
	
	
}
}else{
















if($search!=NULL){


$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$query = mysqli_query($db,"SELECT * from `items` WHERE (hashtags COLLATE UTF8_GENERAL_CI LIKE '%$search%') OR (firm COLLATE UTF8_GENERAL_CI LIKE '%$search%') OR (name COLLATE UTF8_GENERAL_CI LIKE '%$search%') ORDER BY like_k  DESC ");
$i=0;
$help = 0;
$true = true;
$true1 = false;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	if($true1){
	if($true){
	$array .= $row['pic_id'];
	$true = false;
	}else{
		$array .= "&&".$row['pic_id'];
	}
	}
	if($i>50*$kolvq){
		$true1 = true;
	}
	$i++;
	$help=$kolvq+1;
	if($i>50*$help){break;}
}

echo $array;
}else{
$true1 = false;
$hash = $_POST['hash'];
$firm = $_POST['firm'];
$radio = $_POST['radiores'];
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$res="";
if($hash == "Хэштег"){
	$hashr == "";
}else{
	$hashr = "hashtags COLLATE UTF8_GENERAL_CI LIKE '%$hash%'";
}
if($firm == "Фирма"){
	$firmr == "";
}else{
	$firmr = "firm COLLATE UTF8_GENERAL_CI LIKE '%$firm%'";
}
if($firmr!="" && $hashr!=""){
	$res = " WHERE (".$hashr.") AND (".$firmr.") ";
}else{
	if($firmr!=""){
		$res = " WHERE ".$firmr;
	}else{
		$res = " WHERE ".$hashr;
	}
	if($firmr=="" && $hashr==""){
		$res="";
	}
	
}

$query = mysqli_query($db,"SELECT * from `items` ".$res." ORDER BY ".$radio."  DESC ");
$i=0;
$help = 0;
$true = true;
$true1 = false;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	if($true1){
	if($true){
	$array .= $row['pic_id'];
	$true = false;
	}else{
		$array .= "&&".$row['pic_id'];
	}
	}
	if($i>50*$kolvq){
		$true1 = true;
	}
	$i++;
	$help=$kolvq+1;
	if($i>50*$help){break;}
}
	
	
	
	
echo $array.$firmr;	
	
	
	
}

































}
?>








