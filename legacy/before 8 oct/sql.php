<?php
// Константы для подключения к СУБД
define("HOST","localhost");
define("USER","dbuser");
define("PASS","YRWetetet6");
define("DB","dbkurs");
// Подключение к СУБД
$link = mysql_connect(HOST,USER,PASS) or die (mysql_error());  
mysql_set_charset('utf8');        
        // Выбираем базу данных
mysql_select_db(DB, $link);
?>