<?php 
	
	# Соединямся с БД

	mysql_connect("localhost","maria","marythewebmaster");

	mysql_select_db("rasp_db");

	$numbers_query = "select number, firstname, lastname FROM reg WHERE activation='1';";

	$numbers_result = mysql_query($numbers_query);

			while ($row = mysql_fetch_assoc($numbers_result)) {
				extract($row);
				print_r($number);
				print_r($firstname);
				print_r($lastname);
			}

			print_r($number);
 ?>