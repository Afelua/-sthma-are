<?php
  $host = 'localhost';
  $user = 'new';
  $pswd = '0000';
  $db = 'structure';
  $connection = mysql_connect($host, $user, $pswd) or die("Ошибка при соединении с базой данных");
  mysql_set_charset('utf8', $connection);
  mysql_select_db($db, $connection) or die("Невозможно выбрать БД ");
  if (!$connection || !mysql_select_db($db, $connection))
  {
    exit (mysql_error());
  }
?>