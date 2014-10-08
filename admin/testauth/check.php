<html>
<head>
	<meta charset="UTF-8">
	<title>...Проверка... | Расписание МГППУ</title>
</head>
<body>

<?
	// Скрипт проверки
	# Соединямся с БД
	include("sql.php");

	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){   
		$query = mysql_query("SELECT *,INET_NTOA(user_ip) FROM reg WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
		$userdata = mysql_fetch_assoc($query);

		if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']) or (($userdata['INET_NTOA(user_ip)'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0"))){
			setcookie("id", "", time() - 3600*24*30*12, "/");
			setcookie("hash", "", time() - 3600*24*30*12, "/");//ошибка в формате преобразования IP 
			print "Хм, что-то не получилось...";

			// //debug-block
			// echo "<hr>";
			// echo "user_password <br>";
			// echo $user_password;
			// echo "<br> POST password <br>";
			// echo $_POST['password'];
			// echo "<br> MD5:";
			// echo md5(md5($_POST['password']));

			// echo "</br>id: </br>";
			// echo $userdata['user_id'];
			// echo "</br>hash: </br>";
			// echo $userdata['user_hash'];
			// echo "</br>login: </br>";
			// echo $userdata['user_login'];
			// echo "</br>ip: </br>";
			// echo $userdata['user_ip'];
			// echo "</br>cookie hash: </br>";
			// echo $_COOKIE['hash'];
			// echo "</br>cookie id: </br>";
			// echo $_COOKIE['id'];
			// echo "</br>адрес:</br>";
			// echo $_SERVER['REMOTE_ADDR'];

			// echo "</br>адрес:</br>";
			// echo $userdata['INET_NTOA(user_ip)'];
			
			// echo "<hr>";
			// //debug-block end
		}

		else{
			
			header("Location: http://kkakoipare.ru/admin/index.php"); exit();
		}
	}
	else{
		print "Включите куки";
	}
?>

</body>
</html>