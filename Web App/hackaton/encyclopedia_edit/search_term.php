<?php
//include "base.php";
include "../../../../global_path.php";
if(!isset($_POST['search_term'] ))
header('Location: page.php');
$id = $_POST['search_term'];
  $code = explode("-", $id);
  $term = $code[0];  // search_term
  $table = $code[1]; //table
  $level = $code[2]; //level
  $taxon = $code[3]; //taxon
    if($taxon !== "") $taxon = "&tax=".$taxon;

if($term !== ""){
  $colon_id = "id";
  $colon_name = "rusname";
  $colon_level = "level_int";
  $colon_left_key = "left_key";
  $colon_right_key = "right_key";

/*$term = mysql_real_escape_string(strip_tags(substr($term, 0, 100)));

  $query1 = mysql_query("SELECT * FROM $table WHERE rusname LIKE '%$term%' ORDER BY $colon_name ASC");
  if(!$query1){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query1) > 0){
    $row1 = mysql_fetch_array($query1);
    echo "<h4>Русские названия</h4>";
    do {
        echo "<div>\n";
          echo "⇒ <a href=\"encyclopedia_edit.php?code=".$row1['id']."&lev=".$level.$taxon."\"><strong>".$row1['rusname']."</strong></a>";
        echo "</div>";
    } while ($row1 = mysql_fetch_array($query1));
  }
  $query2 = mysql_query("SELECT * FROM $table WHERE latname LIKE '%$term%' ORDER BY $colon_name ASC");
  if(!$query2){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query2) > 0){
    $row2 = mysql_fetch_array($query2);
    echo "<h4>Латинские названия</h4>";
    do {
        echo "<div>\n";
          echo "⇒ <a href=\"encyclopedia_edit.php?code=".$row2['id']."&lev=".$level.$taxon."\"><strong>".$row2['latname']."</strong></a>";
        echo "</div>";
    } while ($row2 = mysql_fetch_array($query2));
  }
*/}




  $host = 'localhost';
  $user = 'new';
  $pswd = '0000';
  $db1 = 'structure';


	$db = new mysqli($host, $user, $pswd, $db1);








	if(!$db) {  // Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		$db->set_charset("utf8");
		// Is there a posted query string?
		if(isset($_POST['search_term'])) {
			$queryString = $db->real_escape_string($_POST['search_term']);

			// Is the string length greater than 0?
			if(strlen($term) > 0) {
				$query = $db->query("SELECT * FROM $table WHERE rusname LIKE '%$term%' ORDER BY $colon_name ASC");

				if($query) {
					// While there are results loop through them - fetching an Object.

					// Store the category id
					$term_id = 0;
					while ($result = $query ->fetch_object()) {
						if($result->id != $term_id) { // check if the category changed
							echo "<div>\n";
								echo "⇒ <a href=\"encyclopedia_edit.php?code=".$result->id."&lev=".$level.$taxon."\"><strong>".$result->rusname."</strong></a>";
							echo "</div>";
						}
					}
					echo '<span class="seperator"><a href="http://www.marcofolio.net/sitemap.html" title="Sitemap">Ничего не нашли? Просмотрите список препаратов.</a></span><br class="break" />';
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a search_term.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}





?>