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

  echo "I get param1 = ".$_POST['id']." and param2 = ".$_POST['value'];

  $id = $_POST['id'];
  $id = addslashes($id);
  $id = htmlspecialchars($id);
  $id = stripslashes($id);
  $id = mysql_real_escape_string($id);

  $code = explode("-", $id);
  $table = $code[0]; //table
  $id = $code[1]; // id
  $column = $code[2]; // column

  $value = $_POST['value'];
  $value = addslashes($value);
//  $value = htmlspecialchars($value);
  $value = stripslashes($value);
  $value = mysql_real_escape_string($value);

  $result = mysql_query("UPDATE $table SET $column='$value' WHERE id='$id' ");

  if($result == true){
    echo 0; //Ваше сообшение успешно отправлено
    }

    else{
      echo 1; //Сообщение не отправлено. Ошибка базы данных
    }

?>