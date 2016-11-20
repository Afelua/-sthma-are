<?php
echo "<div class=\"container\">";

if(isset($_POST['search'])){
	include_once(RELPATH."content_1_srch.php");
}

	echo "<div class=\"subpage_area\">\n";
		echo "<div class=\"span-16 notopmargin\">\n";
			echo "<h2 class=\"subpage_title colored\">Методические рекомендации</h2>\n";
//			echo "<p class=\"subpage_descr\">: This is a custom page description.</p>\n";
		echo "</div>\n";
	echo "</div>\n";
echo "</div>\n";
echo "<div class=\"clear\"></div>";
?>