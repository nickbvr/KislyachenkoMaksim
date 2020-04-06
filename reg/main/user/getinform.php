<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");
$id1 = $_POST['id'];
$id = $_COOKIE['id'];
if($id == $id1){
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$followers = $row['followers'];
$following = $row['following'];
$publnumb = $row['publnumb'];
$nickname = $row['nickname'];
$avatar = "../imgus/".$row['avatar'];
$followersbody = $row['followerscount'];
$followingbody = $row['followingcount'];
$followingbody = explode('@',$followingbody);
$fng = count($followingbody);
$i=1;
while($i<$fng){
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$followingbody[$i]."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$contentfng = $contentfng.'
	<div class="row" style="height:50px;font-size:18px;">
		<div class="col-2" style="display:flex;">
			<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
		</div>
		<div class="col-6" style="display:flex;">
			<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><div style="margin:auto 0">
				<b>'.$row['nickname'].'</b>
			</div></a>
		</div>
		<div class="col-4" style="display:flex;">
			<button type="button" onclick="follow(0,'.$id.','.$row['user_id'].')" class="btn btn-primary" style="margin:auto;width:100%;font-size:14px;padding:2%">Отписаться</button>
		</div>
	</div>
	';
	$i++;
}
$followersbody = explode('@',$followersbody);
$frs = count($followersbody);
$i=1;
while($i<$frs){
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$followersbody[$i]."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if(in_array($followersbody[$i],$followingbody)){
		$contentfrs = $contentfrs.'
		<div class="row" style="height:50px;font-size:18px;">
			<div class="col-2" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
			</div>
			<div class="col-6" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><div style="margin:auto 0">
					<b>'.$row['nickname'].'</b>
				</div></a>
			</div>
			<div class="col-4" style="display:flex;">
				<button onclick="follow(0,'.$id.','.$row['user_id'].')" type="button" class="btn btn-light" style="margin:auto;width:100%;font-size:14px;padding:2%">Подписан</button>
			</div>
		</div>
	';
	}else{
		$contentfrs = $contentfrs.'
		<div class="row" style="height:50px;font-size:18px;">
			<div class="col-2" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
			</div>
			<div class="col-6" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="display:flex;margin:auto"><div style="margin:auto 0">
					<b>'.$row['nickname'].'</b>
				</div></a>
			</div>
			<div class="col-4" style="display:flex;">
				<button onclick="follow(1,'.$id.','.$row['user_id'].')" type="button" class="btn btn-primary" style="margin:auto;width:100%;font-size:14px;padding:2%">Подписаться</button>
			</div>
		</div>
		';
	}
	
	$i++;
}



//WHERE author_login=".$row['user_login']."

$i = 0;
$arrayxy = array();
while($i<3){
	$arrayxy[$i] = 1;
	$i++;
}
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$query = mysqli_query($db," SELECT * FROM `items`  WHERE author_login='".$row['user_login']."' ORDER BY time ASC");
$i=0;
$array = array();
while($row = mysqli_fetch_array($query) ){
	$array[$i] = $row['pic_id'];
	$i++;
}
$i=0;
$counter = 1;
while ( $i<$publnumb){
	
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
	
	$trans_y = min($arrayxy);
	$key = array_search($trans_y, $arrayxy);
	$arrayxy[$key] += $row['height_b']+20;
	$counter = $key+1;
	
	
	
	
	
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	$queryit = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$row['pic_id']."' ");
	$rowit = mysqli_fetch_array($queryit, MYSQLI_ASSOC);
	$picid = explode("@",$rowit['wholike']);
	if(in_array($id,$picid)){
		if($counter == 1){
			$content1 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}else{
			if($counter == 2){
			
			$content2 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}else{
			if($counter == 3){
			$content3 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}
		}
		}
	}else{
		if($counter == 1){
			$content1 .='
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')" ><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';
		}else{
			if($counter == 2){
			
			$content2 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')"><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						 <span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';
		}else{
			if($counter == 3){
			$content3 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%"  onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')"><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';

		}
		}
		}
	}

	
	$i++;
}


