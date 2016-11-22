<?php
include("base.php");

  $id = $_POST['id'];
  $id = addslashes($id);
//  $id = htmlspecialchars($id);
  $id = stripslashes($id);
  $id = mysql_real_escape_string($id);

  $rusname = $_POST['rusname'];
  $rusname = addslashes($rusname);
//  $rusname = htmlspecialchars($rusname);
  $rusname = stripslashes($rusname);
  $rusname = mysql_real_escape_string($rusname);

  $latname = $_POST['latname'];
  $latname = addslashes($latname);
//  $latname = htmlspecialchars($latname);
  $latname = stripslashes($latname);
  $latname = mysql_real_escape_string($latname);

  $desctiption = $_POST['desctiption'];
  $desctiption = addslashes($desctiption);
//  $desctiption = htmlspecialchars($desctiption);
  $desctiption = stripslashes($desctiption);
  $desctiption = mysql_real_escape_string($desctiption);


  $result = mysql_query("UPDATE 1_9_organs SET rusname='$rusname', latname='$latname', desctiption='$desctiption' WHERE id='$id' ");
  echo $id;
  echo $rusname;
  echo $latname;
  echo $desctiption;
  if($result == true){
    echo 0; //Ваше сообшение успешно отправлено
    }

    else{
      echo 1; //Сообщение не отправлено. Ошибка базы данных
    }

?>
