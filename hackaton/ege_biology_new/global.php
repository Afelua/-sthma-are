<?php
$page=NULL;

function open_page($title, $description, $keywords)
{
  global $page;
  $page = new Page($title, $description, $keywords);
  $page->open();
  return $page;
}

function close_page()
{
  global $page;
  if ($page==NULL)
  return;
  $page->close();
  $page=NULL;
}

function get_page()
{
  global $page;
  return $page;
}

class Page
{
  private $_title;
  private $_description;
  private $_keywords;

  function __construct($title, $description, $keywords)
  {
    $this->_title = $title;
    $this->_description = $description;
    $this->_keywords = $keywords;
  }

  public function open()
  {
    echo "<!DOCTYPE HTML>\n";
    echo "<html>\n";
    echo "<head>\n";
    echo "<title>".$this->_title."</title>\n";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=windows-1251'>\n";
    echo "<meta name='description' content='".$this->_description."'>\n";
    echo "<meta name='keywords' content='".$this->_keywords."'>\n";
    echo "  <link rel=\"stylesheet\" href=\"".$GLOBALS['css']."notebook.css\" type=\"text/css\">\n";
    echo "  <link rel=\"stylesheet\" href=\"".$GLOBALS['css']."encyclopedia.css\" type=\"text/css\">\n";
    echo "  <link rel=\"stylesheet\" href=\"".$GLOBALS['css']."jqueryui.custom.css\" type=\"text/css\" />";
    echo "  <link rel=\"stylesheet\" href=\"".$GLOBALS['css']."jquery.fancybox-1.3.4.css\" type=\"text/css\" />";  //Стиль открывающегося изображения из галереи
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."jquery.js\"></script>\n";
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."nd_editable.js\"></script>\n";
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."encyclopedia.js\"></script>\n";
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."jqueryui.custom.js\"></script>\n";
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."jquery-ui.js\"></script>\n";
    echo "  <script type=\"text/javascript\" src=\"".$GLOBALS['js']."jquery.fancybox-1.3.4.js\"></script>\n"; //Скрипт открытия изображения из галереи
    echo "</head>\n";
    echo "<body>\n";
  }

  public function begin_header()
  {
    echo "<div class=\"frame\">\n";
    echo "  <div class=\"header\">\n";
  }

  public function end_header()
  {
    echo "  </div>\n";
  }


  public function begin_left_side()
  {
    echo "  <div class=\"main\">\n";
    echo "    <div class=\"main-side-left\">\n";
  }

  public function end_left_side()
  {
    echo "    </div>\n";
  }

  public function begin_right_side()
  {
    echo "    <div class=\"main-side-right\">\n";
  }

  public function end_right_side()
  {
    echo "    </div>\n";
    echo "  </div>\n";
  }

  public function begin_center()
  {
    echo "  <div class=\"main-center\">\n";
  }

  public function end_center()
  {
    echo "  </div>\n";
  }

  public function begin_footer()
  {
    echo "  <div class=\"footer-proxy\"></div>\n";
    echo "  <div class=\"footer\">\n";
  }

  public function end_footer()
  {
    echo "  </div>\n";
    echo "</div>";
  }

  public function close()
  {
    echo "</body>\n";
    echo "</html>";
  }
}

function menu($menu_name, $img, $menu_scr)
{
  echo "<td>\n";
  echo "  <div class=\"menu\" href=\"$menu_scr\">\n";
  echo "    <div>\n";
  echo "      <a href=\"$menu_scr\"><img class=\"img\" src=\"".$GLOBALS['picture'].$img."\" border=\"0\" alt=\"\" /></a>\n";
  echo "    </div>\n";
  echo "    <div>".$menu_name."</div>\n";
  echo "  </div>\n";
  echo "</td>\n";
}

function date_pr($date_pr)   // Преобразование даты в вид "ДД.ММ.ГГГГ"
{
  if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date_pr, $regb))
  {
    echo "$regb[3].$regb[2].$regb[1]";
  }
  else
  {
    echo "Неверный формат даты: $date";
  }
}

  function get_age($date)
    {
      if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date, $reg))
      {
        $day = $reg[3];
        $month = $reg[2];
        $year = $reg[1];
      }
      if ($month > date('m') || $month == date('m') && $day > date('d'))
          $year_result = (string)(date('Y') - $year - 1);
      else
          $year_result = (string)(date('Y') - $year);
      $last_numeral = intval($year_result[strlen($year_result) - 1]);
      if ($last_numeral == 1)
          $text_year = 'год';
      else if ($last_numeral >= 2 && $last_numeral <= 4)
          $text_year = 'года';
      else
          $text_year = 'лет';
      return $year_result.' '.$text_year;
    }


function date_pr_v($date_pr)   // Преобразование даты в вид "ДД.ММ.ГГГГ"
{
  if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date_pr, $regb))
  {
    echo "$regb[3].$regb[2].$regb[1]";
    echo " (".get_age($date_pr).")";
  }
  else
  {
    echo "Неверный формат даты: $date";
  }
}

function adr_disp ($adress, $adr_des)
{
  if($adress == TRUE)
  {
    echo $adr_des.$adress;
  }
  else{ echo "";}
}
function adr_hide ($adress, $adr_des)
{
  if($adress == TRUE)
  {
    echo "<div class=\"cell_adress\">";
    echo $adr_des.$adress;
    echo "</div>";
  }
  else{ echo "";}
}

function adr_disp_set ($set, $flag, $path)
{
  if($set == TRUE)
  {
    echo "<div class=\"cell_count\">";
    echo "<img width=\"60\" src=\"".$GLOBALS['images']."002_symbol/".$path."/".$flag.".png\" border=\"0\" alt=\"\" /><br />";
    echo $set;
    echo "</div>";
  }
  else{ echo "";}
}
function adr_disp_ed ($ed_id, $org_ed, $flag_ed, $path_ed)
{
  if($org_ed == TRUE)
  {
    echo "<div class=\"cell_count\">";
    echo "<img width=\"60\" src=\"../img/".$path_ed."/".$flag_ed.".png\" border=\"0\" alt=\"\" />";
    echo "<br /><a href=\"../1_organiz/page.php?id=".$ed_id."\">".$org_ed."</a>";
    echo "</div>";
  }
  else{ echo "";}
}
function get_taxon($taxon, $lang_taxon)
{
  $query_text_get_taxon = "SELECT * FROM 2c_0_taxonrang WHERE id=$taxon";
  $query_get_taxon = mysql_query($query_text_get_taxon);

    if(!$query_get_taxon)
    {
      echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
      echo exit(mysql_error());
    }
    if (mysql_num_rows($query_get_taxon) > 0)
    {
      $row_get_taxon = mysql_fetch_array($query_get_taxon);
    }
    if(isset($lang_taxon)){
      if($lang_taxon == "rus"){
        return $row_get_taxon['rusname'];
      }
      elseif($lang_taxon == "lat"){
        return $row_get_taxon['latname'];
      }
      elseif($lang_taxon == "eng"){
        return $row_get_taxon['engname'];
      }
    }
    else {
//      return $row_get_taxon['rusname'];
    }

}
?>