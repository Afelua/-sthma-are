<?php
if($_GET['fname'] AND $_GET['name'] AND $_GET['sname'] AND $_GET['sex'] AND $_GET['growth'] AND $_GET['b_date'] AND $_GET['login'] AND $_GET['pass']) {
  require_once("medicine/constants.php");
  require_once("medicine/base.php");
//  require_once("functions.php");
  $query_text = "INSERT INTO $table_patient (fname, name, sname, sex, growth, b_date, login, pass) VALUES ('".$_GET['fname']."', '".$_GET['name']."', '".$_GET['sname']."', '".$_GET['sex']."', '".$_GET['growth']."', '".$_GET['b_date']."', '".$_GET['login']."', '".$_GET['pass']."')";
  $query = mysql_query($query_text);
  $query_id = mysql_insert_id();

  if(!$query){
    $code = "100";
    $message = "error";
    echo("{\"code\": \"".$code."\", \"message\": \"".$message."\", \"id\": \"".$query_id."\"}" );
  }
  else{
    $code = "200";
    $message = "access";
    echo("{\"code\": \"".$code."\", \"message\": \"".$message."\", \"id\": \"".$query_id."\"}" );
  }
}
?>