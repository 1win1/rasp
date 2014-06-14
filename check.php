<?
// Скрипт проверки
# Соединямся с БД

mysql_connect("localhost","maria","marythewebmaster");

mysql_select_db("rasp_db");


header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = mysql_query("SELECT *,INET_NTOA(ip) FROM reg WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);


    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id'])
 or (($userdata['ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['ip'] !== "0")))

    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        echo "Хм, что-то не получилось";
        echo "<br><a href=\"test4.html\">Главная</a>";
        exit();
    }

    else

    {
        echo "Привет, ".$userdata['email'].". Авторизация прошла успешно!";
        echo "<br><a href=\"test4.html\">Главная</a> <a href=\"lk.php\">Личный кабинет</a>";

    }

}

else

{

    echo "Включите куки";
    exit();

}

?>