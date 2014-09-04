<?php 

mysql_connect("localhost","maria","marythewebmaster");
mysql_select_db("rasp_db");
mysql_query("SET NAMES 'utf8';");		
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
header("Content-Type: text/html; charset=utf-8");

$activation_query = "SELECT `activation` FROM `reg` WHERE id='56';";
$activation_result = mysql_query($activation_query);

while ($activation_row = mysql_fetch_assoc($activation_result)) {
	extract($activation_row);
}

if( $activation == 0) 
	{ 
	 echo "Пройдите подтверждение (проверьте почту)!";
	 exit();
	}

else {

	//тут то, что ты хочешь выполнить для успешного прохождения проверки
	echo "Успех";
}

?>