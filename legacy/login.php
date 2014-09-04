<?php 
// Страница авторизации
ini_set('display_errors',1);
error_reporting(E_ALL);


# Функция для генерации случайной строки
  function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
  }

    # Если есть куки с ошибкой то выводим их в переменную и удаляем куки
  if (isset($_COOKIE['errors'])){
      $errors = $_COOKIE['errors'];
      setcookie('errors', '', time() - 60*24*30*12, '/');
  }


//коннект ниже

  mysql_connect("localhost","maria","marythewebmaster");
  mysql_select_db("rasp_db");
  
  mysql_query("SET NAMES 'utf8';");   
  mysql_query("SET CHARACTER SET 'utf8';");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
  
  header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы

  if (isset($_COOKIE['id'])) {
  	$id = $_COOKIE['id']; //получаем id из куки
  }
  else {

  

  if(isset($_POST['email']))
  {
  	$activation_query = "SELECT `activation` FROM `reg` WHERE id='".$id."';";
	$activation_result = mysql_query($activation_query) or die("Не могу получить подтверждение!");

		while ($activation_row = mysql_fetch_assoc($activation_result)) {
		extract($activation_row);
		echo $activation_row['activation'];
		}

		//if (!(isset($activation))) {
		//	$activation = 0; //если activation из базы получить не удалось
		//}

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT id, password FROM reg WHERE email='".mysql_real_escape_string($_POST['email'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);
  
    # Соавниваем пароли
    if($data['password'] === md5(md5($_POST['password'])))
    {
      # Генерируем случайное число и шифруем его
      $hash = md5(generateCode(10));
           
      # Записываем в БД новый хеш авторизации и IP
    
      $update_query = "UPDATE reg
      SET hash='".$hash."' WHERE id='".$data['id']."'";

      //  $update_query = "UPDATE reg
      // SET hash='".$hash."'".$insip."
      // WHERE id='".$data['id']."'";

      //исполняем запрос или пишем ошибку
      mysql_query($update_query) or die("MySQL Error: " . mysql_error());
      
//проверка активации почты
		if( $activation_row['activation'] == 0) 
		{ 
			echo($activation_row['activation']);

		echo "<h1>Пройдите подтверждение (проверьте почту)!</h1><br>";
    echo "<a href=\"test4.html\">Главная страница</a>";
		exit();
		}
		else
		{

				# Ставим куки
     //if(isset($_POST['remember'])) {
            
        setcookie("id", $data['id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
       // } else {
      //  setcookie("id", $data['id'], time()-60*60*24*30);
      //  setcookie("hash", $hash, time()-60*60*24*30); 
      //  }
        # Переадресовываем браузер на страницу проверки нашего скрипта

        header("Location: check.php"); exit();

    }       
      
    }
    else
    {
      echo "<h1>Вы ввели неправильный логин/пароль</h1><br>";
      echo "<a href=\"test4.html\">Главная страница</a>";
    }
  }
  else
  {
  	echo "Кошмарная ошибка! Катастрофа! </br>";
  	echo "Непредвиденная случайность - вы не смогли войти, не отправив данные.";
  }
}
  //$user = mysql_query("SELECT id FROM reg WHERE email='$email' AND password='$password' AND activation='1'");
?>

