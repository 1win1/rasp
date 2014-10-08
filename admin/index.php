<?php require 'check.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Расписание МГППУ | Панель администратора</title>
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
              <li class="header">Система находится на раннем этапе тестирования <span class="label label-warning">Возможны ошибки</span> </li>
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
          <li class="active">
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

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <p>
                  Пользователей:
                </p>
                <h3>
                  %number%
                </h3>
              </div>
              <div class="icon">
                <i class="small glyphicon glyphicon-user"></i>
              </div>
              <a href="#" class="small-box-footer">
                Пользователи
                <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <p>
                  Кураторов:
                </p>
                <h3>
                  %number%
                </h3>
              </div>
              <div class="icon">
                <i class="small glyphicon glyphicon-pencil"></i>
              </div>
              <a href="#" class="small-box-footer">
                Кураторы
                <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <p>
                  Администраторов:
                </p>
                <h3>
                  %number%
                </h3>
              </div>
              <div class="icon">
                <i class="small glyphicon glyphicon-eye-open"></i>
              </div>
              <a href="#" class="small-box-footer">
                Администраторы
                <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <p>
                  СМС отправлено:
                </p>
                <h3>
                  %number%
                </h3>
              </div>
              <div class="icon">
                <i class="small glyphicon glyphicon-send"></i>
              </div>
              <a href="#" class="small-box-footer">
                СМС-уведомления
                <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- top row -->
          <div class="row">
            <div class="col-xs-12 connectedSortable">
              <hr>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">

              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Написать</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <div class="box-body">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </form>
                </div>
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="sendEmail">Отправить
                    <i class="fa fa-arrow-circle-right"></i>
                  </button>
                </div>
              </div>

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
              <!-- Map box -->
              <div class="box box-primary">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">

                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Карта
                  </h3>
                </div>
                <div class="box-body no-padding">
                  <div id="world-map" style="height: 300px;">

                    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=Z7HuRPBypOWftUZb2CoyslmxuaBobc3l&amp;">
                    </script>

                  </div>
                  <div class="table-responsive">

                  </div>
                </div>
                <!-- /.box-body-->
                <div class="box-footer">

                  <a class="btn btn-info" href="files/it_mgppu_map.pdf">
                    <i class="glyphicon glyphicon-download-alt"></i>
                    <span>Скачать как PDF</span>
                  </a>

                </div>
              </div>
              <!-- /.box -->



              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">To Do List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <input type="checkbox" value="" name="">
                      <!-- todo text -->
                      <span class="text">Подключить скрипты-обработчики</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger">
                        <i class="fa fa-clock-o"></i>1 день</small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Сделать ЛК</span>
                      <small class="label label-info">
                        <i class="fa fa-clock-o"></i>1 день</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Написать тексты защиты</span>
                      <small class="label label-warning">
                        <i class="fa fa-clock-o"></i>5 дней</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Навести лоск</span>
                      <small class="label label-success">
                        <i class="fa fa-clock-o"></i>5 дней</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="" name="">
                      <span class="text">Защититься и сдать</span>
                      <small class="label label-default">
                        <i class="fa fa-clock-o"></i>27 мая</small>
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->

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