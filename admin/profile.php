<?php require 'check.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Расписание МГППУ | Профиль администратора</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css">
  <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css">
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css">
</head>

<body class="skin-blue">
  <style>
    .small {
      font-size: 70%;
      }
  </style>
  <!-- header logo: style can be found in header.less -->
  <header class="header">
    <a href="index.php" class="logo">
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>
              <span>%Username%
                <i class="caret"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header bg-light-blue">
                <img src="img/avatar3.png" class="img-circle" alt="User Image">
                <p>
                  %Username%
                  <small>Дата регистрации: %reg_date%</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Профиль</a>
                </div>
                <div class="pull-right">
                  <a href="http://google.ru" class="btn btn-default btn-flat">Выйти</a>
                </div>
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
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a href="index.php">
              <i class="glyphicon glyphicon-home"></i>
              <span>Главная страница</span>
            </a>
          </li>
          <li>
            <a href="timetables.php">
              <i class="glyphicon glyphicon-calendar"></i>
              <span>Расписание</span>
              <small class="badge pull-right bg-red">Админу</small>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-send"></i>
              <span>Уведомления</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="notifications.php#email">
                  <i class="fa fa-angle-double-right"></i>E-mail рассылка</a>
              </li>
              <li>
                <a href="notifications.php#sms">
                  <i class="fa fa-angle-double-right"></i>SMS_рассылка</a>
              </li>
              <li>
                <a href="notifications.php#site">
                  <i class="fa fa-angle-double-right"></i>Уведомления на сайте</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="feedback.php">
              <i class="glyphicon glyphicon-question-sign"></i>
              <span>Обратная связь</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Панель управления
          <small>%привилегии_пользователя%</small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="col-md-6">
          <div class="well">
            <h2>Профиль:</h2>
            <p class="text-left">Админ тогда-то зарегистрировался и столько-то смс отправил.</p>
          </div>
        </div>
        <div class="col-md-6 visible-md visible-lg">
          <img src="example.com" class="img-responsive img-thumbnail">
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
  <script src="js/raphael-min.js"></script>
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