<?php
echo "<script type=\"text/javascript\">
\$(function(){
  \$(\"#sortable, #sortable1, #sortable2\").sortable({
  	connectWith: \".connectedSortable\",
    stop: function(event, ui){
      var prev_id = ui.item.prev().attr('id');
      var element_id = \$(ui.item).attr('id')
      alert(\"Перемещаемый элемент: \" + element_id + \", Предшествующий элемент: \" + prev_id);
      \$.ajax({
        type: \"POST\",
        url: \"".$custom_page.$loc_page."0_skew.php\",
        data: {
           \"table\": table,
           \"element_id\": element_id,
           \"prev_id\": prev_id
        },
        cache: false,
        success: function(responseone){
          var messageRespone = new Array('Запись обновлена', 'Данные не обновлены или были заполненны не все поля');
          var resultStatone = messageRespone[Number(responseone)];
          if(responseone == 0){
          }
          \$(\"#syn_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
        }
      });
      return false;
    }
  });
});
</script>
";
?>
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
  $query_text_id = "SELECT * FROM $table WHERE id=$id_level ORDER BY $colon_left_key";
  $query_id = mysql_query($query_text_id);

  if(!$query_id)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_id) > 0)
  {
    $row_id = mysql_fetch_array($query_id);
    $right_key = $row_id['right_key'];
    $left_key = $row_id['left_key'];
    $level_int_id = $row_id['level_int'];
    //====== начало Родительские (Меню)
    $query_text = "SELECT * FROM $table WHERE $colon_left_key < $left_key AND $colon_right_key > $right_key ORDER BY $colon_left_key";
    $query = mysql_query($query_text);

    if(!$query){
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);
      echo "<div class=\"data\">";
        do {
          $level_int = $row['level_int'];
          echo "<a href=\"".$page_name."?code=";
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
            if($row['rusname'] !== "") echo $row['rusname']; else echo $row['latname'];
          echo "</a> &#8658; ";
        } while ($row = mysql_fetch_array($query));
      echo "</div>";
    }
    //====== конец Родительские (Меню)
  }

  if(isset($_GET['ont'])){
    $ont = $_GET['ont'];
    //======== начало День развития
    echo "<div class=\"data0\">\n";
      //Предыдущий день онтогенеза
      echo "<div class=\"data1\">\n";
        $ont_prev = $ont-1;
        echo "<a href=\"".$page_name."?code=";
          echo $_GET['code']."&";
          echo "lev=";
          echo $_GET['lev']."&";
          echo "ont=";
          if($ont > 1){
            echo $ont_prev;
            echo "\">";
            echo $ont_prev."-й день развития</a>";
          }
          else {
            echo $ont;
            echo "\">";
            echo "Оплодотворение</a>";
          }
      echo "</div>\n";
      //Текущий день онтогенеза
      echo "<div class=\"data0c\">\n";
        $ont_week = ($ont - 1)/7;
        $ont_day = $ont - floor($ont_week)*7;
        echo "<h3 align=\"center\">";
        if(floor($ont_week) > 0){
          echo floor($ont_week)." неделя ".$ont_day." день";
        }
        else {
          echo "<a href=\"".$page_name."?lev=".$_GET['lev'];
            if(isset($_GET['ont'])){
              echo "&ont=";
              echo $_GET['ont'];
            }
          echo "\">".$ont_day." день</a>";
        }
        echo "</h3>";
        if($ont > 7){
          echo "<h3 align=\"center\">";
          echo "<a href=\"".$page_name."?lev=".$_GET['lev'];
            if(isset($_GET['ont'])){
              echo "&ont=";
              echo $_GET['ont'];
            }
          echo "\">($ont-й день развития)</a></h3>";
        }
      echo "</div>\n";
      // Следующий день онтогенеза
      echo "<div class=\"data2\">\n";
        $ont_next = $ont+1;
        echo "<a href=\"".$page_name."?code=";
          echo $_GET['code']."&";
          echo "lev=";
          echo $_GET['lev']."&";
          echo "ont=";
          echo $ont_next;
        echo "\">";
       echo $ont_next."-й день развития</a>";
      echo "</div>\n";
    echo "</div>\n";
    //======= конец День развития
  }
  include "center_cont_ns_02_termin.php";
}
else{
  if(isset($_GET['lev'])){
    //начало========== Запрос 1 "Выбор всех узлов узлов" ================================
    if(isset($_GET['ont'])){
      $ont = $_GET['ont'];
      $query_text = "SELECT * FROM $table WHERE $colon_start_key <= $ont AND $colon_finish_key >= $ont ORDER BY $colon_left_key";
    }
    else {
      $query_text = "SELECT * FROM $table ORDER BY $colon_left_key";
    }
    //======== начало День развития
    echo "<div class=\"data0\">\n";
      //Предыдущий день онтогенеза
      echo "<div class=\"data1\">\n";
        $ont_prev = $ont-1;
        echo "<a href=\"".$page_name."?";
          echo "lev=";
          echo $_GET['lev']."&";
          echo "ont=";
          if($ont > 1){
            echo $ont_prev;
            echo "\">";
            echo $ont_prev."-й день развития</a>";
          }
          else {
            echo $ont;
            echo "\">";
            echo "Оплодотворение</a>";
          }
      echo "</div>\n";
      //Текущий день онтогенеза
      echo "<div class=\"data0c\">\n";
        $ont_week = $ont/7;
        $ont_day = $ont - floor($ont_week)*7;
        echo "<h3 align=\"center\">";
        if(floor($ont_week) > 0){
          echo floor($ont_week)." неделя ".$ont_day." день";
        }
        else {
          echo "<a href=\"".$page_name."?lev=".$_GET['lev'];
            if(isset($_GET['ont'])){
              echo "&ont=";
              echo $_GET['ont'];
            }
          echo "\">".$ont_day." день</a>";
        }
        echo "</h3>";
        if($ont > 6){
          echo "<h3 align=\"center\">";
          echo "<a href=\"".$page_name."?lev=".$_GET['lev'];
            if(isset($_GET['ont'])){
              echo "&ont=";
              echo $_GET['ont'];
            }
          echo "\">($ont-й день развития)</a></h3>";
        }
      echo "</div>\n";
      // Следующий день онтогенеза
      echo "<div class=\"data2\">\n";
        $ont_next = $ont+1;
        echo "<a href=\"".$page_name."?";
          echo "lev=";
          echo $_GET['lev']."&";
          echo "ont=";
          echo $ont_next;
        echo "\">";
       echo $ont_next."-й день развития</a>";
      echo "</div>\n";

    echo "</div>\n";
    //======= конец День развития

    $query = mysql_query($query_text);
    if(!$query){
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query) > 0){
      $row = mysql_fetch_array($query);
      if($row !== ""){
        echo "<div class=\"data\">";
        do {
          $level_int = $row['level_int'] - $level_int_id + 1;
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
            echo $row['rusname'];
            echo "</a>";
            if($row['rusname'] == NULL AND $row['latname'] == NULL AND $row['description'] == NULL){
              echo "";
            }
            elseif($row['latname'] == NULL AND $row['description'] == NULL){
              echo ".";
              echo " [<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate\">".$row['sdate']."</span>] &#8212;";
              echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate\">".$row['fdate']."</span>]";
            }
            elseif($row['description'] == NULL){
              echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
              echo $row['latname'];
              echo "</span>.";
              echo " [<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate\">".$row['sdate']."</span>] &#8212;";
              echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate\">".$row['fdate']."</span>]";
            }
            elseif($row['latname'] == NULL){
              echo " <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
              echo "</span>";
              echo " [<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate\">".$row['sdate']."</span>] &#8212;";
              echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate\">".$row['fdate']."</span>]";
            }
            else{
              echo ", <span id=\"".$table."-".$row['id']."-latname\" class=\"latname".$_GET['lev']."\">";
              echo $row['latname'];
              echo "</span>";
              echo ", <span id=\"".$table."-".$row['id']."-description\" class=\"description\">".$row['description'];
              echo "</span>";
              echo " [<span class=\"sdate\" id=\"".$table."-".$row['id']."-sdate\">".$row['sdate']."</span>] &#8212;";
              echo " [<span class=\"fdate\" id=\"".$table."-".$row['id']."-fdate\">".$row['fdate']."</span>]";
            }
          echo "</div>";
        } while ($row = mysql_fetch_array($query));
      }
    }
  }
	echo "<div class=\"data\">";
	echo "<strong>Проект «Анатомия человека»</strong> — Проект, предназначенный для обучения данной  дисциплине вне зависимости от исходного уровня знаний.
		Предназначен для школьников, учителей, преподавателей анатомии человека  любых вузов, врачей всех специальностей.
		Представляет собой удобное пособие энциклопедического характера с навигацией по различным терминам с различной глубиной изложения и уровнем доступа.
		Проект можно адаптировать для изучения анатомии животных для ветеринаров.
		Проект является одним из этапов разработки учебно-методических комплексов анатомии для различных специальностей
		информацию из базы данных которого можно использовать для формирования учебно-методических комплексов анатомии человека для различных уровней изучения и специальностей без искажения информации.";
	echo "</div>";

}
?>