<?php
  $table_next = "human";
  $query_text_next = "SELECT * FROM $table_next WHERE prev_id=".$_GET['code']." AND level_id=".$_GET['lev'];
  $query_next = mysql_query($query_text_next);

  if(!$query_next)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_next) > 0)
  {
    $row_next = mysql_fetch_array($query_next);
    echo "<h3>Последователи:</h3>";
    echo "<div>";
    do {

      $table_node_next = $row_next['lev'];
      $query_text_node_next = "SELECT * FROM $table_node_next WHERE id=".$row_next['next_id'];
      $query_node_next = mysql_query($query_text_node_next);

      if(!$query_node_next)
      {
        echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
        echo exit(mysql_error());
      }
      if (mysql_num_rows($query_node_next) > 0)
      {
        $row_node_next = mysql_fetch_array($query_node_next);
        echo "<div>";
          echo "<a class=\"rusname".$_GET['lev']."\" href=\"".$page_name."?code=";
            echo $row_node_next['id']."&";
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
            echo $row_node_next['rusname'];
          echo "</a>";
        echo "</div>";
      }

    } while ($row_next = mysql_fetch_array($query_next));
    echo "</div>";
  }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#node_next_load_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#node_next_load_".$row_id['id']."_1\").load(\"".$loc_page."node_next_load.php\",\n";
                echo "{ code_next: \"".$table."-".$_GET['code']."-".$_GET['lev']."\" }\n";
              echo ");\n";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
echo "<div class =\"description\" id=\"node_next_load_".$row_id['id']."_1\">";
  echo "<div class =\"description\" id=\"node_next_load_".$row_id['id']."\">Добавить последователь";
  echo "</div>";
echo "</div>";

?>