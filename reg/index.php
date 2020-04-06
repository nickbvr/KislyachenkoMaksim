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
	<link href="fileinput.css" media="all" rel="stylesheet" type="text/css" />
	<script src="fileinput.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="main/css/style.css" />
	<style>
		
        
		
    </style>
</head>
<body style='text-align: center;overflow-x:hidden;height:100vh'>
<div class="row" style="max-width:1000px;height:100%; margin:auto;display:flex">
    <div  style="margin:auto;width:95vw;max-width:400px;">
		<form enctype="multipart/form-data" action="save_user.php" method="post">
		  <div class="form-group">
			<label>Логин</label>
			<input type="text" class="form-control" name="login"  placeholder="Введите логин">
		  </div>
		  <div class="form-group">
			<label>Пароль</label>
			<input type="password" class="form-control" name="password" placeholder="Пароль">
		  </div>
		  <div class="form-group">
			<label>Имя пользователя</label>
			<input type="text" class="form-control" name="nickname" placeholder="Имя пользователя">
		  </div>
		  <div class="form-group">
			<label>Загрузите свой аватар</label>
			<input showPreview="false" name="file-demo" type="file" class="file" data-preview-file-type="any">
		  </div>
		  <br>
		  <button type="submit" class="btn btn-primary" style="float:left">Зарегистрироваться</button>
		</form>
    </div>

	
	
	
</div>














<script type="text/javascript" >






</script>
</body>
</html>