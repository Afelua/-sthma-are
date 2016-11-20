<?php
if($_GET['login'] AND $_GET['pass']) {
  require_once("medicine/constants.php");
  require_once("medicine/base.php");

  $query_text = "SELECT * FROM $table_patient WHERE login = ".$_GET['login']." AND pass=".$_GET['pass'];
  $query = mysql_query($query_text);
  if(!$query){
    echo "<p class='text'>Выбор подчинённых терминов. Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query) > 0){
    $row = mysql_fetch_array($query);
    $code = "200";
    $message = "ACCESS";
    $result = 'true';
    $id = $row['id'];
    $arr = array('code' => $code, 'message' => $message, 'result' => $result, 'id' => $id);
    echo json_encode($arr);
  }
  else{
    $code = "200";
    $message = "LOGIN AND|OR PASSWORD ARE INCORRECT";
    $result = "false";
    $arr = array('code' => $code, 'message' => $message, 'result' => $result);
    echo json_encode($arr);
  }
}
else{
  $code = "100";
  $message = "QUERY IS EMPTY";
  $query_id = "null";
  $arr = array('code' => $code, 'message' => $message);
  echo json_encode($arr);
}
?>