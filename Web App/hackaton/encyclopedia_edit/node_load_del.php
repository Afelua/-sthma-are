
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    $code = $_POST['code'];

    $code = explode("-", $code);
    $table = $code[0]; // table
    $level_int = $code[1]; // level_int
    $left_key = $code[2]; // left_key
    $right_key = $code[3]; // right_key
    $id = $code[4]; // right_key
    $rusname = $code[5]; // right_key

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#del_node_new\").click(function(){
          var termin_table = \$(\"#termin_table\").val();
          var termin_id = \$(\"#termin_id\").val();
          var termin_level = \$(\"#termin_level\").val();
          var termin_left_key = \$(\"#termin_left_key\").val();
          var termin_right_key = \$(\"#termin_right_key\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."node_del.php\",
            data: {
                   \"termin_table\": termin_table,
                   \"termin_id\": termin_id,
                   \"termin_level\": termin_level,
                   \"termin_left_key\": termin_left_key,
                   \"termin_right_key\": termin_right_key
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#node_d\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";
      echo "<div id=\"node_d\">\n";
      echo "<form name=\"form\" action=\"".$custom_page.$loc_page."node_del.php\" method=\"post\" id=\"node_add_new\">";
          echo "<input type=\"hidden\" name=\"termin_table\" id=\"termin_table\" value=\"".$table."\">\n";
          echo "<input type=\"hidden\" name=\"termin_id\" id=\"termin_id\" value=\"".$id."\">\n";
          echo "<input type=\"hidden\" name=\"termin_level\" id=\"termin_level\" value=\"".$level_int."\">\n";
          echo "<input type=\"hidden\" name=\"termin_left_key\" id=\"termin_left_key\" value=\"".$left_key."\">\n";
          echo "<input type=\"hidden\" name=\"termin_right_key\" id=\"termin_right_key\" value=\"".$right_key."\">\n";
        echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"del_node_new\" value=\"Удалить \"".$rusname."\" термин\" />\n";
      echo "</form>";
      echo "</div>\n";
  }
}
?>