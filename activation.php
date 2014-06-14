<?php
          mysql_connect("localhost","maria","marythewebmaster");
			mysql_select_db("rasp_db");
			
        

 if    (isset($_GET['code'])) {$code =$_GET['code']; } //код подтверждения 
            else 
            {    exit("Вы    зашли на страницу без кода подтверждения!");} //если не указали code,    то выдаем ошибку
 if (isset($_GET['email'])) {$email=$_GET['email'];    } //логин,который    нужно активировать
            else 
            {    exit("Вы    зашли на страницу без логина!");} //если не указали логин, то выдаем ошибку
 $result = mysql_query("SELECT    id    FROM    reg WHERE email='$email'",$rasp_db); //извлекаем    идентификатор пользователя с данным логином
            $myrow    = mysql_fetch_array($result); 

 $activation    = md5($myrow['id']).md5($email);//создаем    такой же код подтверждения
 if ($activation == $code) {//сравниваем полученный из url и сгенерированный код 
                     mysql_query("UPDATE    reg SET activation='1' WHERE email='$email'");//если равны, то активируем пользователя
                     echo "Ваш Е-мейл подтвержден! Теперь вы можете    зайти на сайт под своим логином! <a href='test4.html'>Главная    страница</a>";
                     }
            else {echo "Ошибка! Ваш Е-мейл не    подтвержден! <a    href='test4.html'>Главная    страница</a>";
            //если    же полученный из url и    сгенерированный код не равны, то выдаем ошибку
            }
			
			
            ?>