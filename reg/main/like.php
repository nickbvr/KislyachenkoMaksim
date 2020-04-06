<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$id = $_POST['id'];
$picid = $_POST['picid'];
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
	
	$like_k = intval($row['like_k'])+1;
	$wholike = $row['wholike']."@".$id;
	$query2 = mysqli_query($db,"UPDATE `items` SET like_k='".$like_k."',wholike='".$wholike."',popular='".$popular."' WHERE pic_id='".$picid."'");
	if($_POST['main']==1){
		
		echo '
			
				<a href="item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0">
					<img width="240px" src="img/'.$row['pic_id'].'"/>
					<figcaption>'.$row['author_login'].'
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/hearton.png"/> '.$like_k.'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			';
	}else{
	echo '
			<figure class="effect-zoe content" style="margin:0;width:inherit">
				<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'" src="../img/'.$row['pic_id'].'"/>
				<figcaption>
					<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$like_k.'</span>
					<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
				</figcaption>
			</figure>
		
	';
	}
















?>

