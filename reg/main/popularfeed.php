<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$id = $_POST['id'];
$kolvq = $_POST['kolvq'];
if($kolvq==0){
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$query = mysqli_query($db," SELECT * FROM `popular` ORDER BY ".$id." DESC ,popular  DESC ");
$i=0;
$help = 0;
$array = "";
$true = true;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	if($true){
	$array .= $row['item_id'];
	$true = false;
	}else{
		$array .= "&&".$row['item_id'];
	}
	$i++;
	if($i>50){break;}

}
echo $array;



}else{
	
	
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$id = $row['user_login'];
$query = mysqli_query($db," SELECT * FROM `popular` ORDER BY ".$id." DESC ,popular  DESC ");
$i=0;
$help = 0;
$array = array();
$true = false;
$true1 = true;
while($row = mysqli_fetch_array($query)){
	$query2 = mysqli_query($db,"UPDATE `popular` SET ".$id."=0 WHERE item_id='".$row['item_id']."'");
	if($true){
		if($true1){
		$array .= $row['item_id'];
		$true1 = false;
		}else{
			$array .= "&&".$row['item_id'];
		}
	}
	if($i>50*$kolvq){
		$true = true;
	}
	$i++;
	$help=$kolvq+1;
	if($i>50*$help){break;}

}

echo $array;


}



	
	
	
	
	
	


?>








