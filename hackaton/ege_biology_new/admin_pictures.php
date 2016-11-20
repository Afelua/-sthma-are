<?php
	$gets = "div=4&lev=3";
	echo "<div class=\"container\">";

		echo "<div class=\"subpage_area\">\n";
			echo "<div class=\"span-12 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">Изображения</h2>\n";
				echo "<p class=\"subpage_descr\"></p>\n";
			echo "</div>\n";
		echo "</div>\n";

		echo "<div class=\"span-24 blog2 notopmargin\">\n";

			$sum_img_page = 10; // число записей на странице
			$result_img_num = mysql_query("SELECT COUNT(*) AS a FROM $table_img"); // узнаём количество строк в таблице
			$arr_img_num = mysql_fetch_row($result_img_num); // возвращает неассоциативный массив

			$rec_img_num = $arr_img_num[0];  // общее число записей в таблице

				if(fmod($rec_img_num, $sum_img_page) == 0){$p_last = intval($rec_img_num/$sum_img_page);}
				else{$p_last = intval($rec_img_num/$sum_img_page) + 1;}

			// если страница существует, выводим её,иначе первую
				if(isset($_GET['p'])){
					$p = (int) $_GET['p'];
				}
				else{
					$p = 1;
				}
			// получем номер начальной записи страницы
			$start = ($p - 1) * $sum_img_page;
			// запрос на извлечение данных по конкретной странице
			$query_img = mysql_query("SELECT * FROM $table_img LIMIT $start, $sum_img_page");
			$query_img_ = mysql_num_rows($query_img); // возвращаем число строк результата запроса
			if(!$query_img_){echo exit(mysql_error());}
			if(mysql_num_rows($query_img) > 0){

				for ($i = 0; $i < $query_img_; $i++){
					$row_img = mysql_fetch_array($query_img);
						//==== Изображение (начало) ==============================================
						echo "<div class=\"separator_dash span-24\"></div>\n";
						echo "<div>\n";
							echo "<div class=\"span-7 notopmargin\">\n";
								echo "<div class=\"span-7 hover_img last\">\n";

									if(file_exists(RELPATH."media_min/".$row_img['file'].".".$row_img['fileformat'])){echo "<a title=\"\"><img src=\"".RELPATH."media_min/".$row_img['file'].".".$row_img['fileformat']."\" class=\"bordered_img last\" alt=\" \"/></a>\n";}
									else{echo "<a title=\"\"><img src=\"".RELPATH."media_min/0.jpg\" class=\"bordered_img last\" alt=\" \"/></a>\n";}

									echo "<div class=\"img_content\">\n";
								 		echo "<h4 class=\"strong\">".$row_img['file'].".".$row_img['fileformat']."</span></h4>\n";
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
				}

				echo "<div class=\"separator span-24\"></div>\n";

/*				echo 'Всего строк: '. $rec_img_num;
				echo "<br /> Выведено строк: ".$sum_img_page." (";
				echo $start+1;
				echo " &ndash; ";
				echo $start+$query_img_;
				echo ")<br />";
*/
				if($p_last > 1){
					$str_prev = $p - 1;
					$str_next = $p + 1;
					// ========= начало === pagination
					echo "<div class=\"span-24 clear\">\n";
						echo "<ul class=\"pagination\">\n";
							// если страница не первая, выводим ссылку НАЗАД
							if ($p > 1){
								echo "<li><a href=\"".PAGE_NAME."?".$gets."\">1</a></li>\n";
								echo "<li><a href=\"".PAGE_NAME."?".$gets."&p=".$str_prev."\">Назад</a></li>\n";
							}
							else{
								echo "<li><a>Назад</a></li>\n";
							}
							if($p > 5 AND $p < $p_last - 5){$pg_min = $p - 5; $pg_max = $p + 5;}
							elseif($p <= 5){$pg_min = 1; $pg_max = 11;}
							else{$pg_min = $p_last - 10; $pg_max = $p_last;}
							for($pg_min; $pg_min <= $pg_max; $pg_min++){
								if($pg_min == $p){$class_current_page = "class=\"current\"";}else{$class_current_page = "";}
								echo "<li ".$class_current_page."><a href=\"".PAGE_NAME."?".$gets."&p=".$pg_min."\">".$pg_min."</a></li>\n";
							}
							if($p < $p_last - 5) {
								echo "<li><a href=\"".PAGE_NAME."?".$gets."&p=".$str_next."\">Далее</a></li>\n";
								echo "<li><a href=\"".PAGE_NAME."?".$gets."&p=".$p_last."\">".$p_last."</a></li>\n";
							}
							elseif($p < $p_last) {
								echo "<li><a href=\"".PAGE_NAME."?".$gets."&p=".$str_next."\">Далее</a></li>\n";
							}
							else{
								echo "<li><a>Далее</a></li>\n";
							}
						echo "</ul>\n";
					echo "</div>\n";
					// ========= конец ==== pagination
				}

			}




		echo "</div>";

	echo "</div>   <!--End main container-->\n";
	echo "<div class=\"clear\"></div>";
?>
