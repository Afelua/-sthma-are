
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  require("base.php");
  if($_POST) {
    $code = $_POST['code'];

    $code = explode("-", $code);
    $table = $code[0]; // table
    $level_int = $code[1]; // level_int
    $left_key = $code[2]; // left_key
    $right_key = $code[3]; // right_key
    $taxon = $code[4]; // right_key

    $custom_page = "a_site/002_pages/001_custom_page/";
    $loc_page = "encyclopedia_edit/";

    echo "<script type=\"text/javascript\">
      \$(function() {
        \$(\"#add_node_new\").click(function(){
          var termin_rus_new = \$(\"#termin_rus_new\").val();
          var termin_lat_new = \$(\"#termin_lat_new\").val();
          var termin_eng_new = \$(\"#termin_eng_new\").val();
          var termin_description_new = \$(\"#termin_description_new\").val();
          var termin_taxon_new = \$(\"#termin_taxon_new\").val();
          var termin_start_new = \$(\"#termin_start_new\").val();
          var termin_finish_new = \$(\"#termin_finish_new\").val();
          var termin_sex_new = \$(\"#termin_sex_new\").val();
          var termin_learn_new = \$(\"#termin_learn_new\").val();
          var parent_table = \$(\"#parent_table\").val();
          var parent_level = \$(\"#parent_level\").val();
          var parent_left_key = \$(\"#parent_left_key\").val();
          var parent_right_key = \$(\"#parent_right_key\").val();
          \$.ajax({
            type: \"POST\",
            url: \"".$custom_page.$loc_page."node_add.php\",
            data: {
               \"termin_rus_new\": termin_rus_new,
               \"termin_lat_new\": termin_lat_new,
               \"termin_eng_new\": termin_eng_new,
               \"termin_description_new\": termin_description_new,
               \"termin_taxon_new\": termin_taxon_new,
               \"termin_start_new\": termin_start_new,
               \"termin_finish_new\": termin_finish_new,
               \"termin_sex_new\": termin_sex_new,
               \"termin_learn_new\": termin_learn_new,
               \"parent_table\": parent_table,
               \"parent_level\": parent_level,
               \"parent_left_key\": parent_left_key,
               \"parent_right_key\": parent_right_key,
            },
            cache: false,
            success: function(responseone){
              var messageRespone = new Array('Запись добавлена', 'Данные не обновлены или были заполненны не все поля');
              var resultStatone = messageRespone[Number(responseone)];
              if(responseone == 0){
              }
              \$(\"#node_add\").text(resultStatone).show().delay(2500).fadeOut(2400);
            }
          });
          return false;
        });
      });
      </script>";

    echo "<script type=\"text/javascript\">";
      echo "\$(function () {\n";
        echo "\$(\"#coach_new\").click(function(){\n";
          echo "\$(\"div#content\").load(\"".$custom_page.$loc_page."person_coach_load.php\",\n";
            echo "{ person_id: \"".$id."\" }\n";
          echo ");\n";
        echo "});\n";
        echo "\$(\"li#person_coach_load\").click(function(){\n";
          echo "\$(\"#nav2 li\").removeClass()\n";
          echo "\$(\"li#person_coach_load\").removeClass().addClass(\"current_page_item\")\n";
          echo "\$(\"div#content\").load(\"".$custom_page.$loc_page."person_coach_load.php\",\n";
              echo "{ person_id: \"".$id."\" }\n";
          echo ");\n";
        echo "});\n";
      echo "});\n";
    echo "</script>";
    //конец============Добавление комментария===============

/*


    if (mysql_num_rows($query_coach) > 0){
      $row_coach = mysql_fetch_array($query_coach);
      $lesson_number = 1;

//      echo "<span id=\"respone_coach_new\"></span>";
      do{
        $lesson_sdatetime = explode(" ", $row_coach['sdate']);
          $lesson_sdate = explode("-", $lesson_sdatetime[0]);
            $lesson_sdate_y = $lesson_sdate[0];
            $lesson_sdate_m = $lesson_sdate[1];
            $lesson_sdate_d = $lesson_sdate[2];
          $lesson_stime = explode(":", $lesson_sdatetime[1]);
            $lesson_stime_h = $lesson_stime[0];
            $lesson_stime_m = $lesson_stime[1];
        $lesson_fdatetime = explode(" ", $row_coach['fdate']);
          $lesson_fdate = explode("-", $lesson_fdatetime[0]);
            $lesson_fdate_y = $lesson_fdate[0];
            $lesson_fdate_m = $lesson_fdate[1];
            $lesson_fdate_d = $lesson_fdate[2];
          $lesson_ftime = explode(":", $lesson_fdatetime[1]);
            $lesson_ftime_h = $lesson_ftime[0];
            $lesson_ftime_m = $lesson_ftime[1];
        if($row_coach['status'] == "0"){$img = "_yellow"; $status_text = "<div class=\"right notice\">Назначено</div>";}
        elseif($row_coach['status'] == "1"){$img = "_green"; $status_text = "";}
        elseif($row_coach['status'] == "2"){$img = "_red"; $status_text = "<div class=\"right error\">Отменено</div>";}
        else{$img = "";}

        echo "<div class=\"comment_list\">\n";
          echo "<div class=\"comment alt\">\n";
          echo "<div class=\"comment_gravatar left\"><img alt=\"\" src=\"".$custom_page.$loc_page."sample-gravatar$img.jpg\" height=\"32\" width=\"32\" /></div>";
            echo "<div class=\"comment_author left\">\n";
              echo "<strong>".$row_coach['subject']."</strong> ";
              echo "<div class=\"comment_date\">";
                echo "<strong>Занятие №".$lesson_number++."</strong>. ";
                echo "<a href=\"\">".$lesson_sdate_d." ".get_russian_month_num($lesson_sdate_m)." ".$lesson_sdate_y." г.</a> ";
                echo $lesson_stime_h."<sup>".$lesson_stime_m."</sup> &ndash; ".$lesson_ftime_h."<sup>".$lesson_ftime_m."</sup>";
              echo"</div>\n";
            echo "</div>\n";
            echo $status_text;
            echo "<div class=\"clearer\">&nbsp;</div>";
            echo "<div class=\"comment_body\">";
              echo "<p>Тема: <em>".$row_coach['theme']."</em>.<br>";
              echo "".$row_coach['text']."<br>";
              echo "Оплата: ".$row_coach['payment']." руб.</p>";
            echo "</div>"; //close div "comment_body"
          echo "</div>";   //close div "comment alt"
        echo "</div>";     //close div "comment_list"
      } while($row_coach = mysql_fetch_array($query_coach));
    }
    else{
      echo "<div class=\"post\">\n";
        echo "<div class=\"error\">\n";
          echo "<strong>Занятия не проводились</strong>";
        echo "</div>";   //close div "post_meta"
      echo "</div>";     //close div "post"
    echo "<div class=\"clearer\">&nbsp;</div>\n";
    }
*/
//==========================Форма добавления термина (начало)===================
    echo "<div id=\"node_add\" class=\"data\">";
      echo "<form action=\"".$custom_page.$loc_page."node_add.php\" method=\"post\" id=\"node_add_new\">\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Русский термин</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"50\" name=\"termin_rus_new\" id=\"termin_rus_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Terminum latinum</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"50\" name=\"termin_lat_new\" id=\"termin_lat_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">English termin</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"50\" name=\"termin_eng_new\" id=\"termin_eng_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">Описание (код в международной номенклатуре)</div>\n";
            echo "<div class=\"\"><textarea rows=\"10\" cols=\"50\" name=\"termin_description_new\" id=\"termin_description_new\"></textarea></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">День появления структуры в онтогенезе</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"25\" name=\"termin_start_new\" id=\"termin_start_new\" value=\"\" /></div>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">День исчезновения структуры в онтогенезе</div>\n";
            echo "<div class=\"\"><input type=\"text\" size=\"25\" name=\"termin_finish_new\" id=\"termin_finish_new\" value=\"\" /></div>\n";
          echo "</div>\n";

          echo "<div class=\"\">\n";
            echo "<div class=\"\">Пол</div>\n";
            echo "<div class=\"\">\n";
              echo "<select size=\"1\" name=\"termin_sex_new\" id=\"termin_sex_new\">\n";
                echo "<option value=\"0\" selected=\"selected\">Общий</option>\n";
                echo "<option value=\"1\">Мужской</option>\n";
                echo "<option value=\"2\">Женский</option>\n";
              echo "</select>\n";
            echo "</div>\n";
          echo "</div>\n";

  if($taxon !== ""){
  $table_taxon = "2c_0_taxonrang";
  $query_text_taxon_add = "SELECT * FROM $table_taxon";
  $query_taxon_add = mysql_query($query_text_taxon_add);

    if(!$query_taxon_add){
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query_taxon_add) > 0){
      $row_taxon_add = mysql_fetch_array($query_taxon_add);
      echo "<div class=\"\">\n";
        echo "<div class=\"\">Таксон</div>\n";
        echo "<div class=\"\">\n";
      echo "<select size=\"1\" name=\"termin_taxon_new\" id=\"termin_taxon_new\">\n";
          do{
            if($row_taxon_add['parent_code'] == $taxon){
              $selected_taxon = "selected=\"selected\"";
            }
            else{
              $selected_taxon = "";
            }
            echo "<option value=\"".$row_taxon_add['id']."\" $selected_taxon>".$row_taxon_add['rusname']."</option>\n";
            unset($selected_taxon);
          }while($row_taxon_add = mysql_fetch_array($query_taxon_add));
          echo "</select>\n";
        echo "</div>\n";
      echo "</div>\n";
    }
  }


          echo "<div class=\"\">\n";
            echo "<div class=\"\">Изучение</div>\n";
            echo "<div class=\"\">\n";
              echo "<select size=\"1\" name=\"termin_learn_new\" id=\"termin_learn_new\">\n";
                echo "<option value=\"1\" selected=\"selected\">Внешнее строение</option>\n";
                echo "<option value=\"2\">Внутреннее строение</option>\n";
              echo "</select>\n";
          echo "</div>\n";
          echo "<div class=\"\">\n";
            echo "<div class=\"\">---</div>\n";
            echo "<div class=\"\"><input type=\"submit\" class=\"button\" name=\"button\" id=\"add_node_new\" value=\"Добавить термин\" />\n";
            echo "   <input type=\"reset\" class=\"button\" value=\"Отменить\" /></div>\n";
          echo "</div>\n";
          echo "<input type=\"hidden\" name=\"parent_table\" id=\"parent_table\" value=\"".$table."\">\n";
          echo "<input type=\"hidden\" name=\"parent_level\" id=\"parent_level\" value=\"".$level_int."\">\n";
          echo "<input type=\"hidden\" name=\"parent_left_key\" id=\"parent_left_key\" value=\"".$left_key."\">\n";
          echo "<input type=\"hidden\" name=\"parent_right_key\" id=\"parent_right_key\" value=\"".$right_key."\">\n";
      echo "</form>";
    echo "</div>\n";
//==========================Форма добавления термина (конец)====================

  }
}
?>