<?php
  $table_syn = $table."_syn";
  $query_text_syn = "SELECT * FROM $table_syn WHERE term_id=".TERMIN_ID." ORDER BY nom_id ASC";
  $query_syn = mysql_query($query_text_syn);

  if(!$query_syn)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_syn) > 0){
    $row_syn = mysql_fetch_array($query_syn);
    echo "<div class=\"side_bar_widget\">\n";
      echo "<h4 class=\"colored\">Синонимы</h4>\n";
      echo "<ul class=\"navigation-sidebar\">\n";
        do {
          echo "<li>";
            switch ($row_syn['nom_id']){
              case 1: echo "<h5><span class=\"colored bold\">BNA</span> | Базельская номенклатура</h5>\n"; break;
              case 2: echo "<h5><span class=\"colored bold\">JNA</span> | Йенская номенклатура</h5>\n"; break;
              case 3: echo "<h5><span class=\"colored bold\">PNA</span> | Парижская номенклатура</h5>\n"; break;
            }

            if ($row_syn['rusname'] !== "") echo "<p class=\"syn\"><span class =\"bold\">Рус:</span> <a href=\"#\">".$row_syn['rusname']."</a></p>";
            if ($row_syn['latname'] !== "") echo "<p class=\"syn\"><span class =\"bold\">Лат:</span> <a href=\"#\">".$row_syn['latname']."</a></p>";
            if ($row_syn['engname'] !== "") echo "<p class=\"syn\"><span class =\"bold\">Англ:</span> <a href=\"#\">".$row_syn['engname']."</a></p>";
          echo "</li>";
        } while ($row_syn = mysql_fetch_array($query_syn));
      echo "</ul>\n";
    echo "</div>\n";
  }
//  else echo "Синонимов не найдено";
?>