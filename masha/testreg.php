<!--файл с проверкой введенного логина и пароля -->
<?php 
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!

if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($email) or empty($password)) //если пользователь не ввел email или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
//если email и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$email = stripslashes($email);
$email = htmlspecialchars($email);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$email = trim($email);
$password = trim($password);


// подключаемся к базе
include ("bd.php");



$result = mysql_query("SELECT * FROM reg WHERE email='$email'",$db); //извлекаем из базы все данные о пользователе с введенным email
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
//если пользователя с введенным email не существует
exit ("Извините, введённый вами email или пароль неверный.");
}
else {
//если существует, то сверяем пароли
          if ($myrow['password']==$password) {
          //если пароли совпадают, то запускаем пользователю сессию
          $_SESSION['email']=$myrow['email']; 
          $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
          echo "Вы успешно вошли на сайт! <a href='test4.php'>Главная страница</a>";
          }

       else {
       //если пароли не сошлись
       exit ("Извините, введённый вами логин или пароль неверный.");
	   }
}
?>