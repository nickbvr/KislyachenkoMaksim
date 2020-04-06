<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../bd.php");
$array = array();
$array = $_POST['array'];
$array = explode("&&",$array);
$count = count($array);

if($count == 1){
	echo '<div class="jumbotron" style="padding:0px;width:100%;text-align:centr">
	  <h1 class="display-4" style="text-align:centr;font-size: 20px;margin-top:2%;padding-top:1%"><b style="margin-left:2%">На этом все</b></h1>
	  <br>
	  <p class="lead" style="font-size:18px;text-align:centr;margin-top:2%;margin-left:1%">Извините ничего не найдено :(</p>
	  <hr class="my-4">
	  

	</div>';
	exit();
}
$last = $_POST['last'];
if(empty($last)){
$i = 0;
$content = "";
$kolv = $_POST['wid'];
$id = $_COOKIE['id'];
$helpkolv = $kolv;
$kolv = $kolv/260;
$kolv = (int)$kolv;
$helpkolv = ($helpkolv - $kolv*260)/2;

$arrayxy = array();
while($i<$kolv){
	$arrayxy[$i] = 1;
	$i++;
}
$i=0;
$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
while ($i<$count ){
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if($row['pic_id']!=NULL){
		$trans_y = min($arrayxy);
		$key = array_search($trans_y, $arrayxy);
		$arrayxy[$key] += intval($row['height_b'])+20;
		$trans_x = $key*260+$helpkolv;
		$queryit = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$row['pic_id']."' ");
		$rowit = mysqli_fetch_array($queryit, MYSQLI_ASSOC);
		$picid = explode("@",$rowit['wholike']);
		if(in_array($id,$picid)){
			$content .='
			<div id="'.$row['pic_id'].'" class="item grid" style="padding:0px;transform:translateX('.$trans_x.'px) translateY('.$trans_y.'px);margin:auto" >
				<a href="item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0">
					<img width="240px" src="img/'.$row['pic_id'].'"/>
					<figcaption>'.$row['author_login'].'
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>';
		}else{
			$content .='
			<div id="'.$row['pic_id'].'" class="item grid" style="padding:0px;transform:translateX('.$trans_x.'px) translateY('.$trans_y.'px);margin:auto" >
				<figure class="effect-zoe content" style="margin:0">
					<img  onclick="return location.href='."'".'item/item.php?item='.$row['pic_id']."'".'" width="240px" src="img/'.$row['pic_id'].'"/>
					<figcaption>'.$row['author_login'].'
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')" style="cursor:default"><img style="float:left;margin-right:10px" width="20px" src="favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>';
		}
		$last = $row['pic_id'];
		
	}
	$i++;
}
if($i<51){$last = "yakor";}
$i=1;
$arrayres = $arrayxy[0];

while($i<$kolv){
	$arrayres .= "&&".$arrayxy[$i];
	$i++;
}

echo $content."&&&&".$last."&&&&".$arrayres;

}else{

$i = 0;
$content = "";
$kolv = $_POST['wid'];
$id = $_COOKIE['id'];
$helpkolv = $kolv;
$kolv = $kolv/260;
$kolv = (int)$kolv;
$helpkolv = ($helpkolv - $kolv*260)/2;

$arrayxy =  explode("&&",$last);
$i=1;
$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);




















while ($row['pic_id']!=NULL ){
	$query = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id='".$array[$i]."'");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if($row['pic_id']!=NULL){
		$trans_y = intval(min($arrayxy));
		$key = array_search($trans_y, $arrayxy);
		$arrayxy[$key] += intval($row['height_b'])+20;
		$trans_x = $key*260+$helpkolv;
		$queryit = mysqli_query($db,"SELECT * FROM `items` WHERE pic_id = '".$row['pic_id']."' ");
		$rowit = mysqli_fetch_array($queryit, MYSQLI_ASSOC);
		$picid = explode("@",$rowit['wholike']);
		if(in_array($id,$picid)){
			$content .='
			<div id="'.$row['pic_id'].'" class="item grid" style="padding:0px;transform:translateX('.$trans_x.'px) translateY('.$trans_y.'px);margin:auto" >
				<a href="item/item.php?item='.$row['pic_id'].'"><figure class="effect-zoe content" style="margin:0">
					<img width="240px" src="img/'.$row['pic_id'].'"/>
					<figcaption>'.$row['author_login'].'
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure></a>
			</div>';
		}else{
			$content .='
			<div id="'.$row['pic_id'].'" class="item grid" style="padding:0px;transform:translateX('.$trans_x.'px) translateY('.$trans_y.'px);margin:auto" >
				<figure class="effect-zoe content" style="margin:0">
					<img  onclick="return location.href='."'".'item/item.php?item='.$row['pic_id']."'".'" width="240px" src="img/'.$row['pic_id'].'"/>
					<figcaption>'.$row['author_login'].'
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')" style="cursor:default"><img style="float:left;margin-right:10px" width="20px" src="favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>';
		}
		$last = $row['pic_id'];
		
	}
	$i++;
}

if($i<49){$last = "yakor";}
$i=1;
$arrayres = $arrayxy[0];

while($i<$kolv){
	$arrayres .= "&&".$arrayxy[$i];
	$i++;
}
echo $content."&&&&".$last."&&&&".$arrayres;




















}





?>


