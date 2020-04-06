<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$query = mysqli_query($db," SELECT * FROM `hashtags` WHERE count > 2 ORDER BY count  DESC ");
$array = array();
$content = '<option onclick="feed()">Хэштег</option>';
while($row = mysqli_fetch_array($query)){
	
		$content .='
		<option onclick="feed()">'.$row['hashtag'].'</option>
		';
	

}
$content .= "&&&&<option onclick='feed()'>Фирма</option>";
$query = mysqli_query($db," SELECT * FROM `firm` WHERE count > 2 ORDER BY count  DESC ");
$array = array();
while($row = mysqli_fetch_array($query)){
	
		$content .='
		<option onclick="feed()">'.$row['firm'].'</option>
		';
	

}
echo $content;
?>
