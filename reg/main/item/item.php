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
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<style>
		
        
		
    </style>
</head>
<body style='text-align: center;overflow-x:hidden;'>
<div class="row" style="max-width:1000px; margin:auto">
    <div class="col-4" style="display:flex;height:15vw;max-height:90px;">
        <form action="../" class="search" style="margin:auto">
			<input type="search" name="search" placeholder="поиск" class="input" />
			<input type="submit" name="" value="" class="submit" />
		</form>
    </div>
	<div class="col-2" style="height:15vw;max-height:90px;">
        
    </div>
	<div class="col-6" style="display:flex;height:15vw;max-height:90px;">
        <a href="../" style="margin:auto;"><img  class="swing" src='../favicon/home.png' style="margin:auto;height:5vw;max-height:40px;"></a>
		<a href="../follow/follow.php" style="margin:auto;"><img  class="swing" src='../favicon/followers.png' style="margin:auto;height:5vw;max-height:40px;"></a>
		<a href="../user/user.php" style="margin:auto;"><img  class="swing" src='../favicon/user.png' style="margin:auto;height:5vw;max-height:40px;"></a>
		<a href="../uploads/add_item.php" style="margin:auto;"><img  class="swing" src='../favicon/add.png' style="height:5vw;max-height:40px;"></a>
    </div>
	
	
	
	
	
	
	
	
	<div class="col-12" style="height:auto">
        <div class="row">
			<div class="col-6" id="post" style="height:auto;padding:0 2% 2% 2%">
				
			</div>
			<div class="col-6" id="discrip" style="height:auto;padding:0px">
				
			</div>
			<div class="col-12" id="com" style="height:auto">
				
			</div>
		</div>
    </div>
	
	
	
</div>













<script type="text/javascript" >
function search(){
	var search = document.getElementById("search").value;
	location.href = "../index.php?item="+search;
}

function like(picid,id){
	$.post("../like.php", { id: id, picid:picid }  ).done(function(data) {
		document.getElementById(picid).innerHTML=data;
		
	});
}

function follow(type,id,target){
	$.post("../following.php", { type:type,id:id,target:target }  ).done(function(data) {
		$.post("getinform.php", { id: id }  ).done(function(data) {
			data = data.split("&&&&");
			document.getElementById("followingbody").innerHTML=data[8];
		});
		
	});
}




	function readCookie(name) {
		var name_cook = name+"=";
		var spl = document.cookie.split(";");
		for(var i=0; i<spl.length; i++) {
			var c = spl[i];
			while(c.charAt(0) == " ") {
				c = c.substring(1, c.length);
			}
			if(c.indexOf(name_cook) == 0) {
				return c.substring(name_cook.length, c.length);
			}
		}
		return null;
	};
	var item = window.location.search.replace( '?', ''); 
	var item = item.split("=");
	var item = item[1];
	var id = readCookie('id');
	$.post("iteminfo.php", { id: id,item:item }  ).done(function(data) {
		data = data.split("&&&&");
		document.getElementById("post").innerHTML=data[0];
		document.getElementById("discrip").innerHTML=data[1];
		
	});
	$.post("com.php", { id: id,item:item }  ).done(function(data) {
		document.getElementById("com").innerHTML=data;
		
	});
	


function addcom(){
		var body = document.getElementById("body").value;

		$.post("addcom.php", { id: id,item:item ,body:body}  ).done(function(data) {
			$.post("iteminfo.php", { id: id,item:item }  ).done(function(data) {
				data = data.split("&&&&");
				document.getElementById("post").innerHTML=data[0];
				document.getElementById("discrip").innerHTML=data[1];
				
			});
			$.post("com.php", { id: id,item:item }  ).done(function(data) {
				document.getElementById("com").innerHTML=data;
			});
		});
	}

</script>
</body>
</html>