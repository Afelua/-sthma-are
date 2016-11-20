<?php
//начало========== Запрос 1 "Выбор всех узлов узлов" ================================
if(isset($_GET['code'])){
  $code = $_GET['code'];
  $query_text_id_img = "SELECT * FROM $table WHERE id=$code";
  $query_id_img = mysql_query($query_text_id_img);

  if(!$query_id_img)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_id_img) > 0)
  {
    $row_id_img = mysql_fetch_array($query_id_img);
  }
  $right_key = $row_id_img['right_key'];
  $left_key = $row_id_img['left_key'];
  $level_int_id = $row_id_img['level_int'];
//======Подчиненные
  $query_text_img = "SELECT * FROM $table WHERE $colon_left_key >= $left_key AND $colon_right_key <= $right_key";
  $query_img = mysql_query($query_text_img);

    if(!$query_img)
    {
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query_img) > 0)
    {
      $row_img = mysql_fetch_array($query_img);
    }

//===== начало
$row_img_own = $row_img['img'];
  $row_img_own_s = explode(".", $row_img_own);
  $i=0;
//  print $row_img_own;
  if($row_img_own !== ""){
    while (isset($row_img_own_s[$i])){
      $row_img_alls = $row_img_own_s[$i];
      $query_img = "SELECT * FROM img_1_9_organs WHERE id = $row_img_alls ";
      $query_img_ = mysql_query($query_img);

        if(!$query_img_)
        {
          echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
          echo exit(mysql_error());
        }
        if (mysql_num_rows($query_img_) > 0)
        {
          $row_img = mysql_fetch_array($query_img_);
        }
      echo "<a rel=\"group\" title=\"".$row_img['rusname']."\" href=\"".$images."structure/hs-lev09/".$row_img['file'].".jpg\"><img src=\"".$images."structure/hs-lev09-min/".$row_img['file']."-min.jpg\" alt=\"\" /></a>";
      $i=$i+1;
    };
  }

//===== конец
  echo "<div><a target=\"_blank\" href=\"".$loc_page."0_table.php?tbl=".$table."&id=".$_GET['code']."\">Таблица</a></div>";
  echo "<div><a target=\"_blank\" href=\"zzz/ins_anatom/edit_anatom.php?tbl=".$table."&id=".$_GET['code']."\">Таблица. Редактирование</a></div>";
  echo "<div><a target=\"_blank\" href=\"zzz/ins_anatom/sort.php?tbl=".$table."&id=".$_GET['code']."\">Таблица. Сортировка</a></div>";
  echo "<div><a target=\"_blank\" href=\"zzz/ins_anatom/control.php?tbl=".$table."\">Таблица. Проверка</a></div>";
  echo "<div><h3><a target=\"_blank\" href=\"zzz/ins_anatom/sort.php?tbl=test&id=".$_GET['code']."\">Тест. Сортировка</a></h3></div>";
}

echo "<script type=\"text/javascript\">\n";
echo "\$(function(){\n";
echo "  function formatTitle(title, currentArray, currentIndex, currentOpts) {\n";
echo "    return '<div id=\"tip-title\"><span><a href=\"javascript:;\" onclick=\"\$.fancybox.close();\"><img src=\"".$css."img/closelabel.gif\" /></a></span>' + (title && title.length ? '<strong>' + title + '</strong>' : '' ) + 'Изображение ' + (currentIndex + 1) + ' из ' + currentArray.length + '</div>';\n";
echo "  }\n";
echo "  \$(\"a[rel='group']\").fancybox({\n";
echo "    \"showCloseButton\": false,\n";
echo "    \"titlePosition\" : \"inside\",\n";
echo "    \"titleFormat\": formatTitle\n";
echo "  });\n";
echo "});\n";
echo "</script>\n";


?>
