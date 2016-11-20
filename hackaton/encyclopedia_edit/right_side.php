<?php
if(isset($_GET['code'])){
  echo "<div class='data'>";
    include "syn.php";
  echo "</div>";
  echo "<div class='data'>";
    include "epo.php";
  echo "</div>";
}
if(isset($_GET['code']) AND $_GET['tax'] == ""){
  echo "<div class='data'>";
    include "node_prev.php";
  echo "</div>";
  echo "<div class='data'>";
    include "node_next.php";
  echo "</div>";
}
  echo "<div class='data'>";
  include "right_content.php";
  echo "</div>";
?>