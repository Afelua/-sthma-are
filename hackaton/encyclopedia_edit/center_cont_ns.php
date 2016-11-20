<div class="data" align="center">
  <input type="button" id="lev1" value="1">
  <input type="button" id="lev2" value="2">
  <input type="button" id="lev3" value="3">
  <input type="button" id="lev4" value="4">
  <input type="button" id="lev5" value="5">
  <input type="button" id="lev6" value="6">
  <input type="button" id="lev7" value="7">
  <input type="button" id="lev8" value="8">
  <input type="button" id="lev9" value="9">
<br>
<span class="rusname1">01</span><span class="rusname2">02</span><span class="rusname3">03</span><span class="rusname4">04</span><span class="rusname5">05</span><span class="rusname6">06</span><span class="rusname7">07</span><span class="rusname8">08</span><span class="rusname9">09</span><span class="rusname10">10</span><span class="rusname11">11</span><span class="rusname12">12</span><span class="rusname13">13</span><span class="rusname14">14</span><span class="rusname15">15</span><span class="rusname16">16</span>
</div>
<?php

//начало========== Запрос 1 "Выбор всех узлов узлов" ================================
if(isset($_GET['code'])){
  $id_level = $_GET['code'];

  $query_text_id = "SELECT * FROM $table WHERE id=$id_level";
  $query_id = mysql_query($query_text_id);

  if(!$query_id)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_id) > 0)
  {
    $row_id = mysql_fetch_array($query_id);
  }
  $right_key = $row_id['right_key'];
  $left_key = $row_id['left_key'];
  $level_int_id = $row_id['level_int'];
//======Родительские
  $query_text = "SELECT * FROM $table WHERE $colon_left_key < $left_key AND $colon_right_key > $right_key ORDER BY $colon_left_key";
  $query = mysql_query($query_text);

    if(!$query)
    {
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0)
    {
      $row = mysql_fetch_array($query);
    }

    echo "<div class=\"data\">";
      do {
        $level_int = $row['level_int'];
        echo "<a href=\"encyclopedia_edit.php?code=";
        echo $row['id']."&";
        echo "lev=";
        echo $_GET['lev'];
        echo "\">";
        echo $row['rusname']."</a> &#8658; ";
      } while ($row = mysql_fetch_array($query));
    echo "</div>";
//=======

