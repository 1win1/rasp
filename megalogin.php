<?php 
//megalogin.php v.01.26.05.14

// подключение к базе данных, выбор таблицы и настройка кодировок

	mysql_connect("localhost","maria","marythewebmaster");
	mysql_select_db("rasp_db");

	mysql_query("SET NAMES 'utf8';");   
	mysql_query("SET CHARACTER SET 'utf8';");
	mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");

	header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы

// подключение к базе данных, выбор таблицы и настройка кодировок выше

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

function checkmail($id)
{
	# взять запись mail из бд с id = $id

	$query = mysql_query("SELECT * FROM reg WHERE id=$id");
	$data = mysql_fetch_assoc($query); //в data['activation'] положили значение поля activation из БД
	echo "вот: ";
	echo $data['activation'];
	if ($data['activation'] == 0) {
		warning(2);
	} else {
		return 1;
	}
	
}

function checkpass($pass)
{
	# code coming soon...
}

function checkhash($hash)
{
	# code coming soon...
}

function cleancookies()
{
	if (isset($_COOKIE['id'])) {
		setcookie("id", $data['id'], time()-60*60*24*30);
	}
	if (isset($_COOKIE['hash'])) {
		setcookie("hash", $hash, time()-60*60*24*30); 
	}
}

function setcookies($id, $hash)
{
	setcookie("id", $id, time()+60*60*24*30);
    setcookie("hash", $hash, time()+60*60*24*30);
}

function done() //проверяем активацию и авторизуем
{
	echo "Вы авторизованы!";
	die();
}

function warning($pointer)
{
	if ($pointer == 1) {
		
		echo "<h1>Вы ввели неправильный логин/пароль</h1><br>";
		echo "<a href=\"test4.html\">Главная страница</a>";
		die();

	}
	if ($pointer == 2) {
		
		echo ($data['activation']);
		echo "<h1>Пройдите подтверждение!</h1><br>";
		echo "<h3>проверьте свою почту</h3><br>";
		echo "<a href=\"test4.html\">Главная страница</a>";
		die();

	} else {

		echo "<h1>Не могу выполнить авторизацию!</h1><br>";
		echo "<h3>произошла непредвиденная ошибка, сообщите об этом кому-нибудь</h3><br>";
		echo "<a href=\"test4.html\">Главная страница</a>";
		die();

	}
	
	
}

if ((isset($_COOKIE['id'])) && (isset($_COOKIE['hash']))) {
		# -----------------------------
		$query = mysql_query("SELECT * FROM reg WHERE id='".mysql_real_escape_string($_COOKIE['id'])."' LIMIT 1");

		$data = mysql_fetch_assoc($query); //в data['password'] положили хеш авторизации (псевдослучайное значение, не хеш пароля)

		# Соавниваем пароли
		if($data['password'] === $_COOKIE['hash'])
		{
			# Генерируем псевдослучайное число и шифруем его
			$hash = md5(generateCode(10));
			   
			# Записываем в БД новый хеш авторизации

			$update_query = "UPDATE reg
			SET hash='".$hash."' WHERE id='".$data['id']."'";

			//исполняем запрос или пишем ошибку
			mysql_query($update_query) or die("Не могу внести новый хеш: " . mysql_error());  

			setcookies($data['id'], $hash);

			if (checkmail($data['id']) == 1) {
				done();
			}

		}
		else
		{
			cleancookies();
			warning(1); // неправильный пароль
		}
		 
} else {
	
	if ((isset($_POST['email'])) && (isset($_POST['password']))) {

		# ----------------
		
		$query = mysql_query("SELECT id, password FROM reg WHERE email='".mysql_real_escape_string($_POST['email'])."' LIMIT 1");

		$data = mysql_fetch_assoc($query);

		# Хешируем и сравниваем пароли

		$hpassword = md5(md5($_POST['password']));

		if($data['password'] === md5(md5($_POST['password'])))
		{

			# Генерируем псевдослучайное число и шифруем его
			$hash = md5(generateCode(10));
			   
			# Записываем в БД новый хеш авторизации

			$update_query = "UPDATE reg
			SET hash='".$hash."' WHERE id='".$data['id']."'";

			//исполняем запрос или пишем ошибку
			mysql_query($update_query) or die("Не могу внести новый хеш: " . mysql_error()); 

			# записать куки
			setcookies($data['id'], $hash);
 
			# вошел
			if (checkmail($_COOKIE['id']) == 1) {
				done();
			}

		} else {
			#удалить куки вернуть ошибку
			cleancookies();
			warning(1); // неправильный пароль
		}
		

	} else {
		#удалить куки вернуть ошибку
		cleancookies();
			warning(); // непредвиденная ошибка
	}
	
}

 ?>