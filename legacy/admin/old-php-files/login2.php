<html>

<head>
  <meta charset="UTF-8">
  <title>Расписание МГППУ | Обратная связь</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- bootstrap 3.0.2 -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap WYSIHTML5 -->
  <script src="/jsplugins//bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- fullCalendar -->
  <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css">
  <link href="css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print">
  <!-- Theme style -->
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>

<body class="skin-blue">
  <style>
    .small {
      font-size: 70%;
      }
  </style>
  <!-- header logo: style can be found in header.less -->
  <header class="header">
    <a href="index.html" class="logo">
      <!-- Add the class icon to your logo image or logo icon to add the margining -->
      Расписание МГППУ
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-right">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-warning"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Система находится на раннем этапе тестирования
                <span class="label label-warning">Возможны ошибки</span>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="img/avatar04.png" class="img-circle" alt="User: ">
          </div>
          <div class="pull-left info">
            <p>%Username%</p>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Будет поиск по документации">
            <span class="input-group-btn">
              <button type="submit" name="seach" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Вход:
        </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <!-- /.row (main row) -->
          <div class="com-md-6">
          <!-- login form start -->
            <?
                // Страница авторизации
                # Функция для генерации случайной строки

                function generateCode($length=6) {

                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

                    $code = "";

                    $clen = strlen($chars) - 1;  
                    while (strlen($code) < $length) {

                            $code .= $chars[mt_rand(0,$clen)];  
                    }

                    return $code;

                }



                # Соединямся с БД

                mysql_connect("localhost", "rasp_user", "raspuserpass");

                mysql_select_db("rasp_db");


                if(isset($_POST['submit']))

                {

                    # Вытаскиваем из БД запись, у которой логин равняеться введенному

                    $query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

                    $data = mysql_fetch_assoc($query);

                    

                    # Соавниваем пароли

                    //debug-block
                    echo "<hr>";
                    echo "user_password <br>";
                    echo $user_password;
                    echo "<br> POST password <br>";
                    echo $_POST['password'];
                    echo "<br> MD5:";
                    echo md5(md5($_POST['password']));
                    echo "<hr>";
                    //debug-block end


                    if($data['user_password'] === md5(md5($_POST['password'])))

                    {

                        # Генерируем случайное число и шифруем его

                        $hash = md5(generateCode(10));

                            

                        if(!@$_POST['not_attach_ip'])

                        {

                            # Если пользователя выбрал привязку к IP

                            # Переводим IP в строку

                            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";

                        }

                        

                        # Записываем в БД новый хеш авторизации и IP

                        mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

                        

                        # Ставим куки

                        setcookie("id", $data['user_id'], time()+60*60*24*30);

                        setcookie("hash", $hash, time()+60*60*24*30);

                        

                        # Переадресовываем браузер на страницу проверки нашего скрипта

                        header("Location: check.php"); exit();

                    }

                    else

                    {

                        print "Вы ввели неправильный логин/пароль";

                    }

                }

                ?>

                <form method="POST">
                Логин <input name="login" type="text"><br>
                Пароль <input name="password" type="password"><br>
                Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>
                <input name="submit" type="submit" value="Войти">
                </form>  
          </div>        
          <!-- login form end -->
      
        </div>
      </section>
      <!-- /.content -->
    </aside>
    <!-- /.right-side -->
  </div>
  <!-- ./wrapper -->

  <!-- add new calendar event modal -->


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- jQuery UI 1.10.3 -->
  <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- fullCalendar -->
  <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

  <!-- AdminLTE App -->
  <script src="js/AdminLTE/app.js" type="text/javascript"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

</body>

</html>