echo $followers."&&&&".$following."&&&&".$publnumb."&&&&".$nickname."&&&&".$avatar."&&&&".$content1."&&&&".$content2."&&&&".$content3."&&&&".$contentfng."&&&&".$contentfrs;
}else{
	
$id = $id1;
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$followers = $row['followers'];
$following = $row['following'];
$publnumb = $row['publnumb'];
$nickname = $row['nickname'];
$avatar = "../imgus/".$row['avatar'];
$followersbody = $row['followerscount'];
$followingbody = $row['followingcount'];
$followingbody = explode('@',$followingbody);
$fng = count($followingbody);
$i=1;
while($i<$fng){
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$followingbody[$i]."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$contentfng = $contentfng.'
	<div class="row" style="height:50px;font-size:18px;">
		<div class="col-2" style="display:flex;">
			<a href="../user/user.php?user='.$row['user_id'].'"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
		</div>
		<div class="col-6" style="display:flex;">
			<a href="../user/user.php?user='.$row['user_id'].'" style="margin:auto;display:flex"><div style="margin:auto 0">
				<b>'.$row['nickname'].'</b>
			</div></a>
		</div>
		<div class="col-4" style="display:flex;height:50px">
			
		</div>
	</div>
	';
	$i++;
}
$followersbody = explode('@',$followersbody);
$frs = count($followersbody);
$i=1;
if(in_array($_COOKIE['id'],$followersbody)){
	$podpiska = 1;
}else{
	$podpiska = 0;
}
while($i<$frs){
	$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$followersbody[$i]."' ");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if(in_array($followersbody[$i],$followingbody)){
		$contentfrs = $contentfrs.'
		<div class="row" style="height:50px;font-size:18px;">
			<div class="col-2" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
			</div>
			<div class="col-6" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="margin:auto;display:flex"><div style="margin:auto 0">
					<b>'.$row['nickname'].'</b>
				</div></a>
			</div>
			<div class="col-4" style="display:flex;height:50px">
			
		</div>
		</div>
	';
	}else{
		$contentfrs = $contentfrs.'
		<div class="row" style="height:50px;font-size:18px;">
			<div class="col-2" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" ><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$row['avatar'].'"></a>
			</div>
			<div class="col-6" style="display:flex;">
				<a href="../user/user.php?user='.$row['user_id'].'" style="margin:auto;display:flex"><div style="margin:auto 0">
					<b>'.$row['nickname'].'</b>
				</div></a>
			</div>
			<div class="col-4" style="display:flex;height:50px">
			
		</div>
		</div>
		';
	}
	
	$i++;
}



//WHERE author_login=".$row['user_login']."

$i = 0;
$arrayxy = array();
while($i<3){
	$arrayxy[$i] = 1;
	$i++;
}
$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$query = mysqli_query($db," SELECT * FROM `items`  WHERE author_login='".$row['user_login']."' ORDER BY time ASC");
$i=0;
$array = array();
while($row = mysqli_fetch_array($query) ){
	$array[$i] = $row['pic_id'];
	$i++;
}
$i=0;
$counter = 1;
while ( $i<$publnumb){
	
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
	
	$trans_y = min($arrayxy);
	$key = array_search($trans_y, $arrayxy);
	$arrayxy[$key] += $row['height_b']+20;
	$counter = $key+1;
	
	
	
	
	
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	$queryit = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$row['pic_id']."' ");
	$rowit = mysqli_fetch_array($queryit, MYSQLI_ASSOC);
	$picid = explode("@",$rowit['wholike']);
	if(in_array($id,$picid)){
		if($counter == 1){
			$content1 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}else{
			if($counter == 2){
			
			$content2 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}else{
			if($counter == 3){
			$content3 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<a href="../item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>
			';
		}
		}
		}
	}else{
		if($counter == 1){
			$content1 .='
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')" ><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';
		}else{
			if($counter == 2){
			
			$content2 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%" onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'"  src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')"><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						 <span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';
		}else{
			if($counter == 3){
			$content3 .='
			
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:100%">
					<img width="100%"  onclick="return location.href='."'".'../item/item.php?item='.$row['pic_id']."'".'" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')"><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			';

		}
		}
		}
	}

	
	$i++;
}


echo $followers."&&&&".$following."&&&&".$publnumb."&&&&".$nickname."&&&&".$avatar."&&&&".$content1."&&&&".$content2."&&&&".$content3."&&&&".$contentfng."&&&&".$contentfrs."&&&&".$podpiska;
}
















?>