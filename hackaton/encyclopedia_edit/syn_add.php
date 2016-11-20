<?php
include($custom_page.$loc_page."base.php");

$table_syn  = $_POST['table_syn'];
$table_syn  = addslashes($table_syn );
$table_syn  = htmlspecialchars($table_syn );
$table_syn  = stripslashes($table_syn );
$table_syn  = mysql_real_escape_string($table_syn );

$term_id_syn  = $_POST['term_id_syn'];
$term_id_syn  = addslashes($term_id_syn );
$term_id_syn  = htmlspecialchars($term_id_syn );
$term_id_syn  = stripslashes($term_id_syn );
$term_id_syn  = mysql_real_escape_string($term_id_syn );

$synonym_rus_new  = $_POST['synonym_rus_new'];
$synonym_rus_new  = addslashes($synonym_rus_new );
$synonym_rus_new  = htmlspecialchars($synonym_rus_new );
$synonym_rus_new  = stripslashes($synonym_rus_new );
$synonym_rus_new  = mysql_real_escape_string($synonym_rus_new );

$synonym_lat_new  = $_POST['synonym_lat_new'];
$synonym_lat_new  = addslashes($synonym_lat_new );
$synonym_lat_new  = htmlspecialchars($synonym_lat_new );
$synonym_lat_new  = stripslashes($synonym_lat_new );
$synonym_lat_new  = mysql_real_escape_string($synonym_lat_new );

$synonym_eng_new  = $_POST['synonym_eng_new'];
$synonym_eng_new  = addslashes($synonym_eng_new );
$synonym_eng_new  = htmlspecialchars($synonym_eng_new );
$synonym_eng_new  = stripslashes($synonym_eng_new );
$synonym_eng_new  = mysql_real_escape_string($synonym_eng_new );

$result = mysql_query("INSERT INTO $table_syn (rusname, latname, engname, term_id) VALUES ('$synonym_rus_new', '$synonym_lat_new', '$synonym_eng_new', '$term_id_syn') ");

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