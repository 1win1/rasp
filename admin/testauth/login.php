<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизация пользователя | Расписание МГППУ</title>
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
    <div class="main">
            <div class="content" align="center">
                <?
                // Страница авторизации

                # Функция для генерации случайной строки
                function generateCode($length=6){
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
                    $code = "";
                    $clen = strlen($chars) - 1;  
                    while (strlen($code) < $length){
                            $code .= $chars[mt_rand(0,$clen)];  
                    }
                    return $code;
                }

                # Соединямся с БД
                include("sql.php");

                if(isset($_POST['submit'])){

                    # Вытаскиваем из БД запись, у которой логин равняется введенному
                    $query = mysql_query("SELECT user_id, user_password FROM reg WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");
                    $data = mysql_fetch_assoc($query);

                    # Сpавниваем пароли

                    //debug-block
                    // echo "<hr>";
                    // echo "user_password <br>";
                    // echo $user_password;
                    // echo "<br> POST password <br>";
                    // echo $_POST['password'];
                    // echo "<br> MD5:";
                    // echo md5(md5($_POST['password']));
                    // echo "<hr>";
                    //debug-block end

                    if($data['user_password'] === md5(md5($_POST['password']))){
                        # Генерируем случайное число и шифруем его
                        $hash = md5(generateCode(10));
                        $insip = 0;

                        if(!@$_POST['not_attach_ip']){
                            # Если пользователя выбрал привязку к IP
                            # Переводим IP в строку
                            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
                        }

                        # Записываем в БД новый хеш авторизации и IP
                        mysql_query("UPDATE reg SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

                        # Ставим куки
                        setcookie("id", $data['user_id'], time()+60*60*24*30);
                        setcookie("hash", $hash, time()+60*60*24*30);

                        # Переадресовываем браузер на страницу проверки нашего скрипта

                        header("Location: check.php"); exit();
                    }
                    else{
                        print "Вы ввели неправильный логин/пароль";
                    }
                }
                ?>
                <form method="POST">
                    Логин <input name="login" type="text"><br>
                    Пароль <input name="password" type="password"><br>
                    Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>
                    <input name="submit" type="submit" value="Войти"></br>
                    <a href="register.php">Получить аккаунт</a>
                </form>
            </div>
            <div class="helper"></div>
    </div>
</body>
</html>
