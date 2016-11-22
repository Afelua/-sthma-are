<?php
  $table_family = "human";
  $query_text_family = "SELECT * FROM $table_family WHERE node_id=".$_GET['code']." AND level_id=".$_GET['lev']." AND prev_next = 'prev' ";
  $query_family = mysql_query($query_text_family);

  if(!$query_family)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_family) > 0)
  {
    $row_family = mysql_fetch_array($query_family);
    echo "<h3>Предшественники:</h3>";
    echo "<div>";
    do {

      $table_node_family = $row_family['lev'];
      $query_text_node_family = "SELECT * FROM $table_node_family WHERE id=".$row_family['link_node_id'];
      $query_node_family = mysql_query($query_text_node_family);

      if(!$query_node_family)
      {
        echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
        echo exit(mysql_error());
      }
      if (mysql_num_rows($query_node_family) > 0)
      {
        $row_node_family = mysql_fetch_array($query_node_family);
        echo "<div>";
          echo $row_node_family['rusname'];
        echo "</div>";
      }

    } while ($row_family = mysql_fetch_array($query_family));
    echo "</div>";
  }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#node_family_load_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#node_family_load_".$row_id['id']."_1\").load(\"".$loc_page."node_family_load.php\",\n";
                echo "{ code_syn: \"".$table."-".$_GET['code']."\" }\n";
              echo ");\n";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
echo "<div class =\"description\" id=\"node_family_load_".$row_id['id']."_1\">";
  echo "<div class =\"description\" id=\"node_family_load_".$row_id['id']."\">Добавить предшественник";
  echo "</div>";
echo "</div>";

?>