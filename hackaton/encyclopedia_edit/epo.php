<?php
  $table_epo = $table."_epo";
  $query_text_epo = "SELECT * FROM $table_epo WHERE term_id=".$_GET['code'];
  $query_epo = mysql_query($query_text_epo);

  if(!$query_epo)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_epo) > 0)
  {
    $row_epo = mysql_fetch_array($query_epo);
    echo "<h3>Эпонимы:</h3>";
    echo "<ol>";
    do {
      echo "<li><div>";
        echo "<p>Рус: ";
          if ($row_epo['rusname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-rusname\">".$row_epo['rusname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-rusname\">&#8212;</span>";
          }
        echo "</p>";
        echo "<p>Лат: ";
          if ($row_epo['latname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-latname\">".$row_epo['latname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-latname\">&#8212;</span>";
          }
        echo "</p>";
        echo "<p>Англ: ";
          if ($row_epo['engname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-engname\">".$row_epo['engname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_epo."-".$row_epo['id']."-engname\">&#8212;</span>";
          }
        echo "</p>";
      echo "</div></li>";
    } while ($row_epo = mysql_fetch_array($query_epo));
    echo "</ol>";
  }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#load_epo_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#load_epo_".$row_id['id']."_1\").load(\"".$loc_page."epo_load.php\",\n";
                echo "{ code_epo: \"".$table_epo."-".$_GET['code']."\" }\n";
              echo ");\n";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
echo "<div class =\"description\" id=\"load_epo_".$row_id['id']."_1\">";
  echo "<div class =\"description\" id=\"load_epo_".$row_id['id']."\">Добавить эпоним";
  echo "</div>";
echo "</div>";
?>