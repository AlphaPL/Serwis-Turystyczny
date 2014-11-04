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
<h2>Pochwal sie swoimi cudownymi przeżyciami

<?php
echo $_SESSION["login"];
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
 echo "<tr>";
 $array = array(array("http://i2.cdn.turner.com/cnn/dam/assets/130618174740-01-syria-refugees-horizontal-gallery.jpg","Syria, jaka piękna","Jacek Jackowski",5.0));
		foreach ($array as &$value) {
		echo"<td><img src=\"". $value[0] ."\"></img></td>";
		echo"<td>". $value[1] ."</td>";
		echo"<td>". $value[2] ."</td>";
		echo"<td>". $value[3] ."</td>";
		}
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