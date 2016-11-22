<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Привет Мир!</title>
</head>

<body>

<?php
include_once('constants.php');
include_once('base.php');
$query_text = "SELECT * FROM $table_patient";

$query = mysql_query($query_text);
if(!$query){
  echo "<p class='text'>Выбор. Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
}
if (mysql_num_rows($query) > 0){
  $row = mysql_fetch_array($query);
    do {
      echo $row['id'];
    }while($row = mysql_fetch_array($query));
}
?>

</body>

</html>
