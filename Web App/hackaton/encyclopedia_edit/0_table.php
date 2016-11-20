<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Выбор id и level_int</title>
</head>

<body>

<?php
  $host = 'localhost';
  $user = 'new';
  $pswd = '0000';
  $db = 'structure';
  $connection = mysql_connect($host, $user, $pswd) or die("Ошибка при соединении с базой данных");
  mysql_set_charset('utf8', $connection);
  mysql_select_db($db, $connection) or die("Невозможно выбрать БД ");
  if (!$connection || !mysql_select_db($db, $connection)){
    exit (mysql_error());
  }
if(isset($_GET['tbl']) AND isset($_GET['id'])){
  $table = $_GET['tbl'];

  $query_text = "SELECT * FROM $table WHERE id=".$_GET['id'];
  $query = mysql_query($query_text);

    if(!$query){
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);

      $left_key = $row['left_key'];
      $right_key = $row['right_key'];
      $colon_left_key = "left_key";
      $colon_right_key = "right_key";

    $query_text = "SELECT * FROM $table ORDER BY $colon_left_key";
//    $query_text = "SELECT * FROM $table WHERE $colon_left_key >= $left_key AND $colon_right_key <= $right_key ORDER BY $colon_left_key";
//    $query_text = "UPDATE $table SET $colon_left_key = $colon_left_key - 4, $colon_right_key = $colon_right_key - 4 WHERE $colon_left_key > 15590";
    $query = mysql_query($query_text);

    if(!$query)
    {
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);
      if($row !== ""){
        echo "<table>";
        do {
          echo "<tr>";
/*            echo "<td>";
              echo $row['id'];
            echo "</td>";
*/            echo "<td>";
              if($row['code_ta2004'] == "") echo "";
              else echo $row['code_ta2004'];
            echo "</td>";
            echo "<td>";
              echo $row['level_int'];
            echo "</td>";
/*            echo "<td>";
              echo $row['left_key'];
            echo "</td>";
            echo "<td>";
              echo $row['right_key'];
            echo "</td>";
*/            echo "<td>";
              if($row['rusname'] == "") echo "";
              else echo $row['rusname'];
            echo "</td>";
            echo "<td>";
              if($row['latname'] == "") echo "";
              else echo $row['latname'];
            echo "</td>";
            echo "<td>";
              if($row['engname'] == "") echo "";
              else echo $row['engname'];
            echo "</td>";
            echo "<td>";
              if($row['description'] == "") echo "";
              else echo $row['description'];
            echo "</td>";
/*            echo "<td>";
              if($row['sdate'] == "") echo "";
              else echo $row['sdate'];
            echo "</td>";
            echo "<td>";
              if($row['fdate'] == "") echo "";
              else echo $row['fdate'];
            echo "</td>";

            echo "<td>";
            echo "</td>";
            echo "<td>";
              echo $row['img'];
            echo "</td>";
*/
          echo "</tr>";
        } while ($row = mysql_fetch_array($query));
        echo "</table>";
      }
    }
  }
}
?>

</body>

</html>
