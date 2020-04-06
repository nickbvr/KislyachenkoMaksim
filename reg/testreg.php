<?php


include ("bd.php");



// Страница авторизации
// Функция для генерации случайной строки
function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length)
    {
        $code .= $chars[mt_rand(0, $clen) ];
    }
    return $code;
}
// Соединямся с БД

if (isset($_POST['submit']))
{
	$login = $_POST['login'];
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($db,"SELECT * FROM users WHERE user_login = '".$login."' ");
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
    # Соавниваем пароли
    if ($data['user_password'] === md5(md5($_POST['password'])))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        if (!@$_POST['not_attach_ip'])
        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";
        }
        # Записываем в БД новый хеш авторизации и IP
        mysqli_query($db,"UPDATE users SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $data['user_id'] . "'");
        # Ставим куки
        setrawcookie("id", $data['user_id']);
        setrawcookie("hash", $hash);
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: main/index.php");
        exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}


?>