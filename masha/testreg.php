<!--���� � ��������� ���������� ������ � ������ -->
<?php 
session_start();// ��� ��������� �������� �� �������. ������ � ��� �������� ������ ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� � ����� ������ ���������!!!

if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //������� ��������� ������������� email � ���������� $email, ���� �� ������, �� ���������� ����������
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($email) or empty($password)) //���� ������������ �� ���� email ��� ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, �������� ����� � ��������� ��� ����!");
}
//���� email � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
$email = stripslashes($email);
$email = htmlspecialchars($email);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//������� ������ �������
$email = trim($email);
$password = trim($password);


// ������������ � ����
include ("bd.php");



$result = mysql_query("SELECT * FROM reg WHERE email='$email'",$db); //��������� �� ���� ��� ������ � ������������ � ��������� email
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
//���� ������������ � ��������� email �� ����������
exit ("��������, �������� ���� email ��� ������ ��������.");
}
else {
//���� ����������, �� ������� ������
          if ($myrow['password']==$password) {
          //���� ������ ���������, �� ��������� ������������ ������
          $_SESSION['email']=$myrow['email']; 
          $_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
          echo "�� ������� ����� �� ����! <a href='test4.php'>������� ��������</a>";
          }

       else {
       //���� ������ �� �������
       exit ("��������, �������� ���� ����� ��� ������ ��������.");
	   }
}
?>