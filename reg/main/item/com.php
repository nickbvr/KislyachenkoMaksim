<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include("../../bd.php");
$id = $_POST['id'];
$item = $_POST['item'];
$query = mysqli_query($db," SELECT * FROM `comments` WHERE item_id='".$item."' ORDER BY time ASC ");
while($row = mysqli_fetch_array($query) ){
	
	$date = date_create();
	date_timestamp_set($date, $row['time']);
	date_format($date, 'Y-m-d H:i:s');
	$queryu = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '".$row['name']."' ");
	$rowu = mysqli_fetch_array($queryu, MYSQLI_ASSOC);
	echo '
	<div class="jumbotron" style="padding:0px">
	  <h1 class="display-4" style="text-align:left;font-size: 20px;margin-top:2%;padding-top:1%"><b style="margin-left:2%">'.$rowu['nickname'].'</b><span style="font-size: 14px;font-weight: 300;float:right;margin-top:1%;margin-right:1%">'.date_format($date, 'Y-m-d H:i:s').'</span></h1>
	  <br>
	  <p class="lead" style="font-size:18px;text-align:left;margin-top:2%;margin-left:1%">'.$row['body'].'</p>
	  <hr class="my-4">
	  

	</div>
	';
}
echo '
		  
		  <div class="form-group">
			<label>Добавьте свой коментарий</label>
			<textarea class="form-control" style="resize: none;height:100px" name="body" id="body" placeholder="" required=""></textarea>
		  </div>
		  <button onclick="addcom()" type="submit" class="btn btn-primary" style="float:left">Коментировать</button>


';





	




















?>