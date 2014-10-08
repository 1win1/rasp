<html>
<head>
	<meta charset="UTF-8">
	<title>Проверка передаваемых данных | Расписание МГППУ</title>
</head>
<style>
<?php 
	echo "body {";
	echo "background-image: url(images/png/background-".mt_rand(1,10).".png);";
	echo "background-repeat: repeat";
	echo "}";
?>
</style>
<link rel="stylesheet" type="text/css" href="utility.css">
<body>

<div id="container">

	<div class="main">
		<div class="main_in_main">
			<div class="content">
				<?php 
					# Соединямся с БД
					include("sql.php");

					echo "Comparsion: </br>";
					$query = mysql_query("SELECT *,INET_NTOA(user_ip) FROM reg WHERE user_id = '2'");
					echo " -1- ";
					$userdata = mysql_fetch_assoc($query);
					$ip = 0;
					echo "</br> \$INET_NTOA(user_ip) </br>";
					echo ($userdata['INET_NTOA(user_ip)']);
					echo "</br> \$user_ip </br>";
					echo $userdata['user_ip'];
					echo "</br> \$IP </br>";
					echo ($ip);

					if ($userdata['INET_NTOA(user_ip)'] == $ip) {
						echo "<p><font color=\"green\"> Равно </font></p>";
					}
					else {
						echo "<p><font color=\"red\"> НЕ Равно </font></p>";
					}

				?>
			</div>
		</div>
	</div>
</div>

</body>
</html>