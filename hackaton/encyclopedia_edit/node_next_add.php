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

$term_next_id = $_POST['term_next_id'];
$term_next_id = addslashes($term_next_id);
$term_next_id = htmlspecialchars($term_next_id);
$term_next_id = stripslashes($term_next_id);
$term_next_id = mysql_real_escape_string($term_next_id);

$table_name = $_POST['table_name'];
$table_name = addslashes($table_name);
$table_name = htmlspecialchars($table_name);
$table_name = stripslashes($table_name);
$table_name = mysql_real_escape_string($table_name);

$table_next = "human";

$result = mysql_query("INSERT INTO $table_next (lev, level_id, prev_id, next_id) VALUES ('$table_name', '$level_id', '$term_id','$term_next_id') ");

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