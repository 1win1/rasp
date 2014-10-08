<?php require 'check.php'; ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Расписание МГППУ | Редактор расписания</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<!-- DataTables Shi~ -->
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
		<link rel="stylesheet" type="text/css" href="css/shCore.css">
		<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
		<link rel="stylesheet" type="text/css" href="css/selectize.bootstrap3.css">			
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css">

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
          <li>
            <a href="index.php">
              <i class="glyphicon glyphicon-home"></i>
              <span>Главная страница</span>
            </a>
          </li>
          <li class="active">
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


        <div class="row">
          <div class="col-xs-12 connectedSortable">
            <h1 class="text-center text-info">
              Выбор факультета Курса и Группы для изменения расписания
            </h1>
            <hr>
          </div>
          <!-- /.col -->
        </div>
<script type="text/javascript" language="javascript" class="init">

var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	$("#parapapapa").hide() 
	$( "#button2" ).click(function() {
	$( "#parapapapa" ).hide( 0, function() {
	})});
	$( "#button" ).click(function() {
	$( "#parapapapa" ).hide( 0, function() {
	});
	$( "#parapapapa" ).show( 0, function() {
	});	
	editor = new $.fn.dataTable.Editor( {
		ajax: {
			url: "join.php", 
			type: 'POST'
			},
		table: "#example",
	    i18n: {		
			create: {
				button: "Создать",
				title:  "Создать новую запись",
				submit: "Создать"
			},
			edit: {
				button: "Редактировать",
				title:  "Изменить запись",
				submit: "Обновить"
			},
			remove: {
				button: "Удалить",
				title:  "Удалить",
				submit: "Удалить",
            confirm: {
                _: "Вы уверены, что хотите удалить %d записей?",
                1: "Вы уверены, что хотите удалить 1 запись?"
            }
        },
			error: {
				system: "Произошла ошибка, обратитесь к системному администратору"
			}
		},	
		fields: [ {
				label: "Номер пары:",
				name: "rasp.id_lesson",
				type: "select",
                ipOpts: [
                    { label: "1",  value: "1" },
                    { label: "2",  value: "2" },
                    { label: "3",  value: "3" },
                    { label: "4",  value: "4" },
                    { label: "5",  value: "5" }
                ]				
			}, {
				label: "Название предмета:",
				name: "rasp.id_title",
				type: "select",
			}, {
				label: "Аудитория:",
				name: "rasp.id_room",
				type: "select"					
			}, {
				label: "Преподаватель:",
				name: "rasp.id_lecturer",
				type: "select"
			}
			, {
				name: "rasp.id_group",
				type: "hidden",
				def: $("#group-selector").val()
			},	{
				name: "rasp.id_department",
				type: "hidden",
				def: $("#faculty-selector").val()
			},  {
				name: "rasp.day_of_week",
				type: "hidden",
				def: $("#days-selector").val()

			},	{
				name: "rasp.parity",
				type: "hidden",
				def: $("#parity-selector").val()
			}		
		]

		} );

		editor.on( 'submitComplete', function () {
		$('#example').DataTable().ajax.reload();
		});


		$('#example').dataTable( {
	    "processing": true,
		fnServerParams: function ( aoData ) {
			aoData.push({ 	"name": "g",
							"value": $("#group-selector").val()
						});
			aoData.push({			
							"name": "d",
							"value": $("#faculty-selector").val()
						});
			aoData.push({			
							"name": "w",
							"value": $("#days-selector").val()
						});
			aoData.push({			
							"name": "p",
							"value": $("#parity-selector").val()
						});						
		},
		language: {
        url: 'http://cdn.datatables.net/plug-ins/28e7751dbec/i18n/Russian.json'
		},
		dom: "Tfrtip",
		ajax: {
			url: "join.php", 
			type: 'POST'
			},
		columns: [
			{ data: "rasp.id_lesson" },
			{ data: "titles.title" },
			{ data: "rooms.room" },
			{ data: "lecturers.fullname" }
		],
		tableTools: {
			sRowSelect: "os",
			aButtons: [
				{ sExtends: "editor_create", editor: editor },
				{ sExtends: "editor_edit",   editor: editor },
				{ sExtends: "editor_remove", editor: editor }
			]
		},
		bDestroy: true,
		initComplete: function ( settings, json ) {
			// Populate the site select list with the data available in the
			// database on load
			editor.field( 'rasp.id_room' ).update( json.rooms );
			editor.field( 'rasp.id_lecturer' ).update( json.lecturers );
			editor.field( 'rasp.id_title' ).update( json.titles );



		}
	} );
} );
	});


	</script>	


</head>

<body class="dt-example">
					 <?php
					include("sql.php");
					$sql4 = "SELECT * FROM `departments` ";
					$result4 = mysql_query($sql4) or die("Couldn't connect to the database!");
					$sql5 = "SELECT * FROM `group`";
					$result5 = mysql_query($sql5) or die("Couldn't connect to the database!");
					$selected="";
					$forma="
      			 <select name=faculty id=faculty-selector class='bootstrap-select' data-live-search='true' style='width:100%'>
				  <option value='' selected=selected > - Укажите факультет- </option>";
					while ($row4 = mysql_fetch_assoc($result4))
					{
					$forma .= "<option  ".$selected." value=".$row4['id_department'].">".$row4['department']."</option>";
					$selected="";
					};
					$forma .="
				  </select>
					<select name=group id=group-selector class='bootstrap-select' data-live-search='true' style='width:100% '>
					<option value='' selected=selected > - Укажите группу- </option>";
					 while ($row5 = mysql_fetch_assoc($result5))
					{
					$forma .= "<option ".$selected." value='".$row5['id_group']."' >".$row5['name_group']."</option>";
					$selected="";
					};
					$forma .="
				</select>";
				
				echo "$forma";
				?>	
      			 <select name=days id=days-selector class='bootstrap-select' data-live-search='true' style='width:100%'>
				  <option value='' selected=selected > - Укажите день- </option>
				  <option   value=1>Понедельник</option>
				  <option   value=2>Вторник</option>
				  <option   value=3>Среда</option>
				  <option   value=4>Четверг</option>
				  <option   value=5>Пятница</option>
				  <option   value=6>Суббота</option>
				  </select>
      			 <select name=parity id=parity-selector class='bootstrap-select' data-live-search='true' style='width:100%'>
				  <option value='' selected=selected > - Укажите четность недели- </option>
				  <option   value=1>Четная</option>
				  <option   value=2>Нечетная</option>
				  </select>	
			  
				  
 <input type="button" value="Открыть " id="button" class="btn btn-default btn-lg"><input type="button" value="Закрыть" id="button2" class="btn btn-default btn-lg"> 
		
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- timechart -->
            
			<div id="parapapapa" class="jumbotron">
				<section>
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Номер пары</th>
							<th>Название предмета</th>
							<th>Аудитория</th>
							<th>Преподаватель</th>
						</tr>
					</thead>
					</table>

				</section>
			</div>	
	
            <!-- / timechart -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

      </section>
    </aside>
  </div>

  <!-- /.content -->

  <!-- /.right-side -->

  <!-- ./wrapper -->

  <!-- add new calendar event modal -->


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
  <!-- DataTables Shi~ -->
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.editor.js"></script>
  <script type="text/javascript" language="javascript" src="js/shCore.js"></script>
  <script type="text/javascript" language="javascript" src="js/rasp.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/selectize.min.js"></script>	  
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<script>
$('#faculty-selector').selectize();
$('#group-selector').selectize();
$('#days-selector').selectize();	
$('#parity-selector').selectize();
</script>

</body>

</html>