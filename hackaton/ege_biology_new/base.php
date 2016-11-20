<?php
$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Ошибка при соединении с базой данных");
mysql_set_charset(DB_CHARSET, $connection);
mysql_select_db(DB_NAME, $connection) or die("Невозможно выбрать БД ");
if (!$connection || !mysql_select_db(DB_NAME, $connection)){exit (mysql_error());}

$table_users = "users";    //Пользователи
$table_menu = "menu";      //Главное меню сайта
$table = "ege_biology";
$table_img = "ege_biology_img";      //Изображения
$table_ = "";
?>