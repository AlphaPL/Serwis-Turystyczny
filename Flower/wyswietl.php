<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flower</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<style type="text/css">
#tjobid
{
	width:757px;
	height:35px;
	font-size:13px;
	font-family:"Courier New", Courier, monospace;
	color:#006;
	border:#005CB9 solid 1px;
}
#tmessageid
{
	max-width:760px;
	max-height:100px;
	min-width:757px;
	min-height:100px;
	font-size:12px;
	font-family:"Courier New", Courier, monospace;
	color:#006;
	border:#005CB9 solid 1px;
}
#submit
{
	width:200px;
	height:30px;
	background: url("images/bg.jpg");
	color:#FFF;
	border:#005CB9 solid 1px;
}
#comment_box
{
	border: 1px solid #005CB9;
	background-color: #F1F5F9;
}
</style>

<script type="text/javascript">
function validation()
{
	var mess=document.comment.message.value;
	var mess1=document.getElementById('tmessageid');
	if(mess=="")
	{
		document.comment.message.focus();
		mess1.style.borderColor="#f00";
		return false;
	}
}
</script>

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
		echo "{$row['TXT']}<br>";
 }
 
 $sql =<<<EOF
    SELECT * FROM COMMENTS WHERE TXTID=%id%;
EOF;
	$sql = str_replace("%id%",$id,$sql);
	$ret = $db->query($sql);
	echo "<div id=\"footer\"></div>";
	echo "<h2>Komentarze:</h2>";
	while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
	{
		echo "<div id=\"comment_box\"><h3>{$row['TITLE']}<span style=\"float: right;\">{$row['AUTHOR']}</span></h3>";
		echo "{$row['TXT']}</div><br>";
	}
 
 $db->close();
?>
<div style="clear: both;"> </div>


<?php
session_start();
echo "<h2>Dodaj nowy komentarz:</h2>";
if(isset($_SESSION["login"])) {
echo <<< EOT
<form name="comment" method="post" action="dodaj_komentarz.php?id=
EOT;
echo $_GET["id"];
echo <<< EOT
" onSubmit="return validation()">
<div>
<h3>Tytuł:</h3>
<input type="text" name="title" id="tjobid"><br><br>
<h3>Opis:</h3>
<textarea name="message" id="tmessageid"></textarea><br><br>
<input type="submit" name="submit" id="submit" value="Dodaj komentarz">
</div>
EOT;
} else {
	echo "*Musisz być zalogowany";
}
?>

<div id="footer">
</div>
</div>

</body>
</html>