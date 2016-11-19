<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Исследование пациента в системе - Пикфлоуметрия | Уход за Астмой</title>
</head>

<body>

<?php
if($_GET['patient_id'] AND $_GET['patient_weight'] AND $_GET['exam'] AND $_GET['datetime']) {
  require_once("constants.php");
  require_once("base.php");
//  require_once("functions.php");
  echo $_GET['fname'];
  echo $_GET['name'];
  echo $_GET['sname'];
  echo $_GET['sex'];
  echo $_GET['growth'];
  echo $_GET['b_date'];
  echo $_GET['login'];
  echo $_GET['pass'];
  $query_text = "INSERT INTO $table_examination (patient_id, patient_weight, result, time) VALUES ('".$_GET['patient_id']."', '".$_GET['patient_weight']."', '".$_GET['exam']."', '".$_GET['datetime']."');";
  $query = mysql_query($query_text);
    echo exit(mysql_error());
  if(!$query){echo "Запись не добавлена";}
  else{echo "Ура!";}
}
// fname=1&name=2&sname=3&bdate=4&login=5&password=6
?>
</body>

</html>
