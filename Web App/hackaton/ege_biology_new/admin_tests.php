<?php
	echo "<div class=\"container\">";

		echo "<div class=\"subpage_area\">\n";
			echo "<div class=\"span-12 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">Изображения</h2>\n";
				echo "<p class=\"subpage_descr\"></p>\n";
			echo "</div>\n";
		echo "</div>\n";

		echo "<div class=\"span-24 blog2 notopmargin\">\n";
			$table_img = $table."_img";
			$query_img = "SELECT * FROM ".$table."_img LIMIT 10";
			$query_img_ = mysql_query($query_img);

			if(!$query_img_){echo exit(mysql_error());}
			if (mysql_num_rows($query_img_) > 0){
				$row_img = mysql_fetch_array($query_img_);
				do{
					//==== Изображение (начало) ==============================================
					echo "<div class=\"separator_dash span-24\"></div>\n";
					echo "<div>\n";
						echo "<div class=\"span-7 notopmargin\">\n";
							echo "<div class=\"span-7 hover_img last\">\n";
								echo "<a title=\"\"><img src=\"".RELPATH."media_min/".$row_img['file'].".".$row_img['fileformat']."\" class=\"bordered_img last\" alt=\" \"/></a>\n";
								echo "<div class=\"img_content\">\n";
							 		echo "<h4 class=\"strong\"><span data-id=\"".$table_img."-".$row_img['id']."-file\" class=\"task_edit\" contenteditable>".$row_img['file']."</span>.<span data-id=\"".$table_img."-".$row_img['id']."-fileformat\" class=\"task_edit\" contenteditable>".$row_img['fileformat']."</span></h4>\n";
								echo "</div>\n";
							echo "</div>\n";
						echo "</div>\n";

						echo "<div class=\"span-17 last\">\n";
							echo "<h4 class=\"block_header\">Название:&nbsp;<span data-id=\"".$table_img."-".$row_img['id']."-rusname\" class=\"task_edit\" contenteditable>".$row_img['rusname']."</span></h4>\n";
							echo "<p>Автор:&nbsp;<span data-id=\"".$table_img."-".$row_img['id']."-author\" class=\"task_edit\" contenteditable>".$row_img['author']."</span></p>\n";
							echo "<p class=\"small-italic\">Описание:&nbsp;<span data-id=\"".$table_img."-".$row_img['id']."-description\" class=\"task_edit\" contenteditable>".$row_img['description']."</span></p>\n";
							echo "<p>Тип изображения:&nbsp;<span data-id=\"".$table_img."-".$row_img['id']."-image_type\" class=\"task_edit\" contenteditable>".$row_img['image_type']."</span></p>\n";
		//					echo "<a class=\"button_readmore left\"  href=\"".PAGE_NAME."?div=3&lev=1\"></a>\n";
						echo "</div>\n";
					echo "</div>\n";
					//==== Изображение (конец) ===============================================
				}while($row_img = mysql_fetch_array($query_img_));
			}


		echo "</div>";
		echo "<div class=\"separator span-24\"></div>\n";

	echo "</div>   <!--End main container-->\n";
	echo "<div class=\"clear\"></div>";
?>
