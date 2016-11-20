<?php
echo "<body>\n";
  include_once(RELPATH."doctor.php");
/*if(isset($_GET['div']) AND USER_RIGHTS == '1'){            //Администратор
switch($_GET['div']):
  case 1: include_once(RELPATH."doctor.php"); break;
  case 2: include_once(RELPATH."admin_guidelines.php"); break;
  case 3: include_once(RELPATH."admin_lessons.php"); break;
  case 4: include_once(RELPATH."admin_questions.php"); break;
  case 5: include_once(RELPATH."admin_comments.php"); break;
endswitch;
}



//	echo "<br>USER_RIGHTS=".USER_RIGHTS;
	echo "<div class=\"pattern\"></div>\n";
	echo "<div class=\"box\">\n";
		echo "<!--Main wrapper-->\n";
		echo "<div id=\"main_wrapper\">\n";
			include_once(RELPATH."header.php");

			elseif(isset($_GET['div']) AND USER_RIGHTS == '2'){        //Пользователь
				switch($_GET['div']):
					case 1: include_once(RELPATH."user_theory.php"); break;
					case 2: include_once(RELPATH."user_guidelines.php"); break;
					case 3: include_once(RELPATH."user_lessons.php"); break;
					case 4: include_once(RELPATH."user_questions.php"); break;
					case 5: include_once(RELPATH."user_comments.php"); break;
				endswitch;
			}
			elseif(isset($_GET['div']) AND USER_RIGHTS == '3'){        //Гость
				switch($_GET['div']):
					case 1: include_once(RELPATH."guest_theory.php"); break;
					case 2: include_once(RELPATH."guest_guidelines.php"); break;
					case 3: include_once(RELPATH."guest_lessons.php"); break;
					case 4: include_once(RELPATH."guest_questions.php"); break;
					case 5: include_once(RELPATH."guest_comments.php"); break;
				endswitch;
			}
			elseif(isset($_GET['div']) AND USER_RIGHTS == '0'){        //Неавторизированный пользователь
				switch($_GET['div']):
					case 1: include_once(RELPATH."noauthor_theory.php"); break;
					case 2: include_once(RELPATH."noauthor_guidelines.php"); break;
					case 3: include_once(RELPATH."noauthor_lessons.php"); break;
					case 4: include_once(RELPATH."noauthor_questions.php"); break;
					case 5: include_once(RELPATH."noauthor_comments.php"); break;
				endswitch;
			}
			else{
				switch(USER_RIGHTS):
					case 0: include_once(RELPATH."main_noauthor.php"); break;
					case 1: include_once(RELPATH."main_admin.php"); break;
					case 2: include_once(RELPATH."main_user.php"); break;
					case 3: include_once(RELPATH."main_guest.php"); break;
				endswitch;
			}
			include_once(RELPATH."footer.php");
		echo "</div>\n";
		echo "<!--End main wrapper-->\n";
		echo "<div class=\"clear\"></div>\n";
	echo "</div>\n";
*/
echo "</body>\n";
?>