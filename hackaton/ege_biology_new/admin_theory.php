<?php
$table_level = "1_0_levelrang";
$colon_id = "id";
$colon_name = "rusname";
$colon_name2 = "latname";
$colon_level = "level_int";
$colon_left_key = "left_key";
$colon_right_key = "right_key";
$colon_start_key = "sdate";
$colon_finish_key = "fdate";
$table = "ege_biology";
echo "<div class=\"container\">";

//начало========== Запрос 1 \"Выбор всех узлов узлов\" ================================

if(isset($_POST['search'])){
	include_once(RELPATH."content_1_srch.php");
}
elseif(TERMIN_ID != 0){
  $query_text_id = "SELECT * FROM $table WHERE id=".TERMIN_ID." ".TERMIN_ACTIVE." ORDER BY $colon_left_key";
  $query_id = mysql_query($query_text_id);

  if(!$query_id){
    echo "<p class='text'>Запрос 1 \"Выбор всех узлов узлов\". Поиск не осуществлен. +++Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_id) > 0){
    $row_id = mysql_fetch_array($query_id);
    $right_key = $row_id['right_key'];
    $left_key = $row_id['left_key'];
    $level_int_id = $row_id['level_int'];
    //====== начало Родительские (Меню)
    $query_text = "SELECT * FROM $table WHERE $colon_left_key < $left_key AND $colon_right_key > $right_key ".TERMIN_ACTIVE." ORDER BY $colon_left_key";
    $query = mysql_query($query_text);

    if(!$query){
      echo "<p class='text'>Родительское меню. Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);
      echo "<div id=\"subpage_area\" class=\"subpage_area\">\n";
        do {
          $level_int = $row['level_int'];
          echo "<a href=\"".PAGE_NAME."?code=";
            echo $row['id'];
            if(isset($_GET['div'])){
              echo "&div=";
              echo $_GET['div'];
            }
          echo "\"><span class=\"highlight-orange\">";
            if($row['rusname'] !== "") echo "".$row['rusname'].""; else echo $row['latname'];
          echo "</span></a> &#8658; ";
        } while ($row = mysql_fetch_array($query));
      echo "</div>\n";
		}
		//====== конец Родительские (Меню)
		include "content_1_termin.php";
	}
}
else{
    $query_text = "SELECT * FROM $table WHERE $colon_level = 1 ".TERMIN_ACTIVE." ORDER BY $colon_left_key";
    $query = mysql_query($query_text);

    if(!$query){
      echo "<p class='text'>Родительское меню. Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);
			echo "<div id=\"subpage_area\" class=\"subpage_area\">\n";
				echo "<div class=\"span-16 notopmargin\">\n";
					echo "<h2 class=\"subpage_title colored\">Теория</h2>\n";
		//			echo "<p class=\"subpage_descr\">: This is a custom page description.</p>\n";
				echo "</div>\n";
				echo "<div class=\"right\">\n";
					echo "<form class=\"form-wrapper\" action=\"".PAGE_NAME."?div=1\" method=\"post\">\n";
						echo "<input type=\"text\" id=\"search\" name= \"search\" placeholder=\"Введите что-либо для поиска\" required />\n";
						echo "<input id=\"srch_active\" type=\"hidden\" name=\"srch_active\" value=\"".TERMIN_ACTIVE."\">";
						echo "<input type=\"submit\" value=\"Поиск\" id=\"submit\" />\n";
					echo "</form>\n";
				echo "</div>\n";
			echo "</div>\n";
			echo "<div class=\"span-16 columns\">";
				echo "<div class=\"span-1-col notopmargin\">";
				echo "</div>";
			echo "</div>";
        echo "<div class=\"span-16 columns\">";
					echo "<table class=\"bordered\">";
						echo "<tr><th>Разделы ЕГЭ по биологии</th></tr>";
		        do {
		          echo "<tr><td><a class=\"link\" href=\"".PAGE_NAME."?code=";
		            echo $row['id'];
		            if(isset($_GET['div'])){
		              echo "&div=";
		              echo $_GET['div'];
		            }
								echo "\">";
									if($row['rusname'] !== "") echo "".$row['rusname'].""; else echo $row['latname'];
								echo "</a></td></tr>";
		        } while ($row = mysql_fetch_array($query));
					echo "</table>";
				echo "</div>";
    }

}
	echo "<div class=\"side_bar\">";


		if(TERMIN_ID != 0 AND mysql_num_rows($query_id) > 0){
//			include_once (RELPATH."content_1_syn.php");
//			include_once (RELPATH."content_1_epo.php");
			include_once (RELPATH."content_1_img.php");
		}
	echo "</div>\n";
	echo "</div>   <!--End main container-->\n";
echo "<div class=\"clear\"></div>";
?>