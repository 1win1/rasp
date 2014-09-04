<html>

<head>
 <meta charset="utf-8">
  <title>Расписание | МГППУ</title>
  
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">


  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  
   <link href="assets/css/bootstrap-select.css" rel="stylesheet">
  
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/scripts.js"></script>
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.js"></script>
  <script type="text/javascript" src="assets/js/jquery.tabify.js"></script>
  <script type="text/javascript" src="assets/js/jqBootstrapValidation.js"></script>
  
 
  <script src="assets/js/bootstrap-select.js"></script>
  <link href="assets/css/datepicker.css" rel="stylesheet">
  <link href="assets/css/datepicker3.css" rel="stylesheet">
  <script src="assets/js/bootstrap-datepicker.js"></script>
  
  <link type="text/css" href="assets/css//jquery-ui-1.10.4.custom.css" rel="stylesheet" />
  <script src="assets/js/jquery-ui-i18n.js" type="text/javascript"></script>
	<script>
		$(function(){

						$.datepicker.setDefaults(
						$.extend($.datepicker.regional["ru"])
						);
						
						// Datepicker
						$('#datepicker').datepicker({
								altField:'#actualDate'
						});
						
						 $(document).ready(function() {
			$("#button").button();
		  });
					});
	</script>	
  
 <style type="text/css">
  html, body {
    height: 100%;
}
    body {
        padding-top: 0px;
        padding-bottom: 0px;
		font-family: 'Roboto', sans-serif;
		background: url(images/type.png) repeat;
      }
	  
  </style>
</head>

