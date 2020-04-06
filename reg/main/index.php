<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style>
		
        
		
    </style>
</head>
<body style='text-align: center;overflow-x:hidden;width:100%'>
<div class="row" style="width:auto;display:flex;margin:0px">

    <div class="col-4" style="height:15vw;max-height:90px;">
		<div style="width:100%;max-width:334px;margin:auto;display:flex;height:100%">
        <form  class="search" style="margin:auto">
			<input type="search" name="search" placeholder="поиск" class="input" />
			<input type="submit" name="" value="" class="submit" />
		</form>
		</div>
		
    </div>
	<div class="col-2" style="height:15vw;max-height:90px;">
        
    </div>
	<div class="col-6" style="display:flex;height:15vw;max-height:90px;">
        <a href="#" style="margin:auto;"><img  class="swing" src='favicon/home.png' style="margin:auto;height:5vw;max-height:40px;"></a>
		<a href="follow/follow.php" style="margin:auto;"><img  class="swing" src='favicon/followers.png' style="height:5vw;max-height:40px;margin:auto"></a>
		<a href="user/user.php" style="margin:auto;"><img  class="swing" src='favicon/user.png' style="margin:auto;height:5vw;max-height:40px;"></a>
		<a href="uploads/add_item.php" style="margin:auto;"><img  class="swing" src='favicon/add.png' style="height:5vw;max-height:40px;"></a>
    </div>
	<div class="col-12" id="filtr" style="height:auto;border:4px double black">
		<div class="row" >
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2"  style="display:flex;height:110px">
				<select class="form-control" id="hash" style="margin:auto" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
				  
				</select>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2"  style="display:flex;height:110px">
				<select class="form-control" id="firm" style="margin:auto" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
				  
				</select>
			</div>
			
			
			<div id="yakor" style="position:absolute;margin-top:9999px"></div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2" id="likekolv" style="display:flex;height:110px">
			<input onclick="feed()" type="radio" id="radio1" name="radios"  value="like_k" >
				<label  for="radio1">По лайкам</label>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2" id="popularkolv" style="display:flex;height:110px">
			<input onclick="feed()" type="radio" id="radio2" name="radios"  value="popular" checked>
				<label  for="radio2">Самые популярные</label>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2" id="comkolv" style="display:flex;height:110px">
			 <input onclick="feed()" type="radio" id="radio3" name="radios" value="comments_kolv">
				<label   for="radio3">Самые обсуждаемые</label>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2" id="mostnew" style="display:flex;height:110px">
			 <input onclick="feed()" type="radio" id="radio4" name="radios" value="time">
				<label  for="radio4">Самые новые</label> 
			</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
        </div>
    </div>

	<div id="feed" class="col-12" style="min-height:800px;height:auto;margin:auto;display:flex;padding:0px">
        
    </div>
	
</div>

<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" >


function like(picid,id){
	var main = 1;
	$.post("like.php", { id: id, picid:picid ,main:main}  ).done(function(data) {
		document.getElementById(picid).innerHTML=data;
	});
}


</script>
</body>
</html>