<html>

<head>
 <meta charset="utf-8">
  <title>Расписание | МГППУ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="twitter-bootstrap-v2\docs\assets\css\bootstrap-responsive.css" rel="stylesheet">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  
   <link href="assets/css/bootstrap-select.css" rel="stylesheet">
  
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/scripts.js"></script>
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.js"></script>
  <script type="text/javascript" src="assets/js/jquery.tabify.js"></script>
  <script type="text/javascript" src="assets/js/jqBootstrapValidation.js"></script>  
  <script type="text/javascript" src="assets/js/validator.js.js"></script>
  <script type="text/javascript" src="assets/js/jquery.maskedinput.js"></script>
  
 
  <script src="assets/js/bootstrap-select.js"></script>
  <link href="assets/css/datepicker.css" rel="stylesheet">
  <link href="assets/css/datepicker3.css" rel="stylesheet">
  <script src="assets/js/bootstrap-datepicker.js"></script>
  
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

  <?php
    // Скрипт регистрации пользователя register.php
    //тестовая версия v.1
    // Страница регситрации нового пользователя


    # Соединямся с БД

     //надо заменить на include connect.php
	mysql_connect("localhost","maria","marythewebmaster");

    mysql_select_db("rasp_db");



    if(isset($_POST['submit']))

    {

        $err = array();


             

        # проверяем, не сущестует ли пользователя с таким email

        $query = mysql_query("SELECT COUNT(id) FROM reg WHERE email='".mysql_real_escape_string($_POST['email'])."'");

        if(mysql_result($query, 0) > 0)

        {

            $err[] = "Пользователь с таким email уже существует в базе данных";

        }

        

        # Если нет ошибок, то добавляем в БД нового пользователя

        if(count($err) == 0)

        {

            
            $email = $_POST['email'];
			
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $number = $_POST['number'];
            $faculty = $_POST['faculty'];
            $group = $_POST['group'];
			

            

            # Убераем лишние пробелы и делаем двойное шифрование

            $password = md5(md5(trim($_POST['password'])));

            

            mysql_query("INSERT INTO reg SET email='".$email."', password='".$password."', firstname='".$firstname."', lastname='".$lastname."', number='".$number."', faculty='".$faculty."', group='".$group."'");
			
            header("Location: test4.php");
			exit();

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
                <li>
                  <a href="#">Link</a>
                </li>
                <li>
                  <a href="#">Link</a>
                </li>
              </ul>
              <a type="button" class="btn btn-default navbar-btn navbar-right" href="test4.php">Главная страница</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" >
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
        <hr>
      </div>
    </div>
    <div class="row clearfix">
    <h1>Регистрация</h1>
		 <div class="container">

		<form class="form-horizontal" method="post" data-toggle="validator">
		<fieldset>
		
		<div class="control-group">
		<!-- First name -->
		<label class="control-label" for="firstname">Имя</label>
		<div class="controls">
		<input type="text" id="firstname" name="firstname" placeholder="например: Иван" class="controls" style="width:200px;"  required="" />
		
		</div>
		</div>
		
		<div class="control-group">
		<!-- Last name -->
		<label class="control-label" for="lastname">Фамилия</label>
		<div class="controls">
		<input type="text" id="lastname" name="lastname" placeholder="например: Иванов" class="controls"  style="width:200px;" required="" aria-invalid="false" />
		
		</div>
		</div>
		
		<div class="control-group">
		<!-- E-mail -->
		<label class="control-label" for="email">E-mail</label>
		<div class="controls">
		<input type="email" id="email" name="email" placeholder="например: srud@mail.ru" class="controls" style="width:200px;" required="" aria-invalid="false"/>
		<p class="help-block">Укажите действующий E-mail для входа в систему</p>
		</div>
		</div>
			
		<div class="control-group">
		<!-- Number -->
		<label class="control-label" for="number">Номер мобильного телефона</label>
		<div class="controls">
		<input type="text" id="number" name="number" placeholder="например: 89098087766" class="input-xlarge" style="width:200px;"/>
		<p class="help-block">Укажите Ваш номер телефона, если хотите получать СМС-рассылку</p>
		</div>
		</div>
		
		<script>
		jQuery(function($){
		 	$("#number").mask("89999999999");
		});
		</script>
		
		<div class="control-group">
		<!-- Faculty  -->
		<label class="control-label" for="faculty">Факультет</label>
		<div class="controls">
		<select name=faculty id=faculty class="bootstrap-select controls" data-live-search="true" style="width:auto;" required="" aria-invalid="false" >
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
		</div>
		
		<div class="control-group">
		<!-- group-->
		<label class="control-label" for="group">№ Группы</label>
		<div class="controls">
		<input type="text" id="group" name="group" placeholder="например: 3.1" class="controls" required="" aria-invalid="false" />
		
		</div>
		</div>
		
		<div class="control-group">
		<!-- Password-->
		<label class="control-label" for="password" >Пароль</label>
		<div class="controls">
		<input type="password" id="password" name="password" placeholder="" class="controls" type="password" style="width:200px;" required="" aria-invalid="false" />
		
		</div>
		</div>
		
		<div class="control-group">
		<!-- Password -->
		<label class="control-label" for="password_confirm">Повтор пароля</label>
		<div class="controls">
		<input type="password" id="password_confirm" name="password_confirm" class="controls" placeholder=""  type="password"  style="width:200px;" required="" aria-invalid="false" data-validation-matches-match="password"
data-validation-matches-message="Пароли не совпадают" />
		<p class="help-block">Пожалуйста,повторите пароль</p>
		</div>
		</div>
		
			

		</div>
		
	<br>	
	
		<div class="control-group">
		<div class="controls">
		<button class="btn  btn-primary  btn-default" type="submit" name="submit" value="Зарегистрироваться" style="width:40%;">Регистрация</button>
		</div>
		</div>
		
		</fieldset>
		</form> 
		</div>
    </div>
	
<!--Указываем,какие поля мы хотим проверять на валидность -->
	<script> 
	  $ ( function  ()  { $ ( "input,select,textarea" ). not ( "[type=submit]" ). jqBootstrapValidation ();  }  ); 
	</script>
<!--Проверка на заполненность -->	
	
	
    </div>


    <br>
	
	
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
   