<?php

// Скрипт регистрации пользователя register.php
// Страница регистрации нового пользователя


# Соединямся с БД


mysql_connect("localhost","maria","marythewebmaster");

mysql_select_db("rasp_db");

mysql_query("SET NAMES 'utf8';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");

header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы

if(isset($_POST['submit']))

{

    $err = array();


    # проверяем, не сущестует ли пользователя с таким email

    $query = mysql_query("SELECT COUNT(id) FROM reg WHERE email='".mysql_real_escape_string($_POST['email'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[] = "Пользователь с таким email уже существует в базе данных";

    }

            if(!($_POST['answer'] == '5')) //если не равно, то

        {

            $err[] = "Неправильный ответ на дополнительный вопрос!";

        }

    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {

        $email = $_POST['email'];
		
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $number = $_POST['number'];
        $faculty = $_POST['faculty'];
        $gr = $_POST['gr'];
		

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

       
        $result2 =  mysql_query("INSERT INTO reg (email, firstname, lastname, number, faculty, gr, password) VALUES ('$email','$firstname','$lastname','$number','$faculty','$gr','$password')");
		if ($result2=='TRUE')
		{
		$result3    = mysql_query ("SELECT id FROM reg WHERE email='$email'",$db);//извлекаем    идентификатор пользователя. Благодаря ему у нас и будет уникальный код    активации, ведь двух одинаковых идентификаторов быть не может.
        $myrow3    = mysql_fetch_array($result3);
   		$activation = md5($myrow3['id']).md5($email); //код активации аккаунта. Зашифруем через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли    сможет подобрать вручную через адресную строку.
		$subject    = "Подтверждение регистрации";//тема сообщения
        $message    = "Здравствуйте! Спасибо за регистрацию \nВаш логин для входа: ".$email."\n
            Перейдите по ссылке, чтобы активировать ваш аккаунт:\n http://pbcraft.ru/kurs/greg/new2/activation.php?email=".$email."&code=".$activation."\nС уважением,\n
            Администрация";//содержание сообщение
        mail($email,    $subject, $message, "Content-type:text/plane;    Charset=utf-8\r\n");//отправляем сообщение  
			}			
            echo    "Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации.";
			

		exit();

    }

    else

    {

        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }

    }

}

?>