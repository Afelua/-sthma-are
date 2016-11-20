<?php
  $table_prev = "human";
  $query_text_prev = "SELECT * FROM $table_prev WHERE next_id=".$_GET['code']." AND level_id=".$_GET['lev'];
  $query_prev = mysql_query($query_text_prev);

  if(!$query_prev)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_prev) > 0)
  {
    $row_prev = mysql_fetch_array($query_prev);
    echo "<h3>Предшественники:</h3>";
    echo "<div>";
    do {

      $table_node_prev = $row_prev['lev'];
      $query_text_node_prev = "SELECT * FROM $table_node_prev WHERE id=".$row_prev['prev_id'];
      $query_node_prev = mysql_query($query_text_node_prev);

      if(!$query_node_prev)
      {
        echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
        echo exit(mysql_error());
      }
      if (mysql_num_rows($query_node_prev) > 0)
      {
        $row_node_prev = mysql_fetch_array($query_node_prev);
        echo "<div>";
          echo "<a class=\"rusname".$_GET['lev']."\" href=\"".$page_name."?code=";
            echo $row_node_prev['id']."&";
            echo "lev=";
              echo $_GET['lev'];
              if(isset($_GET['ont'])){
                echo "&ont=";
                echo $_GET['ont'];
              }
              if(isset($_GET['tax'])){
                echo "&tax=";
                echo $_GET['tax'];
              }
            echo "\">";
            echo $row_node_prev['rusname'];
          echo "</a>";
        echo "</div>";
      }

    } while ($row_prev = mysql_fetch_array($query_prev));
    echo "</div>";
  }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#node_prev_load_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#node_prev_load_".$row_id['id']."_1\").load(\"".$loc_page."node_prev_load.php\",\n";
                echo "{ code_prev: \"".$table."-".$_GET['code']."-".$_GET['lev']."\" }\n";
              echo ");\n";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
echo "<div class =\"description\" id=\"node_prev_load_".$row_id['id']."_1\">";
  echo "<div class =\"description\" id=\"node_prev_load_".$row_id['id']."\">Добавить предшественник";
  echo "</div>";
echo "</div>";

?>