<!--
http://localhost/a_site/002_pages/001_custom_page/encyclopedia_edit/0_skew.php?table=1_9_organs&id=___&id_prev=___
-->
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
  $table = $_GET['table'];
  $query_text2 = "SELECT * FROM $table WHERE id=".$_GET['id_prev'];
  $query2 = mysql_query($query_text2);
  if(!$query2){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query2) > 0){
    $row2 = mysql_fetch_array($query2);
  }

  $query_text1 = "SELECT * FROM $table WHERE id=".$_GET['id'];
  $query1 = mysql_query($query_text1);
  if(!$query1){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query1) > 0){
    $row1 = mysql_fetch_array($query1);
  }
  echo "Перемещаемый узел<br />";
  echo "left_key = ".$row1['left_key']."<br />";
  echo "right_key = ".$row1['right_key']."<br />";
  echo "level = ".$row1['level_int']."<br />";
  echo "====<br />";

  echo "level = ".$row2['right_key']."<br />";

// Перемещаемый узел
$right_key = $row1['right_key'];            // Правый ключ перемещаемого узла
$left_key = $row1['left_key'];              // Левый ключ перемещаемого узла
$level = $row1['level_int'];                    // Уровень перемещаемого узла

// Новый родительский узел
//$level_up = $_GET['lev_par_new'];    // Уровень нового родительского узла
$level_up = $row2['level_int'] - 1;
// Новый соседний узел выше (левее)
$right_key_near = $row2['right_key']; // Правый ключ соседнего узла, который будет(!) выше (левее). Тот, перед которым будет расположен перемещаемый узел.

// Смещение ключей и узлов
$skew_arr = $right_key_near - $left_key; // Определение направления смещения по дереву (>0 - вперед; <0 - назад)

$skew_level = $level_up - $level + 1;           // Смещение уровня изменяемого узла
$skew_tree = $right_key - $left_key + 1;        // Смещение ключей дерева
                                                                                // Сортировка в пределах узла (Перемещение узла происходит без изменения уровня в том же родительсокм узле)
if($skew_arr < 0){
  $skew_edit = $right_key_near - $left_key + 1;   // Смещение ключей редактируемого узла
  $query_skew = mysql_query("
    UPDATE $table
    SET right_key = IF(left_key >= $left_key, right_key + $skew_edit, IF(right_key < $left_key, right_key + $skew_tree, right_key)),
    level_int = IF(left_key >= $left_key, level_int + $skew_level, level_int),
    left_key = IF(left_key >= $left_key, left_key + $skew_edit, IF(left_key > $right_key_near, left_key + $skew_tree, left_key))
    WHERE right_key > $right_key_near AND left_key < $right_key
  ");
}
elseif($skew_arr > 0){
  $skew_edit = $right_key_near - $left_key + 1 - $skew_tree;   // Смещение ключей редактируемого узла
  $query_skew = mysql_query("
    UPDATE $table
    SET left_key = IF(right_key <= $right_key, left_key + $skew_edit, IF(left_key > $right_key, left_key - $skew_tree, left_key)),
    level_int = IF(right_key <= $right_key, level_int + $skew_level, level_int),
    right_key = IF(right_key <= $right_key, right_key + $skew_edit, IF(right_key <= $right_key_near, right_key - $skew_tree, right_key))
    WHERE right_key > $left_key AND left_key <= $right_key_near
  ");
}





?>

</body>

</html>
