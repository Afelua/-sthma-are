<?php

$colon_id = "id";
$colon_name = "rusname";
$colon_level = "level_int";
$colon_left_key = "left_key";
$colon_right_key = "right_key";
$table_menu = "menu_ege_biology";
$table = "ege_biology";


  echo "\n<ul id=\"menu\">";
		echo "\n  <li";
		  if((isset($_GET['div'])) AND ($_GET['div'] == 1)){ echo " class=\"active\" ";}
		echo ">";
         echo "<a href=\"".PAGE_NAME."?div=1\">Теория</a>";

	$search_div_1 = "SELECT * FROM $table WHERE $colon_level='1' ".TERMIN_ACTIVE." ORDER BY $colon_left_key ASC";
	$query_div_1 = mysql_query($search_div_1); // Здесь непосредственно происходит поиск

	if(!$query_div_1){
	  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
	  echo exit(mysql_error());
	  }
	if (mysql_num_rows($query_div_1) > 0){
    $row_div_1 = mysql_fetch_array($query_div_1);
      $menu_0 = 0;
			$row_div_1['url'] = "";
      $row_div_1['hyperlink'] = "";
       echo "\n        <ul>";
       do{
         $menu_0 = $menu_0 + 1;
			   echo "\n  <li>";
         echo "<a href=\"".PAGE_NAME."?div=1&lev=9&code=".$row_div_1['id']."\">".$row_div_1['rusname']."</a>";
       echo "\n          </li>";
       }
      while($row_div_1 = mysql_fetch_array($query_div_1));
      echo "\n        </ul>";
      unset($menu_0);
	}

//==========начало===Уровень 1==========================================
$left_key_1 = 0;
$right_key_1 = 1000000;
$search_query_1 = "SELECT * FROM $table_menu WHERE $colon_level='1' AND $colon_left_key>$left_key_1 AND $colon_right_key<$right_key_1 AND active = '1' ORDER BY $colon_left_key";
$query_1 = mysql_query($search_query_1); // Здесь непосредственно происходит поиск

if(!$query_1){
  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
  }
if (mysql_num_rows($query_1) > 0){
  $row_1 = mysql_fetch_array($query_1);
  $menu_1 = 0;

  do{
    $menu_1 = $menu_1 + 1;
    echo "\n  <li";
      if((isset($_GET['div'])) AND ($_GET['div'] == $row_1['div'])){ echo " class=\"active\" ";}
    echo ">";
    echo "<a href=\"".PAGE_NAME."?".$row_1['url'].$row_1['hyperlink']."\">".$row_1['rusname']."</a>";
//==========начало===Уровень 2==========================================
    $left_key_2 = $row_1['left_key'];
    $right_key_2 = $row_1['right_key'];
    $search_query_2 = "SELECT * FROM $table_menu WHERE $colon_level='2' AND $colon_left_key>$left_key_2 AND $colon_right_key<$right_key_2 AND active = '1' ORDER BY $colon_left_key";
    $query_2 = mysql_query($search_query_2); // Здесь непосредственно происходит поиск
    if(!$query_2){
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
      }
    if (mysql_num_rows($query_2) > 0){
      $row_2 = mysql_fetch_array($query_2);
      $menu_2 = 0;
      echo "\n    <ul>";
      do{
        $menu_2 = $menu_2 + 1;
        echo "\n      <li>";
        echo "<a href=\"".PAGE_NAME."?".$row_2['url'].$row_2['hyperlink']."\">".$row_2['rusname']."</a>";
//==========начало===Уровень 3==========================================
        $left_key_3 = $row_2['left_key'];
        $right_key_3 = $row_2['right_key'];
        $search_query_3 = "SELECT * FROM $table_menu WHERE $colon_level='3' AND $colon_left_key>$left_key_3 AND $colon_right_key<$right_key_3 AND active = '1' ORDER BY $colon_left_key";
        $query_3 = mysql_query($search_query_3); // Здесь непосредственно происходит поиск

        if(!$query_3){
          echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
          echo exit(mysql_error());
          }
        if (mysql_num_rows($query_3) > 0){
          $row_3 = mysql_fetch_array($query_3);
          $menu_3 = 0;
          echo "\n        <ul>";
          do{
            $menu_3 = $menu_3 + 1;
            echo "\n      <li>";
            echo "<a href=\"".PAGE_NAME."?".$row_3['url'].$row_3['hyperlink']."\">".$row_3['rusname']."</a>";
        echo "\n          </li>";
        }
      while($row_3 = mysql_fetch_array($query_3));
      echo "\n        </ul>";
      unset($menu_3);
      }
//==========конец====Уровень 3==========================================
      echo "\n      </li>";
      }
    while($row_2 = mysql_fetch_array($query_2));
    echo "\n    </ul>";
    unset($menu_2);
    }
//==========конец====Уровень 2==========================================
    echo "\n  </li>";
    }
  while($row_1 = mysql_fetch_array($query_1));
  unset($menu_1);
  }
//==========конец====Уровень 1==========================================
  echo "\n</ul>";
?>
