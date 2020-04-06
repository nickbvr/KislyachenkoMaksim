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
	<link href="../../fileinput.css" media="all" rel="stylesheet" type="text/css" />
	<script src="../../fileinput.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<style>
		
	.search{
		position:relative;
	}

	.search_result{
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		max-height:150px;
		overflow-y:scroll;
		display:none;
	}

	.search_result li{
		list-style: none;
		height: calc(1.5em + .75rem + 2px);
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		cursor: pointer;
		transition:0.3s;
	}

	.search_result li:hover{
		background: #00BFFF;
	}


	.search_result2{
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		max-height:150px;
		overflow-y:scroll;
		display:none;
	}

	.search_result2 li{
		list-style: none;
		height: calc(1.5em + .75rem + 2px);
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		cursor: pointer;
		transition:0.3s;
	}

	.search_result2 li:hover{
		background: #00BFFF;
	}
		
    </style>
</head>
<body style='text-align: center;overflow-x:hidden;height:100vh'>
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
		<a href="#" style="margin:auto;"><img  class="swing" src='../favicon/add.png' style="height:5vw;max-height:40px;"></a>
    </div>
</div>
<div class="row" style="max-width:1000px;height:100%; margin:auto;display:flex">
    <div  style="margin:auto;width:95vw;max-width:400px;">
		<form enctype="multipart/form-data" action="upload.php" method="post">
		  <div class="form-group">
			<label>Название</label>
			<input type="text" class="form-control" name="name"  placeholder="">
		  </div>
		  <div class="form-group">
			<label>Описание</label>
			<textarea class="form-control" style="resize: none;height:100px" name="discription" placeholder="" ></textarea>
		  </div>
		  <div class="form-group">
			<label>Хэштег</label>
			<br>
			<input type="text" name="referal" placeholder="" value="" class="who" style="width: 100%;
	height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;"  autocomplete="off">
			<ul class="search_result"></ul>
			<br>
			<label>Фирма</label>
			<input type="text" name="referal2" placeholder="" value="" class="who2" style="width: 100%;
	height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;"  autocomplete="off">
			<ul class="search_result2"></ul>

		  </div>
		  <div class="form-group">
			<label>Загрузите фотографию</label>
			<input showPreview="false" name="file-demo" type="file" class="file" data-preview-file-type="any">
		  </div>
		  <br>
		  <button type="submit" class="btn btn-primary" style="float:left">Опубликовать</button>
		</form>
    </div>

	
	
	
</div>














<script type="text/javascript" >
function search(){
	var search = document.getElementById("search").value;
	location.href = "../index.php?item="+search;
}

$(function(){
    
    //Живой поиск
    $('.who').bind("change keyup input click", function() {
        if(this.value.length >= 2){
            $.ajax({
                type: 'post',
                url: "search.php", //Путь к обработчику
                data: {'referal':this.value},
                response: 'text',
                success: function(data){
                    $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
                }
            })
        }
    })
    
    $(".search_result").hover(function(){
        $(".who").blur(); //Убираем фокус с input
		$(".who").focus();
    })
    
    //При выборе результата поиска, прячем список и заносим выбранный результат в input
    $(".search_result").on("click", "li", function(){
        s_user = $(this).text();
        $(".who").val(s_user).attr('disabled'); //деактивируем input, если нужно
        $(".search_result").fadeOut();
    })

})
$(function(){
    
    //Живой поиск
    $('.who2').bind("change keyup input click", function() {
        if(this.value.length >= 2){
            $.ajax({
                type: 'post',
                url: "search2.php", //Путь к обработчику
                data: {'referal2':this.value},
                response: 'text',
                success: function(data){
                    $(".search_result2").html(data).fadeIn(); //Выводим полученые данные в списке
                }
            })
        }
    })
    
    $(".search_result2").hover(function(){
        $(".who2").blur(); //Убираем фокус с input
		$(".who2").focus();
    })
    
    //При выборе результата поиска, прячем список и заносим выбранный результат в input
    $(".search_result2").on("click", "li", function(){
        s_user = $(this).text();
        $(".who2").val(s_user).attr('disabled'); //деактивируем input, если нужно
        $(".search_result2").fadeOut();
    })

})





</script>
</body>
</html>