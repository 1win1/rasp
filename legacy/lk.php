<?
// Скрипт проверки
mysql_connect("localhost","maria","marythewebmaster");

mysql_select_db("rasp_db");
mysql_query("SET NAMES 'utf8';");		
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
header("Content-Type: text/html; charset=utf-8"); //указываем правильную кодировку текста html страницы




// проверяем браузер пользователя

// $user_agent = get_browser($user_agent, false);
  // if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  // elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  // elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  // elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  // elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  // else $browser = "Unknown";

	// echo $user_agent;

  // if (($browser = "Opera") or ($browser = "Unknown")) {
  // 	$browser_alert = 1; //по этой переменной будем выводить красный алерт о неподдерживаемом браузере
  // }  // например в Opera ошибки с определением типа полей в конструкциях required="true/false"

// проверяем браузер пользователя выше



# проверяем, есть ли данные на изменение

	if(isset($_POST['dirty']))  {
	
		$result = mysql_query("SELECT * FROM reg WHERE email='$email'");
		$data = mysql_fetch_assoc($result); 

		$id=$data['id'];
		//$id=49; // для тестирования функционала, когда не работают куки

		$email_dirty = $_POST['email'];
		$firstname_dirty = $_POST['firstname'];
		$lastname_dirty = $_POST['lastname'];
		$number_dirty = $_POST['number'];
		$faculty_dirty = $_POST['faculty'];
		$gr_dirty = $_POST['gr'];


		if (isset($_POST['new_password'])) {

			if (!empty($_POST['new_password'])) {
				
				# Получаем пароль, убераем лишние пробелы и делаем двойное шифрование md5 (двойной md5-хеш)
				$password_dirty = md5(md5(trim($_POST['new_password'])));
				# Cтроим sql-запрос
				$sql_update_password = "UPDATE reg
				SET password='".$password_dirty."'
					WHERE id='".$id."'";

				# Исполняем запрос и ловим ошибки
				$update_password_result = mysql_query($sql_update_password) 
					or die("ОШИБКА ПРИ ИЗМЕНЕНИИ ПАРОЛЯ: " . mysql_error()); 

				# Сигнализируем об успехе для вывода alert'a
				if ($update_password_result=='true') {

					$success_password_update = 1;
					
				}
			}

		}
		

		

		//debug vars

		// echo $firstname_dirty;
		// echo $lastname_dirty;
		// echo $email_dirty;
		// echo $number_dirty;
		// echo $faculty_dirty;
		// echo $gr_dirty;
		// //echo $password_dirty;
		// echo "<hr>";

		//debug vars выше


		$sql_update = "UPDATE reg
					SET email='".$email_dirty."', firstname='".$firstname_dirty."', lastname='".$lastname_dirty."', number='".$number_dirty."', faculty='".$faculty_dirty."', gr='".$gr_dirty."'
					WHERE id=".$id."";
		
		// debug sql
		// echo $sql_update;
		// echo "<hr>";
		// debug sql выше

		$update_result = mysql_query($sql_update) 
			or die("ОШИБКА В ЗАПРОСЕ: " . mysql_error()); 

		if ($update_result=='true') {

		$success_update = 1;
			
		}
		
	}

# проверяем выше

# показываем ЛК

			# проверяем, не сущестует ли пользователя с таким id
					$id=$data['id'];

					$sql = "SELECT firstname, lastname, email, number, faculty, gr, activation 
					FROM   reg
					WHERE  id =".$id."";

			$result = mysql_query($sql);

			while ($row = mysql_fetch_assoc($result)) {
				extract($row);
			}

			//$firstname = mysql_fetch_assoc(mysql_query("SELECT firstname FROM reg WHERE id='49';"));
			//$lastname = mysql_query("SELECT lastname FROM reg WHERE id='".$id."';");
			//$email = mysql_query("SELECT email FROM reg WHERE id='".$id."';");
		//$number = mysql_query("SELECT number FROM reg WHERE id='".$id."';");
		//$faculty = mysql_query("SELECT faculty FROM reg WHERE id='".$id."';");
		//$gr = mysql_query("SELECT gr FROM reg WHERE id='".$id."';");


//debug
//echo $firstname;
//echo $lastname;
//echo $email;
//echo $number;
//echo $faculty;
//echo $gr;
//echo "<hr>";

//debug

# ЛК выше

?>

<html>