<body>
<div class="container" style=" background-color: white; min-height: 100% ">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" >
  
  <div class="container">
      <div class="row">
      <div class="col-md-5">
        <div class="navbar navbar-default navbar-fixed-top">
          <style>
            .body{padding-top:70px}
          </style>
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand">Расписание МГППУ</a>
              <p class="navbar-text navbar-right hidden-xs">сделанное с любовью к ВУЗу
                <br>
              </p>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav navbar-right">
			  <a type="button" class="btn btn-default navbar-btn navbar-right" href="test4.html">Главная страница</a>
			  <li class="dropdown tasks-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-warning"></i>
				  <span class="label label-warning">!</span>
				</a>
				<ul class="dropdown-menu">
				  <li class="header size">Система находится на раннем этапе тестирования <span class="label label-warning">Возможны ошибки</span> </li>
				</ul>
				</li>
				
				<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <span>Профиль
					<i class="caret"></i>
				  </span>
				</a>
				<ul class="dropdown-menu" style="width:250px;">
				  <center>
				    <li class="user-header bg-light-blue size">
					<p>	Вы зашли как </p>
					</li>
              <li class="user-footer">
                <div class="pull-left" style="width:100%;">
                  <a href="" class="btn btn-default btn-flat" >Личный кабинет</a>
                </div>
              </li>
			  </center>
              </ul>
			  </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6"></div>
    </div>
  </div>
  <div class="container"  style=" background-color: white; min-height: 100%">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <hr>
      </div>
    </div>
    <div class="row clearfix">



    </div>
    <div class="row clearfix">
      <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12  column" id="block-selection"  >
	  <h1>	Посмотрите расписание</h1>
            <div class="tabbable well" id="tabs" style=" width:100%;  " >
              <ul class="nav nav-pills">
                <li class="nav-li active ">
                  <a href="#s1" data-toggle="tab">Расписание предметов</a>
                </li>
               <li class="nav-li">
                  <a href="#s2" data-toggle="tab">Расписание преподавателей</a>
                </li>
                <li class="nav-li">
                  <a href="#s3" data-toggle="tab">Расписание аудиторий</a>
                </li>
              </ul>
              <div class="tab-content" style=" background-color: white;" >
                <div class="tab-pane active" id="s1">
                  <div class="container">
                    <br>
                    <div>
					<div class="row clearfix">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 column" >
					
					<div class="row clearfix">
					<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 column" >
					<div class="container" id="faculty">
					 <label for="faculty">Укажите факультет</label>
      			  <select name=faculty id=faculty class="bootstrap-select" data-live-search="true" style="width:100%;">
				  <option value='' selected=selected > - Выберите факультет-</option>
					<optgroup label="Г">
					<option value=1>Государственное и муниципальное  управление</option>
					<optgroup label="Д">
					<option value=2>Дистанционное обучение</option>
					<optgroup label="И">
					<option value=3>Иностранные языки</option>
					<option value=4>Информационные технологии</option>
					<optgroup label="К">
					<option value=5>Консультативная и клиническая психология</option>
					<option value=6>Клиническая и специальная психология</option>
					<optgroup label="П">
					<option value=7>Психология образования </option>
					<optgroup label="С">
					<option value=8>Социальная педагогика</option>
					<option value=9>Социальная психология </option>
					<option value=10>Социальные коммуникации</option>
					<optgroup label="Э">
					<option value=11>Экстремальная психология</option>
					<optgroup label="Ю">
					<option value=12>Юридическая психология</option>
				  </select>
				  </div>
				  
				  <script>
					<script type='text/javascript'>
					var elems = document.getElementById("faculty").options;
				  var similar = function (A, B) {
					  for (var i = 0; i < B.length; i++)
							if (A.charAt(i) != B.charAt(i)) break;
							return i;
						};
						document.getElementById("faculty").onkeypress = function (event) {
							var max = 0;
							for (var i = 0; i < elems.length; i++) {
								var A = elems[i].innerHTML.replace(/^\s+|\s+$/g, "").toLowerCase(),
								B = (this.value + String.fromCharCode(event.keyCode)).toLowerCase();
								if (similar(A, B) > max)
									elems[i].selected = "selected", max = similar(A, B);
							}
						};
				</script>
			
				  
				 </div>
				
					<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 column" >
					<div class="container" id="group">
					<label for="group">№ Группы</label>
					<select name=group id=group class="bootstrap-select" data-live-search="true" style="width:100px; ">
					<option value='' selected=selected > - Группа-</option>
					<optgroup label="1">
					<option value=1>1.1</option>
					<option value=2>1.2</option>
					<option value=3>1.3</option>
					
					<optgroup label="2">
					
					<option value=4>2.1</option>
					<option value=5>2.2</option>
					<option value=6>2.3</option>
					<optgroup label="3">
					<option value=7>3.1</option>
					<option value=8>3.2</option>
					<option value=9>3.3</option>
					<option value=10>3.4</option>
					<option value=11>3.5</option>
					<optgroup label="4">
					<option value=12>4.1</option>
					<option value=13>4.2</option>
					<option value=14>4.3</option>
				  </select>
				</div>
				</div>
				
				
			</div>
					<br>
					
					<div class="table">

                        <label for="from">с:</label>
                        <input type="text" id="dpd1" name="from" class="textfield"> 
                        <label for="to">до:</label>
                        <input type="text" id="dpd2" name="to" class="textfield/">

                      </div>
				
                      <button class="btn btn-primary" style="height: 40px; width:100%;" type="submit">Посмотреть расписание</button> <br><br>
					<button class="btn btn-primary" style="height: 40px; width:100%;" type="submit">Расписание на сегодня</button>

                    </div>
					<script>
                        var nowTemp = new Date();
                        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                        	
                        var checkin = $('#dpd1').datepicker({
                          onRender: function(date) {
                            return date.valueOf() < now.valueOf() ? 'disabled' : '';
                          }
                        }).on('changeDate', function(ev) {
                          if (ev.date.valueOf() > checkout.date.valueOf()) {
                            var newDate = new Date(ev.date)
                            newDate.setDate(newDate.getDate() + 1);
                            checkout.setValue(newDate);
                          }
                          checkin.hide();
                          $('#dpd2')[0].focus();
                        }).data('datepicker');
                        var checkout = $('#dpd2').datepicker({
                          onRender: function(date) {
                            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                          }
                        }).on('changeDate', function(ev) {
						  $(this).datepicker('hide');
						});
                      </script>
                   				
					</div>
                  </div>
				  </div>
				  <br>
                </div>
					
                      
                <div class="tab-pane" id="s2">
                  <div class="container">
                    <br>
                    <div>

                      <div>
                        <label for="teacher">Преподаватель</label>
                        <select class="bootstrap-select" title="Пожалуйста, выберете преподавателя" name="teacher" id="teacher" data-live-search="true">
						
						</select>
                      </div>
                      <br>

                      <div class="table">
                        <label for="from">с:</label>
                        <input type="text" id="dpd3" name="from" class="textfield">
                        <label for="to">до:</label>
                        <input type="text" id="dpd4" name="to" class="textfield/">
                      </div>
                      <button class="btn btn-primary" style="height: 40px;width:100%;" type="submit">Посмотреть расписание</button><br><br>
					<button class="btn btn-primary" style="height: 40px;width:100%;" type="submit">Расписание на сегодня</button>
                      <script>
                        var nowTemp = new Date();
                        		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                        		 
                        		var checkin = $('#dpd3').datepicker({
                        		  onRender: function(date) {
                        			return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        		  }
                        		}).on('changeDate', function(ev) {
                        		  if (ev.date.valueOf() > checkout.date.valueOf()) {
                        			var newDate = new Date(ev.date)
                        			newDate.setDate(newDate.getDate() + 1);
                        			checkout.setValue(newDate);
                        		  }
                        		  checkin.hide();
                        		  $('#dpd4')[0].focus();
                        		}).data('datepicker');
                        		var checkout = $('#dpd4').datepicker({
                        		  onRender: function(date) {
                        			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                        		  }
                        		}).on('changeDate', function(ev) {
								  $(this).datepicker('hide');
								});
                      </script>
					  <script>
					<script type='text/javascript'>
					var elems = document.getElementById("teacher").options;
				  var similar = function (A, B) {
					  for (var i = 0; i < B.length; i++)
							if (A.charAt(i) != B.charAt(i)) break;
							return i;
						};
						document.getElementById("teacher").onkeypress = function (event) {
							var max = 0;
							for (var i = 0; i < elems.length; i++) {
								var A = elems[i].innerHTML.replace(/^\s+|\s+$/g, "").toLowerCase(),
								B = (this.value + String.fromCharCode(event.keyCode)).toLowerCase();
								if (similar(A, B) > max)
									elems[i].selected = "selected", max = similar(A, B);
							}
						};
				</script>
                    </div>
                  </div>
				  <br>
                </div>


                <div class="tab-pane" id="s3">
                  <div class="container">
                    <br>
                    <div>
                      <div>
                        <label for="class">Номер аудитории</label>
                        <select class="bootstrap-select" title="Пожалуйста, выберете аудиторию" name="class" id="class" data-live-search="true" style="width:130px; "></select>
                      </div>
                      <br>
                      <div class="table">
                        <label for="from">с:</label>
                        <input type="text" id="dpd5" name="from" class="input-medium search-query">
                        <label for="to">до:</label>
                        <input type="text" id="dpd6" name="to" class="input-medium search-query">
                      </div>

                    <button class="btn btn-primary" style="height: 40px;width:100%;" type="submit">Посмотреть расписание</button> <br> <br>
					<button class="btn btn-primary" style="height: 40px;width:100%;" type="submit">Расписание на сегодня</button>
                      <script>
                        var nowTemp = new Date();
                        		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                        		 
                        		var checkin = $('#dpd5').datepicker({
                        		  onRender: function(date) {
                        			return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        		  }
                        		}).on('changeDate', function(ev) {
                        		  if (ev.date.valueOf() > checkout.date.valueOf()) {
                        			var newDate = new Date(ev.date)
                        			newDate.setDate(newDate.getDate() + 1);
                        			checkout.setValue(newDate);
                        		  }
                        		  checkin.hide();
                        		  $('#dpd6')[0].focus();
                        		}).data('datepicker');
                        		var checkout = $('#dpd6').datepicker({
                        		  onRender: function(date) {
                        			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                        		  }
                        		}).on('changeDate', function(ev) {
                        		  checkout.hide();
                        		}).data('datepicker');
                      </script>
					  <script>
					
					var elems = document.getElementById("class").options;
				  var similar = function (A, B) {
					  for (var i = 0; i < B.length; i++)
							if (A.charAt(i) != B.charAt(i)) break;
							return i;
						};
						document.getElementById("class").onkeypress = function (event) {
							var max = 0;
							for (var i = 0; i < elems.length; i++) {
								var A = elems[i].innerHTML.replace(/^\s+|\s+$/g, "").toLowerCase(),
								B = (this.value + String.fromCharCode(event.keyCode)).toLowerCase();
								if (similar(A, B) > max)
									elems[i].selected = "selected", max = similar(A, B);
							}
						};
				</script>
                    </div>
                  </div>
                </div>
				<br>
              </div>
            </div>
		</div>
      
     <!-- ниже панель мобильного расписания -->
	 
	 
	 

      <!-- ниже панель логина -->

      <div class="col-md-3 col-lg-3 column visible-lg visible-md">
        <h1 class="text-left">Авторизация</h1>
        <form class="form-horizontal well" action=""  role="form" method="POST">
          <div class="form-group">
            
            <div class="col-sm-12">
              <input class="form-control" id="email" name="email" type="email" placeholder="Ваш E-mail">
            </div>
          </div>
          <div class="form-group">
            
            <div class="col-sm-12">
              <input class="form-control" id="password" type="password" name="password" placeholder="Ваш пароль">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-0 col-sm-10">
              <div class="checkbox">
                <label style="font-size:14px;">
                  <input type="checkbox" checked id="remember" value="remember" name="remember">Запомнить меня</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
              <center><button type="submit" name="submit" value="Войти" class="btn btn-primary btn-block btn-default">Вход</button> <br>
			  <center><a href="register.html">Регистрация</a></center></center>
            </div>
          </div>
	        </form>
        </div>
		
		 <?php
			
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

    mysql_connect("localhost","maria","marythewebmaster");

    mysql_select_db("rasp_db");


    if(isset($_POST['submit']))

    {

        # Вытаскиваем из БД запись, у которой email равняеться введенному

        $query = mysql_query("SELECT id, password FROM reg WHERE email='".mysql_real_escape_string($_POST['email'])."' LIMIT 1");

        $data = mysql_fetch_assoc($query);

        

        # Соавниваем пароли

        //debug-block
        echo "<hr>";
        echo "password <br>";
        echo $password;
        echo "<br> POST password <br>";
        echo $_POST['password'];
        echo "<br> MD5:";
        echo md5(md5($_POST['password']));
        echo "<hr>";
        //debug-block end


        if($data['password'] === md5(md5($_POST['password'])))

        {

            # Генерируем случайное число и шифруем его

            $hash = md5(generateCode(10));

         
            # Записываем в БД новый хеш авторизации и IP

            mysql_query("UPDATE reg SET hash='".$hash."' ".$insip." WHERE id='".$data['id']."'");

            
            # Ставим куки

            setcookie("id", $data['id'], time()+60*60*24*30);

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

      <!-- выше панель логина -->

      <!-- ниже панель мобильного логина -->
		
      <div class="col-xs-12 col-sm-6 column hidden-lg">
        <h1 class="text-left">Авторизация</h1>
        <form class="form-horizontal well" role="form" method="POST">
          <div class="form-group">

            <div class="col-sm-12">
              <input class="form-control" id="email" type="email" placeholder="Ваш E-mail">
            </div>
          </div>
          <div class="form-group">

            <div class="col-sm-12">
              <input class="form-control" id="password" type="password" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-0 col-sm-10">
              <div class="checkbox">
                <label style="font-size:12px;">
                  <input type="checkbox" name="remember">Запомнить меня</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-0 col-sm-10">
			<div class="row">
			<div class="col-sm-5 col-xs-5">
             <button type="submit" class="btn btn-primary btn-block btn-default">Вход</button> 
			
            </div>
			<div class="col-sm-5 col-xs-5">
            
			<a href="register.html">Регистрация</a></center>
            </div>
          </div>
		  </div>
		  </div>
        </form>

        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <strong>Мобильная версия!</strong>Включился блок мобильного логина для маленьких экранов
          <a href="#" class="alert-link">alert link</a>
        </div>

      </div>
      <!-- выше панель мобильного логина -->

    </div>


    <br>
   <!-- datepicker-->
 
	 
	<div class="row clearfix">
		<div class="col-md-9 column" style = "width=100%; overflow: auto;">
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							ЭТО
						</th>
						<th>
							ТАБЛИЦА
						</th>
						<th>
							С РАСПИСАНИЕМ
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							ПРЕМДЕТЫ
						</td>
						<td>
							АУДИТОРИИ
						</td>
						<td>
							ПРЕПОДАВАТЕЛИ
						</td>
					</tr>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr>
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr>
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr>
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3 column">
			<div class="alert alert-dismissable alert-danger">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					ВНИМАНИЕ!
				</h4> <strong>В расписании есть изменения!</strong><a href="#" class="alert-link"></a>
			</div>
			<div class="alert alert-success alert-dismissable">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					На следующую неделю изменений нет!
				</h4> <strong>пока что</strong><a href="#" class="alert-link"></a>
			</div>
			<div class="alert alert-dismissable alert-info">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					Последнее СМС-уведомление:
				</h4> <strong>Студенты группы 3.1 быть готовым к защите 27 мая!<br> - О.Ю.</strong><a href="#" class="alert-link"></a>
			</div>
		</div>
	</div>
	
    <div class="row clearfix">
   	<div class="col-md-10 column">
			<p class="text-left">
				Этот сайт <strong>с любовью делали</strong> студенты группы 3.1. Женя. Маша. <em>Гриша. Катя</em>. Паша. 
			</p>
		</div>
		<div class="col-md-2 column">
			 <address> <strong>Адрес факультета информационных технологий:</strong><br> 107143 г. Москва, Открытое шоссе, д. 24 стр. 27<br> Тел./факс: (499) 167-66-74<br> E-mail: dekanatitmgppu@mail.ru<br> Сайт: www.it.mgppu.ru</address>
		</div>
	   </div>
    </div>
  </div>
  
 </div>
  </div>
  





















</body>

</html>