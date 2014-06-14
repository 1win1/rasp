<?php 
	// заглавная страница для сайта ИС расписание с инклюдом всех основных частей в индексный файл
	//new_index.php 1.00 от 14 июня 2014 года

	include 'header.php';// Этот файл подключает часть отвечающую за навбар с заголовком и копками на нём
	include 'login.php';// Этот файл подключает часть отвечающую за панель авторизации и регистрации
	include 'select_rasp.php';// Этот файл подключает часть отвечающую за форму выбора типа расписания и диапазона чисел для просмотра
	include 'table.php';// Этот файл подключает часть отвечающую за показ таблицы с расписанием, выбранным в форме выше или за показ заглушки "выберите расписание", а также показывает ошибки выбора (этот функционал будет перенесён в саму форму выбора в последующих версиях)
	include 'notifications.php';// Этот файл подключает часть отвечающую за показ нотификаций для пользователя, таких как: изменения в расписании, последнии e-mail и sms уведомления
	include 'footer.php';// Этот файл подключает часть отвечающую за показ подвальной части страницы с копирайтами, аналитиками и частью для вывода адресов факультетов и других зданий

 ?>