//======= начало Собственные
    $level_int = 1;
    echo "<div class=\"data\">";
      echo "<div class=\"head_lev".$level_int."\" id=\"head_lev_id_".$row_id['id']."\">";
        echo $row_id['rusname'];
      echo "</div>";
      echo "<div class=\"lev".$level_int."\">";
        echo "<span id=\"".$table."-".$row_id['id']."-rusname\" class=\"rusname".$_GET['lev']."\">";
        echo $row_id['rusname'];
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
          echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
          echo " class=\"description\">===== ===== ===== =====.</span>";
        }
        elseif($row_id['latname'] == NULL ){
          echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo "=== ====";
          echo "</span>";
          echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
          echo " class=\"description\">".$row_id['description'];
          echo "</span>";
        }
        else{
          echo ", <span id=\"".$table."-".$row_id['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo $row_id['latname'];
          echo "</span>";
          echo ", <span id=\"".$table."-".$row_id['id']."-description\"";
          echo " class=\"description\">".$row_id['description'];
          echo "</span>";
        }
        //=================Вставить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#load_node_".$row_id['id']."_1\").click(function(){\n";
//              echo "\$(\"div#load_node_".$row_id['id']."\").addClass(\"latname".$_GET['lev']."\")\n";
              echo "\$(\"div#load_node_".$row_id['id']."\").load(\"a_site/002_pages/001_custom_page/encyclopedia_edit/node_load.php\",\n";
                echo "{ code: \"".$table."-".$row_id['level_int']."-".$row_id['left_key']."-".$row_id['right_key']."\" }\n";
              echo ");\n";
//              echo "\$(\"div#load_node_".$row_id['id']."_1\").remove()";
            echo "});\n";
          echo "});\n";
        echo "</script>";
        //=================
        //=================Удалить узел
        echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
          echo "\$(function () {\n";
            echo "\$(\"div#del_node_".$row_id['id']."\").click(function(){\n";
              echo "\$(\"div#load_node_".$row_id['id']."\").addClass(\"latname".$_GET['lev']."\")\n";
              echo "\$(\"div#load_node_".$row_id['id']."\").load(\"a_site/002_pages/001_custom_page/encyclopedia_edit/node_load_del.php\",\n";
                echo "{ code: \"".$table."-".$row_id['level_int']."-".$row_id['left_key']."-".$row_id['right_key']."-".$row_id['id']."-".$row_id['rusname']."\" }\n";
              echo ");\n";
//              echo "\$(\"div#load_node_".$row_id['id']."_1\").remove()";
            echo "});\n";
          echo "});\n";
        echo "</script>";
/*
        echo "<script type=\"text/javascript\">
          \$(function() {
            \$(\"div#del_node_".$row_id['id']."\").click(function(){
              \$(\"div#del_node_".$row_id['id']."\").addClass(\"latname".$_GET['lev']."\");
              \$.ajax({
                type: \"POST\",
                url: \"a_site/002_pages/001_custom_page/encyclopedia_edit/node_del.php\",
                data: {
                   \"termin_table\": ".$table.",
                   \"termin_id\": ".$row_id['id'].",
                   \"termin_level\": ".$row_id['level_int'].",
                   \"termin_left_key\": ".$row_id['left_key'].",
                   \"termin_right_key\": ".$row_id['right_key']."
                },
                cache: false,
                success: function(responseone1){
                  var messageRespone1 = new Array('Запись удалена', 'Данные не обновлены или были заполненны не все поля');
                  var resultStatone1 = messageRespone1[Number(responseone1)];
                  if(responseone1 == 0){
                  }
                  \$(\"#del_node_".$row_id['id']."\").text(resultStatone1).show().delay(2500).fadeOut(2400);
                }
              });
              return false;
            });
          });
        </script>";
*/
        //=================
        echo "<div id=\"load_node_".$row_id['id']."_1\">Вставить</div>";
        echo "<div id=\"del_node_".$row_id['id']."\">Удалить</div>";
        echo "<div id=\"load_node_".$row_id['id']."\"></div>";
      echo "</div>";
//======= конец Собственные
//======= начало Подчиненные

  $query_text = "SELECT * FROM $table WHERE $colon_left_key > $left_key AND $colon_right_key < $right_key ORDER BY $colon_left_key";
  $query = mysql_query($query_text);

    if(!$query)
    {
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0)
    {
      $row = mysql_fetch_array($query);
    }
  if($row !== ""){

    do {
      $level_int = $row['level_int'] - $level_int_id + 1;
      echo "<div class=\"head_lev".$level_int."\" id=\"head_lev_id_".$row['id']."\">";
        echo $row['rusname'];
      echo "</div>";
      echo "<div class=\"lev".$level_int."\">";
        echo "<a class=\"rusname".$_GET['lev']."\" href=\"encyclopedia_edit.php?code=";
        echo $row['id']."&";
        echo "lev=";
        echo $_GET['lev'];
        echo "\">";
        echo $row['rusname'];
        echo "</a>";
        if($row['rusname'] == NULL AND $row['latname'] == NULL AND $row['description'] == NULL){
          echo "";
        }
        elseif($row['latname'] == NULL AND $row['description'] == NULL){
          echo ".";
        }
        elseif($row['description'] == NULL){
          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo $row['latname'];
          echo "</span>.";
        }
        elseif($row['latname'] == NULL){
          echo " <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
          echo "</span>";
        }
        else{
          echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
          echo $row['latname'];
          echo "</span>";
          echo ", <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
          echo "</span>";
          }
       echo "</div>";
    } while ($row = mysql_fetch_array($query));
  }
//======= конец Подчиненные
echo "</div>";
}
else{
  $table1 = "1_11_organisms";
  $query_text1 = "SELECT * FROM $table1 WHERE $colon_level = '1' ORDER BY $colon_left_key";
  $query1 = mysql_query($query_text1);

  if(!$query1)
  {
  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
  }
  if (mysql_num_rows($query1) > 0)
  {
    $row1 = mysql_fetch_array($query1);
  }

    echo "<div class=\"data\">";
    echo "<h2>Анатомия организма человека</h2>";
    do {
      echo "<div class=\"lev".$row1['level_int']."\">";
        echo "<a class=\"rusname\" href=\"encyclopedia_edit.php?code=";
        echo $row1['id']."&";
        echo "lev=11";
        echo "\">";
        echo $row1['rusname'];
        echo "</a>";
        if($row1['latname'] == NULL AND $row1['description'] == NULL ){
          echo ".";
        }
        elseif($row1['description'] == NULL){
          echo ", <span class=\"latname\">";
          echo $row1['latname'];
          echo "</span>.";
        }
        elseif($row1['latname'] == NULL ){
          echo " ".$row1['description'];
        }
        else{
          echo ", <span class=\"latname\">";
          echo $row1['latname'];
          echo "</span>";
          echo ", ".$row1['description'];
          }
       echo "</div>";
    } while ($row1 = mysql_fetch_array($query1));
    echo "</div>";

  $table2 = "1_10_systems";
  $query_text2 = "SELECT * FROM $table2 WHERE $colon_level = '1' ORDER BY $colon_left_key";
  $query2 = mysql_query($query_text2);

  if(!$query2)
  {
  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
  }
  if (mysql_num_rows($query2) > 0)
  {
    $row2 = mysql_fetch_array($query2);
  }

    echo "<div class=\"data\">";
    echo "<h2>Анатомия систем органов человека</h2>";
    do {
      echo "<div class=\"lev".$row2['level_int']."\">";
        echo "<a class=\"rusname\" href=\"encyclopedia_edit.php?code=";
        echo $row2['id']."&";
        echo "lev=10";
        echo "\">";
        echo $row2['rusname'];
        echo "</a>";
        if($row2['latname'] == NULL AND $row2['description'] == NULL ){
          echo ".";
        }
        elseif($row2['description'] == NULL){
          echo ", <span class=\"latname\">";
          echo $row2['latname'];
          echo "</span>.";
        }
        elseif($row2['latname'] == NULL ){
          echo " ".$row2['description'];
        }
        else{
          echo ", <span class=\"latname\">";
          echo $row2['latname'];
          echo "</span>";
          echo ", ".$row2['description'];
          }
      echo "</div>";
    } while ($row2 = mysql_fetch_array($query2));
    echo "</div>";

  $table = "1_9_organs";
  $query_text = "SELECT * FROM $table WHERE $colon_level = '1' ORDER BY $colon_left_key";
  $query = mysql_query($query_text);

  if(!$query)
  {
  echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
  echo exit(mysql_error());
  }
  if (mysql_num_rows($query) > 0)
  {
    $row = mysql_fetch_array($query);
  }

    echo "<div class=\"data\">";
    echo "<h2>Анатомия органов человека</h2>";
    do {
      echo "<div class=\"lev".$row['level_int']."\">";
        echo "<a class=\"rusname\" href=\"encyclopedia_edit.php?code=";
        echo $row['id']."&";
        echo "lev=9";
        echo "\">";
        echo $row['rusname'];
        echo "</a>";
        if($row['latname'] == NULL AND $row['description'] == NULL ){
          echo ".";
        }
        elseif($row['description'] == NULL){
          echo ", <span class=\"latname\">";
          echo $row['latname'];
          echo "</span>.";
        }
        elseif($row['latname'] == NULL ){
          echo " ".$row['description'];
        }
        else{
          echo ", <span class=\"latname\">";
          echo $row['latname'];
          echo "</span>";
          echo ", ".$row['description'];
          }
      echo "</div>";
    } while ($row = mysql_fetch_array($query));
    echo "</div>";
}
?>