<?php
if(isset($_GET['code'])){define('TERMIN_ID', $_GET['code']);}
	else{define('TERMIN_ID', 0);}
define('TERMIN_ACTIVE', 'AND (active<=3 XOR active=0)');  // ��������� �������� �������� ������ (1 ��� 2-�������� �������, 3-���, 4-���������, 9-������...)

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" dir=\"ltr\" lang=\"ru\">";

echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	include_once ABSPATH."head.php";
	include_once ABSPATH."body.php";
echo "</html>";
?>