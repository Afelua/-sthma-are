<?php
  $table_epo = $table."_epo";
  $query_text_epo = "SELECT * FROM $table_epo WHERE term_id=".TERMIN_ID;
  $query_epo = mysql_query($query_text_epo);

  if(!$query_epo)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_epo) > 0){
    $row_epo = mysql_fetch_array($query_epo);
    echo "<div class=\"side_bar_widget\">\n";
      echo "<h4 class=\"colored\">Эпонимы</h4>\n";
      echo "<ul class=\"navigation-sidebar\">\n";
        do {
          echo "<li>";
            if ($row_epo['rusname'] !== "") echo "<p class=\"epo\">Рус: <a href=\"#\">".$row_epo['rusname']."</a></p>";
            if ($row_epo['latname'] !== "") echo "<p class=\"epo\">Лат: <a href=\"#\">".$row_epo['latname']."</a></p>";
            if ($row_epo['engname'] !== "") echo "<p class=\"epo\">Англ: <a href=\"#\">".$row_epo['engname']."</a></p>";
          echo "</li>";
        } while ($row_epo = mysql_fetch_array($query_epo));
     echo "</ul>\n";
    echo "</div>\n";
  }
//  else echo "Эпонимов не найдено";
?>