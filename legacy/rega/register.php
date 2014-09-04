<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация пользователя | Расписание МГППУ</title>
</head>
<body>
    <?
    // Скрипт регистрации пользователя register.php
    // Страница регситрации нового пользователя


    # Соединямся с БД

     //надо заменить на include connect.php
    mysql_connect("localhost", "rasp_user", "raspuserpass");

    mysql_select_db("rasp_db");



    if(isset($_POST['submit']))

    {

        $err = array();


        # проверям логин

        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

        {

            $err[] = "Логин может состоять только из букв английского алфавита и цифр";

        }

        

        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

        {

            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";

        }

        

        # проверяем, не сущестует ли пользователя с таким именем

        $query = mysql_query("SELECT COUNT(user_id) FROM reg WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

        if(mysql_result($query, 0) > 0)

        {

            $err[] = "Пользователь с таким логином уже существует в базе данных";

        }

        

        # Если нет ошибок, то добавляем в БД нового пользователя

        if(count($err) == 0)

        {

            
            $login = $_POST['login'];

            

            # Убераем лишние пробелы и делаем двойное шифрование

            $password = md5(md5(trim($_POST['password'])));

            

            mysql_query("INSERT INTO reg SET user_login='".$login."', user_password='".$password."'");

            header("Location: verify.php"); exit();

        }

        else

        {

            print "<b>При регистрации произошли следующие ошибки:</b><br>";

            foreach($err AS $error)

            {

                print $error."<br>";

            }

        }

    }

    ?>

    <form method="POST">

    Логин <input name="login" type="text"><br>

    Пароль <input name="password" type="password"><br>

    <?
        ## смотри сюда

        require_once('recaptchalib.php');
            $publickey = "6Leq7PMSAAAAAElzO4QiobHHBs1pLJ2eXPo4NjbI "; // you got this from the signup page
            echo recaptcha_get_html($publickey);

        ## выше смотри
    ?>

    <input name="submit" type="submit" value="Зарегистрироваться">

    </form>

</body>
</html>