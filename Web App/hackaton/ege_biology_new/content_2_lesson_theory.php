<?php
		define('TERMIN_THEORY_ID', '1');
		define('TERMIN_THEORY_ACTIVE', '');
//if(TERMIN_THEORY_ID != 0){
  $query_text_id = "SELECT * FROM $table WHERE id=".$row_theory_id." ".TERMIN_THEORY_ACTIVE." ORDER BY $colon_left_key";
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
		$menutheory = $menutheory."<li><a href=\"#h-".$row_id['id']."\">".$row_id['rusname']."</a></li>\n";
		//======= начало Собственные

		$level_int = 1;
			echo "<div class=\"span-1-col notopmargin\">";
				echo "<div id=\"h-".$row_id['id']."\" class=\"span_1_col_h\">".$row_id['rusname']."</div>";
			echo "</div>\n";

		  echo "<div class=\"span-1-col\">\n";
		    echo "<span class=\"bold\"><span id=\"".$table."-".$row_id['id']."-rusname\" class=\"rusname\">";
		    if($row_id['rusname'] == "") echo "_____";
		    else echo $row_id['rusname'];
		    echo "</span></span>";
		    if($row_id['latname'] == NULL AND $row_id['description'] == NULL ){
		      if($row_id['engname'] != ""){echo " (<em>".$row_id['engname']."</em>)";}
		      echo ".";
		    }
		    elseif($row_id['description'] == NULL){
		      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname\">";
		      	echo $row_id['latname'];
		      echo "</span>";
					if($row_id['engname'] != ""){echo " (<em>".$row_id['engname']."</em>)";}
		      echo ".";
		    }
		    elseif($row_id['latname'] == NULL ){
		      echo " ";
					if($row_id['engname'] != ""){echo "(<em>".$row_id['engname']."</em>) ";}
		    }
		    else{
		      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname\">";
		      echo $row_id['latname'];
		      echo "</span>";
		      echo ", ";
					if($row_id['engname'] != ""){echo "(<em>".$row_id['engname']."</em>) ";}
		    }
		    echo_description_id();
		  echo "</div>"; //class=\"lev".$level_int."\"
		//======= конец Собственные
		//======= начало Подчиненные
		  $level_int_new = $row_id['level_int'] + $row_theory_level - 1;
		  $query_text = "SELECT * FROM $table WHERE $colon_left_key > $left_key AND $colon_right_key < $right_key AND $colon_level <= $level_int_new ".TERMIN_ACTIVE." ORDER BY $colon_left_key";

		$query = mysql_query($query_text);
		if(!$query){
		  echo "<p class='text'>Выбор подчинённых терминов. Поиск не осуществлен. Код ошибки:</p>";
		  echo exit(mysql_error());
		}
		if (mysql_num_rows($query) > 0){
		  $row = mysql_fetch_array($query);
		  if($row !== ""){
		    do {
		      $level_int = $row['level_int'] - $level_int_id + 1;
		      switch ($level_int){
		        case "2": echo "<div class=\"span-32-col\"></div><div class=\"span-2-col last\" id=\"head_lev_id_".$row['id']."\"><div class=\"span_2_col_h\">".$row['rusname']."</div>"; break;
		        case "3": echo "<div class=\"span-31-col\"></div><div class=\"span-3-col last\" id=\"head_lev_id_".$row['id']."\">"; break;
		        case "4": echo "<div class=\"span-30-col\"></div><div class=\"span-4-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "5": echo "<div class=\"span-29-col\"></div><div class=\"span-5-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "6": echo "<div class=\"span-28-col\"></div><div class=\"span-6-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "7": echo "<div class=\"span-27-col\"></div><div class=\"span-7-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "8": echo "<div class=\"span-26-col\"></div><div class=\"span-8-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "9": echo "<div class=\"span-25-col\"></div><div class=\"span-9-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "10": echo "<div class=\"span-24-col\"></div><div class=\"span-10-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "11": echo "<div class=\"span-23-col\"></div><div class=\"span-11-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "12": echo "<div class=\"span-22-col\"></div><div class=\"span-12-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "13": echo "<div class=\"span-21-col\"></div><div class=\"span-13-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "14": echo "<div class=\"span-19-col\"></div><div class=\"span-14-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "15": echo "<div class=\"span-18-col\"></div><div class=\"span-15-col last id=\"head_lev_id_".$row['id']."\">"; break;
		        case "16": echo "<div class=\"span-17-col\"></div><div class=\"span-16-col last id=\"head_lev_id_".$row['id']."\">"; break;
	/*		*/      }
		      echo "<div class=\"lev".$level_int."\">";
		        echo "<span class=\"rusname\">";
		        echo $row['rusname'];
		        echo "</span>";
		        if($row['rusname'] == NULL AND $row['latname'] == NULL AND $row['description'] == NULL){
		          echo "";
		        }
		        elseif($row['latname'] == NULL AND $row['description'] == NULL){
		          if($row['engname'] != ""){echo " (<em>".$row['engname']."</em>)";}
		          echo ".";
		        }
		        elseif($row['description'] == NULL){
		          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname\">";
		          echo $row['latname'];
		          echo "</span>";
		          if($row['engname'] != ""){echo ", (<em>".$row['engname']."</em>)";}
		          echo ".";
		        }
		        elseif($row['latname'] == NULL){
							if($row['engname'] != ""){echo " (<em>".$row['engname']."</em>)";}
		          echo " <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
		          echo "</span>";
		        }
		        else{
		          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname\">";
		          echo $row['latname'];
		          echo "</span>,";
							if($row['engname'] != ""){echo "( <em>".$row['engname']."</em>)";}
		          echo " <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
		          echo "</span>";
		        }
		          if($row['descr_morph'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_morph\" class=\"description\">".$row['descr_morph']."</div>";}
		          if($row['descr_structure'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_structure\" class=\"description\">".$row['descr_structure']."</div>";}
		          if($row['descr_start'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_start\" class=\"description\">".$row['descr_start']."</div>";}
		          if($row['descr_track'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_track\" class=\"description\">".$row['descr_track']."</div>";}
		          if($row['descr_finish'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_finish\" class=\"description\">".$row['descr_finish']."</div>";}
		          if($row['descr_function'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_function\" class=\"description\">".$row['descr_function']."</div>";}
		          if($row['descr_develop_from'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_develop_from\" class=\"description\">".$row['descr_develop_from']."</div>";}
		          if($row['descr_develop'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_develop\" class=\"description\">".$row['descr_develop']."</div>";}
		          if($row['descr_develop_to'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_develop_to\" class=\"description\">".$row['descr_develop_to']."</div>";}
		          if($row['descr_topograph'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_topograph\" class=\"description\">".$row['descr_topograph']."</div>";}
		          if($row['descr_skeletotop'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_skeletotop\" class=\"description\">".$row['descr_skeletotop']."</div>";}
		          if($row['descr_holotop'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_holotop\" class=\"description\">".$row['descr_holotop']."</div>";}
		          if($row['descr_syntop'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</div>";}
		          if($row['descr_art']  !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</div>";}
		          if($row['descr_ven']  !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</div>";}
		          if($row['descr_lymph'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</div>";}
		          if($row['descr_nerv'] !== ""){echo "<div id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</div>";}
		        echo "</div>";
		      echo "</div>";
		    } while ($row = mysql_fetch_array($query));
		  }
		}
		//======= конец Подчиненные
		unset($row);
		unset($row_id);
	}
//}

?>