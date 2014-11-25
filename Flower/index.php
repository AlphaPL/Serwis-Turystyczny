<?php
    session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login']!=true) echo "<a href='login.php'>Zaloguj się></a>";
	else echo "<a href='logout.php'>Wyloguj się></a>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flower</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1>Portal wycieczek</h1>
<h2>Pochwal sie swoimi cudownymi przeżyciami

</h2>
</div>

<div id="right">
<table class = "tabelka">
  <tr>
    <td>Miniaturka</td>
    <td>Tytuł</td> 
    <td>Autor</td>
    <td>Ocena</td>
  </tr>
 <?php
 
 class MyDB extends SQLite3
 {
    function __construct()
    {
       $this->open('test.db');
    }
 }
 $db = new MyDB();

 $sql =<<<EOF
    SELECT * from TRIPS ;
EOF;

 echo "<tr>";
 $ret = $db->query($sql);
 while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
 {
	foreach ($row as $value) {
		echo"<td><img src=\"". $value["MINATURE"] ."\"></img></td>";
		echo"<td>". $value["TITLE"] ."</td>";
		echo"<td>". $value["AUTHOR"] ."</td>";
		echo"<td>". $value["GRADE"] ."</td>";
		}
 }
 
 $db->close();
 
 echo "</tr>";
		

 ?>

</table>
</div>

<div id="left"> 
<h3>Categories :</h3>
<ul>
<li><a href="#">Dodaj wycieczkę</a></li> 
<li><a href="#">Lista wycieczek</a></li> 
<li><a href="#">Powiadomienia</a></li> 
</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
</div>
</div>

</body>
</html>