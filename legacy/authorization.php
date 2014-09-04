<?php 
// Страница авторизации
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);


//коннект ниже
  mysql_connect("localhost","maria","marythewebmaster");
  mysql_select_db("rasp_db");
  
  mysql_query("SET NAMES 'utf8';");   
  mysql_query("SET CHARACTER SET 'utf8';");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
  
  header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы


 if (isset($_POST['email']) && isset($_POST['password']))
{
    $email = mysql_real_escape_string($_POST['email']);
    $password = md5(md5(trim($_POST['password'])));
    $query = "SELECT id,email FROM reg WHERE email='$email' AND password='$password' LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
	
	$result = mysql_query("SELECT * FROM reg WHERE email='$email'");
	$data = mysql_fetch_assoc($result); 
	
	if($data['activation'] == 0) 
	{  
		echo "<h1>Пройдите подтверждение (проверьте почту)!</h1><br>";
		echo "<a href=\"test4.html\">Главная страница</a>";
		exit();
		}
		else
		{
// если такой пользователь нашелся
    if (mysql_num_rows($sql) == 1) {
        // то мы ставим об этом метку в сессии (ID пользователя)
    $row = mysql_fetch_assoc($sql);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
	echo "<h1>Авторизация прошла успешно!</h1>";
        echo "<h1><br><a href=\"test4.html\">Главная</a> <a href=\"lk.php\">Личный кабинет</a></h1>";
		exit();
    }
    else {
        echo "<h1>Вы ввели неправильный email/пароль</h1><br>";
      echo "<a href=\"test4.html\">Главная страница</a>";
    }
}
} 
?>

