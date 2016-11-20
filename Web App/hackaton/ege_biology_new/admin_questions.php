<?php
if(isset($_GET['lev'])){
	switch($_GET['lev']):
		case 1: include_once(RELPATH."admin_tests.php"); break;
		case 2: include_once(RELPATH."admin_ege.php"); break;
		case 3: include_once(RELPATH."admin_pictures.php"); break;
//		case 3: include_once(RELPATH."noauthor_olymp.php"); break;
	endswitch;
}
else{
	echo "<div class=\"container\">";

		echo "<div class=\"subpage_area\">\n";
			echo "<div class=\"span-12 notopmargin\">\n";
				echo "<h2 class=\"subpage_title colored\">Контроль уровня знаний</h2>\n";
				echo "<p class=\"subpage_descr\"></p>\n";
			echo "</div>\n";
		echo "</div>\n";

		echo "<div class=\"span-16 blog2 notopmargin\">\n";
			echo "<div>\n";
				echo "<div class=\"span-8 notopmargin\">\n";
					echo "<div class=\"span-8 hover_img last\">\n";
						echo "<a title=\"\"><img src=\"".RELPATH."images/gallery/bio-lesson-school.jpg\" class=\"bordered_img last\" alt=\" \"/></a>\n";
						echo "<div class=\"img_content\">\n";
							echo "<!--<h3>100 баллов на ЕГЭ</h3>-->\n";
					 		echo "<h3>Хорошая успеваемость</h3>\n";
						echo "</div>\n";
						echo "<div class=\"hover_img_content\">\n";
							echo "<div class=\"meta2\">Автор: <a class=\"link\" href=\"\">".MY_FNAME." ".MY_NAME_IN."</a></div>\n";
							echo "<div class=\"meta2\">Классы: <a href=\"\" class=\"link\">6</a>, <a href=\"\" class=\"link\">7</a>, <a href=\"\" class=\"link\">8</a>, <a href=\"\" class=\"link\">9</a>, <a href=\"\" class=\"link\">10</a>, <a href=\"\" class=\"link\">11</a></div>\n";
							echo "<div class=\"meta2\">Курсы: <a href=\"\" class=\"link\">Базовый</a>, <a href=\"\" class=\"link\">Углублённый</a></div>\n";
					echo "</div>\n";
				echo "</div>\n";
			echo "</div>\n";

			echo "<div class=\"span-8 last\">\n";
				echo "<h4 class=\"block_header\">Школьный курс биологии</h4>\n";
				echo "<p>Структура школьного курса биологии отчетливо отражена в программах по биологии, в которых содержание биологического образования школьников распределено по темам, разделам и годам обучения.</p>\n";
				echo "<p class=\"small-italic\">В истории отечественной школы сложилась традиционная система последовательного изучения биологического материала по объектам живой природы: растения, животные, организм человека и обобщающего курса общей биологии, раскрывающего закономерности природы на разных уровнях ее организации.</p>\n";
				echo "<a class=\"button_readmore left\"  href=\"".PAGE_NAME."?div=3&lev=1\"></a>\n";
			echo "</div>\n";
		echo "</div>\n";

		echo "<div class=\"separator_dash span-16\"></div>\n";

		echo "<div>\n";
			echo "<div class=\"span-8 notopmargin\">\n";
				echo "<div class=\"span-8 hover_img last\">\n";
					echo "<a title=\"\"><img src=\"".RELPATH."images/gallery/bio-lesson-ege.jpg\" class=\"bordered_img last\" alt=\" \"/></a>\n";
					echo "<div class=\"img_content\">\n";
						echo "<h3>Высокий балл на ЕГЭ</h3>\n";
					echo "</div>\n";
					echo "<div class=\"hover_img_content\">\n";
						echo "<div class=\"meta2\">Автор: <a class=\"link\" href=\"\">".MY_FNAME." ".MY_NAME_IN."</a></div>\n";
						echo "<div class=\"meta2\">Курсы: <a href=\"\" class=\"link\">Два года</a>, <a href=\"\" class=\"link\">Один год</a></div>\n";
						echo "<div class=\"meta2\">Экспресс-курсы: <a href=\"\" class=\"link\">6 месяцев</a>, <a href=\"\" class=\"link\">3 месяца</a>, <a href=\"\" class=\"link\">1 месяц</a></div>\n";
					echo "</div>\n";
				echo "</div>\n";
			echo "</div>\n";

			echo "<div class=\"span-8 last\">\n";
				echo "<h4 class=\"block_header\">Курс подготовки к ЕГЭ</h4>\n";
				echo "<p>Индивидуальные занятия с репетитором дают возможность ученику уверенно чувствовать при ответе на незнакомые вопросы, опираясь на базовые знания, понимание предмета и логику.</p>\n";
				echo "<p class=\"small-italic\">Система подготовки к ЕГЭ представляет собой учебно-методический комплекс, который включает в себя учебные программы, учебно-методические пособия, тренировочные задания, контрольно-измерительные материалы, индивидуальные программы.</p>\n";
				echo "<a class=\"button_readmore left\"  href=\"".PAGE_NAME."?div=3&lev=2\"></a>\n";
			echo "</div>\n";
		echo "</div>\n";

		echo "<div class=\"separator_dash span-16\"></div>\n";

		echo "<div>\n";
			echo "<div class=\"span-8 notopmargin\">\n";
				echo "<div class=\"span-8 hover_img last\">\n";
					echo "<a title=\"\"><img src=\"".RELPATH."images/gallery/bio-lesson-olymp.jpg\" class=\"bordered_img last\" alt=\" \"/></a>\n";
					echo "<div class=\"img_content\">\n";
						echo "<h3>В ВУЗ без экзаменов</h3>\n";
					echo "</div>\n";
					echo "<div class=\"hover_img_content\">\n";
						echo "<div class=\"meta2\">Автор: <a class=\"link\" href=\"\">".MY_FNAME." ".MY_NAME_IN."</a></div>\n";
						echo "<div class=\"meta2\"> <!--Комментарии: <a class=\"link\" href=\"\">34</a>--></div>\n";
						echo "<div class=\"meta2\">Подготовка: <a href=\"\" class=\"link\">Олимпиады вузов</a></div>\n";
					echo "</div>\n";
				echo "</div>\n";
			echo "</div>\n";

			echo "<div class=\"span-8 last\">\n";
				echo "<h4 class=\"block_header\">Олимпиады по биологии</h4>\n";
				echo "<p>Главная цель олимпиад — выявление талантливой молодежи, развитие индивидуального творческого потенциала, популяризация науки. Творческий характер и высокий уровень олимпиадных заданий позволяет наиболее талантливым из числа учащихся 5-11 классов проявить свои способности.</p>\n";
				echo "<p class=\"small-italic\">Олимпиады, входящие в перечень олимпиад школьников Министерства образования и науки РФ, дают право их победителям и призерам претендовать на одну из льгот при поступлении в вузы РФ (поступление без вступительных испытаний или 100 баллов по профильному предмету ЕГЭ).</p>\n";
				echo "<a class=\"button_readmore left\"  href=\"".PAGE_NAME."?div=3&lev=3\"></a>\n";
			echo "</div>\n";
		echo "</div>\n";
	echo "</div>";

		echo "<div class=\"side_bar\">\n";

			echo "<div class=\"side_bar_widget notopmargin\">\n";
				echo "<img class=\"cup\" src=\"".RELPATH."images/icons/cup.png\" alt=\" \"/>\n";
				echo "<h4 class=\"colored\">Работа на занятии</h4>\n";
				echo "<h5><span class=\"colored bold\">10 мин</span> | <a href=\"blog-post.html\">Проверка домашнего задания</a></h5>\n";
					echo "<ul class=\"navigation-sidebar\">\n";
						echo "<li>Темины и определения</li>\n";
						echo "<li>Проверка устного задания</li>\n";
						echo "<li>Проверка письменного задания</li>\n";
						echo "<li>Работа над ошибками</li>\n";
					echo "</ul>\n";
				echo "<p></p>\n";

				echo "<h5><span class=\"colored bold\">10 мин</span> | Блиц-опрос</h5>\n";
				echo "<p class=\"small\">Блиц-опрос представлят собой череду вопросов, для формирования навыка быстрого поиска решения нестандартной ситуации.</p>\n";

				echo "<h5><span class=\"colored bold\">35 мин</span> | Объяснение новой темы</h5>\n";
				echo "<p class=\"small\">Проводится в форме монолога, изображения и пояснения схем и рисунков, просмотра мультимедийных презентаций и видеофильмов.<br>При объяснении новой темы ученику периодически адресуются вопросы, повторяющие пройденный материал, с целью формирования связей данной темы с ранее изученными темами, смежными предметами.</p>\n";

				echo "<h5><span class=\"colored bold\">30 мин</span> | Обсуждение</h5>\n";
				echo "<p class=\"small\">При изучении новой темы рассматриваются ситуационные задачи, случаи из жизни.<br>Ученику предлагаются определённые алгоритмы решения задач, большое внимание уделяется творческому процессу мышления, обсуждению противоположных точек зрения в различных ситуациях.</p>\n";

				echo "<h5><span class=\"colored bold\">5 мин</span> | Подведение итогов заянтия</h5>\n";
				echo "<p class=\"small\">Проводится с целью отметить наиболее существенные моменты, подготовить ученика к правильной последовательность действий при выполнении домашнего задания.</p>\n";
			echo "</div>\n";

/*			echo "<div class=\"side_bar_widget\">\n";
				echo "<h4 class=\"colored\">Домашнее задание</h4>\n";
				echo "<ul class=\"navigation-sidebar\">\n";
					echo "<li class=\"current\"><a href=\"blog-2.html\">Прочитать</a></li>\n";
					echo "<li><a href=\"blog-post.html\">Выучить термины и определения</a></li>\n";
					echo "<li><a href=\"blog-post.html\">Отвтетить на вопросы устно</a></li>\n";
					echo "<li><a href=\"blog.html\">Выполнить письменно</a></li>\n";
					echo "<li><a href=\"blog-post.html\">Практическая работа</a></li>\n";
					echo "<li><a href=\"blog-post.html\">Решить тест</a></li>\n";
				echo "</ul>\n";
			echo "</div>\n";
*/
		/*	echo "<div class=\"side_bar_widget\">\n";
				echo "<h4 class=\"colored\">Recent project</h4>\n";
				echo "<div class=\"span-6 notopmargin hover_img\">\n";
					echo "<a  title=\"\"><img src=\"<?php echo RELPATH;?>images/gallery/4col-2.jpg\" class=\"bordered_img last\" alt=\" \"/></a>\n";
					echo "<div class=\"hover_img_content\">\n";
						echo "<h4>Project title</h4>\n";
						echo "<a href=\"http://themeforest.net/user/OrangeIdea/portfolio?ref=OrangeIdea\" class=\"hover_img_content_link1 right\"  target=\"blank\"></a>\n";
						echo "<a href=\"portfolio-details.html\" class=\"hover_img_content_link2 right\"></a>\n";
						echo "<a href=\"<?php echo RELPATH;?>images/slide-1-1.jpg\" rel=\"prettyPhoto\" class=\"hover_img_content_link3 right\"></a>\n";
					echo "</div>\n";
				echo "</div>\n";
			echo "</div>\n";

			echo "<div class=\"side_bar_widget\">\n";
				echo "<h4 class=\"colored\">Blog Categories</h4>\n";
				echo "<ul class=\"navigation-sidebar\">\n";
					echo "<li class=\"current\"><a href=\"\">Web templates</a></li>\n";
					echo "<li><a href=\"l\">Logo Design</a></li>\n";
					echo "<li><a href=\"\">Print & Media</a></li>\n";
					echo "<li><a href=\"\">CSS3 Ttutorials</a></li>\n";
					echo "<li><a href=\"\">Uncotigorized</a></li>\n";
				echo "</ul>\n";
			echo "</div>\n";

			echo "<!--<div class=\"side_bar_widget\">\n";
			echo "<div class=\"header\">\n";
			echo "<h4 class=\"colored\">Advertising</h4>\n";
			echo "</div>\n";
			echo "<div class=\"img-align-center\"><a href=\"\" title=\"\"><img src=\"http://envato.s3.amazonaws.com/referrer_adverts/tf_260x120_v4.gif\" alt=\" \" /></a></div>\n";
			echo "<br/>\n";
			echo "<div class=\"img-align-center\"><a href=\"\" title=\"\"><img src=\"http://envato.s3.amazonaws.com/referrer_adverts/gr_260x120_v4.gif\" alt=\" \" /></a></div>\n";
			echo "</div>\n";
			echo "\n";
			echo "<div class=\"side_bar_widget\">\n";
			echo "<h4 class=\"colored\">Video widget</h4>\n";
			echo "<iframe src=\"http://player.vimeo.com/video/23534361?title=0&lt;amp;byline=0&lt;amp;portrait=0\" width=\"260\" height=\"150\" >\n";
			echo "</iframe>\n";
			echo "</div>\n";
			echo "-->\n";
		*/
		echo "</div>\n";
	echo "</div>   <!--End main container-->\n";
	echo "<div class=\"clear\"></div>";
}


?>