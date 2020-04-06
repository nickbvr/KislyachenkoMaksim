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
<body id="main" style='text-align: center;overflow-x:hidden;display:none'>
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
		<img onclick="re()" class="swing" src='../favicon/user.png' style="margin:auto;height:5vw;max-height:40px;">
		<a href="../uploads/add_item.php" style="margin:auto;"><img  class="swing" src='../favicon/add.png' style="height:5vw;max-height:40px;"></a>
    </div>
	<div class="col-3" id="avatar" style="height:23vw;max-height:210px;padding:2%">
        
    </div>
	<div class="col-9" id="nickname" style="display:flex;height:23vw;max-height:210px;font-size:28px;padding-top:">
        
    </div>
	<div class="col-4" id="publ" style="height:15vw;max-height:90px;font-size:14px">
        
    </div>
	<div class="col-4"  style="height:15vw;max-height:90px;font-size:14px">
        <a style="cursor:pointer;"  data-toggle="modal" data-target="#followersmodal">
			<div style="height:100%;width100%" id="followers">
			</div>
		</a>
    </div>
	<div class="col-4"  style="height:15vw;max-height:90px;font-size:14px">
        <a style="cursor:pointer;"  data-toggle="modal" data-target="#followingmodal">
			<div style="height:100%;width100%" id="following">
			</div>
		</a>
    </div>
	<div class="col-12" style="height:auto">
        <div class="row" id="post">
			<div class="col-4" id="post1" style="height:auto;padding:0 2% 2% 2%">
				
			</div>
			<div class="col-4" id="post2" style="height:auto">
				
			</div>
			<div class="col-4" id="post3" style="height:auto">
				
			</div>
		</div>
    </div>
	
	
	
</div>






<div class="modal fade" id="followersmodal" tabindex="-1" role="dialog" aria-labelledby="followersLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="followersLabel">Ваши подписчики</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="followersbody" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="followingmodal" tabindex="-1" role="dialog" aria-labelledby="followingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="followingLabel">Ваши подписки</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="followingbody" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>







<script type="text/javascript" >
function search(){
	var search = document.getElementById("search").value;
	location.href = "../index.php?item="+search;
}
var item = window.location.search.replace( '?', ''); 
var item = item.split("=");
var item = item[1];
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
	var id = readCookie('id');
function re(){
	var idchek = readCookie('id');
	if(item === undefined || item===idchek){
		
	}else{
		document.location.href = "../user/user.php" 
	}
}
if(item === undefined || item===id){
	document.getElementById('main').style.display = "block";
	
	$.post("getinform.php", { id: id }  ).done(function(data) {
		data = data.split("&&&&");
		document.getElementById("avatar").innerHTML="<img src='"+data[4]+"' width='80%' style='border-radius:5em;margin:auto'> ";
		document.getElementById("followers").innerHTML="Подписчиков<br> <b>"+data[0]+"</b>";
		document.getElementById("following").innerHTML="Подписок<br> <b>"+data[1]+"</b>";
		document.getElementById("publ").innerHTML="Публикаций<br> <b>"+data[2]+"</b>";
		document.getElementById("nickname").innerHTML="<div style='margin:auto 2vw'>"+data[3]+" <img class='swing' width='24px' src='../favicon/settings.png'></div>";
		document.getElementById("post1").innerHTML=data[5];
		document.getElementById("post2").innerHTML=data[6];
		document.getElementById("post3").innerHTML=data[7];
		document.getElementById("followingbody").innerHTML=data[8];
		document.getElementById("followersbody").innerHTML=data[9];
		
	});
}else{
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
	var id1 = readCookie('id');
	var id = item;
	$.post("getinform.php", { id: id }  ).done(function(data) {
		data = data.split("&&&&");
		if(data[10]==1){
			var buton = '<button type="button" onclick="follow(0,'+id1+','+id+')" class="btn btn-light" style="margin:auto;width:100%;font-size:14px;padding:2%">Отписаться</button>';
		}else{
			var buton = '<button onclick="follow(1,'+id1+','+id+')" type="button" class="btn btn-primary" style="margin:auto;width:100%;font-size:14px;padding:2%">Подписаться</button>';
		}
		document.getElementById("avatar").innerHTML="<img src='"+data[4]+"' width='80%' style='border-radius:5em;margin:auto'> ";
		document.getElementById("followers").innerHTML="Подписчиков<br> <b>"+data[0]+"</b>";
		document.getElementById("following").innerHTML="Подписок<br> <b>"+data[1]+"</b>";
		document.getElementById("publ").innerHTML="Публикаций<br> <b>"+data[2]+"</b>";
		document.getElementById("nickname").innerHTML="<div style='margin:auto 2vw'>"+data[3]+buton+" </div>";
		document.getElementById("post1").innerHTML=data[5];
		document.getElementById("post2").innerHTML=data[6];
		document.getElementById("post3").innerHTML=data[7];
		document.getElementById("followingbody").innerHTML=data[8];
		document.getElementById("followersbody").innerHTML=data[9];
		
	});
	document.getElementById('main').style.display = "block";
}



var item = window.location.search.replace( '?', ''); 
	var item = item.split("=");
	var item = item[1];

function like(picid,id){
	$.post("../like.php", { id: id, picid:picid }  ).done(function(data) {
		document.getElementById(picid).innerHTML=data;
	});
}

function follow(type,id,target){
	$.post("../following.php", { type:type,id:id,target:target }  ).done(function(data) {
		if(item === undefined){
		$.post("getinform.php", { id: id }  ).done(function(data) {
			data = data.split("&&&&");
			document.getElementById("followers").innerHTML="Подписчиков<br> <b>"+data[0]+"</b>";
			document.getElementById("following").innerHTML="Подписок<br> <b>"+data[1]+"</b>";
			document.getElementById("followingbody").innerHTML=data[8];
			document.getElementById("followersbody").innerHTML=data[9];
		});
		}else{
		$.post("getinform.php", { id: target }  ).done(function(data) {
			data = data.split("&&&&");
			var id = item;
			if(data[10]==1){
				var buton = '<button type="button" onclick="follow(0,'+id1+','+id+')" class="btn btn-light" style="margin:auto;width:100%;font-size:14px;padding:2%">Отписаться</button>';
			}else{
				var buton = '<button onclick="follow(1,'+id1+','+id+')" type="button" class="btn btn-primary" style="margin:auto;width:100%;font-size:14px;padding:2%">Подписаться</button>';
			}
			document.getElementById("nickname").innerHTML="<div style='margin:auto 2vw'>"+data[3]+buton+" </div>";
			document.getElementById("followers").innerHTML="Подписчиков<br> <b>"+data[0]+"</b>";
			document.getElementById("following").innerHTML="Подписок<br> <b>"+data[1]+"</b>";
			document.getElementById("followingbody").innerHTML=data[8];
			document.getElementById("followersbody").innerHTML=data[9];
		});
		}
		
	});
}



$( document ).ready(function() {
	
});



</script>
</body>
</html>