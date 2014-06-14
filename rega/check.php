<html>
<head>
	<meta charset="UTF-8">
	<title>...Проверка... | Расписание МГППУ</title>
</head>
<body>

	<?

	// Скрипт проверки


	# Соединямся с БД

	mysql_connect("localhost", "rasp_user", "raspuserpass");

    mysql_select_db("rasp_db");


	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

	{   

	    $query = mysql_query("SELECT *,INET_NTOA(user_ip) FROM reg WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

	    $userdata = mysql_fetch_assoc($query);


	    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
	 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))

	    {

	        setcookie("id", "", time() - 3600*24*30*12, "/");

	        setcookie("hash", "", time() - 3600*24*30*12, "/");

	        print "Хм, что-то не получилось";

	    }

	    else

	    {

	        print "Привет, ".$userdata['user_login'].". Всё работает!";

	    }

	}

	else

	{

	    print "Включите куки";

	}

	?>

</body>
</html>