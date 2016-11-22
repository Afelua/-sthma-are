<?php
			echo "<div class=\"subpage_area\">\n";
				echo "<div class=\"span-16 notopmargin\">\n";
					echo "<h2 class=\"subpage_title colored\">Результаты поиска</h2>\n";
					echo "<p class=\"subpage_descr\"> по запросу: «<strong>".$_POST['search']."</strong>»</p>\n";
				echo "</div>\n";
				echo "<div class=\"right\">\n";
					echo "<form class=\"form-wrapper\" action=\"".PAGE_NAME."?div=1\" method=\"post\">\n";
						echo "<input type=\"text\" id=\"search\" name= \"search\" placeholder=\"Введите что-либо для поиска\" required />\n";
						echo "<input type=\"submit\" value=\"Поиск\" id=\"submit\" />\n";
					echo "</form>\n";
				echo "</div>\n";
			echo "</div>\n";

echo "<div class=\"span-16\">\n";
//==================постраничная навигация (начало) ============================
//==================постраничная навигация (конец) =============================

  $term = $_POST['search'];
  $query1 = mysql_query("SELECT * FROM $table WHERE rusname LIKE '%$term%' ".$_POST['srch_active']." AND srch = 1 ORDER BY $colon_name ASC LIMIT 50");
  if(!$query1){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query1) > 0){
    $row1 = mysql_fetch_array($query1);
		echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
		do {
			echo "<div class=\"span-16 notopmargin\">\n";
				echo "<h5 class=\"block_header\">\n";
					echo "<a  class=\"link\"href=\"".PAGE_NAME."?code=".$row1['id']."&div=1\">";
						echo $row1['rusname']."</a>";
						if($row1['code_ta2004'] != ""){
								echo " [";
								echo $row1['code_ta2004'];
								echo "]";
						}
				echo "</h5>\n";
			echo "</div>\n";
			echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
		} while ($row1 = mysql_fetch_array($query1));
  }

  $query2 = mysql_query("SELECT * FROM $table WHERE latname LIKE '%$term%' ".$_POST['srch_active']." AND srch = 1 ORDER BY $colon_name2 ASC");
  if(!$query2){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query2) > 0){
    $row2 = mysql_fetch_array($query2);
    echo "<h4>&nbsp;</h4>";
    echo "<h4>Синонимы</h4>";
		echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
    do {
			echo "<div class=\"span-16 notopmargin\">\n";
				echo "<h5 class=\"block_header\">\n";
					echo $row2['latname']." см. <a class=\"link em\" href=\"".PAGE_NAME."?code=".$row2['id']."&div=1\">";
						echo $row2['rusname']."</a>";
						if($row2['code_ta2004'] != ""){
								echo " [";
								echo $row2['code_ta2004'];
								echo "]";
						}
				echo "</h5>\n";
			echo "</div>\n";
			echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
    } while ($row2 = mysql_fetch_array($query2));
  }
	if(mysql_num_rows($query1) == 0 AND mysql_num_rows($query2) == 0){
		echo "<div class=\"span-16 notopmargin\">\n";
		echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
			echo "<h5 class=\"block_header\">По запросу «<strong>";
			echo $term;
			echo "</strong>» ничего не найдено. Пожалуйста, уточните запрос.";
		echo "</h5></div>\n";
		echo "<div class=\"separator_dash span-16 notopmargin\"></div>\n";
	}
echo "</div>\n";


?>