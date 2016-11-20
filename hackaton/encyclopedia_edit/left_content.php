<?php

echo "<div class=\"data\">\n";
/*if(){
  $query_text_level = "SELECT * FROM $table_level WHERE $colon_level = 1";
  $query_level = mysql_query($query_text_level);

  if(!$query_level){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_level) > 0){
    $row_level = mysql_fetch_array($query_level);
    $table = $row_level['level_rang_name'];
    $tit = $row_level['rusname'];
    do{
        echo "<a href=\"".$page_name."?code=1&lev=".$row_level['rusname']."\" id=\"4l\">".$row_level['rusname']."</a><br>\n";
    } while($query_level = mysql_fetch_array($query_text_level));
  }
}
*/
  echo "<a href=\"".$page_name."?code=1&lev=1\" id=\"1l\">Волновой уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=2\" id=\"2l\">Элементарный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=3\" id=\"3l\">Атомный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=4\" id=\"4l\">Молекулярный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=5\" id=\"5l\">Кластерный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=6\" id=\"6l\">Органоидный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=7\" id=\"7l\">Клеточный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=8\" id=\"8l\">Тканевой уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=9\" id=\"9l\">Органный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=10\" id=\"10l\">Системный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=11\" id=\"11l\">Организменный уровень</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=12\" id=\"12l\">Популяционный уровень</a><br>\n";  // Популяционный уровень
  echo "<a href=\"".$page_name."?code=1&lev=16\" id=\"16l\">Программировние</a><br>\n";
  echo "<a href=\"".$page_name."?code=1&lev=17\" id=\"12l\">Процесс</a><br>\n";  // Популяционный уровень
echo "</div>\n";

if(isset($_GET['lev'])){
switch($_GET['lev']):
	case 16:
	break;
		echo "<div class=\"data\">";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11\">Прионы</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11\">Вирусы</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11&tax=3\">Бактерии</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11&tax=4\">Грибы</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11&tax=5\">Растения</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11&tax=6\">Животные</a></div>";
			echo "<div><a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=1&lev=11\">Человек</a></div>";
		echo "</div>";
endswitch;

  $colon_left_key = "left_key";
  $query_text_menu = "SELECT * FROM $table WHERE level_int='1' ORDER BY $colon_left_key";
  $query_menu = mysql_query($query_text_menu);

  if(!$query_menu)
  {
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query_menu) > 0)
  {
    $row_menu = mysql_fetch_array($query_menu);
    echo "<div class=\"data\">";
    if(isset($_GET['tax'])){
      echo "<h3 align=\"center\">".$tit."</h3>";
    }
    else{
      echo "<h3 align=\"center\">".$tit."</h3>";
    }
      do {
        $level_int = $row_menu['level_int'];
        echo "<div>";
        echo "<a id=\"".$_GET['lev']."l\" href=\"".$page_name."?code=";
          echo $row_menu['id']."&";
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
        if($row_menu['rusname'] == ""){
          echo $row_menu['latname'];
        }
        else{
          echo $row_menu['rusname'];
        }
        echo "</a>";
        echo "</div>";
      } while ($row_menu = mysql_fetch_array($query_menu));
    echo "</div>";
  }
}


?>
  <div class="data">
<?php echo "
<script type='text/javascript'>
// функция jquery ajax поиска книг
\$(document).ready(function(){
  \$(\"#search_results\").slideUp();
  \$(\"#id_pers\").slideUp();
  \$(\"#search_term\").keyup(function(){
    ajax_search();
  });
});

function ajax_search(){
  \$(\"#search_results\").show();
  \$.post(\"".$loc_page."/search_term.php\", {search_term : \$(\"#search_term\").val() + \"-".$table."\" + \"-".$_GET['lev']."\" + \"-".$_GET['tax']."\"}, function(data){
    \$(\"#search_results\").html(data);
  })
}
</script>
";?>
<form  method="post">
  <div>
    <label >Поиск: </label>
    <input type="text" name="search_term" id="search_term" />
  </div>
</form>
<div name="search_results" id="search_results"></div>
<div style="width:400px;"></div>
</div>
