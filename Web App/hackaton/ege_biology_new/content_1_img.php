<?php
//===== начало
$row_img_own = $row_id['img'];
	$row_img_own_s = explode(".", $row_img_own);
$q_img = count($row_img_own_s);
if($row_img_own !== ""){
	echo "<div class=\"side_bar_widget notopmargin\">\n";
	echo "<h4 class=\"colored\">Изображения</h4>\n";
	$i=0;
	while (isset($row_img_own_s[$i])){
		$row_img_alls = $row_img_own_s[$i];
		$query_img = "SELECT * FROM ".$table."_img WHERE id = $row_img_alls ";
		$query_img_ = mysql_query($query_img);

		if(!$query_img_){echo exit(mysql_error());}
		if (mysql_num_rows($query_img_) > 0){
			$row_img = mysql_fetch_array($query_img_);
			if($row_img['rusname'] != ""){echo "<h5 class=\"colored notopmargin\">".$row_img['rusname']."</h5>\n";}
//			if($row_img['author'] != ""){echo "<p class=\"notopmargin\">".$row_img['author']."</p>\n";}
			echo "<p class=\"notopmargin\">";
				echo "<a rel=\"group\" href=\"".RELPATH."media/".$row_img['file'].".".$row_img['fileformat']."\" title=\"<strong>".$row_img['rusname']."</strong>.";
					if($row_img['author'] != ""){echo " (".$row_img['author'].")";}
					echo "<br>".$row_img['description']."\">";
					echo "<img src=\"".RELPATH."media_min/".$row_img['file'].".".$row_img['fileformat']."\" class=\"bordered_img last notopmargin\" alt=\"".$row_img['rusname']."\"/>\n";
				echo "</a>\n";
			echo "</p>\n";
//			if($row_img['description'] != ""){echo "<p class=\"notopmargin\">".$row_img['description']."</p>\n";}
			$i++;
			if($i != $q_img){ echo "<h3></h3>\n"; }
		}
	}
	echo "</div>";
}
//===== конец
echo "<script type=\"text/javascript\">\n";
echo "\$(function(){\n";
echo "  function formatTitle(title, currentArray, currentIndex, currentOpts) {\n";
echo "    return '<div id=\"tip-title\">' + ' <em>Рис. ' + (currentIndex + 1) + ' (из ' + currentArray.length + (title && title.length ? ').</em> ' + title + '' : '' ) + '<span><a href=\"javascript:;\" onclick=\"\$.fancybox.close();\"></a></span></div>';\n";
echo "  }\n";
echo "  \$(\"a[rel='group']\").fancybox({\n";
echo "    \"showCloseButton\": false,\n";
echo "    \"titlePosition\" : \"inside\",\n";
echo "    \"titleFormat\": formatTitle\n";
echo "  });\n";
echo "});\n";
echo "</script>\n";
?>