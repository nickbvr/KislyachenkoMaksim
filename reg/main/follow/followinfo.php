<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");
$id = $_POST['id'];

$query = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$id."' ");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

$picid = explode("@",$row['followingcount']);

if(count($picid)!=1){
$i=1;
$vals="";
while($i<count($picid)){
	$queryh = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$picid[$i]."' ");
	$rowh = mysqli_fetch_array($queryh, MYSQLI_ASSOC);
	if($vals==""){
		$vals .= "'".$rowh['user_login']."'";
	}else{
		$vals .= ", '".$rowh['user_login']."'";
	}
	$i++;
}


$query = mysqli_query($db," SELECT * FROM `items` WHERE author_login IN (".$vals.") ORDER BY time DESC  ");
$i=0;
$help = 0;
$array = array();
while($row = mysqli_fetch_array($query)){





$queryu = mysqli_query($db,"SELECT * FROM `users` WHERE user_login = '".$row['author_login']."' ");
$rowu = mysqli_fetch_array($queryu, MYSQLI_ASSOC);




	
	$picid = explode("@",$row['wholike']);
	if(in_array($id,$picid)){
		
			$content1 .='
			<div class="col-6" style="height:auto;padding:0 2% 2% 2%">
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:inherit">
					<img width="100%" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/hearton.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			</div>
			';
		
	}else{
		
			$content1 .='
			<div class="col-6" style="height:auto;padding:0 2% 2% 2%">
			<div id="'.$row['pic_id'].'" class="item grid" style="width:inherit;position:relative" >
				<figure class="effect-zoe content" style="margin:0;width:inherit">
					<img width="100%" src="../img/'.$row['pic_id'].'"/>
					<figcaption>
						<span onclick="like('."'".$row['pic_id']."'".','.$id.')" ><img style="float:left;margin-right:10px" width="20px" src="../favicon/like.png"/> '.$row['like_k'].'</span>
						<span><img style="float:left;margin-right:10px" width="20px" src="../favicon/comment.png"/> '.$row['comments_kolv'].'</span>
					</figcaption>
				</figure>
			</div>
			</div>
			';
		}
		$content1.='
	<div class="col-6" style="height:auto;padding:0 2% 2% 2%">
	<div class="row" style="display:flex;padding:2%">
	<div class="col-3" style="display:flex;min-height:80px;padding:0px">
	  <a href="../user/user.php?user='.$rowu['user_id'].'" style="margin:auto;display:flex"><img width="90%" style="border-radius:5em;margin:auto" src="../imgus/'.$rowu['avatar'].'"></a>
	</div>
	<div class="col-9" style="display:flex;min-height:80px">
	  <h1 class="display-4" style="text-align:left;font-size:18px;margin:auto 0px"><b style="margin-top:2%;margin-left:1%">'.$rowu['nickname'].'</b></h1>
	</div>
	<div class="col-12">
	  <p class="lead" style="font-size:14px;text-align:left;margin-top:2%;margin-left:3%;float:left">'.$row['discription'].'</p>
	 </div>
	 </div>
	 </div>

	
';
	$i++;
	
}

echo $content1;


}














?>