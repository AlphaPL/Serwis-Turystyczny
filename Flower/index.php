<?php
    session_start();
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
<h2>
<?php
if(isset($_SESSION['login']))
{
	 echo "Pochwal sie swoimi cudownymi przeżyciami ".$_SESSION['login'];
}
else
	echo "Poczytaj sobie anonimie rzeczy";
	?>

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
 $ret = $db->query($sql);
 while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
 {
		echo "<tr>";
		echo"<td><img src=\"". $row["MINIATURE"] ."\"></img></td>";
		echo"<td>". $row["TITLE"] ."</td>";
		echo"<td>". $row["AUTHOR"] ."</td>";
		echo"<td>". $row["GRADE"] ."</td>";
		echo "</tr>";
 }
 $db->close();
 
		

 ?>

</table>
</div>

<div id="left"> 
<h3>Menu :</h3>
<ul>
<li><a href="dodaj_wpis/dodaj_wpis.php">Dodaj wycieczkę</a></li> 
<li><a href="#">Lista wycieczek</a></li> 
<li><a href="#">Powiadomienia</a></li>
 <?php
 	if (!isset($_SESSION['login']) || $_SESSION['login']!=true) echo "<li><a href='login.php'>Zaloguj się</a></li>";
	else echo "<li><a href='logout.php'>Wyloguj się</a></li>";
	?>
</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
</div>
</div>

</body>
</html>