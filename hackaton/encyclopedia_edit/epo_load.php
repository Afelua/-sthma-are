
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    $code_epo1 = $_POST['code_epo'];

    $code_epo = explode("-", $code_epo1);
    $table_epo = $code_epo[0]; // table
    $term_id = $code_epo[1]; // term_id

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#add_epo_new\").click(function(){
          var table_epo = \$(\"#table_epo\").val();
          var term_id_epo = \$(\"#term_id_epo\").val();
          var eponym_rus_new = \$(\"#eponym_rus_new\").val();
          var eponym_lat_new = \$(\"#eponym_lat_new\").val();
          var eponym_eng_new = \$(\"#eponym_eng_new\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."epo_add.php\",
            data: {
               \"table_epo\": table_epo,
               \"term_id_epo\": term_id_epo,
               \"eponym_rus_new\": eponym_rus_new,
               \"eponym_lat_new\": eponym_lat_new,
               \"eponym_eng_new\": eponym_eng_new
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#epo_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";

    //конец============Добавление комментария===============

//==========================Форма добавления синонима (начало)===================
    echo "<div id=\"epo_add\" class=\"data\">";
      echo "<form action=\"".$custom_page.$loc_page."epo_add.php\" method=\"post\" id=\"epo_add_new\">\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Эпоним (рус.)</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"eponym_rus_new\" id=\"eponym_rus_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Eponym latinum</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"eponym_lat_new\" id=\"eponym_lat_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">English eponym</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"eponym_eng_new\" id=\"eponym_eng_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">---</div>\n";
            echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"add_epo_new\" value=\"Добавить эпоним\" />\n";
            echo "<input type=\"button\" id=\"add_epo_new_cancel\" class=\"button\" value=\"Отменить\" /></div>\n";
          echo "</div>\n";
          echo "<input type=\"hidden\" name=\"table_epo\" id=\"table_epo\" value=\"".$table_epo."\">\n";
          echo "<input type=\"hidden\" name=\"term_id_epo\" id=\"term_id_epo\" value=\"".$term_id."\">\n";
      echo "</form>";
    echo "</div>\n";
//==========================Форма добавления синонима (конец)====================

  }
}
?>
