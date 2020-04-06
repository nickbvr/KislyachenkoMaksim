<?php
include ("bd.php");



$uploaddir = 'main/imgus/';


$avatar = explode('.',basename($_FILES['file-demo']['name']));
$kolv = count($avatar)-1;
$avatar = $avatar[$kolv];













    $err = array();#
   // проверям логин
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
	if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['nickname'])) {
        $err[] = "Имя может состоять только из букв английского алфавита и цифр";
    }
    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }
   // проверяем, не сущестует ли пользователя с таким именем
    $login = $_POST['login'];
    $query = mysqli_query($db,"SELECT * FROM users WHERE user_login='$login'");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if ($row['user_id'] > 0) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    //Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {
        $login = $_POST['login'];
		$avatar = $login.".".$avatar;
		$uploadfile = $uploaddir . $avatar;
		if (move_uploaded_file($_FILES['file-demo']['tmp_name'], $uploadfile)) {
		} else {
				$err[] = "Не удалось загрузить аватар";
		}
		$nickname = $_POST['nickname'];
        //Убераем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['password'])));
        $result = mysqli_query($db,"INSERT INTO users (user_login,user_password,nickname,avatar) VALUES('".$login."','".$password."','".$nickname."','".$avatar."') ");
		$result = mysqli_query($db,"ALTER TABLE `popular` ADD `".$login."` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '1' ");
		header('Location:main/index.php');
        exit();
    } else {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error) {
            print $error.
                "<br>";
        }
    }

?>
