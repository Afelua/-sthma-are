
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    $code_prev1 = $_POST['code_prev'];

    $code_prev = explode("-", $code_prev1);
    $table_name = $code_prev[0];  // table
    $term_id = $code_prev[1];      // term_id
    $level_id = $code_prev[2];      // level_id

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#node_prev\").click(function(){
          var term_id = \$(\"#term_id\").val();
          var level_id = \$(\"#level_id\").val();
          var term_prev_id = \$(\"#term_prev_id\").val();
          var table_name = \$(\"#table_name\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."node_prev_add.php\",
            data: {
               \"term_id\": term_id,
               \"level_id\": level_id,
               \"term_prev_id\": term_prev_id,
               \"table_name\": table_name
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#node_prev_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";

    //конец============Добавление комментария===============

//==========================Форма добавления синонима (начало)===================
    echo "<div id=\"syn_add\" class=\"data\">";
      echo "<form action=\"".$custom_page.$loc_page."node_prev_add.php\" method=\"post\" id=\"node_prev_add\">\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">id предшественника</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"term_prev_id\" id=\"term_prev_id\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">---</div>\n";
            echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"node_prev\" value=\"Добавить предшественник\" />\n";
            echo "<input type=\"button\" id=\"node_prev_new_cancel\" class=\"button\" value=\"Отменить\" /></div>\n";
          echo "</div>\n";
          echo "<input type=\"hidden\" name=\"table_name\" id=\"table_name\" value=\"".$table_name."\">\n";
          echo "<input type=\"hidden\" name=\"term_id\" id=\"term_id\" value=\"".$term_id."\">\n";
          echo "<input type=\"hidden\" name=\"level_id\" id=\"level_id\" value=\"".$level_id."\">\n";
      echo "</form>";
    echo "</div>\n";
//==========================Форма добавления синонима (конец)====================

  }
}
?>
