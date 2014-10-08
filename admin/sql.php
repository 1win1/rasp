<?php
// Константы для подключения к СУБД
define("HOST","localhost");
define("USER","rasp_user");
define("PASS","hP5qwSTTTy");
define("DB","rasp_db");
// Подключение к СУБД
$link = mysql_connect(HOST,USER,PASS) or die (mysql_error());  
mysql_set_charset('utf8');        
        // Выбираем базу данных
mysql_select_db(DB, $link);
?>