<head>
<meta charset="utf-8">
<title>Расписание | МГППУ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="twitter-bootstrap-v2\docs\assets\css\bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link href="assets/css/bootstrap-select.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.tabify.js"></script>
<script type="text/javascript" src="assets/js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="assets/js/validator.js.js"></script>
<script type="text/javascript" src="assets/js/jquery.maskedinput.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<link href="assets/css/datepicker.css" rel="stylesheet">
<link href="assets/css/datepicker3.css" rel="stylesheet">
<script src="assets/js/bootstrap-datepicker.js"></script>
<style type="text/css">
	html, body {
		height: 100%;
}
		body {
				padding-top: 0px;
				padding-bottom: 0px;
		font-family: 'Roboto', sans-serif;
		background: url(images/type.png) repeat;
			}
</style>
</head>

<body>

<div class="container" style=" background-color: white; min-height: 100% ">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="navbar navbar-default navbar-fixed-top">
							<style>
								.body{padding-top:70px}
							</style>
							<div class="container">
								<div class="navbar-header">
									<a class="navbar-brand">Расписание МГППУ</a>
									<p class="navbar-text navbar-right hidden-xs">сделанное с любовью к ВУЗу
										<br>
									</p>
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>

								</div>
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav navbar-right">

									</ul>
									<a type="button" class="btn btn-default navbar-btn navbar-right" href="test4.html">Главная страница</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
						<hr>
					</div>
				</div>
				<div class="row clearfix">
					<h1>Личный кабинет</h1>
					<!-- блок алертов на все случаи жизни -->
					<?php

					if ($success_update <> 0) { 

					echo "<div class=\"alert alert-dismissable alert-success\">";
					echo "<strong>Данные успешно сохранены!</strong>Вы должны увидеть обновлённые данные в полях ниже</div>";
					echo "</div>";

					}

					if ($success_password_update == 1) {
						
						echo "<div class=\"alert alert-dismissable alert-success\">";
						echo "<strong>Пароль изменён!</strong>Теперь нужно использовать новый пароль</div>";
						echo "</div>";

					}

					//if ($browser_alert == 1) {
						
						// $browser = get_browser(null, false);
						// print_r($browser);
						// echo "<div class=\"alert alert-danger alert-dismissable\">";
						// echo "	<strong>Вы используете неподдерживаемый браузер!</strong>Мы не можем гарантировать стабильной работы сайта.</div>";
						// echo "</div>";

					//}

					?>
					<!-- это был блок алертов на все случаи жизни -->

					<legend class=""></legend>
					<div class="container">

						<form class="form-horizontal" action="lk.php" method="POST">
							<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="firstname ">Имя</label>
									<div class="controls ">
										<input type="text" id="firstname " name="firstname" value="<?php echo $firstname; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>


					<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="lastname ">Фамилия</label>
									<div class="controls ">
										<input type="text" id="lastname " name="lastname" value="<?php echo $lastname; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>


					<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="email">Ваш e-mail</label>
									<div class="controls ">
										<input type="text" id="email" name="email" value="<?php echo $email; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>

					<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="number">Телефон</label>
									<div class="controls ">
										<input type="text" id="number" name="number" value="<?php echo $number; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>


					<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="faculty">Факультет</label>
									<div class="controls ">
										<input type="text" id="faculty" name="faculty" value="<?php echo $faculty; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>


					<fieldset>

								<div class="control-group ">
									
									<label class="control-label " for="gr">Группа</label>
									<div class="controls ">
										<input type="text" id="gr" name="gr" value="<?php echo $gr; ?>" class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
		<input type="text" id="dirty" name="dirty" value="1" class="hidden">

					</fieldset>

					<!-- поменять пароль ниже -->

					<fieldset>

								<div class="control-group ">
									
									<label class="control-label text-danger" for="new_password">Поменять пароль</label>
									<div class="controls ">
										<input type="password" id="new_password" name="new_password"  class="controls" style="width:200px;" required="false ">
									</div>
								</div>
						
					</fieldset>

					<!-- поменять пароль выше -->
					<br>
					<div class="control-group ">
						<div class="controls ">
							<button class="btn btn-primary  btn-default" id="submit" type="submit" name="submit " style="width:40%; ">Обновить данные</button>
						</div>
					</div>

<br>
			</form></div>
					<br>
					<legend class=""></legend>





				</div>


			</div>

		</div>

		<br>

		<div class="row clearfix ">
			<div class="col-md-9 column ">
				<p class="text-left ">
					Этот сайт
					<strong>с любовью делали</strong>студенты группы 3.1. Женя. Маша.
					<em>Гриша. Катя</em>. Паша.
				</p>
			</div>
			<div class="col-md-3 column ">
				<address>
					<strong>Адрес факультета информационных технологий:</strong>
					<br>107143 г. Москва, Открытое шоссе, д. 24 стр. 27
					<br>Тел./факс: (499) 167-66-74
					<br>E-mail: dekanatitmgppu@mail.ru
					<br>Сайт: www.it.mgppu.ru</address>
			</div>
		</div>
	</div>
</div>

</body></html>