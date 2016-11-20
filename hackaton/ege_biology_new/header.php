<?php
echo "<div id=\"top_line\"></div>\n";
echo "<!--Header-->\n";

echo "<div id=\"header\">";
	echo "<div class=\"container\">";
		echo "<!--Logo-->\n";
		echo "<div class=\"span-7\">\n";
			echo "<div id=\"logo\">\n";
			echo "<a href=\"".PAGE_NAME."\"><img src=\"".RELPATH."images/logo.png\" alt=\"Logo\" /></a>\n";
		echo "</div>\n";
	echo "</div>\n";
	echo "<!--End Logo and stat menu area-->\n";
	echo "<div class=\"span-17 last\">\n";
		echo "<div class=\"sign\">\n";
				if ($_SESSION['egebio_user_rights'] > 0){ // если в сессии загружены логин и id
					echo "<p class=\"left hello\">&nbsp;";
						echo "Здравствуйте, <span class=\"colored\">".$_SESSION['doc_user_name']."</span>!\n";
					echo "</p>\n";
					echo "<form action=\"index.php\" method=\"post\">\n";
						echo "<p class=\"right last\">\n";
							echo "<input type=\"hidden\" name=\"exit\" value=\"exit\">\n";
							echo "<input type=\"submit\" name=\"submit\" class=\"submit\" value=\"Выйти\">&nbsp;";
						echo "</p>";
					echo "</form>\n";
				}
				if ($_SESSION['egebio_user_rights'] == 0){ // если в сессии не загружены логин и id
					echo "<form action=\"index.php\" method=\"post\">\n";
						echo "<p class=\"left\">&nbsp;";
						echo "</p>\n";
						echo "<p class=\"right last\">\n";
							echo "Логин: <input type=\"text\" name=\"login\" class=\"text\">&nbsp;&nbsp;&nbsp;\n";
							echo "Пароль: <input type=\"password\" name=\"password\" class=\"text\">&nbsp;&nbsp;&nbsp;\n";
							echo "<input type=\"submit\" name=\"submit\" id=\"submit\" class=\"submit\" value=\"Войти\">&nbsp;\n";
						echo "</p>";
					echo "</form>\n";
				}
			echo "</div>\n";
		echo "</div>\n";
		echo "<div class=\"span-17 last\">\n";
			include_once(RELPATH."menu.php");
		echo "</div>\n";
	echo "</div>\n";
echo "</div>\n";
echo "<div class=\"separator\"></div>\n";
echo "<!--End header-->\n";
?>