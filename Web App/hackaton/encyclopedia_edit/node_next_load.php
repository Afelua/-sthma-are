
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    $code_next1 = $_POST['code_next'];

    $code_next = explode("-", $code_next1);
    $table_name =  $code_next[0];  // table
    $term_id = $code_next[1];      // term_id
    $level_id = $code_next[2];      // level_id

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#node_next\").click(function(){
          var term_id = \$(\"#term_id\").val();
          var level_id = \$(\"#level_id\").val();
          var term_next_id = \$(\"#term_next_id\").val();
          var table_name = \$(\"#table_name\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."node_next_add.php\",
            data: {
               \"term_id\": term_id,
               \"level_id\": level_id,
               \"term_next_id\": term_next_id,
               \"table_name\": table_name
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#node_next_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";

    //конец============Добавление комментария===============

//==========================Форма добавления синонима (начало)===================
    echo "<div id=\"syn_add\" class=\"data\">";
      echo "<form action=\"".$custom_page.$loc_page."node_next_add.php\" method=\"post\" id=\"node_next_add\">\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">id последователя</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"term_next_id\" id=\"term_next_id\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">---</div>\n";
            echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"node_next\" value=\"Добавить последователь\" />\n";
            echo "<input type=\"button\" id=\"add_syn_new_cancel\" class=\"button\" value=\"Отменить\" /></div>\n";
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
