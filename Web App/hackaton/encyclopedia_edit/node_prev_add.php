<?php
include($custom_page.$loc_page."base.php");

$term_id = $_POST['term_id'];
$term_id = addslashes($term_id);
$term_id = htmlspecialchars($term_id);
$term_id = stripslashes($term_id);
$term_id = mysql_real_escape_string($term_id);

$level_id = $_POST['level_id'];
$level_id = addslashes($level_id);
$level_id = htmlspecialchars($level_id);
$level_id = stripslashes($level_id);
$level_id = mysql_real_escape_string($level_id);

$term_prev_id = $_POST['term_prev_id'];
$term_prev_id = addslashes($term_prev_id);
$term_prev_id = htmlspecialchars($term_prev_id);
$term_prev_id = stripslashes($term_prev_id);
$term_prev_id = mysql_real_escape_string($term_prev_id);

$table_name = $_POST['table_name'];
$table_name = addslashes($table_name);
$table_name = htmlspecialchars($table_name);
$table_name = stripslashes($table_name);
$table_name = mysql_real_escape_string($table_name);

$table_prev = "human";

$result = mysql_query("INSERT INTO $table_prev (lev, level_id, next_id, prev_id) VALUES ('$table_name', '$level_id', '$term_id', '$term_prev_id') ");

  if($result == true){
    echo 0; //Ваше сообшение успешно отправлено
  }
  else{
    echo 1; //Сообщение не отправлено. Ошибка базы данных
  }
/*  echo $table_syn."<br>";
  echo $term_id_syn."<br>";
  echo $synonym_rus_new."<br>";
  echo $synonym_lat_new."<br>";
  echo $synonym_eng_new."<br>";
*/
?>