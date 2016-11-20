<?php
include($custom_page.$loc_page."base.php");

$termin_table = $_POST['termin_table'];
$termin_table = addslashes($termin_table);
$termin_table = htmlspecialchars($termin_table);
$termin_table = stripslashes($termin_table);
$termin_table = mysql_real_escape_string($termin_table);

$termin_id = $_POST['termin_id'];
$termin_id = addslashes($termin_id);
$termin_id = htmlspecialchars($termin_id);
$termin_id = stripslashes($termin_id);
$termin_id = mysql_real_escape_string($termin_id);

$termin_level = $_POST['termin_level'];
$termin_level = addslashes($termin_level);
$termin_level = htmlspecialchars($termin_level);
$termin_level = stripslashes($termin_level);
$termin_level = mysql_real_escape_string($termin_level);

$termin_left_key = $_POST['termin_left_key'];
$termin_left_key = addslashes($termin_left_key);
$termin_left_key = htmlspecialchars($termin_left_key);
$termin_left_key = stripslashes($termin_left_key);
$left_key = mysql_real_escape_string($termin_left_key);

$termin_right_key = $_POST['termin_right_key'];
$termin_right_key = addslashes($termin_right_key);
$termin_right_key = htmlspecialchars($termin_right_key);
$termin_right_key = stripslashes($termin_right_key);
$right_key = mysql_real_escape_string($termin_right_key);

  $colon_id = "id";              //Название столбца в таблице
  $colon_level = "level_int";    //Название столбца в таблице
  $colon_left_key = "left_key";  //Название столбца в таблице
  $colon_right_key = "right_key";//Название столбца в таблице

$result = mysql_query("DELETE FROM $termin_table WHERE $colon_left_key >= $left_key AND $colon_right_key <= $right_key " );
$result1 = mysql_query("UPDATE $termin_table SET $colon_right_key = $colon_right_key - ($right_key - $left_key + 1) WHERE $colon_right_key > $right_key AND $colon_left_key < $left_key " );
$result2 = mysql_query("UPDATE $termin_table SET $colon_left_key = $colon_left_key - ($right_key - $left_key + 1), $colon_right_key = $colon_right_key - ($right_key - $left_key + 1) WHERE $colon_right_key > $right_key " );

  if($result == true AND $result1 == true AND $result2 == true){
    echo 0; //Ваше сообшение успешно отправлено
  }
  else{
    echo 1; //Сообщение не отправлено. Ошибка базы данных
  }
?>