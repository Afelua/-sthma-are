<?php
function echo_description_id(){
  $table = $GLOBALS['table'];
  $row_id = $GLOBALS['row_id'];
  echo "<span id=\"".$table."-".$row_id['id']."-description\" class=\"description\">".$row_id['description']."</span>";
  if($row_id['descr_morph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_morph\" class=\"description\">".$row_id['descr_morph']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_morph\" class=\"description\">===Описание внешнего строения===</span></div>";}
  if($row_id['descr_structure'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_structure\" class=\"description\">".$row_id['descr_structure']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_structure\" class=\"description\">===Описание внутреннего строения===</span></div>";}
  if($row_id['descr_start'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_start\" class=\"description\">".$row_id['descr_start']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_start\" class=\"description\">===Описание начала===</span></div>";}
  if($row_id['descr_track'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_track\" class=\"description\">".$row_id['descr_track']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_track\" class=\"description\">===Описание хода===</span></div>";}
  if($row_id['descr_finish'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_finish\" class=\"description\">".$row_id['descr_finish']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_finish\" class=\"description\">===Описание окончания===</span></div>";}
  if($row_id['descr_function'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_function\" class=\"description\">".$row_id['descr_function']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_function\" class=\"description\">===Описание функции===</span></div>";}
  if($row_id['descr_develop_from'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_develop_from\" class=\"description\">".$row_id['descr_develop_from']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_develop_from\" class=\"description\">===Описание предшественников развития===</span></div>";}
  if($row_id['descr_develop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_develop\" class=\"description\">".$row_id['descr_develop']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_develop\" class=\"description\">===Описание процесса развития===</span></div>";}
  if($row_id['descr_develop_to'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_develop_to\" class=\"description\">".$row_id['descr_develop_to']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_develop_to\" class=\"description\">===Описание последователей развития===</span></div>";}
  if($row_id['descr_topograph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_topograph\" class=\"description\">".$row_id['descr_topograph']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_topograph\" class=\"description\">===Описание топографии===</span></div>";}
  if($row_id['descr_skeletotop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_skeletotop\" class=\"description\">".$row_id['descr_skeletotop']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_skeletotop\" class=\"description\">===Описание скелетотопии===</span></div>";}
  if($row_id['descr_holotop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_holotop\" class=\"description\">".$row_id['descr_holotop']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_holotop\" class=\"description\">===Описание голотопии===</span></div>";}
  if($row_id['descr_syntop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_syntop\" class=\"description\">".$row_id['descr_syntop']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_syntop\" class=\"description\">===Описание синтопии===</span></div>";}
  if($row_id['descr_art'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_art\" class=\"description\">".$row_id['descr_art']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_art\" class=\"description\">===Описание артериального кровоснабжения===</span></div>";}
  if($row_id['descr_ven'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_ven\" class=\"description\">".$row_id['descr_ven']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_ven\" class=\"description\">===Описание венозного оттока===</span></div>";}
  if($row_id['descr_lymph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_lymph\" class=\"description\">".$row_id['descr_lymph']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_lymph\" class=\"description\">===Описание лимфооттока===</span></div>";}
  if($row_id['descr_nerv'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row_id['id']."-descr_nerv\" class=\"description\">".$row_id['descr_nerv']."</span></div>";}
  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-descr_nerv\" class=\"description\">===Описание иннервации===</span></div>";}
}

//======= начало Собственные
/*//Временно начало
if($row_id['org_lev'] !== $_REQUEST['lev']){
  echo "
    <style type=\"text/css\">
    <!--
    .lev".$level_int."{
      COLOR: Red;
      FONT-FAMILY: \"Times New Roman\", Times, serif
    }
    -->
    </style>
  ";
}
//Временно окончание
*/
$level_int = 1;
echo "<div class=\"data\">";
  echo "<div class=\"head_lev".$level_int."\" id=\"head_lev_id_".$row_id['id']."\">";
    echo $row_id['rusname'];
  echo "</div>";   //div class=\"head_lev".$level_int."\"
  echo "<div class=\"lev".$level_int."\"><strong>";
    if(isset($_GET['tax'])){
      echo get_taxon($row_id['taxon'], "rus")." ";
    }
    echo "</strong><span id=\"".$table."-".$row_id['id']."-rusname\" class=\"rusname".$_GET['lev']."\">";
    if($row_id['rusname'] == "") echo "=== ===";
    else echo $row_id['rusname'];
    echo "</span>";
    if($row_id['latname'] == NULL AND $row_id['description'] == NULL ){
      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
      echo "=== ====";
      echo "</span>";
      echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
        echo " class=\"description\">===== ===== ===== =====.".$row_id['description'];
      echo "</span>";
    }
    elseif($row_id['description'] == NULL){
      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
      echo $row_id['latname'];
      echo "</span>";
      echo ", <strong><span id=\"".$table."-".$row_id['id']."-engname\" class=\"latname".$_GET['lev']."\">";
      echo $row_id['engname'];
      echo "</span></strong>";
      echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
      echo " class=\"description\">====== ===== ===== =====.</span>";
    }
    elseif($row_id['latname'] == NULL ){
      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
      echo "=== ====";
      echo "</span>";
      echo ", <strong><span id=\"".$table."-".$row_id['id']."-engname\" class=\"latname".$_GET['lev']."\">";
      echo $row_id['engname'];
      echo "</span></strong>";
/*      echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
        echo " class=\"description\">".$row_id['description'];
      echo "</span>";
*/
      echo ", "; echo_description_id();
    }
    else{
      echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
      echo $row_id['latname'];
      echo "</span>";
      echo ", <strong><span id=\"".$table."-".$row_id['id']."-engname\" class=\"latname".$_GET['lev']."\">";
      echo $row_id['engname'];
      echo "</span></strong>";
/*      echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
      echo " class=\"description\">".$row_id['description'];
      echo "</span>";
*/
      echo ", "; echo_description_id();
    }
    echo "<div>";
      echo "<b>Перейти</b>: <a href=\"".$row_id['hyperlink']."\" target=\"_blank\">".$row_id['hyperlink']."</a>";
    echo "</div>";
	  if($row_id['hyperlink'] !== ""){echo "<div><b>Редактировать</b>: <span id=\"".$table."-".$row_id['id']."-hyperlink\" class=\"description\">".$row_id['hyperlink']."</span></div>";}
	  else{echo "<div class=\"description_empty\"><span id=\"".$table."-".$row_id['id']."-hyperlink\" class=\"description\">===Гиперссылка===</span></div>";}
     //=================Вставить узел
    echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
      echo "\$(function () {\n";
        echo "\$(\"div#load_node_".$row_id['id']."_1\").click(function(){\n";
//              echo "\$(\"div#load_node_".$row_id['id']."\").addClass(\"latname".$_GET['lev']."\")\n";
          echo "\$(\"div#load_node_".$row_id['id']."\").load(\"a_site/002_pages/001_custom_page/encyclopedia_edit/node_load.php\",\n";
            echo "{ code: \"".$table."-".$row_id['level_int']."-".$row_id['left_key']."-".$row_id['right_key']."-".$row_id['taxon']."\" }\n";
          echo ");\n";
//              echo "\$(\"div#load_node_".$row_id['id']."_1\").remove()";
        echo "});\n";
      echo "});\n";
    echo "</script>";
    //=================
    echo "<div id=\"load_node_".$row_id['id']."\">";
      echo "<div id=\"load_node_".$row_id['id']."_1\"><b><u>Вставить</u></b></div>";
    echo "</div>";
  echo "</div>"; //class=\"lev".$level_int."\"
//======= конец Собственные
//======= начало Подчиненные
if(isset($_GET['ont'])){
  $query_text = "SELECT * FROM $table WHERE $colon_start_key <= $ont AND $colon_finish_key >= $ont AND $colon_left_key > $left_key AND $colon_right_key < $right_key ORDER BY $colon_left_key";
}
else { $query_text = "SELECT * FROM $table WHERE $colon_left_key > $left_key AND $colon_right_key < $right_key ORDER BY $colon_left_key";
}

$query = mysql_query($query_text);
if(!$query){
  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
}
if (mysql_num_rows($query) > 0){
  $row = mysql_fetch_array($query);
  if($row !== ""){
    do {
/*      //Временно начало
      if($row['org_lev'] !== $_REQUEST['lev']){
        echo "
          <style type=\"text/css\">
          <!--
          #".$table."-".$row['id']."-latname, #".$table."-".$row['id']."-description, #".$table."-".$row['id']."-sdate, #".$table."-".$row['id']."-fdate, #".$table."-".$row['id']."-org_lev {
            COLOR: Red;
            FONT-FAMILY: \"Times New Roman\", Times, serif
          }
          -->
          </style>
        ";
      }
      //Временно окончание
*/      $level_int = $row['level_int'] - $level_int_id + 1;
      echo "<div class=\"head_lev".$level_int."\" id=\"head_lev_id_".$row['id']."\">";
        echo $row['rusname'];
      echo "</div>";
      echo "<div class=\"lev".$level_int."\">";
        echo "<a class=\"rusname".$_GET['lev']."\" href=\"".$page_name."?code=";
        echo $row['id']."&";
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
          if(isset($_GET['tax'])){
            echo get_taxon($row['taxon'],"rus")." ";
          }
        echo $row['rusname'];
        echo "</a>";
        if($row['rusname'] == NULL AND $row['latname'] == NULL AND $row['description'] == NULL){
          echo "";
        echo "<b></b> <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>";
        }
        elseif($row['rusname'] == NULL){
	        echo "<a class=\"latname".$_GET['lev']."\" href=\"".$page_name."?code=";
	        echo $row['id']."&";
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
	          if(isset($_GET['tax'])){
	            echo get_taxon($row['taxon'],"rus")." ";
	          }
	        echo $row['latname'];
	        echo "</a>";
          echo "<b></b> ⇒ <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>.";
        }
        elseif($row['latname'] == NULL AND $row['description'] == NULL){
          echo ".";
        echo "<b></b> <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>";
        }
        elseif($row['description'] == NULL){
          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo $row['latname'];
          echo "</span>.";
        echo "<b></b> <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>";
        }

        elseif($row['latname'] == NULL){
          echo " <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
          echo "</span>";
        echo "<b></b> <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>";
        }
        else{
          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo $row['latname'];
          echo "</span>";
          echo ", <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
          echo "</span>";
        echo "<b></b> <a href=\"".$row['hyperlink']."\" target=\"_blank\">".$row['hyperlink']."</a>";
        }
          if($row['descr_morph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_morph\" class=\"description\">".$row['descr_morph']."</span></div>";}
          if($row['descr_structure'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_structure\" class=\"description\">".$row['descr_structure']."</span></div>";}
          if($row['descr_start'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_start\" class=\"description\">".$row['descr_start']."</span></div>";}
          if($row['descr_track'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_track\" class=\"description\">".$row['descr_track']."</span></div>";}
          if($row['descr_finish'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_finish\" class=\"description\">".$row['descr_finish']."</span></div>";}
          if($row['descr_function'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_function\" class=\"description\">".$row['descr_function']."</span></div>";}
          if($row['descr_develop_from'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_develop_from\" class=\"description\">".$row['descr_develop_from']."</span></div>";}
          if($row['descr_develop_to'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_develop_to\" class=\"description\">".$row['descr_develop_to']."</span></div>";}
          if($row['descr_topograph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_topograph\" class=\"description\">".$row['descr_topograph']."</span></div>";}
          if($row['descr_skeletotop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_skeletotop\" class=\"description\">".$row['descr_skeletotop']."</span></div>";}
          if($row['descr_holotop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_holotop\" class=\"description\">".$row['descr_holotop']."</span></div>";}
          if($row['descr_syntop'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_syntop\" class=\"description\">".$row['descr_syntop']."</span></div>";}
          if($row['descr_art'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_art\" class=\"description\">".$row['descr_art']."</span></div>";}
          if($row['descr_ven'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_ven\" class=\"description\">".$row['descr_ven']."</span></div>";}
          if($row['descr_lymph'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_lymph\" class=\"description\">".$row['descr_lymph']."</span></div>";}
          if($row['descr_nerv'] !== ""){echo "<div class=\"description_full\"><span id=\"".$table."-".$row['id']."-descr_nerv\" class=\"description\">".$row['descr_nerv']."</span></div>";}
/*        echo "<div>";
          echo "[<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate\">".$row['sdate']."</span>]";
          if(isset($row['sdate_ver'])) echo " [<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate_ver\">".$row['sdate_ver']."</span>] &#8212;";
          echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate\">".$row['fdate']."</span>]";
          if(isset($row['fdate_ver'])) echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate_ver\">".$row['fdate_ver']."</span>]";
        echo "</div>";
        echo "Уровень организации: <span id=\"".$table."-".$row['id']."-org_lev\" class=\"org_lev\">";
          echo $row['org_lev'];
        echo "</span>";
*/
      echo "</div>";
    } while ($row = mysql_fetch_array($query));
  }
}
//======= конец Подчиненные

echo "</div>"; //div class=\"data\"

?>