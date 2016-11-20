<?php
echo "<div class=\"container\">";
//==========ТЕОРИЯ (начало)=====================================================
if(isset($_GET['les'])){
	define('LESSON_ID', $_GET['les']);
	$table_theory = $table."_lessons";
	$query_les_theory_text = "SELECT * FROM $table_theory WHERE id='".LESSON_ID."' ORDER BY theory_order";
	$query_les_theory = mysql_query($query_les_theory_text);
	if(!$query_les_theory){
		echo "Выбор теоретических вопросов данного урока. Поиск не осуществлен. Ошибка: <strong>";
		echo exit(mysql_error());
		echo "</strong>";
	}
	if (mysql_num_rows($query_les_theory) > 0){
		$row_les_theory = mysql_fetch_array($query_les_theory);

		$table_course = $table."_course";
		$query_course_text = "SELECT * FROM $table_course WHERE id=".$row_les_theory['course_id'];
		$query_course = mysql_query($query_course_text);
		if(!$query_course){
			echo "Выбор теоретических вопросов данного урока. Поиск не осуществлен. Ошибка: <strong>";
			echo exit(mysql_error());
			echo "</strong>";
		}
		if (mysql_num_rows($query_course) > 0){
			$row_course = mysql_fetch_array($query_course);
		}


		echo "<div class=\"subpage_area\">\n";
			echo "<div class=\"span-10 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">Урок <strong>".$row_les_theory['lesson_num']."</strong>. </h2>\n";
				echo "<div class=\"right \"><a href=\"".PAGE_NAME."?";
					echo "&div=";
					echo $_GET['div'];
					echo "&lev=";
					echo $_GET['lev'];
					echo "&course=";
					echo $row_les_theory['course_id'];
					echo "\">";
					echo $row_course['course_name'];
					echo ". ";
					echo $row_course['subcourse_name'];
				echo "</a> <strong>".$row_les_theory['lesson_name']."</strong></div>\n";
			echo "</div>\n";
		echo "</div>\n";
		$row_les_theory_own = $row_les_theory['theory_id'];
			$row_les_theory_own_s = explode(".", $row_les_theory_own);
		$q_les_theory = count($row_les_theory_own_s);
		if($row_les_theory_own !== ""){
			$les_theory_i=0;
			echo "<div class=\"span-16 columns\">";
				$menutheory = "<ul class=\"navigation-sidebar\">\n";
				while (isset($row_les_theory_own_s[$les_theory_i])){
					$row_les_theory_alls = $row_les_theory_own_s[$les_theory_i];
					$row_les_theory_code = explode("-", $row_les_theory_alls);
					$row_theory_id = $row_les_theory_code['0'];
					$row_theory_level = $row_les_theory_code['1'];
					include "content_2_lesson_theory.php";
					$les_theory_i++;
				}
				$menutheory = $menutheory."</ul>\n";

			echo "</div>";
			echo "<div class=\"side_bar\">\n";

				echo "<div id=\"side_bar_widget\" class=\"side_bar_widget notopmargin\">\n";
					echo "<img class=\"cup\" src=\"".RELPATH."images/icons/cup.png\" alt=\" \"/>\n";
					echo "<h4 class=\"colored\">Урок ".$row_les_theory['lesson_num'].".</h4>\n";
					echo "<h5 class=\"bold\">Тема: «<span class=\"colored\">".$row_les_theory['lesson_name']."</span>»</h5>\n";
					echo "<p></p>\n";
					echo "<h5><span class=\"bold\">Теория</span></h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo $menutheory;
					echo "<p></p>\n";
	//				echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<h5><span class=\"bold\">Методические рекомендации</span></h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p class=\"small\"></p>\n";
					echo "<h5><span class=\"bold\">Домашнее задание</span></h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p class=\"small\"></p>\n";
					echo "<h5><span class=\"bold\">Дополнительнаямая литература</span></h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p class=\"small\"></p>\n";
				echo "</div>\n";

	/*			echo "<div class=\"side_bar_widget\">\n";
					echo "<h4 class=\"colored\">Template navigation</h4>\n";
					echo "<ul class=\"navigation-sidebar\">\n";
						echo "<li><a href=\"blog-post.html\">Устный опрос</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Актуализация новой темы</a></li>\n";
						echo "<li><a href=\"blog.html\">Blog</a></li>\n";
						echo "<li class=\"current\"><a href=\"blog-2.html\">Blog Style II</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Практическая работа</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Тест</a></li>\n";
					echo "</ul>\n";
				echo "</div>\n";
	*/
			echo "</div>\n";
			echo "<div class=\"clear\"></div>";
//==========ТЕОРИЯ (конец)======================================================
		}
	}
}
elseif(isset($_GET['course'])){
	define('COURSE_ID', $_GET['course']);
	$table_course = $table."_course";
	$query_course_text = "SELECT * FROM $table_course WHERE id=".COURSE_ID;
	$query_course = mysql_query($query_course_text);
	if(!$query_course){
		echo "Выбор теоретических вопросов данного урока. Поиск не осуществлен. Ошибка: <strong>";
		echo exit(mysql_error());
		echo "</strong>";
	}
	if (mysql_num_rows($query_course) > 0){
		$row_course = mysql_fetch_array($query_course);
		echo "<div id=\"subpage_area\" class=\"subpage_area\">\n";
			echo "<div class=\"span-20 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">".$row_course['course_name']."</h2>\n";
			echo "</div>\n";
		echo "</div>\n";
		echo "<div class=\"span-16 columns\">";
			echo "<div class=\"span-1-col notopmargin\">";
				echo "<div class=\"span_1_col_h\">".$row_course['subcourse_name']."</div>";
			echo "</div>\n";
			$table_theory = $table."_lessons";
			$query_lessons_text = "SELECT * FROM $table_theory WHERE course_id='".$row_course['id']."' ORDER BY lesson_num";
			$query_lessons = mysql_query($query_lessons_text);
			if(!$query_lessons){
				echo "Выбор теоретических вопросов данного урока. Поиск не осуществлен. Ошибка: <strong>";
				echo exit(mysql_error());
				echo "</strong>";
			}
			if (mysql_num_rows($query_lessons) > 0){
				$row_lessons = mysql_fetch_array($query_lessons);
				echo "<table class=\"bordered\">";
					echo "<tr><th>№</th><th>Тематический план уроков</th></tr>";
					do {
						echo "<tr><td>".$row_lessons['lesson_num']."</td>";
							echo "<td><a href=\"".PAGE_NAME."?";
								echo "&div=";
								echo $_GET['div'];
								echo "&lev=";
								echo $_GET['lev'];
								echo "&les=";
								echo $row_lessons['id'];
								echo "\">";
								echo "".$row_lessons['lesson_name']."";
							echo "</a></td></tr>";
	        } while ($row_lessons = mysql_fetch_array($query_lessons));
				echo "</table>";
			}
		echo "</div>";
		$query_subcourse_text = "SELECT * FROM $table_course WHERE course_name='".$row_course['course_name']."'";
		$query_subcourse = mysql_query($query_subcourse_text);
		if(!$query_subcourse){
			echo "Выбор данного урока. Поиск не осуществлен. Ошибка: <strong>";
			echo exit(mysql_error());
			echo "</strong>";
		}
		if (mysql_num_rows($query_subcourse) > 0){
			$row_subcourse = mysql_fetch_array($query_subcourse);
			echo "<div class=\"side_bar\">\n";
				echo "<div id=\"side_bar_widget\" class=\"side_bar_widget notopmargin\">\n";
					echo "<img class=\"cup\" src=\"".RELPATH."images/icons/cup.png\" alt=\" \"/>\n";
					echo "<h4 class=\"colored\">".$row_course['course_name']."</h4>\n";
					echo "<ul class=\"navigation-sidebar\">\n";
						do{
							if($row_subcourse['id'] == COURSE_ID){$class_current = "class=\"current\"";}
							else{$class_current = "";}
							echo "<li $class_current><a href=\"".PAGE_NAME."?";
								echo "&div=";
								echo $_GET['div'];
								echo "&lev=";
								echo $_GET['lev'];
								echo "&course=";
								echo $row_subcourse['id'];
								echo "\">".$row_subcourse['subcourse_name']."</a></li>\n";
							unset($class_current);
						}while($row_subcourse = mysql_fetch_array($query_subcourse));
					echo "</ul>\n";
				echo "</div>\n";
			echo "</div>\n";
		}
		echo "<div class=\"clear\"></div>";
	}
}
else{
	$table_course = $table."_course";
	$query_course_text = "SELECT * FROM $table_course GROUP BY course_name";
	$query_course = mysql_query($query_course_text);
	if(!$query_course){
		echo "Выбор теоретических вопросов данного урока. Поиск не осуществлен. Ошибка: <strong>";
		echo exit(mysql_error());
		echo "</strong>";
	}
	if (mysql_num_rows($query_course) > 0){
		$row_course = mysql_fetch_array($query_course);
		echo "<div id=\"subpage_area\" class=\"subpage_area\">\n";
			echo "<div class=\"span-20 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">Уроки</h2>\n";
			echo "</div>\n";
		echo "</div>\n";
		echo "<div class=\"span-16 columns\">";
			do{
				echo $row_course['course_name'];
			}while($row_course = mysql_fetch_array($query_course));
		echo "</div>";
			echo "<div class=\"side_bar\">\n";

				echo "<div id=\"side_bar_widget\" class=\"side_bar_widget notopmargin\">\n";
					echo "<img class=\"cup\" src=\"".RELPATH."images/icons/cup.png\" alt=\" \"/>\n";
					echo "<h4 class=\"colored\">Структура занятия</h4>\n";
					echo "<p></p>\n";
					echo "<h5><span class=\"colored bold\">5 мин</span> | Проверка домашнего задания</h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p></p>\n";
					echo "<h5><span class=\"colored bold\">10 мин</span> | Блиц-опрос</h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p></p>\n";
					echo "<h5><span class=\"colored bold\">35 мин</span> | Объяснение новой темы</h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo $menutheory;
					echo "<p></p>\n";
	//				echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<h5><span class=\"colored bold\">35 мин</span> | Обсуждение новой темы</h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p class=\"small\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,</p>\n";
					echo "<h5><span class=\"colored bold\">5 мин</span> | Подведение итогов заянтия</h5>\n";
					echo "<div class=\"separator_dash span-7 notopmargin\"></div>";
					echo "<p class=\"small\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,</p>\n";
				echo "</div>\n";

	/*			echo "<div class=\"side_bar_widget\">\n";
					echo "<h4 class=\"colored\">Template navigation</h4>\n";
					echo "<ul class=\"navigation-sidebar\">\n";
						echo "<li><a href=\"blog-post.html\">Устный опрос</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Актуализация новой темы</a></li>\n";
						echo "<li><a href=\"blog.html\">Blog</a></li>\n";
						echo "<li class=\"current\"><a href=\"blog-2.html\">Blog Style II</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Практическая работа</a></li>\n";
						echo "<li><a href=\"blog-post.html\">Тест</a></li>\n";
					echo "</ul>\n";
				echo "</div>\n";
	*/
			echo "</div>\n";
			echo "<div class=\"clear\"></div>";
	}

}

echo "</div>   <!--End main container-->\n";
echo "<div class=\"clear\"></div>";
?>
