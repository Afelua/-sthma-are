<?php
include($custom_page.$loc_page."base.php");

$termin_rus_new = $_POST['termin_rus_new'];
$termin_rus_new = addslashes($termin_rus_new);
$termin_rus_new = htmlspecialchars($termin_rus_new);
$termin_rus_new = stripslashes($termin_rus_new);
$termin_rus_new = mysql_real_escape_string($termin_rus_new);

$termin_lat_new = $_POST['termin_lat_new'];
$termin_lat_new = addslashes($termin_lat_new);
$termin_lat_new = htmlspecialchars($termin_lat_new);
$termin_lat_new = stripslashes($termin_lat_new);
$termin_lat_new = mysql_real_escape_string($termin_lat_new);

$termin_eng_new = $_POST['termin_eng_new'];
$termin_eng_new = addslashes($termin_eng_new);
$termin_eng_new = htmlspecialchars($termin_eng_new);
$termin_eng_new = stripslashes($termin_eng_new);
$termin_eng_new = mysql_real_escape_string($termin_eng_new);

$termin_description_new = $_POST['termin_description_new'];
$termin_description_new = addslashes($termin_description_new);
$termin_description_new = htmlspecialchars($termin_description_new);
$termin_description_new = stripslashes($termin_description_new);
$termin_description_new = mysql_real_escape_string($termin_description_new);

$termin_taxon_new = $_POST['termin_taxon_new'];
$termin_taxon_new = addslashes($termin_taxon_new);
$termin_taxon_new = htmlspecialchars($termin_taxon_new);
$termin_taxon_new = stripslashes($termin_taxon_new);
$termin_taxon_new = mysql_real_escape_string($termin_taxon_new);

$termin_start_new = $_POST['termin_start_new'];
$termin_start_new = addslashes($termin_start_new);
$termin_start_new = htmlspecialchars($termin_start_new);
$termin_start_new = stripslashes($termin_start_new);
$termin_start_new = mysql_real_escape_string($termin_start_new);

$termin_finish_new = $_POST['termin_finish_new'];
$termin_finish_new = addslashes($termin_finish_new);
$termin_finish_new = htmlspecialchars($termin_finish_new);
$termin_finish_new = stripslashes($termin_finish_new);
$termin_finish_new = mysql_real_escape_string($termin_finish_new);

$termin_sex_new = $_POST['termin_sex_new'];
$termin_sex_new = addslashes($termin_sex_new);
$termin_sex_new = htmlspecialchars($termin_sex_new);
$termin_sex_new = stripslashes($termin_sex_new);
$termin_sex_new = mysql_real_escape_string($termin_sex_new);

$termin_learn_new = $_POST['termin_learn_new'];
$termin_learn_new = addslashes($termin_learn_new);
$termin_learn_new = htmlspecialchars($termin_learn_new);
$termin_learn_new = stripslashes($termin_learn_new);
$termin_learn_new = mysql_real_escape_string($termin_learn_new);

$parent_table = $_POST['parent_table'];
$parent_table = addslashes($parent_table);
$parent_table = htmlspecialchars($parent_table);
$parent_table = stripslashes($parent_table);
$parent_table = mysql_real_escape_string($parent_table);

$parent_level = $_POST['parent_level'];
$parent_level = addslashes($parent_level);
$parent_level = htmlspecialchars($parent_level);
$parent_level = stripslashes($parent_level);
$parent_level = mysql_real_escape_string($parent_level);

$parent_left_key = $_POST['parent_left_key'];
$parent_left_key = addslashes($parent_left_key);
$parent_left_key = htmlspecialchars($parent_left_key);
$parent_left_key = stripslashes($parent_left_key);
$parent_left_key = mysql_real_escape_string($parent_left_key);

$parent_right_key = $_POST['parent_right_key'];
$parent_right_key = addslashes($parent_right_key);
$parent_right_key = htmlspecialchars($parent_right_key);
$parent_right_key = stripslashes($parent_right_key);
$parent_right_key = mysql_real_escape_string($parent_right_key);

  $colon_id = "id";
  $colon_name = "latname";
  $colon_taxon = "taxon";        //Название столбца в таблице
  $colon_level = "level_int";    //Название столбца в таблице
  $colon_left_key = "left_key";  //Название столбца в таблице
  $colon_right_key = "right_key";//Название столбца в таблице

  $right_key = $parent_right_key + 1;
  $level = $parent_level + 1;

$result = mysql_query("INSERT INTO $parent_table ($colon_left_key, $colon_right_key, $colon_level, rusname, latname, engname, code_ta2004, sdate, fdate, sex, struct, taxon) VALUES ('$parent_right_key', '$right_key', '$level', '$termin_rus_new', '$termin_lat_new', '$termin_eng_new', '$termin_description_new', '$termin_start_new', '$termin_finish_new', '$termin_sex_new', '$termin_learn_new', '$termin_taxon_new') ");
if($result = TRUE){
  $result1 = mysql_query("UPDATE $parent_table SET $colon_left_key = $colon_left_key + 2, $colon_right_key = $colon_right_key + 2 WHERE $colon_left_key > $parent_right_key " );
  $result2 = mysql_query("UPDATE $parent_table SET $colon_right_key = $colon_right_key + 2 WHERE $colon_right_key >= $parent_right_key AND $colon_left_key < $parent_right_key " );
}

  if($result == true AND $result1 == true AND $result2 == true){
    echo 0; //Ваше сообшение успешно отправлено
  }
  else{
    echo 1; //Сообщение не отправлено. Ошибка базы данных
  }
?>