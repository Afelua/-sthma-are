<?php
echo "<div class=\"columns notopmargin\">\n";
	echo "<div class=\"span_1_col_h\">Запишите определения в свой словарь терминов</div>\n";
	if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
		if($_POST['theory_id'] != "") {
			define('RELPATH', 'ege_biology/');
			require_once("constants.php");
			require_once("base.php");
			require_once("functions.php");

			$query_text = "SELECT * FROM $table WHERE id='".str_replace(".", "' OR id='", $_POST['theory_id'])."' ".TERMIN_ACTIVE." ORDER BY rusname ASC, latname ASC";

			//======= начало Термины
			$query = mysql_query($query_text);
			if(!$query){
			  echo "<p class='text'>Выбор подчинённых терминов. Поиск не осуществлен. Код ошибки:</p>";
			  echo exit(mysql_error());
			}
			if (mysql_num_rows($query) > 0){
			  $row = mysql_fetch_array($query);
				  do {
						echo "<div class=\"span-1-col\">\n";
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
						echo "<br><br></div>";
				  } while ($row = mysql_fetch_array($query));
			}
			unset($row);
			unset($row_id);
			//======= конец Термины
			}
		}
echo "</div>";
echo "<div class=\"separator span-16\"></div>\n";
?>