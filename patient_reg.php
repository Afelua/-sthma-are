<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Регистрация пациента в системе | Уход за Астмой</title>
</head>

<body>

<?php
if($_GET['fname'] AND $_GET['name'] AND $_GET['sname'] AND $_GET['sex'] AND $_GET['growth'] AND $_GET['b_date'] AND $_GET['login'] AND $_GET['pass']) {
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
  $query_text = "INSERT INTO $table_patient (fname, name, sname, sex, growth, b_date, login, pass) VALUES ('".$_GET['fname']."', '".$_GET['name']."', '".$_GET['sname']."', '".$_GET['sex']."', '".$_GET['growth']."', '".$_GET['b_date']."', '".$_GET['login']."', '".$_GET['pass']."')";
  $query = mysql_query($query_text);
    echo exit(mysql_error());
  if(!$query){echo "Запись не добавлена";}
  else{echo "Ура!";}
}
// fname=1&name=2&sname=3&bdate=4&login=5&password=6
?>
</body>

</html>
