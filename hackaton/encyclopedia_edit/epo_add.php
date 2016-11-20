<?php
include($custom_page.$loc_page."base.php");

$table_epo  = $_POST['table_epo'];
$table_epo  = addslashes($table_epo );
$table_epo  = htmlspecialchars($table_epo );
$table_epo  = stripslashes($table_epo );
$table_epo  = mysql_real_escape_string($table_epo );

$term_id_epo  = $_POST['term_id_epo'];
$term_id_epo  = addslashes($term_id_epo );
$term_id_epo  = htmlspecialchars($term_id_epo );
$term_id_epo  = stripslashes($term_id_epo );
$term_id_epo  = mysql_real_escape_string($term_id_epo );

$eponym_rus_new  = $_POST['eponym_rus_new'];
$eponym_rus_new  = addslashes($eponym_rus_new );
$eponym_rus_new  = htmlspecialchars($eponym_rus_new );
$eponym_rus_new  = stripslashes($eponym_rus_new );
$eponym_rus_new  = mysql_real_escape_string($eponym_rus_new );

$eponym_lat_new  = $_POST['eponym_lat_new'];
$eponym_lat_new  = addslashes($eponym_lat_new );
$eponym_lat_new  = htmlspecialchars($eponym_lat_new );
$eponym_lat_new  = stripslashes($eponym_lat_new );
$eponym_lat_new  = mysql_real_escape_string($eponym_lat_new );

$eponym_eng_new  = $_POST['eponym_eng_new'];
$eponym_eng_new  = addslashes($eponym_eng_new );
$eponym_eng_new  = htmlspecialchars($eponym_eng_new );
$eponym_eng_new  = stripslashes($eponym_eng_new );
$eponym_eng_new  = mysql_real_escape_string($eponym_eng_new );

$result = mysql_query("INSERT INTO $table_epo (rusname, latname, engname, term_id) VALUES ('$eponym_rus_new', '$eponym_lat_new', '$eponym_eng_new', '$term_id_epo') ");

  if($result == true){
    echo 0; //Ваше сообшение успешно отправлено
  }
  else{
    echo 1; //Сообщение не отправлено. Ошибка базы данных
  }
/*  echo $table_epo."<br>";
  echo $term_id_epo."<br>";
  echo $eponym_rus_new."<br>";
  echo $eponym_lat_new."<br>";
  echo $eponym_eng_new."<br>";
*/
?>