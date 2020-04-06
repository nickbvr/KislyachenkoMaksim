<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$id = $_POST['id'];
$picid = $_POST['picid'];
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$popularq = intval($row['popularq'])+1;
	
	
	$query2 = mysqli_query($db,"UPDATE `users` SET popularq='".$popularq."' WHERE user_id='".$id."'");
	$query = mysqli_query($db,"SELECT * FROM `popular` WHERE item_id = '".$picid."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$popular = intval($row['popular'])+1;
	
	
	
	
	$query2 = mysqli_query($db,"UPDATE `popular` SET popular='".$popular."' WHERE item_id='".$picid."'");
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$picid."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$like_k = intval($row['like_k'])+1;
	$wholike = $row['wholike']."@".$id;
	$query2 = mysqli_query($db,"UPDATE `items` SET like_k='".$like_k."',wholike='".$wholike."' WHERE pic_id='".$picid."'");
	echo '
	<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
			<figure class="effect-zoe content" style="margin:0;width:inherit">
				<img width="100%" src="../img/'.$row['pic_id'].'"/>
				<figcaption>
					<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$like_k.'</span>
					<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
				</figcaption>
			</figure>
		</div>
	';
	
	
	
	
?>