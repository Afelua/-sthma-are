<?php
function echo_description_id(){
  $table = $GLOBALS['table'];
  $row_id = $GLOBALS['row_id'];
  echo "<span id=\"".$table."-".$row_id['id']."-description\" class=\"description\">".$row_id['description']."</span>";
  if($row_id['descr_morph'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_morph\" class=\"description\">".$row_id['descr_morph']."</div>";}
  if($row_id['descr_structure'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_structure\" class=\"description\">".$row_id['descr_structure']."</div>";}
  if($row_id['descr_start'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_start\" class=\"description\">".$row_id['descr_start']."</div>";}
  if($row_id['descr_track'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_track\" class=\"description\">".$row_id['descr_track']."</div>";}
  if($row_id['descr_finish'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_finish\" class=\"description\">".$row_id['descr_finish']."</div>";}
  if($row_id['descr_function'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_function\" class=\"description\">".$row_id['descr_function']."</div>";}
  if($row_id['descr_develop_from'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_develop_from\" class=\"description\">".$row_id['descr_develop_from']."</div>";}
  if($row_id['descr_develop'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_develop\" class=\"description\">".$row_id['descr_develop']."</div>";}
  if($row_id['descr_develop_to'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_develop_to\" class=\"description\">".$row_id['descr_develop_to']."</div>";}
  if($row_id['descr_topograph'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_topograph\" class=\"description\">".$row_id['descr_topograph']."</div>";}
  if($row_id['descr_skeletotop'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_skeletotop\" class=\"description\">".$row_id['descr_skeletotop']."</div>";}
  if($row_id['descr_holotop'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_holotop\" class=\"description\">".$row_id['descr_holotop']."</div>";}
  if($row_id['descr_syntop'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_syntop\" class=\"description\">".$row_id['descr_syntop']."</div>";}
  if($row_id['descr_art'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_art\" class=\"description\">".$row_id['descr_art']."</div>";}
  if($row_id['descr_ven'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_ven\" class=\"description\">".$row_id['descr_ven']."</div>";}
  if($row_id['descr_lymph'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_lymph\" class=\"description\">".$row_id['descr_lymph']."</div>";}
  if($row_id['descr_nerv'] !== ""){echo "<div id=\"".$table."-".$row_id['id']."-descr_nerv\" class=\"description\">".$row_id['descr_nerv']."</div>";}
}
?>