<?php
  $table_syn = $table."_syn";
  $query_text_syn = "SELECT * FROM $table_syn WHERE term_id=".$_GET['code'];
  $query_syn = mysql_query($query_text_syn);

  if(!$query_syn)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_syn) > 0)
  {
    $row_syn = mysql_fetch_array($query_syn);
    echo "<h3>Синонимы:</h3>";
    echo "<ol>";
    do {
      echo "<li><div>";
        echo "<p>Рус: ";
          if ($row_syn['rusname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-rusname\">".$row_syn['rusname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-rusname\">&#8212;</span>";
          }
        echo "</p>";
        echo "<p>Лат: ";
          if ($row_syn['latname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-latname\">".$row_syn['latname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-latname\">&#8212;</span>";
          }
        echo "</p>";
        echo "<p>Англ: ";
          if ($row_syn['engname'] !== ""){
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-engname\">".$row_syn['engname']."</span>";
          }
          else {
            echo "<span class =\"description\" id=\"".$table_syn."-".$row_syn['id']."-engname\">&#8212;</span>";
          }
        echo "</p>";
      echo "</div></li>";
    } while ($row_syn = mysql_fetch_array($query_syn));
    echo "</ol>";
  }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#load_syn_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#load_syn_".$row_id['id']."_1\").load(\"".$loc_page."syn_load.php\",\n";
                echo "{ code_syn: \"".$table_syn."-".$_GET['code']."\" }\n";
              echo ");\n";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
echo "<div class =\"description\" id=\"load_syn_".$row_id['id']."_1\">";
  echo "<div class =\"description\" id=\"load_syn_".$row_id['id']."\">Добавить синоним";
  echo "</div>";
echo "</div>";
?>