<!--���������� � �� ������ ������������ -->
<?php
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //������� ��������� ������������� email � ���������� $email, ���� �� ������, �� ���������� ����������
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
// � �� �� ����� �����������
if (isset($_POST['firstname'])) { $firstname=$_POST['firstname']; if ($firstname =='') { unset($firstname);} }
if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
if (isset($_POST['number'])) { $number=$_POST['number']; if ($number =='') { unset($number);} }
if (isset($_POST['faculty'])) { $faculty=$_POST['faculty']; if ($faculty =='') { unset($faculty);} }
if (isset($_POST['group'])) { $group=$_POST['group']; if ($group =='') { unset($group);} }

if (empty($email) or empty($password) or empty($firstname) or empty($lastname) or empty($faculty) or empty($group)) //���� ������������ �� ���� ������ ������, �� ������ ������ � ������������� ������
{
exit ("�� ����� �� ��� ����������, �������� ����� � ��������� ��� ����!");
}
//���� ������ ������ �������,�� ������������ ��
$email = stripslashes($email);
$email = htmlspecialchars($email);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$firstname = stripslashes($firstname);
$firstname = htmlspecialchars($firstname);

$lastname = stripslashes($lastname);
$lastname = htmlspecialchars($lastname);

$number = stripslashes($number);
$number = htmlspecialchars($number);

$faculty = stripslashes($faculty);
$faculty = htmlspecialchars($faculty);

$group = stripslashes($group);
$group = htmlspecialchars($group);

//������� ������ �������
$email = trim($email);
$password = trim($password);
$firstname = trim($firstname);
$lastname = trim($lastname);
$number = trim($number);
$faculty = trim($faculty);
$group = trim($group);


// ������������ � ����
include ("bd.php");

// �������� �� ������������� ������������ � ����� �� email
$result = mysql_query("SELECT id FROM reg WHERE email='$email'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("��������, �������� ���� email ��� ���������������. ������� ������ email.");
}

// ���� ������ ���, �� ��������� ������
$result2 = mysql_query ("INSERT INTO reg (email,password,firstname,lastname,number,faculty,group) VALUES('$email','$password','$firstname','$lastname','$number','$faculty','$group')");
// ���������, ���� �� ������
if ($result2=='TRUE')
{
echo "�� ������� ����������������! ������ �� ������ ����� �� ����. <a href='test4.php'>������� ��������</a>";
}

else {
echo "������! �� �� ����������������.";
     }
?>