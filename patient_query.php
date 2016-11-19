<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <link href="styles/main.css" rel="stylesheet" type="text/css" />
    <link rel="icon" sizes="16x16" href="images/favicon.ico">
    <title>Уход за Астмой - Asthma Care</title>
  </head>
  <body>
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <img src="images/logo.svg" width="40" height="40" alt="">
        Уход за Астмой
      </div>
      <div class="mui-divider"></div>
      <ul>
        <li>
          <strong>Список пациентов</strong>
          <ul>
            <li><a href="#">Уровень наблюдения</a></li>
            <li><a href="#">Уровень риска</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">Уход за Астмой</span>
        </div>
      </div>
    </header>
    <div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br>
        <h1>Список пациентов</h1>
        <table class="mui-table mui-table--bordered">
          <thead>
          <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Время показаний</th>
            <th>Эталон</th>
            <th>Значение</th>
            <th>Уровень</th>
          </tr>
          </thead>
          <tbody>
<?php
  require_once("constants.php");
  require_once("base.php");
//  require_once("functions.php");
  $query_text = "
    SELECT
      $table_patient.fname AS fname,
      $table_patient.name AS name,
      $table_patient.sname AS sname,
      $table_patient.b_date AS b_date,
      $table_examination.patient_id AS patient_id,
      $table_examination.result AS result,
      $table_examination.result_standart AS result_standart,
      $table_examination.result_percent AS result_percent
    FROM
      $table_examination,
      $table_patient
    WHERE
      $table_patient.id = $table_examination.patient_id
   ";
  $query = mysql_query($query_text);
  if(!$query){
    echo "<p class='text'>Поиск не осуществлен. Код ошибки:</p>";
    echo exit(mysql_error());
  }
  if (mysql_num_rows($query) > 0){
    $row = mysql_fetch_array($query);
    do{
      echo "<tr>\n";
        echo "<td>".$row['id']."</td>\n";
        echo "<td>".$row['fname']." ".$row['name']." ".$row['sname']."</td>\n";
        echo "<td>".$row['time']."</td>\n";
        echo "<td>".$row['result']."</td>\n";
        echo "<td>".$row['result_standart']."</td>\n";
        echo "<td>".$row['result_percent']."</td>\n";
      echo "</tr>";
    }while($row = mysql_fetch_array($query));
  }
?>
          </tbody>
        </table>
      </div>
    </div>
    <footer id="footer">
      <div class="mui-container-fluid">
        <br>Сделано в рамках Всероссийского хакатона <a href="http://www.hackrussia.ru/" target="_blank">HackRussia</a>
      </div>
    </footer>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/mui.min.js"></script>
  </body>
</html>
<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_GET['fname'] AND $_GET['name'] AND $_GET['sname'] AND $_GET['bdate'] AND $_GET['login'] AND $_GET['password']) {
     $_GET['fname'];
     $_GET['name'];
     $_GET['sname'];
     $_GET['bdate'];
     $_GET['login'];
     $_GET['password'];
  $query_text = "INSERT INTO $table_patient (fname, name, sname, bdate, login, password) VALUES ('".$_GET['fname'].", ".$_GET['name'].", ".$_GET['sname'].", ".$_GET['bdate'].", ".$_GET['login'].", ".$_GET['password']."')";
  $query = mysql_query($query_text);
  if(!$query){echo "Запись не добавлена";}
  else{echo "Ура!";}
  require_once("constants.php");
  require_once("base.php");
  require_once("functions.php");
  }
}
// fname=1&name=2&sname=3&bdate=4&login=5&password=6
?>