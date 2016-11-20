
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    $code_syn1 = $_POST['code_syn'];

    $code_syn = explode("-", $code_syn1);
    $table_syn = $code_syn[0]; // table
    $term_id = $code_syn[1]; // term_id

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#add_syn_new\").click(function(){
          var table_syn = \$(\"#table_syn\").val();
          var term_id_syn = \$(\"#term_id_syn\").val();
          var synonym_rus_new = \$(\"#synonym_rus_new\").val();
          var synonym_lat_new = \$(\"#synonym_lat_new\").val();
          var synonym_eng_new = \$(\"#synonym_eng_new\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."syn_add.php\",
            data: {
               \"table_syn\": table_syn,
               \"term_id_syn\": term_id_syn,
               \"synonym_rus_new\": synonym_rus_new,
               \"synonym_lat_new\": synonym_lat_new,
               \"synonym_eng_new\": synonym_eng_new
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#syn_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";

    //конец============Добавление комментария===============

//==========================Форма добавления синонима (начало)===================
    echo "<div id=\"syn_add\" class=\"data\">";
      echo "<form action=\"".$custom_page.$loc_page."syn_add.php\" method=\"post\" id=\"syn_add_new\">\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Синоним (рус.)</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"synonym_rus_new\" id=\"synonym_rus_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Synonym latinum</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"synonym_lat_new\" id=\"synonym_lat_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">English synonym</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"20\" name=\"synonym_eng_new\" id=\"synonym_eng_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">---</div>\n";
            echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"add_syn_new\" value=\"Добавить синоним\" />\n";
            echo "<input type=\"button\" id=\"add_syn_new_cancel\" class=\"button\" value=\"Отменить\" /></div>\n";
          echo "</div>\n";
          echo "<input type=\"hidden\" name=\"table_syn\" id=\"table_syn\" value=\"".$table_syn."\">\n";
          echo "<input type=\"hidden\" name=\"term_id_syn\" id=\"term_id_syn\" value=\"".$term_id."\">\n";
      echo "</form>";
    echo "</div>\n";
//==========================Форма добавления синонима (конец)====================

  }
}
?>
