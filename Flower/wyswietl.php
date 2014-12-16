<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flower</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<style type="text/css">
#sty
{
	margin:0 auto;
	margin-top:3px;
	border:#0F0 dashed 2px;
	width:500px;
	padding:15px;
	}
#fileid
{
	width:85px;
	height:20px;
	}
img
{
	margin-right:20px;
}
#nameid
{
	font-size:18px;
	color:#06F;
	font-family:"Comic Sans MS", cursive;
	margin-bottom:5px;
}
#msgid
{
	font-size:20px;
	color:#3CF;
	font-family:"Courier New", Courier, monospace;
	margin-bottom:5px;
}
#tnameid
{
	width:200px;
	font-size:20px;
	font-family:"Courier New", Courier, monospace;
	height:35px;
	color:#006;
	border:#666 solid 2px;
}
#tjobid
{
	width:200px;
	height:35px;
	font-size:20px;
	font-family:"Courier New", Courier, monospace;
	color:#006;
	border:#666 solid 2px;
}
#tmessageid
{
	max-width:500px;
	max-height:100px;
	min-width:200px;
	min-height:100px;
	font-size:20px;
	font-family:"Courier New", Courier, monospace;
	color:#006;
	border:#666 solid 2px;
}
#one
{
	font-size:18px;
	font-family:"Times New Roman", Times, serif;
	color:#00F;
}
#submit
{
	width:200px;
	height:30px;
	background-color:#999;
	color:#FFF;
	border:#666 solid 2px;
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
		echo "{$row['TXT']}";
 }
 $db->close();
?>
<div style="clear: both;"> </div>


<?php
session_start();
if(isset($_SESSION["login"])) {

echo <<< EOT
<form name="comment" method="post" action="dodaj_komentarz.php?id=
EOT;
echo $_GET["id"];
echo <<< EOT
" onSubmit="return validation()">
<table width="500" border="0" style="margin:auto;">
  </tr>
  <tr>
    <td align="right">
    <input type="text" name="title" id="tjobid"></td>
  </tr>
  
  <tr>
    <td><textarea name="message" id="tmessageid"></textarea></td>
  </tr>
  <tr>

  <td><input type="submit" name="submit" id="submit" value="Dodaj Komentarz"></td>
  </tr>
</table>
EOT;
}
?>

<div id="footer">
</div>
</div>

</body>
</html>