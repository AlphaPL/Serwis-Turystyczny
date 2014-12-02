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

<?php
$id=$_GET['id'];
class MyDB extends SQLite3
 {
    function __construct()
    {
       $this->open('test.db');
    }
 }
 $db = new MyDB();
 if(!$db){
    echo $db->lastErrorMsg();
 } else {
    //echo "Opened database successfully\n";
 }
 $sql =<<<EOF
    SELECT * FROM TRIPS WHERE ID=%id%;
EOF;
$sql = str_replace("%id%",$id,$sql);
 $ret = $db->query($sql);
 while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
 {
		echo "<h1>{$row['TITLE']}</h1><br>";
		echo "Autor: {$row['AUTHOR']} <br>";
		echo "Ocena: {$row['GRADE']} <br>";
		echo "Trudność: {$row['DIFFICULTY']} <br>";
		echo "Budżet: {$row['BUDGET']} <br>";
		echo "<img src='{$row['MINIATURE']}'></img><br>";
		echo "{$row['TXT']}";
 }
 $db->close();
?>
<div style="clear: both;"> </div>

<div id="footer">
</div>
</div>

</body>
</html>